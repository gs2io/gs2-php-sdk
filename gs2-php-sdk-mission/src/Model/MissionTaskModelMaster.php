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
 * ミッションタスクマスター
 *
 * @author Game Server Services, Inc.
 *
 */
class MissionTaskModelMaster implements IModel {
	/**
     * @var string ミッションタスクマスター
	 */
	protected $missionTaskId;

	/**
	 * ミッションタスクマスターを取得
	 *
	 * @return string|null ミッションタスクマスター
	 */
	public function getMissionTaskId(): ?string {
		return $this->missionTaskId;
	}

	/**
	 * ミッションタスクマスターを設定
	 *
	 * @param string|null $missionTaskId ミッションタスクマスター
	 */
	public function setMissionTaskId(?string $missionTaskId) {
		$this->missionTaskId = $missionTaskId;
	}

	/**
	 * ミッションタスクマスターを設定
	 *
	 * @param string|null $missionTaskId ミッションタスクマスター
	 * @return MissionTaskModelMaster $this
	 */
	public function withMissionTaskId(?string $missionTaskId): MissionTaskModelMaster {
		$this->missionTaskId = $missionTaskId;
		return $this;
	}
	/**
     * @var string タスク名
	 */
	protected $name;

	/**
	 * タスク名を取得
	 *
	 * @return string|null タスク名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * タスク名を設定
	 *
	 * @param string|null $name タスク名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * タスク名を設定
	 *
	 * @param string|null $name タスク名
	 * @return MissionTaskModelMaster $this
	 */
	public function withName(?string $name): MissionTaskModelMaster {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string メタデータ
	 */
	protected $metadata;

	/**
	 * メタデータを取得
	 *
	 * @return string|null メタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * メタデータを設定
	 *
	 * @param string|null $metadata メタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * メタデータを設定
	 *
	 * @param string|null $metadata メタデータ
	 * @return MissionTaskModelMaster $this
	 */
	public function withMetadata(?string $metadata): MissionTaskModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var string ミッションタスクの説明
	 */
	protected $description;

	/**
	 * ミッションタスクの説明を取得
	 *
	 * @return string|null ミッションタスクの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * ミッションタスクの説明を設定
	 *
	 * @param string|null $description ミッションタスクの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * ミッションタスクの説明を設定
	 *
	 * @param string|null $description ミッションタスクの説明
	 * @return MissionTaskModelMaster $this
	 */
	public function withDescription(?string $description): MissionTaskModelMaster {
		$this->description = $description;
		return $this;
	}
	/**
     * @var string カウンター名
	 */
	protected $counterName;

	/**
	 * カウンター名を取得
	 *
	 * @return string|null カウンター名
	 */
	public function getCounterName(): ?string {
		return $this->counterName;
	}

	/**
	 * カウンター名を設定
	 *
	 * @param string|null $counterName カウンター名
	 */
	public function setCounterName(?string $counterName) {
		$this->counterName = $counterName;
	}

	/**
	 * カウンター名を設定
	 *
	 * @param string|null $counterName カウンター名
	 * @return MissionTaskModelMaster $this
	 */
	public function withCounterName(?string $counterName): MissionTaskModelMaster {
		$this->counterName = $counterName;
		return $this;
	}
	/**
     * @var string リセットタイミング
	 */
	protected $resetType;

	/**
	 * リセットタイミングを取得
	 *
	 * @return string|null リセットタイミング
	 */
	public function getResetType(): ?string {
		return $this->resetType;
	}

	/**
	 * リセットタイミングを設定
	 *
	 * @param string|null $resetType リセットタイミング
	 */
	public function setResetType(?string $resetType) {
		$this->resetType = $resetType;
	}

	/**
	 * リセットタイミングを設定
	 *
	 * @param string|null $resetType リセットタイミング
	 * @return MissionTaskModelMaster $this
	 */
	public function withResetType(?string $resetType): MissionTaskModelMaster {
		$this->resetType = $resetType;
		return $this;
	}
	/**
     * @var int 目標値
	 */
	protected $targetValue;

	/**
	 * 目標値を取得
	 *
	 * @return int|null 目標値
	 */
	public function getTargetValue(): ?int {
		return $this->targetValue;
	}

	/**
	 * 目標値を設定
	 *
	 * @param int|null $targetValue 目標値
	 */
	public function setTargetValue(?int $targetValue) {
		$this->targetValue = $targetValue;
	}

	/**
	 * 目標値を設定
	 *
	 * @param int|null $targetValue 目標値
	 * @return MissionTaskModelMaster $this
	 */
	public function withTargetValue(?int $targetValue): MissionTaskModelMaster {
		$this->targetValue = $targetValue;
		return $this;
	}
	/**
     * @var AcquireAction[] ミッション達成時の報酬
	 */
	protected $completeAcquireActions;

	/**
	 * ミッション達成時の報酬を取得
	 *
	 * @return AcquireAction[]|null ミッション達成時の報酬
	 */
	public function getCompleteAcquireActions(): ?array {
		return $this->completeAcquireActions;
	}

	/**
	 * ミッション達成時の報酬を設定
	 *
	 * @param AcquireAction[]|null $completeAcquireActions ミッション達成時の報酬
	 */
	public function setCompleteAcquireActions(?array $completeAcquireActions) {
		$this->completeAcquireActions = $completeAcquireActions;
	}

	/**
	 * ミッション達成時の報酬を設定
	 *
	 * @param AcquireAction[]|null $completeAcquireActions ミッション達成時の報酬
	 * @return MissionTaskModelMaster $this
	 */
	public function withCompleteAcquireActions(?array $completeAcquireActions): MissionTaskModelMaster {
		$this->completeAcquireActions = $completeAcquireActions;
		return $this;
	}
	/**
     * @var string 達成報酬の受け取り可能な期間を指定するイベントマスター のGRN
	 */
	protected $challengePeriodEventId;

	/**
	 * 達成報酬の受け取り可能な期間を指定するイベントマスター のGRNを取得
	 *
	 * @return string|null 達成報酬の受け取り可能な期間を指定するイベントマスター のGRN
	 */
	public function getChallengePeriodEventId(): ?string {
		return $this->challengePeriodEventId;
	}

	/**
	 * 達成報酬の受け取り可能な期間を指定するイベントマスター のGRNを設定
	 *
	 * @param string|null $challengePeriodEventId 達成報酬の受け取り可能な期間を指定するイベントマスター のGRN
	 */
	public function setChallengePeriodEventId(?string $challengePeriodEventId) {
		$this->challengePeriodEventId = $challengePeriodEventId;
	}

	/**
	 * 達成報酬の受け取り可能な期間を指定するイベントマスター のGRNを設定
	 *
	 * @param string|null $challengePeriodEventId 達成報酬の受け取り可能な期間を指定するイベントマスター のGRN
	 * @return MissionTaskModelMaster $this
	 */
	public function withChallengePeriodEventId(?string $challengePeriodEventId): MissionTaskModelMaster {
		$this->challengePeriodEventId = $challengePeriodEventId;
		return $this;
	}
	/**
     * @var string このタスクに挑戦するために達成しておく必要のあるタスクの名前
	 */
	protected $premiseMissionTaskName;

	/**
	 * このタスクに挑戦するために達成しておく必要のあるタスクの名前を取得
	 *
	 * @return string|null このタスクに挑戦するために達成しておく必要のあるタスクの名前
	 */
	public function getPremiseMissionTaskName(): ?string {
		return $this->premiseMissionTaskName;
	}

	/**
	 * このタスクに挑戦するために達成しておく必要のあるタスクの名前を設定
	 *
	 * @param string|null $premiseMissionTaskName このタスクに挑戦するために達成しておく必要のあるタスクの名前
	 */
	public function setPremiseMissionTaskName(?string $premiseMissionTaskName) {
		$this->premiseMissionTaskName = $premiseMissionTaskName;
	}

	/**
	 * このタスクに挑戦するために達成しておく必要のあるタスクの名前を設定
	 *
	 * @param string|null $premiseMissionTaskName このタスクに挑戦するために達成しておく必要のあるタスクの名前
	 * @return MissionTaskModelMaster $this
	 */
	public function withPremiseMissionTaskName(?string $premiseMissionTaskName): MissionTaskModelMaster {
		$this->premiseMissionTaskName = $premiseMissionTaskName;
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
	 * @return MissionTaskModelMaster $this
	 */
	public function withCreatedAt(?int $createdAt): MissionTaskModelMaster {
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
	 * @return MissionTaskModelMaster $this
	 */
	public function withUpdatedAt(?int $updatedAt): MissionTaskModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "missionTaskId" => $this->missionTaskId,
            "name" => $this->name,
            "metadata" => $this->metadata,
            "description" => $this->description,
            "counterName" => $this->counterName,
            "resetType" => $this->resetType,
            "targetValue" => $this->targetValue,
            "completeAcquireActions" => array_map(
                function (AcquireAction $v) {
                    return $v->toJson();
                },
                $this->completeAcquireActions == null ? [] : $this->completeAcquireActions
            ),
            "challengePeriodEventId" => $this->challengePeriodEventId,
            "premiseMissionTaskName" => $this->premiseMissionTaskName,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): MissionTaskModelMaster {
        $model = new MissionTaskModelMaster();
        $model->setMissionTaskId(isset($data["missionTaskId"]) ? $data["missionTaskId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setCounterName(isset($data["counterName"]) ? $data["counterName"] : null);
        $model->setResetType(isset($data["resetType"]) ? $data["resetType"] : null);
        $model->setTargetValue(isset($data["targetValue"]) ? $data["targetValue"] : null);
        $model->setCompleteAcquireActions(array_map(
                function ($v) {
                    return AcquireAction::fromJson($v);
                },
                isset($data["completeAcquireActions"]) ? $data["completeAcquireActions"] : []
            )
        );
        $model->setChallengePeriodEventId(isset($data["challengePeriodEventId"]) ? $data["challengePeriodEventId"] : null);
        $model->setPremiseMissionTaskName(isset($data["premiseMissionTaskName"]) ? $data["premiseMissionTaskName"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}