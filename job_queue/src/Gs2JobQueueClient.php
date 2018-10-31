<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2\JobQueue;

use Gs2\Core\AbstractGs2Client;
use Gs2\Core\Model\Region;
use Gs2\Core\Model\IGs2Credential;
use Gs2\JobQueue\Control\DeleteDeadJobRequest;
use Gs2\JobQueue\Control\DescribeDeadJobRequest;
use Gs2\JobQueue\Control\DescribeDeadJobResult;
use Gs2\JobQueue\Control\DescribeDeadJobByScriptNameRequest;
use Gs2\JobQueue\Control\DescribeDeadJobByScriptNameResult;
use Gs2\JobQueue\Control\DescribeDeadJobByUserIdRequest;
use Gs2\JobQueue\Control\DescribeDeadJobByUserIdResult;
use Gs2\JobQueue\Control\GetDeadJobRequest;
use Gs2\JobQueue\Control\GetDeadJobResult;
use Gs2\JobQueue\Control\DescribeJobResultRequest;
use Gs2\JobQueue\Control\DescribeJobResultResult;
use Gs2\JobQueue\Control\DescribeJobRequest;
use Gs2\JobQueue\Control\DescribeJobResult;
use Gs2\JobQueue\Control\DescribeJobByUserIdRequest;
use Gs2\JobQueue\Control\DescribeJobByUserIdResult;
use Gs2\JobQueue\Control\PushRequest;
use Gs2\JobQueue\Control\PushResult;
use Gs2\JobQueue\Control\RunRequest;
use Gs2\JobQueue\Control\RunResult;
use Gs2\JobQueue\Control\RunByUserIdRequest;
use Gs2\JobQueue\Control\RunByUserIdResult;
use Gs2\JobQueue\Control\CreateQueueRequest;
use Gs2\JobQueue\Control\CreateQueueResult;
use Gs2\JobQueue\Control\DeleteQueueRequest;
use Gs2\JobQueue\Control\DescribeQueueRequest;
use Gs2\JobQueue\Control\DescribeQueueResult;
use Gs2\JobQueue\Control\GetQueueRequest;
use Gs2\JobQueue\Control\GetQueueResult;
use Gs2\JobQueue\Control\GetQueueStatusRequest;
use Gs2\JobQueue\Control\GetQueueStatusResult;
use Gs2\JobQueue\Control\UpdateQueueRequest;
use Gs2\JobQueue\Control\UpdateQueueResult;

/**
 * GS2 JobQueue API クライアント
 *
 * @author Game Server Services, Inc.
 *
 */
class Gs2JobQueueClient extends AbstractGs2Client {

	public static $ENDPOINT = "job-queue";

	/**
	 * コンストラクタ。
	 *
	 * @param IGs2Credential $credential 認証情報
	 * @param Region $region リージョン
	 */
	public function __construct(IGs2Credential $credential, $region=null)
	{
	    if(is_string($region)) {
	        $region = new Region($region);
        }
	    if(is_null($region)) {
	        $region = new Region(Region::AP_NORTHEAST_1);
	    }
		parent::__construct($credential, $region);
	}

