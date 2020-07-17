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

namespace Gs2\Inbox\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Inbox\Model\ScriptSetting;
use Gs2\Inbox\Model\NotificationSetting;
use Gs2\Inbox\Model\LogSetting;

/**
 * ネームスペースを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateNamespaceRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ネームスペースを更新
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): UpdateNamespaceRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 説明文 */
    private $description;

    /**
     * 説明文を取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * 説明文を設定
     *
     * @param string $description ネームスペースを更新
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * 説明文を設定
     *
     * @param string $description ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withDescription(string $description = null): UpdateNamespaceRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var bool 開封したメッセージを自動的に削除するか */
    private $isAutomaticDeletingEnabled;

    /**
     * 開封したメッセージを自動的に削除するかを取得
     *
     * @return bool|null ネームスペースを更新
     */
    public function getIsAutomaticDeletingEnabled(): ?bool {
        return $this->isAutomaticDeletingEnabled;
    }

    /**
     * 開封したメッセージを自動的に削除するかを設定
     *
     * @param bool $isAutomaticDeletingEnabled ネームスペースを更新
     */
    public function setIsAutomaticDeletingEnabled(bool $isAutomaticDeletingEnabled = null) {
        $this->isAutomaticDeletingEnabled = $isAutomaticDeletingEnabled;
    }

    /**
     * 開封したメッセージを自動的に削除するかを設定
     *
     * @param bool $isAutomaticDeletingEnabled ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withIsAutomaticDeletingEnabled(bool $isAutomaticDeletingEnabled = null): UpdateNamespaceRequest {
        $this->setIsAutomaticDeletingEnabled($isAutomaticDeletingEnabled);
        return $this;
    }

    /** @var ScriptSetting メッセージ受信したときに実行するスクリプト */
    private $receiveMessageScript;

    /**
     * メッセージ受信したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを更新
     */
    public function getReceiveMessageScript(): ?ScriptSetting {
        return $this->receiveMessageScript;
    }

    /**
     * メッセージ受信したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $receiveMessageScript ネームスペースを更新
     */
    public function setReceiveMessageScript(ScriptSetting $receiveMessageScript = null) {
        $this->receiveMessageScript = $receiveMessageScript;
    }

    /**
     * メッセージ受信したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $receiveMessageScript ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withReceiveMessageScript(ScriptSetting $receiveMessageScript = null): UpdateNamespaceRequest {
        $this->setReceiveMessageScript($receiveMessageScript);
        return $this;
    }

    /** @var ScriptSetting メッセージ開封したときに実行するスクリプト */
    private $readMessageScript;

    /**
     * メッセージ開封したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを更新
     */
    public function getReadMessageScript(): ?ScriptSetting {
        return $this->readMessageScript;
    }

    /**
     * メッセージ開封したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $readMessageScript ネームスペースを更新
     */
    public function setReadMessageScript(ScriptSetting $readMessageScript = null) {
        $this->readMessageScript = $readMessageScript;
    }

    /**
     * メッセージ開封したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $readMessageScript ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withReadMessageScript(ScriptSetting $readMessageScript = null): UpdateNamespaceRequest {
        $this->setReadMessageScript($readMessageScript);
        return $this;
    }

    /** @var ScriptSetting メッセージ削除したときに実行するスクリプト */
    private $deleteMessageScript;

    /**
     * メッセージ削除したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを更新
     */
    public function getDeleteMessageScript(): ?ScriptSetting {
        return $this->deleteMessageScript;
    }

    /**
     * メッセージ削除したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $deleteMessageScript ネームスペースを更新
     */
    public function setDeleteMessageScript(ScriptSetting $deleteMessageScript = null) {
        $this->deleteMessageScript = $deleteMessageScript;
    }

    /**
     * メッセージ削除したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $deleteMessageScript ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withDeleteMessageScript(ScriptSetting $deleteMessageScript = null): UpdateNamespaceRequest {
        $this->setDeleteMessageScript($deleteMessageScript);
        return $this;
    }

    /** @var string 報酬付与処理をジョブとして追加するキューネームスペース のGRN */
    private $queueNamespaceId;

    /**
     * 報酬付与処理をジョブとして追加するキューネームスペース のGRNを取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getQueueNamespaceId(): ?string {
        return $this->queueNamespaceId;
    }

    /**
     * 報酬付与処理をジョブとして追加するキューネームスペース のGRNを設定
     *
     * @param string $queueNamespaceId ネームスペースを更新
     */
    public function setQueueNamespaceId(string $queueNamespaceId = null) {
        $this->queueNamespaceId = $queueNamespaceId;
    }

    /**
     * 報酬付与処理をジョブとして追加するキューネームスペース のGRNを設定
     *
     * @param string $queueNamespaceId ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withQueueNamespaceId(string $queueNamespaceId = null): UpdateNamespaceRequest {
        $this->setQueueNamespaceId($queueNamespaceId);
        return $this;
    }

    /** @var string 報酬付与処理のスタンプシートで使用する暗号鍵GRN */
    private $keyId;

    /**
     * 報酬付与処理のスタンプシートで使用する暗号鍵GRNを取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getKeyId(): ?string {
        return $this->keyId;
    }

    /**
     * 報酬付与処理のスタンプシートで使用する暗号鍵GRNを設定
     *
     * @param string $keyId ネームスペースを更新
     */
    public function setKeyId(string $keyId = null) {
        $this->keyId = $keyId;
    }

    /**
     * 報酬付与処理のスタンプシートで使用する暗号鍵GRNを設定
     *
     * @param string $keyId ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withKeyId(string $keyId = null): UpdateNamespaceRequest {
        $this->setKeyId($keyId);
        return $this;
    }

    /** @var NotificationSetting メッセージを受信したときのプッシュ通知 */
    private $receiveNotification;

    /**
     * メッセージを受信したときのプッシュ通知を取得
     *
     * @return NotificationSetting|null ネームスペースを更新
     */
    public function getReceiveNotification(): ?NotificationSetting {
        return $this->receiveNotification;
    }

    /**
     * メッセージを受信したときのプッシュ通知を設定
     *
     * @param NotificationSetting $receiveNotification ネームスペースを更新
     */
    public function setReceiveNotification(NotificationSetting $receiveNotification = null) {
        $this->receiveNotification = $receiveNotification;
    }

    /**
     * メッセージを受信したときのプッシュ通知を設定
     *
     * @param NotificationSetting $receiveNotification ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withReceiveNotification(NotificationSetting $receiveNotification = null): UpdateNamespaceRequest {
        $this->setReceiveNotification($receiveNotification);
        return $this;
    }

    /** @var LogSetting ログの出力設定 */
    private $logSetting;

    /**
     * ログの出力設定を取得
     *
     * @return LogSetting|null ネームスペースを更新
     */
    public function getLogSetting(): ?LogSetting {
        return $this->logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを更新
     */
    public function setLogSetting(LogSetting $logSetting = null) {
        $this->logSetting = $logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withLogSetting(LogSetting $logSetting = null): UpdateNamespaceRequest {
        $this->setLogSetting($logSetting);
        return $this;
    }

}