<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */


namespace Gs2\Core\Net;

use Gs2\Core\Exception\Gs2Exception;
use Gs2\Core\Exception\SessionNotOpenException;
use Gs2\Core\Exception\UnknownException;
use Gs2\Core\Model\AsyncAction;
use Gs2\Core\Model\AsyncResult;
use Gs2\Core\Model\BasicGs2Credential;
use Gs2\Core\Model\Region;
use Gs2\Core\Result\CloseResult;
use Gs2\Core\Result\OpenResult;
use Gs2\Core\Util\Enum;
use GuzzleHttp\Promise\PromiseInterface;
use InvalidArgumentException;

class State extends Enum {
    const Idle = 0;
    const Opening = 1;
    const CancellingOpen = 2;
    const Available = 3;
    const CancellingTasks = 4;
    const Closing = 5;
}


abstract class Gs2Session {

    /**
     * @var State
     */
    public $m_State;

    /**
     * @var BasicGs2Credential
     */
    private $m_Gs2Credential;

    /**
     * @var Region
     */
    private $m_Region;

    /**
     * @var string
     */
    private $m_ProjectToken;

    /**
     * @var AsyncAction<AsyncResult<OpenResult>>[]
     */
    private $openCallbackList = [];

    /**
     * @var AsyncAction<AsyncResult<CloseResult>>[]
     */
    private $closeCallbackList = [];

    /**
     * @var Gs2SessionTask[]
     */
    private $gs2SessionTaskList = [];

    /**
     * @var AsyncAction<AsyncResult<CloseResult>>
     */
    private $m_OnClose;

    /**
     * @var Generator
     */
    private $m_Gs2SessionIdTaskGenerator;

    /**
     * @param AsyncAction<AsyncResult<OpenResult>>[] $openCallbackList
     * @param Gs2Exception|null $result
     */
    private static function triggerOpenCallback(
        array $openCallbackList,
        ?Gs2Exception $result
    ) {
        foreach ($openCallbackList as $pOpenCallback) {
            $pOpenCallback->callback(
                new AsyncResult(
                    new OpenResult(),
                    $result
                )
            );
        }
    }

    /**
     * @param AsyncAction<AsyncResult<CloseResult>>[] $closeCallbackList
     * @param Gs2Exception $result
     */
    private static function triggerCloseCallback(
        array $closeCallbackList,
        Gs2Exception $result = null
    ) {
        foreach ($closeCallbackList as $pCloseCallback) {
            $pCloseCallback->callback(new AsyncResult(
                new CloseResult(),
                    $result
                )
            );
        }
    }

    private static function triggerCancelTasksCallback(
        array $gs2SessionTaskList,
        Gs2Exception $gs2Exception = null
    ) {
        foreach ($gs2SessionTaskList as $pGs2SessionTask) {
            $pGs2SessionTask->triggerUserCallback(
                new Gs2ClientErrorResponse($gs2Exception)
            );  // notifyComplete() は不要なのでユーザコールバックのみ呼ぶ
        }
    }

    private function enterStateLock() {
//        m_Mutex.lock();
    }

    private function exitStateLock() {
//        m_Mutex.unlock();
    }

    private function changeStateToIdle() {
        // 外部要因による切断がありうるので、どの状態からでも遷移しうる

        assert (empty($this->openCallbackList));     // すべてコールバックされ（るために取り出され）ているべき
        assert (empty($this->closeCallbackList));    // すべてコールバックされ（るために取り出され）ているべき
        assert (empty($this->gs2SessionTaskList));         // Available になる前に登録はできない

        $this->m_State = State::Idle;

        $this->exitStateLock();
    }

    private function changeStateToOpening() {
        assert ($this->m_State == State::Idle || $this->m_State == State::Closing);
        
        assert (!empty($this->openCallbackList));    // open() タスクが登録されているときのみ遷移する
        assert (empty($this->closeCallbackList));    // すべてコールバックされ（るために取り出され）ているべき
        assert (empty($this->gs2SessionTaskList));         // Available になる前に登録はできない

        $this->m_State = State::Opening;

        $this->openImpl();

        $this->exitStateLock();
    }

