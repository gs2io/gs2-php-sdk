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
 * ミッショングループ
 *
 * @author Game Server Services, Inc.
 *
 */
class MissionGroupModel implements IModel {
	/**
     * @var string ミッショングループ
	 */
	protected $missionGroupId;

	/**
	 * ミッショングループを取得
	 *
	 * @return string|null ミッショングループ
	 */
	public function getMissionGroupId(): ?string {
		return $this->missionGroupId;
	}

	/**
	 * ミッショングループを設定
	 *
	 * @param string|null $missionGroupId ミッショングループ
	 */
	public function setMissionGroupId(?string $missionGroupId) {
		$this->missionGroupId = $missionGroupId;
	}

	/**
	 * ミッショングループを設定
	 *
	 * @param string|null $missionGroupId ミッショングループ
	 * @return MissionGroupModel $this
	 */
	public function withMissionGroupId(?string $missionGroupId): MissionGroupModel {
		$this->missionGroupId = $missionGroupId;
		return $this;
	}
	/**
     * @var string グループ名
	 */
	protected $name;

	/**
	 * グループ名を取得
	 *
	 * @return string|null グループ名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * グループ名を設定
	 *
	 * @param string|null $name グループ名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * グループ名を設定
	 *
	 * @param string|null $name グループ名
	 * @return MissionGroupModel $this
	 */
	public function withName(?string $name): MissionGroupModel {
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
	 * @return MissionGroupModel $this
	 */
	public function withMetadata(?string $metadata): MissionGroupModel {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var MissionTaskModel[] タスクリスト
	 */
	protected $tasks;

	/**
	 * タスクリストを取得
	 *
	 * @return MissionTaskModel[]|null タスクリスト
	 */
	public function getTasks(): ?array {
		return $this->tasks;
	}

	/**
	 * タスクリストを設定
	 *
	 * @param MissionTaskModel[]|null $tasks タスクリスト
	 */
	public function setTasks(?array $tasks) {
		$this->tasks = $tasks;
	}

	/**
	 * タスクリストを設定
	 *
	 * @param MissionTaskModel[]|null $tasks タスクリスト
	 * @return MissionGroupModel $this
	 */
	public function withTasks(?array $tasks): MissionGroupModel {
		$this->tasks = $tasks;
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
	 * @return MissionGroupModel $this
	 */
	public function withResetType(?string $resetType): MissionGroupModel {
		$this->resetType = $resetType;
		return $this;
	}
	/**
     * @var int リセットをする日にち
	 */
	protected $resetDayOfMonth;

	/**
	 * リセットをする日にちを取得
	 *
	 * @return int|null リセットをする日にち
	 */
	public function getResetDayOfMonth(): ?int {
		return $this->resetDayOfMonth;
	}

	/**
	 * リセットをする日にちを設定
	 *
	 * @param int|null $resetDayOfMonth リセットをする日にち
	 */
	public function setResetDayOfMonth(?int $resetDayOfMonth) {
		$this->resetDayOfMonth = $resetDayOfMonth;
	}

	/**
	 * リセットをする日にちを設定
	 *
	 * @param int|null $resetDayOfMonth リセットをする日にち
	 * @return MissionGroupModel $this
	 */
	public function withResetDayOfMonth(?int $resetDayOfMonth): MissionGroupModel {
		$this->resetDayOfMonth = $resetDayOfMonth;
		return $this;
	}
	/**
     * @var string リセットする曜日
	 */
	protected $resetDayOfWeek;

	/**
	 * リセットする曜日を取得
	 *
	 * @return string|null リセットする曜日
	 */
	public function getResetDayOfWeek(): ?string {
		return $this->resetDayOfWeek;
	}

	/**
	 * リセットする曜日を設定
	 *
	 * @param string|null $resetDayOfWeek リセットする曜日
	 */
	public function setResetDayOfWeek(?string $resetDayOfWeek) {
		$this->resetDayOfWeek = $resetDayOfWeek;
	}

	/**
	 * リセットする曜日を設定
	 *
	 * @param string|null $resetDayOfWeek リセットする曜日
	 * @return MissionGroupModel $this
	 */
	public function withResetDayOfWeek(?string $resetDayOfWeek): MissionGroupModel {
		$this->resetDayOfWeek = $resetDayOfWeek;
		return $this;
	}
	/**
     * @var int リセット時刻
	 */
	protected $resetHour;

	/**
	 * リセット時刻を取得
	 *
	 * @return int|null リセット時刻
	 */
	public function getResetHour(): ?int {
		return $this->resetHour;
	}

	/**
	 * リセット時刻を設定
	 *
	 * @param int|null $resetHour リセット時刻
	 */
	public function setResetHour(?int $resetHour) {
		$this->resetHour = $resetHour;
	}

	/**
	 * リセット時刻を設定
	 *
	 * @param int|null $resetHour リセット時刻
	 * @return MissionGroupModel $this
	 */
	public function withResetHour(?int $resetHour): MissionGroupModel {
		$this->resetHour = $resetHour;
		return $this;
	}
	/**
     * @var string ミッションを達成したときの通知先ネームスペース のGRN
	 */
	protected $completeNotificationNamespaceId;

	/**
	 * ミッションを達成したときの通知先ネームスペース のGRNを取得
	 *
	 * @return string|null ミッションを達成したときの通知先ネームスペース のGRN
	 */
	public function getCompleteNotificationNamespaceId(): ?string {
		return $this->completeNotificationNamespaceId;
	}

	/**
	 * ミッションを達成したときの通知先ネームスペース のGRNを設定
	 *
	 * @param string|null $completeNotificationNamespaceId ミッションを達成したときの通知先ネームスペース のGRN
	 */
	public function setCompleteNotificationNamespaceId(?string $completeNotificationNamespaceId) {
		$this->completeNotificationNamespaceId = $completeNotificationNamespaceId;
	}

	/**
	 * ミッションを達成したときの通知先ネームスペース のGRNを設定
	 *
	 * @param string|null $completeNotificationNamespaceId ミッションを達成したときの通知先ネームスペース のGRN
	 * @return MissionGroupModel $this
	 */
	public function withCompleteNotificationNamespaceId(?string $completeNotificationNamespaceId): MissionGroupModel {
		$this->completeNotificationNamespaceId = $completeNotificationNamespaceId;
		return $this;
	}

    public function toJson(): array {
        return array(
            "missionGroupId" => $this->missionGroupId,
            "name" => $this->name,
            "metadata" => $this->metadata,
            "tasks" => array_map(
                function (MissionTaskModel $v) {
                    return $v->toJson();
                },
                $this->tasks == null ? [] : $this->tasks
            ),
            "resetType" => $this->resetType,
            "resetDayOfMonth" => $this->resetDayOfMonth,
            "resetDayOfWeek" => $this->resetDayOfWeek,
            "resetHour" => $this->resetHour,
            "completeNotificationNamespaceId" => $this->completeNotificationNamespaceId,
        );
    }

    public static function fromJson(array $data): MissionGroupModel {
        $model = new MissionGroupModel();
        $model->setMissionGroupId(isset($data["missionGroupId"]) ? $data["missionGroupId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setTasks(array_map(
                function ($v) {
                    return MissionTaskModel::fromJson($v);
                },
                isset($data["tasks"]) ? $data["tasks"] : []
            )
        );
        $model->setResetType(isset($data["resetType"]) ? $data["resetType"] : null);
        $model->setResetDayOfMonth(isset($data["resetDayOfMonth"]) ? $data["resetDayOfMonth"] : null);
        $model->setResetDayOfWeek(isset($data["resetDayOfWeek"]) ? $data["resetDayOfWeek"] : null);
        $model->setResetHour(isset($data["resetHour"]) ? $data["resetHour"] : null);
        $model->setCompleteNotificationNamespaceId(isset($data["completeNotificationNamespaceId"]) ? $data["completeNotificationNamespaceId"] : null);
        return $model;
    }
}