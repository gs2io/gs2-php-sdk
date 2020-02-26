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
 * ミッショングループマスター
 *
 * @author Game Server Services, Inc.
 *
 */
class MissionGroupModelMaster implements IModel {
	/**
     * @var string ミッショングループマスター
	 */
	protected $missionGroupId;

	/**
	 * ミッショングループマスターを取得
	 *
	 * @return string|null ミッショングループマスター
	 */
	public function getMissionGroupId(): ?string {
		return $this->missionGroupId;
	}

	/**
	 * ミッショングループマスターを設定
	 *
	 * @param string|null $missionGroupId ミッショングループマスター
	 */
	public function setMissionGroupId(?string $missionGroupId) {
		$this->missionGroupId = $missionGroupId;
	}

	/**
	 * ミッショングループマスターを設定
	 *
	 * @param string|null $missionGroupId ミッショングループマスター
	 * @return MissionGroupModelMaster $this
	 */
	public function withMissionGroupId(?string $missionGroupId): MissionGroupModelMaster {
		$this->missionGroupId = $missionGroupId;
		return $this;
	}
	/**
     * @var string ミッショングループ名
	 */
	protected $name;

	/**
	 * ミッショングループ名を取得
	 *
	 * @return string|null ミッショングループ名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * ミッショングループ名を設定
	 *
	 * @param string|null $name ミッショングループ名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * ミッショングループ名を設定
	 *
	 * @param string|null $name ミッショングループ名
	 * @return MissionGroupModelMaster $this
	 */
	public function withName(?string $name): MissionGroupModelMaster {
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
	 * @return MissionGroupModelMaster $this
	 */
	public function withMetadata(?string $metadata): MissionGroupModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var string ミッショングループの説明
	 */
	protected $description;

	/**
	 * ミッショングループの説明を取得
	 *
	 * @return string|null ミッショングループの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * ミッショングループの説明を設定
	 *
	 * @param string|null $description ミッショングループの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * ミッショングループの説明を設定
	 *
	 * @param string|null $description ミッショングループの説明
	 * @return MissionGroupModelMaster $this
	 */
	public function withDescription(?string $description): MissionGroupModelMaster {
		$this->description = $description;
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
	 * @return MissionGroupModelMaster $this
	 */
	public function withCompleteNotificationNamespaceId(?string $completeNotificationNamespaceId): MissionGroupModelMaster {
		$this->completeNotificationNamespaceId = $completeNotificationNamespaceId;
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
	 * @return MissionGroupModelMaster $this
	 */
	public function withCreatedAt(?int $createdAt): MissionGroupModelMaster {
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
	 * @return MissionGroupModelMaster $this
	 */
	public function withUpdatedAt(?int $updatedAt): MissionGroupModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "missionGroupId" => $this->missionGroupId,
            "name" => $this->name,
            "metadata" => $this->metadata,
            "description" => $this->description,
            "completeNotificationNamespaceId" => $this->completeNotificationNamespaceId,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): MissionGroupModelMaster {
        $model = new MissionGroupModelMaster();
        $model->setMissionGroupId(isset($data["missionGroupId"]) ? $data["missionGroupId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setCompleteNotificationNamespaceId(isset($data["completeNotificationNamespaceId"]) ? $data["completeNotificationNamespaceId"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}