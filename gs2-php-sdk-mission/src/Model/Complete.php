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
 * 達成状況
 *
 * @author Game Server Services, Inc.
 *
 */
class Complete implements IModel {
	/**
     * @var string 達成状況
	 */
	protected $completeId;

	/**
	 * 達成状況を取得
	 *
	 * @return string|null 達成状況
	 */
	public function getCompleteId(): ?string {
		return $this->completeId;
	}

	/**
	 * 達成状況を設定
	 *
	 * @param string|null $completeId 達成状況
	 */
	public function setCompleteId(?string $completeId) {
		$this->completeId = $completeId;
	}

	/**
	 * 達成状況を設定
	 *
	 * @param string|null $completeId 達成状況
	 * @return Complete $this
	 */
	public function withCompleteId(?string $completeId): Complete {
		$this->completeId = $completeId;
		return $this;
	}
	/**
     * @var string ユーザーID
	 */
	protected $userId;

	/**
	 * ユーザーIDを取得
	 *
	 * @return string|null ユーザーID
	 */
	public function getUserId(): ?string {
		return $this->userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 * @return Complete $this
	 */
	public function withUserId(?string $userId): Complete {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string ミッショングループ名
	 */
	protected $missionGroupName;

	/**
	 * ミッショングループ名を取得
	 *
	 * @return string|null ミッショングループ名
	 */
	public function getMissionGroupName(): ?string {
		return $this->missionGroupName;
	}

	/**
	 * ミッショングループ名を設定
	 *
	 * @param string|null $missionGroupName ミッショングループ名
	 */
	public function setMissionGroupName(?string $missionGroupName) {
		$this->missionGroupName = $missionGroupName;
	}

	/**
	 * ミッショングループ名を設定
	 *
	 * @param string|null $missionGroupName ミッショングループ名
	 * @return Complete $this
	 */
	public function withMissionGroupName(?string $missionGroupName): Complete {
		$this->missionGroupName = $missionGroupName;
		return $this;
	}
	/**
     * @var string[] 達成済みのタスク名リスト
	 */
	protected $completedMissionTaskNames;

	/**
	 * 達成済みのタスク名リストを取得
	 *
	 * @return string[]|null 達成済みのタスク名リスト
	 */
	public function getCompletedMissionTaskNames(): ?array {
		return $this->completedMissionTaskNames;
	}

	/**
	 * 達成済みのタスク名リストを設定
	 *
	 * @param string[]|null $completedMissionTaskNames 達成済みのタスク名リスト
	 */
	public function setCompletedMissionTaskNames(?array $completedMissionTaskNames) {
		$this->completedMissionTaskNames = $completedMissionTaskNames;
	}

	/**
	 * 達成済みのタスク名リストを設定
	 *
	 * @param string[]|null $completedMissionTaskNames 達成済みのタスク名リスト
	 * @return Complete $this
	 */
	public function withCompletedMissionTaskNames(?array $completedMissionTaskNames): Complete {
		$this->completedMissionTaskNames = $completedMissionTaskNames;
		return $this;
	}
	/**
     * @var string[] 報酬の受け取り済みのタスク名リスト
	 */
	protected $receivedMissionTaskNames;

	/**
	 * 報酬の受け取り済みのタスク名リストを取得
	 *
	 * @return string[]|null 報酬の受け取り済みのタスク名リスト
	 */
	public function getReceivedMissionTaskNames(): ?array {
		return $this->receivedMissionTaskNames;
	}

	/**
	 * 報酬の受け取り済みのタスク名リストを設定
	 *
	 * @param string[]|null $receivedMissionTaskNames 報酬の受け取り済みのタスク名リスト
	 */
	public function setReceivedMissionTaskNames(?array $receivedMissionTaskNames) {
		$this->receivedMissionTaskNames = $receivedMissionTaskNames;
	}

	/**
	 * 報酬の受け取り済みのタスク名リストを設定
	 *
	 * @param string[]|null $receivedMissionTaskNames 報酬の受け取り済みのタスク名リスト
	 * @return Complete $this
	 */
	public function withReceivedMissionTaskNames(?array $receivedMissionTaskNames): Complete {
		$this->receivedMissionTaskNames = $receivedMissionTaskNames;
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
	 * @return Complete $this
	 */
	public function withCreatedAt(?int $createdAt): Complete {
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
	 * @return Complete $this
	 */
	public function withUpdatedAt(?int $updatedAt): Complete {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "completeId" => $this->completeId,
            "userId" => $this->userId,
            "missionGroupName" => $this->missionGroupName,
            "completedMissionTaskNames" => $this->completedMissionTaskNames,
            "receivedMissionTaskNames" => $this->receivedMissionTaskNames,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Complete {
        $model = new Complete();
        $model->setCompleteId(isset($data["completeId"]) ? $data["completeId"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setMissionGroupName(isset($data["missionGroupName"]) ? $data["missionGroupName"] : null);
        $model->setCompletedMissionTaskNames(isset($data["completedMissionTaskNames"]) ? $data["completedMissionTaskNames"] : null);
        $model->setReceivedMissionTaskNames(isset($data["receivedMissionTaskNames"]) ? $data["receivedMissionTaskNames"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}