    private function changeStateToCancellingOpen() {
        assert ($this->m_State == State::Opening);

        assert (!empty($this->openCallbackList));    // Opening は open() タスクが必ず存在する
        assert (!empty($this->closeCallbackList));   // 接続処理中の close() によってのみ遷移する
        assert (empty($this->gs2SessionTaskList));         // Available になる前に登録はできない

        $this->m_State = State::CancellingOpen;

        $this->cancelOpenImpl();

        $this->exitStateLock();
    }

    private function changeStateToAvailable(string $projectToken) {
        assert ($this->m_State == State::Opening);

        assert (empty($this->openCallbackList));     // すべてコールバックされ（るために取り出され）ているべき
        assert (empty($this->closeCallbackList));    // close() が呼ばれている場合は Closing に遷移しなければならない
        assert (empty($this->gs2SessionTaskList));         // Available になる前に登録はできない

        $this->m_ProjectToken = $projectToken;

        $this->m_State = State::Available;

        $this->exitStateLock();
    }

    private function changeStateToCancellingTasks() {
        assert ($this->m_State == State::Available);

        assert (empty($this->openCallbackList));     // Available のあいだの open() は即時返却される
        // 外部要因による切断の場合に close() を呼ばなくても遷移することがある
        assert (!empty($this->gs2SessionTaskList));        // キャンセルしたいタスクがあるから遷移するのである

        $this->m_State = State::CancellingTasks;

        $this->exitStateLock();
    }

    private function changeStateToClosing() {
        assert ($this->m_State == State::Opening || $this->m_State == State::CancellingOpen || $this->m_State == State::Available || $this->m_State == State::CancellingTasks);

        // CancellingTasks のあいだには次の open() が積まれることがある
        // 外部要因による切断の場合に close() を呼ばなくても遷移することがある
        assert (empty($this->gs2SessionTaskList));         // タスクがなくなったときに遷移する

        $this->m_ProjectToken = null;

        $this->m_State = State::Closing;

        $isCloseInstant = $this->closeImpl();

        /** @noinspection PhpStatementHasEmptyBodyInspection */
        if ($isCloseInstant) {
            // Idle か Opening に遷移しているはずだけど、ロックから出てしまっているので検証はしない
        } else {
            $this->exitStateLock();
        }
    }

    private function keepCurrentState() {
        $this->exitStateLock();
    }

    // Gs2SessionTask から利用
    public function execute(Gs2SessionTask $gs2SessionTask): ?PromiseInterface {
        $this->enterStateLock();

        if ($this->m_State == State::Available) {
            $gs2SessionTask->gs2SessionTaskId = $this->m_Gs2SessionIdTaskGenerator->issue();

            $gs2SessionTask->prepareImpl();

            array_push($this->gs2SessionTaskList, $gs2SessionTask);

            $this->keepCurrentState();

            $gs2Session = $this;
            return $gs2SessionTask->executeImpl()->then(
                function ($result) use ($gs2Session, $gs2SessionTask) {
                    $gs2Session->notifyComplete($gs2SessionTask);
                    return $result;
                },
                function (Gs2Exception $e) use ($gs2Session, $gs2SessionTask) {
                    $gs2Session->notifyComplete($gs2SessionTask);
                    throw $e;
                }
            );
        } else {
            $this->keepCurrentState();

            $gs2SessionTask->callback(
                new Gs2ClientErrorResponse(
                    new SessionNotOpenException("")
                )
            );
            return null;
        }
    }

    /**
     * @param Gs2SessionTask $gs2SessionTask
     */
    public function notifyComplete(Gs2SessionTask $gs2SessionTask) {
        $this->enterStateLock();

        $this->gs2SessionTaskList = array_udiff(
            $this->gs2SessionTaskList,
            array($gs2SessionTask),
            function (Gs2SessionTask $a, Gs2SessionTask $b) {
                // 一致判定にしか使われないので -1 が返らなくても大丈夫
                return $a->gs2SessionTaskId->equals($b->gs2SessionTaskId) ? 0 : 1;
            }
        );
        $this->gs2SessionTaskList = array_values($this->gs2SessionTaskList);

        if ($this->m_State == State::CancellingTasks && empty($this->gs2SessionTaskList)) {
            $this->changeStateToClosing();
        } else {
            $this->keepCurrentState();
        }
    }

