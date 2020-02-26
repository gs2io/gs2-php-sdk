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
 * ネームスペースを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateNamespaceRequest extends Gs2BasicRequest {

    /** @var string プレゼントボックス名 */
    private $name;

    /**
     * プレゼントボックス名を取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * プレゼントボックス名を設定
     *
     * @param string $name ネームスペースを新規作成
     */
    public function setName(string $name) {
        $this->name = $name;
    }

    /**
     * プレゼントボックス名を設定
     *
     * @param string $name ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withName(string $name): CreateNamespaceRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string 説明文 */
    private $description;

    /**
     * 説明文を取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * 説明文を設定
     *
     * @param string $description ネームスペースを新規作成
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * 説明文を設定
     *
     * @param string $description ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withDescription(string $description): CreateNamespaceRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var bool 開封したメッセージを自動的に削除するか */
    private $isAutomaticDeletingEnabled;

    /**
     * 開封したメッセージを自動的に削除するかを取得
     *
     * @return bool|null ネームスペースを新規作成
     */
    public function getIsAutomaticDeletingEnabled(): ?bool {
        return $this->isAutomaticDeletingEnabled;
    }

    /**
     * 開封したメッセージを自動的に削除するかを設定
     *
     * @param bool $isAutomaticDeletingEnabled ネームスペースを新規作成
     */
    public function setIsAutomaticDeletingEnabled(bool $isAutomaticDeletingEnabled) {
        $this->isAutomaticDeletingEnabled = $isAutomaticDeletingEnabled;
    }

    /**
     * 開封したメッセージを自動的に削除するかを設定
     *
     * @param bool $isAutomaticDeletingEnabled ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withIsAutomaticDeletingEnabled(bool $isAutomaticDeletingEnabled): CreateNamespaceRequest {
        $this->setIsAutomaticDeletingEnabled($isAutomaticDeletingEnabled);
        return $this;
    }

    /** @var ScriptSetting メッセージ受信したときに実行するスクリプト */
    private $receiveMessageScript;

    /**
     * メッセージ受信したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを新規作成
     */
    public function getReceiveMessageScript(): ?ScriptSetting {
        return $this->receiveMessageScript;
    }

    /**
     * メッセージ受信したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $receiveMessageScript ネームスペースを新規作成
     */
    public function setReceiveMessageScript(ScriptSetting $receiveMessageScript) {
        $this->receiveMessageScript = $receiveMessageScript;
    }

    /**
     * メッセージ受信したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $receiveMessageScript ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withReceiveMessageScript(ScriptSetting $receiveMessageScript): CreateNamespaceRequest {
        $this->setReceiveMessageScript($receiveMessageScript);
        return $this;
    }

    /** @var ScriptSetting メッセージ開封したときに実行するスクリプト */
    private $readMessageScript;

    /**
     * メッセージ開封したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを新規作成
     */
    public function getReadMessageScript(): ?ScriptSetting {
        return $this->readMessageScript;
    }

    /**
     * メッセージ開封したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $readMessageScript ネームスペースを新規作成
     */
    public function setReadMessageScript(ScriptSetting $readMessageScript) {
        $this->readMessageScript = $readMessageScript;
    }

    /**
     * メッセージ開封したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $readMessageScript ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withReadMessageScript(ScriptSetting $readMessageScript): CreateNamespaceRequest {
        $this->setReadMessageScript($readMessageScript);
        return $this;
    }

    /** @var ScriptSetting メッセージ削除したときに実行するスクリプト */
    private $deleteMessageScript;

    /**
     * メッセージ削除したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを新規作成
     */
    public function getDeleteMessageScript(): ?ScriptSetting {
        return $this->deleteMessageScript;
    }

    /**
     * メッセージ削除したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $deleteMessageScript ネームスペースを新規作成
     */
    public function setDeleteMessageScript(ScriptSetting $deleteMessageScript) {
        $this->deleteMessageScript = $deleteMessageScript;
    }

    /**
     * メッセージ削除したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $deleteMessageScript ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withDeleteMessageScript(ScriptSetting $deleteMessageScript): CreateNamespaceRequest {
        $this->setDeleteMessageScript($deleteMessageScript);
        return $this;
    }

    /** @var string 報酬付与処理をジョブとして追加するキューネームスペース のGRN */
    private $queueNamespaceId;

    /**
     * 報酬付与処理をジョブとして追加するキューネームスペース のGRNを取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getQueueNamespaceId(): ?string {
        return $this->queueNamespaceId;
    }

    /**
     * 報酬付与処理をジョブとして追加するキューネームスペース のGRNを設定
     *
     * @param string $queueNamespaceId ネームスペースを新規作成
     */
    public function setQueueNamespaceId(string $queueNamespaceId) {
        $this->queueNamespaceId = $queueNamespaceId;
    }

    /**
     * 報酬付与処理をジョブとして追加するキューネームスペース のGRNを設定
     *
     * @param string $queueNamespaceId ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withQueueNamespaceId(string $queueNamespaceId): CreateNamespaceRequest {
        $this->setQueueNamespaceId($queueNamespaceId);
        return $this;
    }

    /** @var string 報酬付与処理のスタンプシートで使用する暗号鍵GRN */
    private $keyId;

    /**
     * 報酬付与処理のスタンプシートで使用する暗号鍵GRNを取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getKeyId(): ?string {
        return $this->keyId;
    }

    /**
     * 報酬付与処理のスタンプシートで使用する暗号鍵GRNを設定
     *
     * @param string $keyId ネームスペースを新規作成
     */
    public function setKeyId(string $keyId) {
        $this->keyId = $keyId;
    }

    /**
     * 報酬付与処理のスタンプシートで使用する暗号鍵GRNを設定
     *
     * @param string $keyId ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withKeyId(string $keyId): CreateNamespaceRequest {
        $this->setKeyId($keyId);
        return $this;
    }

    /** @var NotificationSetting メッセージを受信したときのプッシュ通知 */
    private $receiveNotification;

    /**
     * メッセージを受信したときのプッシュ通知を取得
     *
     * @return NotificationSetting|null ネームスペースを新規作成
     */
    public function getReceiveNotification(): ?NotificationSetting {
        return $this->receiveNotification;
    }

    /**
     * メッセージを受信したときのプッシュ通知を設定
     *
     * @param NotificationSetting $receiveNotification ネームスペースを新規作成
     */
    public function setReceiveNotification(NotificationSetting $receiveNotification) {
        $this->receiveNotification = $receiveNotification;
    }

    /**
     * メッセージを受信したときのプッシュ通知を設定
     *
     * @param NotificationSetting $receiveNotification ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withReceiveNotification(NotificationSetting $receiveNotification): CreateNamespaceRequest {
        $this->setReceiveNotification($receiveNotification);
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
    public function setLogSetting(LogSetting $logSetting) {
        $this->logSetting = $logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withLogSetting(LogSetting $logSetting): CreateNamespaceRequest {
        $this->setLogSetting($logSetting);
        return $this;
    }

}