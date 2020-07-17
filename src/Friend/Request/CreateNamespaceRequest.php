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

namespace Gs2\Friend\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Friend\Model\ScriptSetting;
use Gs2\Friend\Model\NotificationSetting;
use Gs2\Friend\Model\LogSetting;

/**
 * ネームスペースを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateNamespaceRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $name;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $name ネームスペースを新規作成
     */
    public function setName(string $name = null) {
        $this->name = $name;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $name ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withName(string $name = null): CreateNamespaceRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string ネームスペースの説明 */
    private $description;

    /**
     * ネームスペースの説明を取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを新規作成
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withDescription(string $description = null): CreateNamespaceRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var ScriptSetting フォローされたときに実行するスクリプト */
    private $followScript;

    /**
     * フォローされたときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを新規作成
     */
    public function getFollowScript(): ?ScriptSetting {
        return $this->followScript;
    }

    /**
     * フォローされたときに実行するスクリプトを設定
     *
     * @param ScriptSetting $followScript ネームスペースを新規作成
     */
    public function setFollowScript(ScriptSetting $followScript = null) {
        $this->followScript = $followScript;
    }

    /**
     * フォローされたときに実行するスクリプトを設定
     *
     * @param ScriptSetting $followScript ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withFollowScript(ScriptSetting $followScript = null): CreateNamespaceRequest {
        $this->setFollowScript($followScript);
        return $this;
    }

    /** @var ScriptSetting アンフォローされたときに実行するスクリプト */
    private $unfollowScript;

    /**
     * アンフォローされたときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを新規作成
     */
    public function getUnfollowScript(): ?ScriptSetting {
        return $this->unfollowScript;
    }

    /**
     * アンフォローされたときに実行するスクリプトを設定
     *
     * @param ScriptSetting $unfollowScript ネームスペースを新規作成
     */
    public function setUnfollowScript(ScriptSetting $unfollowScript = null) {
        $this->unfollowScript = $unfollowScript;
    }

    /**
     * アンフォローされたときに実行するスクリプトを設定
     *
     * @param ScriptSetting $unfollowScript ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withUnfollowScript(ScriptSetting $unfollowScript = null): CreateNamespaceRequest {
        $this->setUnfollowScript($unfollowScript);
        return $this;
    }

    /** @var ScriptSetting フレンドリクエストを発行したときに実行するスクリプト */
    private $sendRequestScript;

    /**
     * フレンドリクエストを発行したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを新規作成
     */
    public function getSendRequestScript(): ?ScriptSetting {
        return $this->sendRequestScript;
    }

    /**
     * フレンドリクエストを発行したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $sendRequestScript ネームスペースを新規作成
     */
    public function setSendRequestScript(ScriptSetting $sendRequestScript = null) {
        $this->sendRequestScript = $sendRequestScript;
    }

    /**
     * フレンドリクエストを発行したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $sendRequestScript ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withSendRequestScript(ScriptSetting $sendRequestScript = null): CreateNamespaceRequest {
        $this->setSendRequestScript($sendRequestScript);
        return $this;
    }

    /** @var ScriptSetting フレンドリクエストをキャンセルしたときに実行するスクリプト */
    private $cancelRequestScript;

    /**
     * フレンドリクエストをキャンセルしたときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを新規作成
     */
    public function getCancelRequestScript(): ?ScriptSetting {
        return $this->cancelRequestScript;
    }

    /**
     * フレンドリクエストをキャンセルしたときに実行するスクリプトを設定
     *
     * @param ScriptSetting $cancelRequestScript ネームスペースを新規作成
     */
    public function setCancelRequestScript(ScriptSetting $cancelRequestScript = null) {
        $this->cancelRequestScript = $cancelRequestScript;
    }

    /**
     * フレンドリクエストをキャンセルしたときに実行するスクリプトを設定
     *
     * @param ScriptSetting $cancelRequestScript ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withCancelRequestScript(ScriptSetting $cancelRequestScript = null): CreateNamespaceRequest {
        $this->setCancelRequestScript($cancelRequestScript);
        return $this;
    }

    /** @var ScriptSetting フレンドリクエストを承諾したときに実行するスクリプト */
    private $acceptRequestScript;

    /**
     * フレンドリクエストを承諾したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを新規作成
     */
    public function getAcceptRequestScript(): ?ScriptSetting {
        return $this->acceptRequestScript;
    }

    /**
     * フレンドリクエストを承諾したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $acceptRequestScript ネームスペースを新規作成
     */
    public function setAcceptRequestScript(ScriptSetting $acceptRequestScript = null) {
        $this->acceptRequestScript = $acceptRequestScript;
    }

    /**
     * フレンドリクエストを承諾したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $acceptRequestScript ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withAcceptRequestScript(ScriptSetting $acceptRequestScript = null): CreateNamespaceRequest {
        $this->setAcceptRequestScript($acceptRequestScript);
        return $this;
    }

    /** @var ScriptSetting フレンドリクエストを拒否したときに実行するスクリプト */
    private $rejectRequestScript;

    /**
     * フレンドリクエストを拒否したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを新規作成
     */
    public function getRejectRequestScript(): ?ScriptSetting {
        return $this->rejectRequestScript;
    }

    /**
     * フレンドリクエストを拒否したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $rejectRequestScript ネームスペースを新規作成
     */
    public function setRejectRequestScript(ScriptSetting $rejectRequestScript = null) {
        $this->rejectRequestScript = $rejectRequestScript;
    }

    /**
     * フレンドリクエストを拒否したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $rejectRequestScript ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withRejectRequestScript(ScriptSetting $rejectRequestScript = null): CreateNamespaceRequest {
        $this->setRejectRequestScript($rejectRequestScript);
        return $this;
    }

    /** @var ScriptSetting フレンドを削除したときに実行するスクリプト */
    private $deleteFriendScript;

    /**
     * フレンドを削除したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを新規作成
     */
    public function getDeleteFriendScript(): ?ScriptSetting {
        return $this->deleteFriendScript;
    }

    /**
     * フレンドを削除したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $deleteFriendScript ネームスペースを新規作成
     */
    public function setDeleteFriendScript(ScriptSetting $deleteFriendScript = null) {
        $this->deleteFriendScript = $deleteFriendScript;
    }

    /**
     * フレンドを削除したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $deleteFriendScript ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withDeleteFriendScript(ScriptSetting $deleteFriendScript = null): CreateNamespaceRequest {
        $this->setDeleteFriendScript($deleteFriendScript);
        return $this;
    }

    /** @var ScriptSetting プロフィールを更新したときに実行するスクリプト */
    private $updateProfileScript;

    /**
     * プロフィールを更新したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを新規作成
     */
    public function getUpdateProfileScript(): ?ScriptSetting {
        return $this->updateProfileScript;
    }

    /**
     * プロフィールを更新したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $updateProfileScript ネームスペースを新規作成
     */
    public function setUpdateProfileScript(ScriptSetting $updateProfileScript = null) {
        $this->updateProfileScript = $updateProfileScript;
    }

    /**
     * プロフィールを更新したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $updateProfileScript ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withUpdateProfileScript(ScriptSetting $updateProfileScript = null): CreateNamespaceRequest {
        $this->setUpdateProfileScript($updateProfileScript);
        return $this;
    }

    /** @var NotificationSetting フォローされたときのプッシュ通知 */
    private $followNotification;

    /**
     * フォローされたときのプッシュ通知を取得
     *
     * @return NotificationSetting|null ネームスペースを新規作成
     */
    public function getFollowNotification(): ?NotificationSetting {
        return $this->followNotification;
    }

    /**
     * フォローされたときのプッシュ通知を設定
     *
     * @param NotificationSetting $followNotification ネームスペースを新規作成
     */
    public function setFollowNotification(NotificationSetting $followNotification = null) {
        $this->followNotification = $followNotification;
    }

    /**
     * フォローされたときのプッシュ通知を設定
     *
     * @param NotificationSetting $followNotification ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withFollowNotification(NotificationSetting $followNotification = null): CreateNamespaceRequest {
        $this->setFollowNotification($followNotification);
        return $this;
    }

    /** @var NotificationSetting フレンドリクエストが届いたときのプッシュ通知 */
    private $receiveRequestNotification;

    /**
     * フレンドリクエストが届いたときのプッシュ通知を取得
     *
     * @return NotificationSetting|null ネームスペースを新規作成
     */
    public function getReceiveRequestNotification(): ?NotificationSetting {
        return $this->receiveRequestNotification;
    }

    /**
     * フレンドリクエストが届いたときのプッシュ通知を設定
     *
     * @param NotificationSetting $receiveRequestNotification ネームスペースを新規作成
     */
    public function setReceiveRequestNotification(NotificationSetting $receiveRequestNotification = null) {
        $this->receiveRequestNotification = $receiveRequestNotification;
    }

    /**
     * フレンドリクエストが届いたときのプッシュ通知を設定
     *
     * @param NotificationSetting $receiveRequestNotification ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withReceiveRequestNotification(NotificationSetting $receiveRequestNotification = null): CreateNamespaceRequest {
        $this->setReceiveRequestNotification($receiveRequestNotification);
        return $this;
    }

    /** @var NotificationSetting フレンドリクエストが承認されたときのプッシュ通知 */
    private $acceptRequestNotification;

    /**
     * フレンドリクエストが承認されたときのプッシュ通知を取得
     *
     * @return NotificationSetting|null ネームスペースを新規作成
     */
    public function getAcceptRequestNotification(): ?NotificationSetting {
        return $this->acceptRequestNotification;
    }

    /**
     * フレンドリクエストが承認されたときのプッシュ通知を設定
     *
     * @param NotificationSetting $acceptRequestNotification ネームスペースを新規作成
     */
    public function setAcceptRequestNotification(NotificationSetting $acceptRequestNotification = null) {
        $this->acceptRequestNotification = $acceptRequestNotification;
    }

    /**
     * フレンドリクエストが承認されたときのプッシュ通知を設定
     *
     * @param NotificationSetting $acceptRequestNotification ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withAcceptRequestNotification(NotificationSetting $acceptRequestNotification = null): CreateNamespaceRequest {
        $this->setAcceptRequestNotification($acceptRequestNotification);
        return $this;
    }

    /** @var LogSetting ログの出力設定 */
    private $logSetting;

    /**
     * ログの出力設定を取得
     *
     * @return LogSetting|null ネームスペースを新規作成
     */
    public function getLogSetting(): ?LogSetting {
        return $this->logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを新規作成
     */
    public function setLogSetting(LogSetting $logSetting = null) {
        $this->logSetting = $logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withLogSetting(LogSetting $logSetting = null): CreateNamespaceRequest {
        $this->setLogSetting($logSetting);
        return $this;
    }

}