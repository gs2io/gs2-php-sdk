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

namespace Gs2\Matchmaking\Model;

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
     * @var string ギャザリング新規作成時のアクション
	 */
	protected $createGatheringTriggerType;

	/**
	 * ギャザリング新規作成時のアクションを取得
	 *
	 * @return string|null ギャザリング新規作成時のアクション
	 */
	public function getCreateGatheringTriggerType(): ?string {
		return $this->createGatheringTriggerType;
	}

	/**
	 * ギャザリング新規作成時のアクションを設定
	 *
	 * @param string|null $createGatheringTriggerType ギャザリング新規作成時のアクション
	 */
	public function setCreateGatheringTriggerType(?string $createGatheringTriggerType) {
		$this->createGatheringTriggerType = $createGatheringTriggerType;
	}

	/**
	 * ギャザリング新規作成時のアクションを設定
	 *
	 * @param string|null $createGatheringTriggerType ギャザリング新規作成時のアクション
	 * @return Namespace_ $this
	 */
	public function withCreateGatheringTriggerType(?string $createGatheringTriggerType): Namespace_ {
		$this->createGatheringTriggerType = $createGatheringTriggerType;
		return $this;
	}
	/**
     * @var string ギャザリング新規作成時 にルームを作成するネームスペース のGRN
	 */
	protected $createGatheringTriggerRealtimeNamespaceId;

	/**
	 * ギャザリング新規作成時 にルームを作成するネームスペース のGRNを取得
	 *
	 * @return string|null ギャザリング新規作成時 にルームを作成するネームスペース のGRN
	 */
	public function getCreateGatheringTriggerRealtimeNamespaceId(): ?string {
		return $this->createGatheringTriggerRealtimeNamespaceId;
	}

	/**
	 * ギャザリング新規作成時 にルームを作成するネームスペース のGRNを設定
	 *
	 * @param string|null $createGatheringTriggerRealtimeNamespaceId ギャザリング新規作成時 にルームを作成するネームスペース のGRN
	 */
	public function setCreateGatheringTriggerRealtimeNamespaceId(?string $createGatheringTriggerRealtimeNamespaceId) {
		$this->createGatheringTriggerRealtimeNamespaceId = $createGatheringTriggerRealtimeNamespaceId;
	}

	/**
	 * ギャザリング新規作成時 にルームを作成するネームスペース のGRNを設定
	 *
	 * @param string|null $createGatheringTriggerRealtimeNamespaceId ギャザリング新規作成時 にルームを作成するネームスペース のGRN
	 * @return Namespace_ $this
	 */
	public function withCreateGatheringTriggerRealtimeNamespaceId(?string $createGatheringTriggerRealtimeNamespaceId): Namespace_ {
		$this->createGatheringTriggerRealtimeNamespaceId = $createGatheringTriggerRealtimeNamespaceId;
		return $this;
	}
	/**
     * @var string ギャザリング新規作成時 に実行されるスクリプト のGRN
	 */
	protected $createGatheringTriggerScriptId;

	/**
	 * ギャザリング新規作成時 に実行されるスクリプト のGRNを取得
	 *
	 * @return string|null ギャザリング新規作成時 に実行されるスクリプト のGRN
	 */
	public function getCreateGatheringTriggerScriptId(): ?string {
		return $this->createGatheringTriggerScriptId;
	}

	/**
	 * ギャザリング新規作成時 に実行されるスクリプト のGRNを設定
	 *
	 * @param string|null $createGatheringTriggerScriptId ギャザリング新規作成時 に実行されるスクリプト のGRN
	 */
	public function setCreateGatheringTriggerScriptId(?string $createGatheringTriggerScriptId) {
		$this->createGatheringTriggerScriptId = $createGatheringTriggerScriptId;
	}

	/**
	 * ギャザリング新規作成時 に実行されるスクリプト のGRNを設定
	 *
	 * @param string|null $createGatheringTriggerScriptId ギャザリング新規作成時 に実行されるスクリプト のGRN
	 * @return Namespace_ $this
	 */
	public function withCreateGatheringTriggerScriptId(?string $createGatheringTriggerScriptId): Namespace_ {
		$this->createGatheringTriggerScriptId = $createGatheringTriggerScriptId;
		return $this;
	}
	/**
     * @var string マッチメイキング完了時のアクション
	 */
	protected $completeMatchmakingTriggerType;

	/**
	 * マッチメイキング完了時のアクションを取得
	 *
	 * @return string|null マッチメイキング完了時のアクション
	 */
	public function getCompleteMatchmakingTriggerType(): ?string {
		return $this->completeMatchmakingTriggerType;
	}

	/**
	 * マッチメイキング完了時のアクションを設定
	 *
	 * @param string|null $completeMatchmakingTriggerType マッチメイキング完了時のアクション
	 */
	public function setCompleteMatchmakingTriggerType(?string $completeMatchmakingTriggerType) {
		$this->completeMatchmakingTriggerType = $completeMatchmakingTriggerType;
	}

	/**
	 * マッチメイキング完了時のアクションを設定
	 *
	 * @param string|null $completeMatchmakingTriggerType マッチメイキング完了時のアクション
	 * @return Namespace_ $this
	 */
	public function withCompleteMatchmakingTriggerType(?string $completeMatchmakingTriggerType): Namespace_ {
		$this->completeMatchmakingTriggerType = $completeMatchmakingTriggerType;
		return $this;
	}
	/**
     * @var string マッチメイキング完了時 にルームを作成するネームスペース のGRN
	 */
	protected $completeMatchmakingTriggerRealtimeNamespaceId;

	/**
	 * マッチメイキング完了時 にルームを作成するネームスペース のGRNを取得
	 *
	 * @return string|null マッチメイキング完了時 にルームを作成するネームスペース のGRN
	 */
	public function getCompleteMatchmakingTriggerRealtimeNamespaceId(): ?string {
		return $this->completeMatchmakingTriggerRealtimeNamespaceId;
	}

	/**
	 * マッチメイキング完了時 にルームを作成するネームスペース のGRNを設定
	 *
	 * @param string|null $completeMatchmakingTriggerRealtimeNamespaceId マッチメイキング完了時 にルームを作成するネームスペース のGRN
	 */
	public function setCompleteMatchmakingTriggerRealtimeNamespaceId(?string $completeMatchmakingTriggerRealtimeNamespaceId) {
		$this->completeMatchmakingTriggerRealtimeNamespaceId = $completeMatchmakingTriggerRealtimeNamespaceId;
	}

	/**
	 * マッチメイキング完了時 にルームを作成するネームスペース のGRNを設定
	 *
	 * @param string|null $completeMatchmakingTriggerRealtimeNamespaceId マッチメイキング完了時 にルームを作成するネームスペース のGRN
	 * @return Namespace_ $this
	 */
	public function withCompleteMatchmakingTriggerRealtimeNamespaceId(?string $completeMatchmakingTriggerRealtimeNamespaceId): Namespace_ {
		$this->completeMatchmakingTriggerRealtimeNamespaceId = $completeMatchmakingTriggerRealtimeNamespaceId;
		return $this;
	}
	/**
     * @var string マッチメイキング完了時 に実行されるスクリプト のGRN
	 */
	protected $completeMatchmakingTriggerScriptId;

	/**
	 * マッチメイキング完了時 に実行されるスクリプト のGRNを取得
	 *
	 * @return string|null マッチメイキング完了時 に実行されるスクリプト のGRN
	 */
	public function getCompleteMatchmakingTriggerScriptId(): ?string {
		return $this->completeMatchmakingTriggerScriptId;
	}

	/**
	 * マッチメイキング完了時 に実行されるスクリプト のGRNを設定
	 *
	 * @param string|null $completeMatchmakingTriggerScriptId マッチメイキング完了時 に実行されるスクリプト のGRN
	 */
	public function setCompleteMatchmakingTriggerScriptId(?string $completeMatchmakingTriggerScriptId) {
		$this->completeMatchmakingTriggerScriptId = $completeMatchmakingTriggerScriptId;
	}

	/**
	 * マッチメイキング完了時 に実行されるスクリプト のGRNを設定
	 *
	 * @param string|null $completeMatchmakingTriggerScriptId マッチメイキング完了時 に実行されるスクリプト のGRN
	 * @return Namespace_ $this
	 */
	public function withCompleteMatchmakingTriggerScriptId(?string $completeMatchmakingTriggerScriptId): Namespace_ {
		$this->completeMatchmakingTriggerScriptId = $completeMatchmakingTriggerScriptId;
		return $this;
	}
	/**
     * @var NotificationSetting ギャザリングに新規プレイヤーが参加したときのプッシュ通知
	 */
	protected $joinNotification;

	/**
	 * ギャザリングに新規プレイヤーが参加したときのプッシュ通知を取得
	 *
	 * @return NotificationSetting|null ギャザリングに新規プレイヤーが参加したときのプッシュ通知
	 */
	public function getJoinNotification(): ?NotificationSetting {
		return $this->joinNotification;
	}

	/**
	 * ギャザリングに新規プレイヤーが参加したときのプッシュ通知を設定
	 *
	 * @param NotificationSetting|null $joinNotification ギャザリングに新規プレイヤーが参加したときのプッシュ通知
	 */
	public function setJoinNotification(?NotificationSetting $joinNotification) {
		$this->joinNotification = $joinNotification;
	}

	/**
	 * ギャザリングに新規プレイヤーが参加したときのプッシュ通知を設定
	 *
	 * @param NotificationSetting|null $joinNotification ギャザリングに新規プレイヤーが参加したときのプッシュ通知
	 * @return Namespace_ $this
	 */
	public function withJoinNotification(?NotificationSetting $joinNotification): Namespace_ {
		$this->joinNotification = $joinNotification;
		return $this;
	}
	/**
     * @var NotificationSetting ギャザリングからプレイヤーが離脱したときのプッシュ通知
	 */
	protected $leaveNotification;

	/**
	 * ギャザリングからプレイヤーが離脱したときのプッシュ通知を取得
	 *
	 * @return NotificationSetting|null ギャザリングからプレイヤーが離脱したときのプッシュ通知
	 */
	public function getLeaveNotification(): ?NotificationSetting {
		return $this->leaveNotification;
	}

	/**
	 * ギャザリングからプレイヤーが離脱したときのプッシュ通知を設定
	 *
	 * @param NotificationSetting|null $leaveNotification ギャザリングからプレイヤーが離脱したときのプッシュ通知
	 */
	public function setLeaveNotification(?NotificationSetting $leaveNotification) {
		$this->leaveNotification = $leaveNotification;
	}

	/**
	 * ギャザリングからプレイヤーが離脱したときのプッシュ通知を設定
	 *
	 * @param NotificationSetting|null $leaveNotification ギャザリングからプレイヤーが離脱したときのプッシュ通知
	 * @return Namespace_ $this
	 */
	public function withLeaveNotification(?NotificationSetting $leaveNotification): Namespace_ {
		$this->leaveNotification = $leaveNotification;
		return $this;
	}
	/**
     * @var NotificationSetting マッチメイキングが完了したときのプッシュ通知
	 */
	protected $completeNotification;

	/**
	 * マッチメイキングが完了したときのプッシュ通知を取得
	 *
	 * @return NotificationSetting|null マッチメイキングが完了したときのプッシュ通知
	 */
	public function getCompleteNotification(): ?NotificationSetting {
		return $this->completeNotification;
	}

	/**
	 * マッチメイキングが完了したときのプッシュ通知を設定
	 *
	 * @param NotificationSetting|null $completeNotification マッチメイキングが完了したときのプッシュ通知
	 */
	public function setCompleteNotification(?NotificationSetting $completeNotification) {
		$this->completeNotification = $completeNotification;
	}

	/**
	 * マッチメイキングが完了したときのプッシュ通知を設定
	 *
	 * @param NotificationSetting|null $completeNotification マッチメイキングが完了したときのプッシュ通知
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
            "createGatheringTriggerType" => $this->createGatheringTriggerType,
            "createGatheringTriggerRealtimeNamespaceId" => $this->createGatheringTriggerRealtimeNamespaceId,
            "createGatheringTriggerScriptId" => $this->createGatheringTriggerScriptId,
            "completeMatchmakingTriggerType" => $this->completeMatchmakingTriggerType,
            "completeMatchmakingTriggerRealtimeNamespaceId" => $this->completeMatchmakingTriggerRealtimeNamespaceId,
            "completeMatchmakingTriggerScriptId" => $this->completeMatchmakingTriggerScriptId,
            "joinNotification" => $this->joinNotification->toJson(),
            "leaveNotification" => $this->leaveNotification->toJson(),
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
        $model->setCreateGatheringTriggerType(isset($data["createGatheringTriggerType"]) ? $data["createGatheringTriggerType"] : null);
        $model->setCreateGatheringTriggerRealtimeNamespaceId(isset($data["createGatheringTriggerRealtimeNamespaceId"]) ? $data["createGatheringTriggerRealtimeNamespaceId"] : null);
        $model->setCreateGatheringTriggerScriptId(isset($data["createGatheringTriggerScriptId"]) ? $data["createGatheringTriggerScriptId"] : null);
        $model->setCompleteMatchmakingTriggerType(isset($data["completeMatchmakingTriggerType"]) ? $data["completeMatchmakingTriggerType"] : null);
        $model->setCompleteMatchmakingTriggerRealtimeNamespaceId(isset($data["completeMatchmakingTriggerRealtimeNamespaceId"]) ? $data["completeMatchmakingTriggerRealtimeNamespaceId"] : null);
        $model->setCompleteMatchmakingTriggerScriptId(isset($data["completeMatchmakingTriggerScriptId"]) ? $data["completeMatchmakingTriggerScriptId"] : null);
        $model->setJoinNotification(isset($data["joinNotification"]) ? NotificationSetting::fromJson($data["joinNotification"]) : null);
        $model->setLeaveNotification(isset($data["leaveNotification"]) ? NotificationSetting::fromJson($data["leaveNotification"]) : null);
        $model->setCompleteNotification(isset($data["completeNotification"]) ? NotificationSetting::fromJson($data["completeNotification"]) : null);
        $model->setLogSetting(isset($data["logSetting"]) ? LogSetting::fromJson($data["logSetting"]) : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}