    /**
     * @return string
     */
    public function getProjectToken(): string {
        return $this->m_ProjectToken;
    }

    /**
     * @param String|null $pProjectToken
     * @param Gs2Exception|null $exception
     */
    public function openCallback(
        ?string $pProjectToken,
        ?Gs2Exception $exception
    ) {
        // 接続完了コールバック

        $this->enterStateLock();

        if ($exception == null) {
            // ログイン処理がエラーなく応答された場合

            if ($pProjectToken != null) {
                $openCallbackList = $this->openCallbackList;
                while(!empty($this->openCallbackList)) {
                    array_pop($this->openCallbackList);
                }

                if (empty($this->closeCallbackList)) {
                    $this->changeStateToAvailable($pProjectToken);
                } else {
                    $this->changeStateToClosing();
                }

                $this->triggerOpenCallback($openCallbackList, null);
            } else {
            // 応答からプロジェクトトークンが取得できなかった場合
            // ただし、ここには来ないように派生クラスを実装しなければならない

                $openCallbackList = $this->openCallbackList;
                while(!empty($this->openCallbackList)) {
                    array_pop($this->openCallbackList);
                }

                $closeCallbackList = $this->closeCallbackList;
                while(!empty($this->closeCallbackList)) {
                    array_pop($this->closeCallbackList);
                }

                $this->changeStateToIdle();

                $this->triggerOpenCallback($openCallbackList, new UnknownException(""));
                $this->triggerCloseCallback($closeCallbackList, new UnknownException(""));
            }
        } else {
            // ログイン処理がエラーになった場合

            $openCallbackList = $this->openCallbackList;
            while(!empty($this->openCallbackList)) {
                array_pop($this->openCallbackList);
            }

            $closeCallbackList = $this->closeCallbackList;
            while(!empty($this->closeCallbackList)) {
                array_pop($this->closeCallbackList);
            }

            $this->changeStateToIdle();

            $this->triggerOpenCallback($openCallbackList, $exception);
            $this->triggerCloseCallback($closeCallbackList, $exception);
        }
    }

    /**
     * @param Gs2Exception $gs2Exception
     * @param bool $isCloseInstant
     */
    public function closeCallback(
        Gs2Exception $gs2Exception,
        bool $isCloseInstant
    ) {
        if (!$isCloseInstant) {
            $this->enterStateLock();
        }

        $onClose = $this->m_OnClose;

        $gs2SessionTaskList = $this->gs2SessionTaskList;
        while(!empty($this->gs2SessionTaskList)) {
            array_pop($this->gs2SessionTaskList);
        }

        $closeCallbackList = $this->closeCallbackList;
        while(!empty($this->closeCallbackList)) {
            array_pop($this->closeCallbackList);
        }

        if (empty($this->openCallbackList)) {
            $this->changeStateToIdle();
        } else {
            $this->changeStateToOpening();
        }

        $this->triggerCancelTasksCallback($gs2SessionTaskList, $gs2Exception);

        if ($onClose != null) {
            $onClose->callback(null);
        }
        $this->triggerCloseCallback($closeCallbackList, null);
    }

    protected function cancelTasksCallback(
        Gs2Exception $gs2Exception
    ) {
        $this->enterStateLock();

        $gs2SessionTaskList = $this->gs2SessionTaskList;
        reset($this->gs2SessionTaskList);

        $this->keepCurrentState();

        $this->triggerCancelTasksCallback($gs2SessionTaskList, $gs2Exception);
    }

    /**
     * @param Gs2SessionTaskId $gs2SessionTaskId
     * @return Gs2SessionTask
     */
    protected function findGs2SessionTask(Gs2SessionTaskId $gs2SessionTaskId): ?Gs2SessionTask {
//        $this->m_Mutex->lock();

        foreach ($this->gs2SessionTaskList as $sessionTask) {
            if ($sessionTask->gs2SessionTaskId->equals($gs2SessionTaskId)) {
                return $sessionTask;
            }
        }

        return null;
    }

