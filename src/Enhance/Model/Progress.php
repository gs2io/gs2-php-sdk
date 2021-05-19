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

namespace Gs2\Enhance\Model;

use Gs2\Core\Model\IModel;

/**
 * 強化実行
 *
 * @author Game Server Services, Inc.
 *
 */
class Progress implements IModel {
	/**
     * @var string 強化実行
	 */
	protected $progressId;

	/**
	 * 強化実行を取得
	 *
	 * @return string|null 強化実行
	 */
	public function getProgressId(): ?string {
		return $this->progressId;
	}

	/**
	 * 強化実行を設定
	 *
	 * @param string|null $progressId 強化実行
	 */
	public function setProgressId(?string $progressId) {
		$this->progressId = $progressId;
	}

	/**
	 * 強化実行を設定
	 *
	 * @param string|null $progressId 強化実行
	 * @return Progress $this
	 */
	public function withProgressId(?string $progressId): Progress {
		$this->progressId = $progressId;
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
	 * @return Progress $this
	 */
	public function withUserId(?string $userId): Progress {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string レートモデル名
	 */
	protected $rateName;

	/**
	 * レートモデル名を取得
	 *
	 * @return string|null レートモデル名
	 */
	public function getRateName(): ?string {
		return $this->rateName;
	}

	/**
	 * レートモデル名を設定
	 *
	 * @param string|null $rateName レートモデル名
	 */
	public function setRateName(?string $rateName) {
		$this->rateName = $rateName;
	}

	/**
	 * レートモデル名を設定
	 *
	 * @param string|null $rateName レートモデル名
	 * @return Progress $this
	 */
	public function withRateName(?string $rateName): Progress {
		$this->rateName = $rateName;
		return $this;
	}
	/**
     * @var string 強化対象のプロパティID
	 */
	protected $propertyId;

	/**
	 * 強化対象のプロパティIDを取得
	 *
	 * @return string|null 強化対象のプロパティID
	 */
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}

	/**
	 * 強化対象のプロパティIDを設定
	 *
	 * @param string|null $propertyId 強化対象のプロパティID
	 */
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}

	/**
	 * 強化対象のプロパティIDを設定
	 *
	 * @param string|null $propertyId 強化対象のプロパティID
	 * @return Progress $this
	 */
	public function withPropertyId(?string $propertyId): Progress {
		$this->propertyId = $propertyId;
		return $this;
	}
	/**
     * @var int 入手できる経験値
	 */
	protected $experienceValue;

	/**
	 * 入手できる経験値を取得
	 *
	 * @return int|null 入手できる経験値
	 */
	public function getExperienceValue(): ?int {
		return $this->experienceValue;
	}

	/**
	 * 入手できる経験値を設定
	 *
	 * @param int|null $experienceValue 入手できる経験値
	 */
	public function setExperienceValue(?int $experienceValue) {
		$this->experienceValue = $experienceValue;
	}

	/**
	 * 入手できる経験値を設定
	 *
	 * @param int|null $experienceValue 入手できる経験値
	 * @return Progress $this
	 */
	public function withExperienceValue(?int $experienceValue): Progress {
		$this->experienceValue = $experienceValue;
		return $this;
	}
	/**
     * @var float 経験値倍率
	 */
	protected $rate;

	/**
	 * 経験値倍率を取得
	 *
	 * @return float|null 経験値倍率
	 */
	public function getRate(): ?float {
		return $this->rate;
	}

	/**
	 * 経験値倍率を設定
	 *
	 * @param float|null $rate 経験値倍率
	 */
	public function setRate(?float $rate) {
		$this->rate = $rate;
	}

	/**
	 * 経験値倍率を設定
	 *
	 * @param float|null $rate 経験値倍率
	 * @return Progress $this
	 */
	public function withRate(?float $rate): Progress {
		$this->rate = $rate;
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
	 * @return Progress $this
	 */
	public function withCreatedAt(?int $createdAt): Progress {
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
	 * @return Progress $this
	 */
	public function withUpdatedAt(?int $updatedAt): Progress {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "progressId" => $this->progressId,
            "userId" => $this->userId,
            "rateName" => $this->rateName,
            "propertyId" => $this->propertyId,
            "experienceValue" => $this->experienceValue,
            "rate" => $this->rate,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Progress {
        $model = new Progress();
        $model->setProgressId(isset($data["progressId"]) ? $data["progressId"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setRateName(isset($data["rateName"]) ? $data["rateName"] : null);
        $model->setPropertyId(isset($data["propertyId"]) ? $data["propertyId"] : null);
        $model->setExperienceValue(isset($data["experienceValue"]) ? $data["experienceValue"] : null);
        $model->setRate(isset($data["rate"]) ? $data["rate"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}