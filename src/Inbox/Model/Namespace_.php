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

namespace Gs2\Inbox\Model;

use Gs2\Core\Model\IModel;

/**
 * ネームスペース
 *
 * @author Game Server Services, Inc.
 *
 */
class Namespace_ implements IModel {
	/**
     * @var string ネームスペース
	 */
	protected $namespaceId;

	/**
	 * ネームスペースを取得
	 *
	 * @return string|null ネームスペース
	 */
	public function getNamespaceId(): ?string {
		return $this->namespaceId;
	}

	/**
	 * ネームスペースを設定
	 *
	 * @param string|null $namespaceId ネームスペース
	 */
	public function setNamespaceId(?string $namespaceId) {
		$this->namespaceId = $namespaceId;
	}

	/**
	 * ネームスペースを設定
	 *
	 * @param string|null $namespaceId ネームスペース
	 * @return Namespace_ $this
	 */
	public function withNamespaceId(?string $namespaceId): Namespace_ {
		$this->namespaceId = $namespaceId;
		return $this;
	}
	/**
     * @var string オーナーID
	 */
	protected $ownerId;

	/**
	 * オーナーIDを取得
	 *
	 * @return string|null オーナーID
	 */
	public function getOwnerId(): ?string {
		return $this->ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string|null $ownerId オーナーID
	 */
	public function setOwnerId(?string $ownerId) {
		$this->ownerId = $ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string|null $ownerId オーナーID
	 * @return Namespace_ $this
	 */
	public function withOwnerId(?string $ownerId): Namespace_ {
		$this->ownerId = $ownerId;
		return $this;
	}
	/**
     * @var string ネームスペース名
	 */
	protected $name;

	/**
	 * ネームスペース名を取得
	 *
	 * @return string|null ネームスペース名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * ネームスペース名を設定
	 *
	 * @param string|null $name ネームスペース名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * ネームスペース名を設定
	 *
	 * @param string|null $name ネームスペース名
	 * @return Namespace_ $this
	 */
	public function withName(?string $name): Namespace_ {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string 説明文
	 */
	protected $description;

	/**
	 * 説明文を取得
	 *
	 * @return string|null 説明文
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * 説明文を設定
	 *
	 * @param string|null $description 説明文
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * 説明文を設定
	 *
	 * @param string|null $description 説明文
	 * @return Namespace_ $this
	 */
	public function withDescription(?string $description): Namespace_ {
		$this->description = $description;
		return $this;
	}
	/**
     * @var bool 開封したメッセージを自動的に削除するか
	 */
	protected $isAutomaticDeletingEnabled;

	/**
	 * 開封したメッセージを自動的に削除するかを取得
	 *
	 * @return bool|null 開封したメッセージを自動的に削除するか
	 */
	public function getIsAutomaticDeletingEnabled(): ?bool {
		return $this->isAutomaticDeletingEnabled;
	}

	/**
	 * 開封したメッセージを自動的に削除するかを設定
	 *
	 * @param bool|null $isAutomaticDeletingEnabled 開封したメッセージを自動的に削除するか
	 */
	public function setIsAutomaticDeletingEnabled(?bool $isAutomaticDeletingEnabled) {
		$this->isAutomaticDeletingEnabled = $isAutomaticDeletingEnabled;
	}

	/**
	 * 開封したメッセージを自動的に削除するかを設定
	 *
	 * @param bool|null $isAutomaticDeletingEnabled 開封したメッセージを自動的に削除するか
	 * @return Namespace_ $this
	 */
	public function withIsAutomaticDeletingEnabled(?bool $isAutomaticDeletingEnabled): Namespace_ {
		$this->isAutomaticDeletingEnabled = $isAutomaticDeletingEnabled;
		return $this;
	}
	/**
     * @var ScriptSetting メッセージ受信したときに実行するスクリプト
	 */
	protected $receiveMessageScript;

	/**
	 * メッセージ受信したときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null メッセージ受信したときに実行するスクリプト
	 */
	public function getReceiveMessageScript(): ?ScriptSetting {
		return $this->receiveMessageScript;
	}

	/**
	 * メッセージ受信したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $receiveMessageScript メッセージ受信したときに実行するスクリプト
	 */
	public function setReceiveMessageScript(?ScriptSetting $receiveMessageScript) {
		$this->receiveMessageScript = $receiveMessageScript;
	}

	/**
	 * メッセージ受信したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $receiveMessageScript メッセージ受信したときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withReceiveMessageScript(?ScriptSetting $receiveMessageScript): Namespace_ {
		$this->receiveMessageScript = $receiveMessageScript;
		return $this;
	}
	/**
     * @var ScriptSetting メッセージ開封したときに実行するスクリプト
	 */
	protected $readMessageScript;

	/**
	 * メッセージ開封したときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null メッセージ開封したときに実行するスクリプト
	 */
	public function getReadMessageScript(): ?ScriptSetting {
		return $this->readMessageScript;
	}

	/**
	 * メッセージ開封したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $readMessageScript メッセージ開封したときに実行するスクリプト
	 */
	public function setReadMessageScript(?ScriptSetting $readMessageScript) {
		$this->readMessageScript = $readMessageScript;
	}

	/**
	 * メッセージ開封したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $readMessageScript メッセージ開封したときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withReadMessageScript(?ScriptSetting $readMessageScript): Namespace_ {
		$this->readMessageScript = $readMessageScript;
		return $this;
	}
	/**
     * @var ScriptSetting メッセージ削除したときに実行するスクリプト
	 */
	protected $deleteMessageScript;

	/**
	 * メッセージ削除したときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null メッセージ削除したときに実行するスクリプト
	 */
	public function getDeleteMessageScript(): ?ScriptSetting {
		return $this->deleteMessageScript;
	}

	/**
	 * メッセージ削除したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $deleteMessageScript メッセージ削除したときに実行するスクリプト
	 */
	public function setDeleteMessageScript(?ScriptSetting $deleteMessageScript) {
		$this->deleteMessageScript = $deleteMessageScript;
	}

	/**
	 * メッセージ削除したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $deleteMessageScript メッセージ削除したときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withDeleteMessageScript(?ScriptSetting $deleteMessageScript): Namespace_ {
		$this->deleteMessageScript = $deleteMessageScript;
		return $this;
	}
	/**
     * @var string 報酬付与処理をジョブとして追加するキューネームスペース のGRN
	 */
	protected $queueNamespaceId;

	/**
	 * 報酬付与処理をジョブとして追加するキューネームスペース のGRNを取得
	 *
	 * @return string|null 報酬付与処理をジョブとして追加するキューネームスペース のGRN
	 */
	public function getQueueNamespaceId(): ?string {
		return $this->queueNamespaceId;
	}

	/**
	 * 報酬付与処理をジョブとして追加するキューネームスペース のGRNを設定
	 *
	 * @param string|null $queueNamespaceId 報酬付与処理をジョブとして追加するキューネームスペース のGRN
	 */
	public function setQueueNamespaceId(?string $queueNamespaceId) {
		$this->queueNamespaceId = $queueNamespaceId;
	}

	/**
	 * 報酬付与処理をジョブとして追加するキューネームスペース のGRNを設定
	 *
	 * @param string|null $queueNamespaceId 報酬付与処理をジョブとして追加するキューネームスペース のGRN
	 * @return Namespace_ $this
	 */
	public function withQueueNamespaceId(?string $queueNamespaceId): Namespace_ {
		$this->queueNamespaceId = $queueNamespaceId;
		return $this;
	}
	/**
     * @var string 報酬付与処理のスタンプシートで使用する暗号鍵GRN
	 */
	protected $keyId;

	/**
	 * 報酬付与処理のスタンプシートで使用する暗号鍵GRNを取得
	 *
	 * @return string|null 報酬付与処理のスタンプシートで使用する暗号鍵GRN
	 */
	public function getKeyId(): ?string {
		return $this->keyId;
	}

	/**
	 * 報酬付与処理のスタンプシートで使用する暗号鍵GRNを設定
	 *
	 * @param string|null $keyId 報酬付与処理のスタンプシートで使用する暗号鍵GRN
	 */
	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}

	/**
	 * 報酬付与処理のスタンプシートで使用する暗号鍵GRNを設定
	 *
	 * @param string|null $keyId 報酬付与処理のスタンプシートで使用する暗号鍵GRN
	 * @return Namespace_ $this
	 */
	public function withKeyId(?string $keyId): Namespace_ {
		$this->keyId = $keyId;
		return $this;
	}
	/**
     * @var NotificationSetting メッセージを受信したときのプッシュ通知
	 */
	protected $receiveNotification;

	/**
	 * メッセージを受信したときのプッシュ通知を取得
	 *
	 * @return NotificationSetting|null メッセージを受信したときのプッシュ通知
	 */
	public function getReceiveNotification(): ?NotificationSetting {
		return $this->receiveNotification;
	}

	/**
	 * メッセージを受信したときのプッシュ通知を設定
	 *
	 * @param NotificationSetting|null $receiveNotification メッセージを受信したときのプッシュ通知
	 */
	public function setReceiveNotification(?NotificationSetting $receiveNotification) {
		$this->receiveNotification = $receiveNotification;
	}

	/**
	 * メッセージを受信したときのプッシュ通知を設定
	 *
	 * @param NotificationSetting|null $receiveNotification メッセージを受信したときのプッシュ通知
	 * @return Namespace_ $this
	 */
	public function withReceiveNotification(?NotificationSetting $receiveNotification): Namespace_ {
		$this->receiveNotification = $receiveNotification;
		return $this;
	}
	/**
     * @var LogSetting ログの出力設定
	 */
	protected $logSetting;

	/**
	 * ログの出力設定を取得
	 *
	 * @return LogSetting|null ログの出力設定
	 */
	public function getLogSetting(): ?LogSetting {
		return $this->logSetting;
	}

	/**
	 * ログの出力設定を設定
	 *
	 * @param LogSetting|null $logSetting ログの出力設定
	 */
	public function setLogSetting(?LogSetting $logSetting) {
		$this->logSetting = $logSetting;
	}

	/**
	 * ログの出力設定を設定
	 *
	 * @param LogSetting|null $logSetting ログの出力設定
	 * @return Namespace_ $this
	 */
	public function withLogSetting(?LogSetting $logSetting): Namespace_ {
		$this->logSetting = $logSetting;
		return $this;
	}
	/**
     * @var int 作成日時
	 */
	protected $createdAt;

	/**
	 * 作成日時を取得
	 *
	 * @return int|null 作成日時
	 */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 * @return Namespace_ $this
	 */
	public function withCreatedAt(?int $createdAt): Namespace_ {
		$this->createdAt = $createdAt;
		return $this;
	}
	/**
     * @var int 最終更新日時
	 */
	protected $updatedAt;

	/**
	 * 最終更新日時を取得
	 *
	 * @return int|null 最終更新日時
	 */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 * @return Namespace_ $this
	 */
	public function withUpdatedAt(?int $updatedAt): Namespace_ {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "namespaceId" => $this->namespaceId,
            "ownerId" => $this->ownerId,
            "name" => $this->name,
            "description" => $this->description,
            "isAutomaticDeletingEnabled" => $this->isAutomaticDeletingEnabled,
            "receiveMessageScript" => $this->receiveMessageScript->toJson(),
            "readMessageScript" => $this->readMessageScript->toJson(),
            "deleteMessageScript" => $this->deleteMessageScript->toJson(),
            "queueNamespaceId" => $this->queueNamespaceId,
            "keyId" => $this->keyId,
            "receiveNotification" => $this->receiveNotification->toJson(),
            "logSetting" => $this->logSetting->toJson(),
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Namespace_ {
        $model = new Namespace_();
        $model->setNamespaceId(isset($data["namespaceId"]) ? $data["namespaceId"] : null);
        $model->setOwnerId(isset($data["ownerId"]) ? $data["ownerId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setIsAutomaticDeletingEnabled(isset($data["isAutomaticDeletingEnabled"]) ? $data["isAutomaticDeletingEnabled"] : null);
        $model->setReceiveMessageScript(isset($data["receiveMessageScript"]) ? ScriptSetting::fromJson($data["receiveMessageScript"]) : null);
        $model->setReadMessageScript(isset($data["readMessageScript"]) ? ScriptSetting::fromJson($data["readMessageScript"]) : null);
        $model->setDeleteMessageScript(isset($data["deleteMessageScript"]) ? ScriptSetting::fromJson($data["deleteMessageScript"]) : null);
        $model->setQueueNamespaceId(isset($data["queueNamespaceId"]) ? $data["queueNamespaceId"] : null);
        $model->setKeyId(isset($data["keyId"]) ? $data["keyId"] : null);
        $model->setReceiveNotification(isset($data["receiveNotification"]) ? NotificationSetting::fromJson($data["receiveNotification"]) : null);
        $model->setLogSetting(isset($data["logSetting"]) ? LogSetting::fromJson($data["logSetting"]) : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}