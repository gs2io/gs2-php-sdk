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
        $model->setCompleteNotificationNamespaceId(isset($data["completeNotificationNamespaceId"]) ? $data["completeNotificationNamespaceId"] : null);
        return $model;
    }
}