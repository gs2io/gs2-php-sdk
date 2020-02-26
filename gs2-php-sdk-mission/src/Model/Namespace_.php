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

namespace Gs2\Mission\Model;

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
     * @var string ネームスペースの説明
	 */
	protected $description;

	/**
	 * ネームスペースの説明を取得
	 *
	 * @return string|null ネームスペースの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * ネームスペースの説明を設定
	 *
	 * @param string|null $description ネームスペースの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * ネームスペースの説明を設定
	 *
	 * @param string|null $description ネームスペースの説明
	 * @return Namespace_ $this
	 */
	public function withDescription(?string $description): Namespace_ {
		$this->description = $description;
		return $this;
	}
	/**
     * @var ScriptSetting ミッションを達成したときに実行するスクリプト
	 */
	protected $missionCompleteScript;

	/**
	 * ミッションを達成したときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null ミッションを達成したときに実行するスクリプト
	 */
	public function getMissionCompleteScript(): ?ScriptSetting {
		return $this->missionCompleteScript;
	}

	/**
	 * ミッションを達成したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $missionCompleteScript ミッションを達成したときに実行するスクリプト
	 */
	public function setMissionCompleteScript(?ScriptSetting $missionCompleteScript) {
		$this->missionCompleteScript = $missionCompleteScript;
	}

	/**
	 * ミッションを達成したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $missionCompleteScript ミッションを達成したときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withMissionCompleteScript(?ScriptSetting $missionCompleteScript): Namespace_ {
		$this->missionCompleteScript = $missionCompleteScript;
		return $this;
	}
	/**
     * @var ScriptSetting カウンターを上昇したときに実行するスクリプト
	 */
	protected $counterIncrementScript;

	/**
	 * カウンターを上昇したときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null カウンターを上昇したときに実行するスクリプト
	 */
	public function getCounterIncrementScript(): ?ScriptSetting {
		return $this->counterIncrementScript;
	}

	/**
	 * カウンターを上昇したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $counterIncrementScript カウンターを上昇したときに実行するスクリプト
	 */
	public function setCounterIncrementScript(?ScriptSetting $counterIncrementScript) {
		$this->counterIncrementScript = $counterIncrementScript;
	}

	/**
	 * カウンターを上昇したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $counterIncrementScript カウンターを上昇したときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withCounterIncrementScript(?ScriptSetting $counterIncrementScript): Namespace_ {
		$this->counterIncrementScript = $counterIncrementScript;
		return $this;
	}
	/**
     * @var ScriptSetting 報酬を受け取ったときに実行するスクリプト
	 */
	protected $receiveRewardsScript;

	/**
	 * 報酬を受け取ったときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null 報酬を受け取ったときに実行するスクリプト
	 */
	public function getReceiveRewardsScript(): ?ScriptSetting {
		return $this->receiveRewardsScript;
	}

	/**
	 * 報酬を受け取ったときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $receiveRewardsScript 報酬を受け取ったときに実行するスクリプト
	 */
	public function setReceiveRewardsScript(?ScriptSetting $receiveRewardsScript) {
		$this->receiveRewardsScript = $receiveRewardsScript;
	}

	/**
	 * 報酬を受け取ったときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $receiveRewardsScript 報酬を受け取ったときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withReceiveRewardsScript(?ScriptSetting $receiveRewardsScript): Namespace_ {
		$this->receiveRewardsScript = $receiveRewardsScript;
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
     * @var NotificationSetting ミッションのタスクを達成したときのプッシュ通知
	 */
	protected $completeNotification;

	/**
	 * ミッションのタスクを達成したときのプッシュ通知を取得
	 *
	 * @return NotificationSetting|null ミッションのタスクを達成したときのプッシュ通知
	 */
	public function getCompleteNotification(): ?NotificationSetting {
		return $this->completeNotification;
	}

	/**
	 * ミッションのタスクを達成したときのプッシュ通知を設定
	 *
	 * @param NotificationSetting|null $completeNotification ミッションのタスクを達成したときのプッシュ通知
	 */
	public function setCompleteNotification(?NotificationSetting $completeNotification) {
		$this->completeNotification = $completeNotification;
	}

	/**
	 * ミッションのタスクを達成したときのプッシュ通知を設定
	 *
	 * @param NotificationSetting|null $completeNotification ミッションのタスクを達成したときのプッシュ通知
	 * @return Namespace_ $this
	 */
	public function withCompleteNotification(?NotificationSetting $completeNotification): Namespace_ {
		$this->completeNotification = $completeNotification;
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
            "missionCompleteScript" => $this->missionCompleteScript->toJson(),
            "counterIncrementScript" => $this->counterIncrementScript->toJson(),
            "receiveRewardsScript" => $this->receiveRewardsScript->toJson(),
            "queueNamespaceId" => $this->queueNamespaceId,
            "keyId" => $this->keyId,
            "completeNotification" => $this->completeNotification->toJson(),
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
        $model->setMissionCompleteScript(isset($data["missionCompleteScript"]) ? ScriptSetting::fromJson($data["missionCompleteScript"]) : null);
        $model->setCounterIncrementScript(isset($data["counterIncrementScript"]) ? ScriptSetting::fromJson($data["counterIncrementScript"]) : null);
        $model->setReceiveRewardsScript(isset($data["receiveRewardsScript"]) ? ScriptSetting::fromJson($data["receiveRewardsScript"]) : null);
        $model->setQueueNamespaceId(isset($data["queueNamespaceId"]) ? $data["queueNamespaceId"] : null);
        $model->setKeyId(isset($data["keyId"]) ? $data["keyId"] : null);
        $model->setCompleteNotification(isset($data["completeNotification"]) ? NotificationSetting::fromJson($data["completeNotification"]) : null);
        $model->setLogSetting(isset($data["logSetting"]) ? LogSetting::fromJson($data["logSetting"]) : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}