	/**
	 * デッドジョブを削除します。<br>
	 * <br>
	 *
	 * @param DeleteDeadJobRequest $request リクエストパラメータ
     *
     * @throws \Gs2\Core\Exception\BadGatewayException
     * @throws \Gs2\Core\Exception\BadRequestException
     * @throws \Gs2\Core\Exception\ConflictException
     * @throws \Gs2\Core\Exception\InternalServerErrorException
     * @throws \Gs2\Core\Exception\NotFoundException
     * @throws \Gs2\Core\Exception\QuotaExceedException
     * @throws \Gs2\Core\Exception\RequestTimeoutException
     * @throws \Gs2\Core\Exception\ServiceUnavailableException
     * @throws \Gs2\Core\Exception\UnauthorizedException
	 */
	public function deleteDeadJob(DeleteDeadJobRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/queue/". ($request->getQueueName() === null || $request->getQueueName() === "" ? "null" : $request->getQueueName()). "/deadJob/". ($request->getJobId() === null || $request->getJobId() === "" ? "null" : $request->getJobId()). "/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2JobQueue::MODULE,
            DeleteDeadJobRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * デッドジョブの一覧を取得します。<br>
	 * <br>
	 *
	 * @param DescribeDeadJobRequest $request リクエストパラメータ
	 * @return DescribeDeadJobResult 結果
     *
     * @throws \Gs2\Core\Exception\BadGatewayException
     * @throws \Gs2\Core\Exception\BadRequestException
     * @throws \Gs2\Core\Exception\ConflictException
     * @throws \Gs2\Core\Exception\InternalServerErrorException
     * @throws \Gs2\Core\Exception\NotFoundException
     * @throws \Gs2\Core\Exception\QuotaExceedException
     * @throws \Gs2\Core\Exception\RequestTimeoutException
     * @throws \Gs2\Core\Exception\ServiceUnavailableException
     * @throws \Gs2\Core\Exception\UnauthorizedException
	 */
	public function describeDeadJob(DescribeDeadJobRequest $request): DescribeDeadJobResult
	{
	    $url = self::ENDPOINT_HOST. "/queue/". ($request->getQueueName() === null || $request->getQueueName() === "" ? "null" : $request->getQueueName()). "/deadJob";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        if($request->getPageToken() !== null) $queryString['pageToken'] = $request->getPageToken();
        if($request->getLimit() !== null) $queryString['limit'] = $request->getLimit();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2JobQueue::MODULE,
            DescribeDeadJobRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeDeadJobResult($result);
    }

	/**
	 * スクリプト名で絞り込んでデッドジョブの一覧を取得します。<br>
	 * <br>
	 *
	 * @param DescribeDeadJobByScriptNameRequest $request リクエストパラメータ
	 * @return DescribeDeadJobByScriptNameResult 結果
     *
     * @throws \Gs2\Core\Exception\BadGatewayException
     * @throws \Gs2\Core\Exception\BadRequestException
     * @throws \Gs2\Core\Exception\ConflictException
     * @throws \Gs2\Core\Exception\InternalServerErrorException
     * @throws \Gs2\Core\Exception\NotFoundException
     * @throws \Gs2\Core\Exception\QuotaExceedException
     * @throws \Gs2\Core\Exception\RequestTimeoutException
     * @throws \Gs2\Core\Exception\ServiceUnavailableException
     * @throws \Gs2\Core\Exception\UnauthorizedException
	 */
	public function describeDeadJobByScriptName(DescribeDeadJobByScriptNameRequest $request): DescribeDeadJobByScriptNameResult
	{
	    $url = self::ENDPOINT_HOST. "/queue/". ($request->getQueueName() === null || $request->getQueueName() === "" ? "null" : $request->getQueueName()). "/deadJob/script/". ($request->getScriptName() === null || $request->getScriptName() === "" ? "null" : $request->getScriptName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        if($request->getPageToken() !== null) $queryString['pageToken'] = $request->getPageToken();
        if($request->getLimit() !== null) $queryString['limit'] = $request->getLimit();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2JobQueue::MODULE,
            DescribeDeadJobByScriptNameRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeDeadJobByScriptNameResult($result);
    }

	/**
	 * ユーザIDで絞り込んでデッドジョブの一覧を取得します。<br>
	 * <br>
	 *
	 * @param DescribeDeadJobByUserIdRequest $request リクエストパラメータ
	 * @return DescribeDeadJobByUserIdResult 結果
     *
     * @throws \Gs2\Core\Exception\BadGatewayException
     * @throws \Gs2\Core\Exception\BadRequestException
     * @throws \Gs2\Core\Exception\ConflictException
     * @throws \Gs2\Core\Exception\InternalServerErrorException
     * @throws \Gs2\Core\Exception\NotFoundException
     * @throws \Gs2\Core\Exception\QuotaExceedException
     * @throws \Gs2\Core\Exception\RequestTimeoutException
     * @throws \Gs2\Core\Exception\ServiceUnavailableException
     * @throws \Gs2\Core\Exception\UnauthorizedException
	 */
	public function describeDeadJobByUserId(DescribeDeadJobByUserIdRequest $request): DescribeDeadJobByUserIdResult
	{
	    $url = self::ENDPOINT_HOST. "/queue/". ($request->getQueueName() === null || $request->getQueueName() === "" ? "null" : $request->getQueueName()). "/deadJob/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        if($request->getPageToken() !== null) $queryString['pageToken'] = $request->getPageToken();
        if($request->getLimit() !== null) $queryString['limit'] = $request->getLimit();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2JobQueue::MODULE,
            DescribeDeadJobByUserIdRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeDeadJobByUserIdResult($result);
    }

	/**
	 * デッドジョブを取得します。<br>
	 * <br>
	 *
	 * @param GetDeadJobRequest $request リクエストパラメータ
	 * @return GetDeadJobResult 結果
     *
     * @throws \Gs2\Core\Exception\BadGatewayException
     * @throws \Gs2\Core\Exception\BadRequestException
     * @throws \Gs2\Core\Exception\ConflictException
     * @throws \Gs2\Core\Exception\InternalServerErrorException
     * @throws \Gs2\Core\Exception\NotFoundException
     * @throws \Gs2\Core\Exception\QuotaExceedException
     * @throws \Gs2\Core\Exception\RequestTimeoutException
     * @throws \Gs2\Core\Exception\ServiceUnavailableException
     * @throws \Gs2\Core\Exception\UnauthorizedException
	 */
	public function getDeadJob(GetDeadJobRequest $request): GetDeadJobResult
	{
	    $url = self::ENDPOINT_HOST. "/queue/". ($request->getQueueName() === null || $request->getQueueName() === "" ? "null" : $request->getQueueName()). "/deadJob/". ($request->getJobId() === null || $request->getJobId() === "" ? "null" : $request->getJobId()). "/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2JobQueue::MODULE,
            GetDeadJobRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetDeadJobResult($result);
    }

	/**
	 * ジョブの実行結果の一覧を取得します。<br>
	 * <br>
	 *
	 * @param DescribeJobResultRequest $request リクエストパラメータ
	 * @return DescribeJobResultResult 結果
     *
     * @throws \Gs2\Core\Exception\BadGatewayException
     * @throws \Gs2\Core\Exception\BadRequestException
     * @throws \Gs2\Core\Exception\ConflictException
     * @throws \Gs2\Core\Exception\InternalServerErrorException
     * @throws \Gs2\Core\Exception\NotFoundException
     * @throws \Gs2\Core\Exception\QuotaExceedException
     * @throws \Gs2\Core\Exception\RequestTimeoutException
     * @throws \Gs2\Core\Exception\ServiceUnavailableException
     * @throws \Gs2\Core\Exception\UnauthorizedException
	 */
	public function describeJobResult(DescribeJobResultRequest $request): DescribeJobResultResult
	{
	    $url = self::ENDPOINT_HOST. "/queue/". ($request->getQueueName() === null || $request->getQueueName() === "" ? "null" : $request->getQueueName()). "/deadJob/". ($request->getJobId() === null || $request->getJobId() === "" ? "null" : $request->getJobId()). "/result";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        if($request->getPageToken() !== null) $queryString['pageToken'] = $request->getPageToken();
        if($request->getLimit() !== null) $queryString['limit'] = $request->getLimit();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2JobQueue::MODULE,
            DescribeJobResultRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeJobResultResult($result);
    }

	/**
	 * ジョブの一覧を取得します。<br>
	 * <br>
	 *
	 * @param DescribeJobRequest $request リクエストパラメータ
	 * @return DescribeJobResult 結果
     *
     * @throws \Gs2\Core\Exception\BadGatewayException
     * @throws \Gs2\Core\Exception\BadRequestException
     * @throws \Gs2\Core\Exception\ConflictException
     * @throws \Gs2\Core\Exception\InternalServerErrorException
     * @throws \Gs2\Core\Exception\NotFoundException
     * @throws \Gs2\Core\Exception\QuotaExceedException
     * @throws \Gs2\Core\Exception\RequestTimeoutException
     * @throws \Gs2\Core\Exception\ServiceUnavailableException
     * @throws \Gs2\Core\Exception\UnauthorizedException
	 */
	public function describeJob(DescribeJobRequest $request): DescribeJobResult
	{
	    $url = self::ENDPOINT_HOST. "/queue/". ($request->getQueueName() === null || $request->getQueueName() === "" ? "null" : $request->getQueueName()). "/job";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        if($request->getPageToken() !== null) $queryString['pageToken'] = $request->getPageToken();
        if($request->getLimit() !== null) $queryString['limit'] = $request->getLimit();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2JobQueue::MODULE,
            DescribeJobRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeJobResult($result);
    }

	/**
	 * ジョブの一覧を取得します。<br>
	 * <br>
	 *
	 * @param DescribeJobByUserIdRequest $request リクエストパラメータ
	 * @return DescribeJobByUserIdResult 結果
     *
     * @throws \Gs2\Core\Exception\BadGatewayException
     * @throws \Gs2\Core\Exception\BadRequestException
     * @throws \Gs2\Core\Exception\ConflictException
     * @throws \Gs2\Core\Exception\InternalServerErrorException
     * @throws \Gs2\Core\Exception\NotFoundException
     * @throws \Gs2\Core\Exception\QuotaExceedException
     * @throws \Gs2\Core\Exception\RequestTimeoutException
     * @throws \Gs2\Core\Exception\ServiceUnavailableException
     * @throws \Gs2\Core\Exception\UnauthorizedException
	 */
	public function describeJobByUserId(DescribeJobByUserIdRequest $request): DescribeJobByUserIdResult
	{
	    $url = self::ENDPOINT_HOST. "/queue/". ($request->getQueueName() === null || $request->getQueueName() === "" ? "null" : $request->getQueueName()). "/job/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        if($request->getPageToken() !== null) $queryString['pageToken'] = $request->getPageToken();
        if($request->getLimit() !== null) $queryString['limit'] = $request->getLimit();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2JobQueue::MODULE,
            DescribeJobByUserIdRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeJobByUserIdResult($result);
    }

	/**
	 * ジョブキューにジョブを登録します<br>
	 * <br>
	 *
	 * @param PushRequest $request リクエストパラメータ
	 * @return PushResult 結果
     *
     * @throws \Gs2\Core\Exception\BadGatewayException
     * @throws \Gs2\Core\Exception\BadRequestException
     * @throws \Gs2\Core\Exception\ConflictException
     * @throws \Gs2\Core\Exception\InternalServerErrorException
     * @throws \Gs2\Core\Exception\NotFoundException
     * @throws \Gs2\Core\Exception\QuotaExceedException
     * @throws \Gs2\Core\Exception\RequestTimeoutException
     * @throws \Gs2\Core\Exception\ServiceUnavailableException
     * @throws \Gs2\Core\Exception\UnauthorizedException
	 */
	public function push(PushRequest $request): PushResult
	{
	    $url = self::ENDPOINT_HOST. "/queue/". ($request->getQueueName() === null || $request->getQueueName() === "" ? "null" : $request->getQueueName()). "/job/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['jobs'] = $request->getJobs();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2JobQueue::MODULE,
            PushRequest::FUNCTION,
            $body,
            $headers
        );
        return new PushResult($result);
    }

	/**
	 * ジョブキューを実行します<br>
	 * <br>
	 *
	 * @param RunRequest $request リクエストパラメータ
	 * @return RunResult 結果
     *
     * @throws \Gs2\Core\Exception\BadGatewayException
     * @throws \Gs2\Core\Exception\BadRequestException
     * @throws \Gs2\Core\Exception\ConflictException
     * @throws \Gs2\Core\Exception\InternalServerErrorException
     * @throws \Gs2\Core\Exception\NotFoundException
     * @throws \Gs2\Core\Exception\QuotaExceedException
     * @throws \Gs2\Core\Exception\RequestTimeoutException
     * @throws \Gs2\Core\Exception\ServiceUnavailableException
     * @throws \Gs2\Core\Exception\UnauthorizedException
	 */
	public function run(RunRequest $request): RunResult
	{
	    $url = self::ENDPOINT_HOST. "/queue/". ($request->getQueueName() === null || $request->getQueueName() === "" ? "null" : $request->getQueueName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $headers['X-GS2-ACCESS-TOKEN'] = $request->getAccessToken();
		$body = [];
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2JobQueue::MODULE,
            RunRequest::FUNCTION,
            $body,
            $headers
        );
        return new RunResult($result);
    }

	/**
	 * ジョブキューを実行します<br>
	 * <br>
	 *
	 * @param RunByUserIdRequest $request リクエストパラメータ
	 * @return RunByUserIdResult 結果
     *
     * @throws \Gs2\Core\Exception\BadGatewayException
     * @throws \Gs2\Core\Exception\BadRequestException
     * @throws \Gs2\Core\Exception\ConflictException
     * @throws \Gs2\Core\Exception\InternalServerErrorException
     * @throws \Gs2\Core\Exception\NotFoundException
     * @throws \Gs2\Core\Exception\QuotaExceedException
     * @throws \Gs2\Core\Exception\RequestTimeoutException
     * @throws \Gs2\Core\Exception\ServiceUnavailableException
     * @throws \Gs2\Core\Exception\UnauthorizedException
	 */
	public function runByUserId(RunByUserIdRequest $request): RunByUserIdResult
	{
	    $url = self::ENDPOINT_HOST. "/queue/". ($request->getQueueName() === null || $request->getQueueName() === "" ? "null" : $request->getQueueName()). "/job/user/". ($request->getUserId() === null || $request->getUserId() === "" ? "null" : $request->getUserId()). "/run";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2JobQueue::MODULE,
            RunByUserIdRequest::FUNCTION,
            $body,
            $headers
        );
        return new RunByUserIdResult($result);
    }