    /**
     * Gs2Session constructor.
     * @param BasicGs2Credential $gs2Credential
     * @param string|null $region
     */
    public function __construct(
        BasicGs2Credential $gs2Credential,
        string $region = null
    ) {

        $this->m_State = State::Idle;
        $this->m_Gs2Credential = $gs2Credential;
        $this->m_Gs2SessionIdTaskGenerator = new Generator();

        if ($region == null) {
            $this->m_Region = Region::AP_NORTHEAST_1;
        } else {
            $this->m_Region = $region;
        }
    }

    /**
     * @return BasicGs2Credential
     */
    public function getGs2Credential(): BasicGs2Credential {
        return $this->m_Gs2Credential;
    }

    /**
     * @return string
     */
    public function getRegion(): string {
        return $this->m_Region;
    }

    /**
     * @param AsyncAction<AsyncResult<OpenResult>> $callback
     */
    public function openAsync(AsyncAction $callback) {
        $this->enterStateLock();

        switch ($this->m_State) {
            case State::Idle:
                array_push($this->openCallbackList, $callback);
                $this->changeStateToOpening();
                break;

            case State::Opening:
            case State::CancellingOpen:
            case State::CancellingTasks:    // 切断処理が終わってから実行される
            case State::Closing:            // 切断処理が終わってから実行される
            array_push($this->openCallbackList, $callback);
                $this->keepCurrentState();
                break;

            case State::Available:
                $this->keepCurrentState();
                $callback->callback(null);
                break;
        }
    }

    public function open() {
        $asyncResults = [];
        $this->openAsync(
            new class($asyncResults) implements AsyncAction {

                /**
                 * @var AsyncResult[]
                 */
                private $asyncResults;

                function __construct(array& $asyncResults)
                {
                    $this->asyncResults = &$asyncResults;
                }

                function callback(AsyncResult $result)
                {
                    array_push($this->asyncResults, $result);
                }
            }
        );
        while(empty($asyncResults)) {
            time_nanosleep (0, 100000000);
        }
    }

    /**
     * @param AsyncAction<AsyncResult<CloseResult>> $callback
     */
    public function closeAsync(
        AsyncAction $callback
    ) {
        $this->enterStateLock();

        if ($this->m_State == State::Idle) {
            // 即コールバック
            $this->keepCurrentState();

            $callback->callback(null);
        } else {
            array_push($this->closeCallbackList, $callback);

            switch ($this->m_State) {
                case State::Opening:
                    $this->changeStateToCancellingOpen();
                    break;

                case State::Available:
                    if (empty($this->gs2SessionTaskList)) {
                        $this->changeStateToClosing();
                    } else {
                        $this->changeStateToCancellingTasks();
                    }
                    break;

                case State::Idle:   // ここには来ない
                case State::CancellingOpen:
                case State::CancellingTasks:
                case State::Closing:
                    $this->keepCurrentState();
                    break;
            }
        }
    }

    public function close() {
        $this->closeAsync(
            new class($this) implements AsyncAction {
                private $_this;
                function __construct(Gs2Session $_this)
                {
                    $this->_this = $_this;
                }

                function callback(AsyncResult $result)
                {
                    $this->_this->m_State = State::Idle;
                }
            }
        );
    }

    /**
     * @param AsyncAction<AsyncResult<CloseResult>> $callback
     */
    public function setOnClose(AsyncAction $callback) {
//        $this->m_Mutex->lock();

        $this->m_OnClose = $callback;
    }

    // 以下の関数は m_Mutex のロック内から呼ばれます

    /**
     * @return mixed
     */
    abstract function openImpl();

    /**
     * @return mixed
     */
    abstract function cancelOpenImpl();

    /**
     * @return bool
     */
    abstract function closeImpl(): bool;   // 中で closeCallback() を呼んだ場合は true を返すこと
}
