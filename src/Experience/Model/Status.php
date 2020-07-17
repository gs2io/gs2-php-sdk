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

namespace Gs2\Experience\Model;

use Gs2\Core\Model\IModel;

/**
 * ステータス
 *
 * @author Game Server Services, Inc.
 *
 */
class Status implements IModel {
	/**
     * @var string ステータス
	 */
	protected $statusId;

	/**
	 * ステータスを取得
	 *
	 * @return string|null ステータス
	 */
	public function getStatusId(): ?string {
		return $this->statusId;
	}

	/**
	 * ステータスを設定
	 *
	 * @param string|null $statusId ステータス
	 */
	public function setStatusId(?string $statusId) {
		$this->statusId = $statusId;
	}

	/**
	 * ステータスを設定
	 *
	 * @param string|null $statusId ステータス
	 * @return Status $this
	 */
	public function withStatusId(?string $statusId): Status {
		$this->statusId = $statusId;
		return $this;
	}
	/**
     * @var string 経験値の種類の名前
	 */
	protected $experienceName;

	/**
	 * 経験値の種類の名前を取得
	 *
	 * @return string|null 経験値の種類の名前
	 */
	public function getExperienceName(): ?string {
		return $this->experienceName;
	}

	/**
	 * 経験値の種類の名前を設定
	 *
	 * @param string|null $experienceName 経験値の種類の名前
	 */
	public function setExperienceName(?string $experienceName) {
		$this->experienceName = $experienceName;
	}

	/**
	 * 経験値の種類の名前を設定
	 *
	 * @param string|null $experienceName 経験値の種類の名前
	 * @return Status $this
	 */
	public function withExperienceName(?string $experienceName): Status {
		$this->experienceName = $experienceName;
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
	 * @return Status $this
	 */
	public function withUserId(?string $userId): Status {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string プロパティID
	 */
	protected $propertyId;

	/**
	 * プロパティIDを取得
	 *
	 * @return string|null プロパティID
	 */
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}

	/**
	 * プロパティIDを設定
	 *
	 * @param string|null $propertyId プロパティID
	 */
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}

	/**
	 * プロパティIDを設定
	 *
	 * @param string|null $propertyId プロパティID
	 * @return Status $this
	 */
	public function withPropertyId(?string $propertyId): Status {
		$this->propertyId = $propertyId;
		return $this;
	}
	/**
     * @var int 累計獲得経験値
	 */
	protected $experienceValue;

	/**
	 * 累計獲得経験値を取得
	 *
	 * @return int|null 累計獲得経験値
	 */
	public function getExperienceValue(): ?int {
		return $this->experienceValue;
	}

	/**
	 * 累計獲得経験値を設定
	 *
	 * @param int|null $experienceValue 累計獲得経験値
	 */
	public function setExperienceValue(?int $experienceValue) {
		$this->experienceValue = $experienceValue;
	}

	/**
	 * 累計獲得経験値を設定
	 *
	 * @param int|null $experienceValue 累計獲得経験値
	 * @return Status $this
	 */
	public function withExperienceValue(?int $experienceValue): Status {
		$this->experienceValue = $experienceValue;
		return $this;
	}
	/**
     * @var int 現在のランク
	 */
	protected $rankValue;

	/**
	 * 現在のランクを取得
	 *
	 * @return int|null 現在のランク
	 */
	public function getRankValue(): ?int {
		return $this->rankValue;
	}

	/**
	 * 現在のランクを設定
	 *
	 * @param int|null $rankValue 現在のランク
	 */
	public function setRankValue(?int $rankValue) {
		$this->rankValue = $rankValue;
	}

	/**
	 * 現在のランクを設定
	 *
	 * @param int|null $rankValue 現在のランク
	 * @return Status $this
	 */
	public function withRankValue(?int $rankValue): Status {
		$this->rankValue = $rankValue;
		return $this;
	}
	/**
     * @var int 現在のランクキャップ
	 */
	protected $rankCapValue;

	/**
	 * 現在のランクキャップを取得
	 *
	 * @return int|null 現在のランクキャップ
	 */
	public function getRankCapValue(): ?int {
		return $this->rankCapValue;
	}

	/**
	 * 現在のランクキャップを設定
	 *
	 * @param int|null $rankCapValue 現在のランクキャップ
	 */
	public function setRankCapValue(?int $rankCapValue) {
		$this->rankCapValue = $rankCapValue;
	}

	/**
	 * 現在のランクキャップを設定
	 *
	 * @param int|null $rankCapValue 現在のランクキャップ
	 * @return Status $this
	 */
	public function withRankCapValue(?int $rankCapValue): Status {
		$this->rankCapValue = $rankCapValue;
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
	 * @return Status $this
	 */
	public function withCreatedAt(?int $createdAt): Status {
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
	 * @return Status $this
	 */
	public function withUpdatedAt(?int $updatedAt): Status {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "statusId" => $this->statusId,
            "experienceName" => $this->experienceName,
            "userId" => $this->userId,
            "propertyId" => $this->propertyId,
            "experienceValue" => $this->experienceValue,
            "rankValue" => $this->rankValue,
            "rankCapValue" => $this->rankCapValue,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Status {
        $model = new Status();
        $model->setStatusId(isset($data["statusId"]) ? $data["statusId"] : null);
        $model->setExperienceName(isset($data["experienceName"]) ? $data["experienceName"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setPropertyId(isset($data["propertyId"]) ? $data["propertyId"] : null);
        $model->setExperienceValue(isset($data["experienceValue"]) ? $data["experienceValue"] : null);
        $model->setRankValue(isset($data["rankValue"]) ? $data["rankValue"] : null);
        $model->setRankCapValue(isset($data["rankCapValue"]) ? $data["rankCapValue"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}