	/**
	 * ジョブキューを新規作成します<br>
	 * <br>
	 *
	 * @param CreateQueueRequest $request リクエストパラメータ
	 * @return CreateQueueResult 結果
     *
     * @throws \Gs2\Core\Exception\BadGatewayException
     * @throws \Gs2\Core\Exception\BadRequestException
     * @throws \Gs2\Core\Exception\ConflictException
     * @throws \Gs2\Core\Exception\InternalServerErrorException
     * @throws \Gs2\Core\Exception\NotFoundException
     * @throws \Gs2\Core\Exception\QuotaExceedException
     * @throws \Gs2\Core\Exception\RequestTimeoutException
     * @throws \Gs2\Core\Exception\ServiceUnavailableException
     * @throws \Gs2\Core\Exception\UnauthorizedException
	 */
	public function createQueue(CreateQueueRequest $request): CreateQueueResult
	{
	    $url = self::ENDPOINT_HOST. "/queue";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        $body['name'] = $request->getName();
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getNotificationType() !== null) $body['notificationType'] = $request->getNotificationType();
        if($request->getNotificationUrl() !== null) $body['notificationUrl'] = $request->getNotificationUrl();
        if($request->getNotificationGameName() !== null) $body['notificationGameName'] = $request->getNotificationGameName();
        $result =$this->doPost(
            $url,
            self::$ENDPOINT,
            Gs2JobQueue::MODULE,
            CreateQueueRequest::FUNCTION,
            $body,
            $headers
        );
        return new CreateQueueResult($result);
    }

	/**
	 * ジョブキューを削除します<br>
	 * <br>
	 *
	 * @param DeleteQueueRequest $request リクエストパラメータ
     *
     * @throws \Gs2\Core\Exception\BadGatewayException
     * @throws \Gs2\Core\Exception\BadRequestException
     * @throws \Gs2\Core\Exception\ConflictException
     * @throws \Gs2\Core\Exception\InternalServerErrorException
     * @throws \Gs2\Core\Exception\NotFoundException
     * @throws \Gs2\Core\Exception\QuotaExceedException
     * @throws \Gs2\Core\Exception\RequestTimeoutException
     * @throws \Gs2\Core\Exception\ServiceUnavailableException
     * @throws \Gs2\Core\Exception\UnauthorizedException
	 */
	public function deleteQueue(DeleteQueueRequest $request)
	{
	    $url = self::ENDPOINT_HOST. "/queue/". ($request->getQueueName() === null || $request->getQueueName() === "" ? "null" : $request->getQueueName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $this->doDelete(
            $url,
            self::$ENDPOINT,
            Gs2JobQueue::MODULE,
            DeleteQueueRequest::FUNCTION,
            $queryString,
            $headers
        );
    }

	/**
	 * ジョブキューの一覧を取得します<br>
	 * <br>
	 *
	 * @param DescribeQueueRequest $request リクエストパラメータ
	 * @return DescribeQueueResult 結果
     *
     * @throws \Gs2\Core\Exception\BadGatewayException
     * @throws \Gs2\Core\Exception\BadRequestException
     * @throws \Gs2\Core\Exception\ConflictException
     * @throws \Gs2\Core\Exception\InternalServerErrorException
     * @throws \Gs2\Core\Exception\NotFoundException
     * @throws \Gs2\Core\Exception\QuotaExceedException
     * @throws \Gs2\Core\Exception\RequestTimeoutException
     * @throws \Gs2\Core\Exception\ServiceUnavailableException
     * @throws \Gs2\Core\Exception\UnauthorizedException
	 */
	public function describeQueue(DescribeQueueRequest $request): DescribeQueueResult
	{
	    $url = self::ENDPOINT_HOST. "/queue";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        if($request->getPageToken() !== null) $queryString['pageToken'] = $request->getPageToken();
        if($request->getLimit() !== null) $queryString['limit'] = $request->getLimit();
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2JobQueue::MODULE,
            DescribeQueueRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new DescribeQueueResult($result);
    }

	/**
	 * ジョブキューを取得します<br>
	 * <br>
	 *
	 * @param GetQueueRequest $request リクエストパラメータ
	 * @return GetQueueResult 結果
     *
     * @throws \Gs2\Core\Exception\BadGatewayException
     * @throws \Gs2\Core\Exception\BadRequestException
     * @throws \Gs2\Core\Exception\ConflictException
     * @throws \Gs2\Core\Exception\InternalServerErrorException
     * @throws \Gs2\Core\Exception\NotFoundException
     * @throws \Gs2\Core\Exception\QuotaExceedException
     * @throws \Gs2\Core\Exception\RequestTimeoutException
     * @throws \Gs2\Core\Exception\ServiceUnavailableException
     * @throws \Gs2\Core\Exception\UnauthorizedException
	 */
	public function getQueue(GetQueueRequest $request): GetQueueResult
	{
	    $url = self::ENDPOINT_HOST. "/queue/". ($request->getQueueName() === null || $request->getQueueName() === "" ? "null" : $request->getQueueName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2JobQueue::MODULE,
            GetQueueRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetQueueResult($result);
    }

	/**
	 * ジョブキューの状態を取得します<br>
	 * <br>
	 *
	 * @param GetQueueStatusRequest $request リクエストパラメータ
	 * @return GetQueueStatusResult 結果
     *
     * @throws \Gs2\Core\Exception\BadGatewayException
     * @throws \Gs2\Core\Exception\BadRequestException
     * @throws \Gs2\Core\Exception\ConflictException
     * @throws \Gs2\Core\Exception\InternalServerErrorException
     * @throws \Gs2\Core\Exception\NotFoundException
     * @throws \Gs2\Core\Exception\QuotaExceedException
     * @throws \Gs2\Core\Exception\RequestTimeoutException
     * @throws \Gs2\Core\Exception\ServiceUnavailableException
     * @throws \Gs2\Core\Exception\UnauthorizedException
	 */
	public function getQueueStatus(GetQueueStatusRequest $request): GetQueueStatusResult
	{
	    $url = self::ENDPOINT_HOST. "/queue/". ($request->getQueueName() === null || $request->getQueueName() === "" ? "null" : $request->getQueueName()). "/status";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
        $queryString = [];
        $result =$this->doGet(
            $url,
            self::$ENDPOINT,
            Gs2JobQueue::MODULE,
            GetQueueStatusRequest::FUNCTION,
            $queryString,
            $headers
        );
        return new GetQueueStatusResult($result);
    }

	/**
	 * ジョブキューを更新します<br>
	 * <br>
	 *
	 * @param UpdateQueueRequest $request リクエストパラメータ
	 * @return UpdateQueueResult 結果
     *
     * @throws \Gs2\Core\Exception\BadGatewayException
     * @throws \Gs2\Core\Exception\BadRequestException
     * @throws \Gs2\Core\Exception\ConflictException
     * @throws \Gs2\Core\Exception\InternalServerErrorException
     * @throws \Gs2\Core\Exception\NotFoundException
     * @throws \Gs2\Core\Exception\QuotaExceedException
     * @throws \Gs2\Core\Exception\RequestTimeoutException
     * @throws \Gs2\Core\Exception\ServiceUnavailableException
     * @throws \Gs2\Core\Exception\UnauthorizedException
	 */
	public function updateQueue(UpdateQueueRequest $request): UpdateQueueResult
	{
	    $url = self::ENDPOINT_HOST. "/queue/". ($request->getQueueName() === null || $request->getQueueName() === "" ? "null" : $request->getQueueName()). "";

        $headers = [];
        if($request->getRequestId() !== null) {
            $headers['X-GS2-REQUEST-ID'] = $request->getRequestId();
        }
		$body = [];
        if($request->getDescription() !== null) $body['description'] = $request->getDescription();
        if($request->getNotificationType() !== null) $body['notificationType'] = $request->getNotificationType();
        if($request->getNotificationUrl() !== null) $body['notificationUrl'] = $request->getNotificationUrl();
        if($request->getNotificationGameName() !== null) $body['notificationGameName'] = $request->getNotificationGameName();
        $result =$this->doPut(
            $url,
            self::$ENDPOINT,
            Gs2JobQueue::MODULE,
            UpdateQueueRequest::FUNCTION,
            $body,
            $headers
        );
        return new UpdateQueueResult($result);
    }
}