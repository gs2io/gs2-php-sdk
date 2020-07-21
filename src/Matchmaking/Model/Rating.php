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
 * レーティング
 *
 * @author Game Server Services, Inc.
 *
 */
class Rating implements IModel {
	/**
     * @var string レーティング
	 */
	protected $ratingId;

	/**
	 * レーティングを取得
	 *
	 * @return string|null レーティング
	 */
	public function getRatingId(): ?string {
		return $this->ratingId;
	}

	/**
	 * レーティングを設定
	 *
	 * @param string|null $ratingId レーティング
	 */
	public function setRatingId(?string $ratingId) {
		$this->ratingId = $ratingId;
	}

	/**
	 * レーティングを設定
	 *
	 * @param string|null $ratingId レーティング
	 * @return Rating $this
	 */
	public function withRatingId(?string $ratingId): Rating {
		$this->ratingId = $ratingId;
		return $this;
	}
	/**
     * @var string レーティング名
	 */
	protected $name;

	/**
	 * レーティング名を取得
	 *
	 * @return string|null レーティング名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * レーティング名を設定
	 *
	 * @param string|null $name レーティング名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * レーティング名を設定
	 *
	 * @param string|null $name レーティング名
	 * @return Rating $this
	 */
	public function withName(?string $name): Rating {
		$this->name = $name;
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
	 * @return Rating $this
	 */
	public function withUserId(?string $userId): Rating {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var float None
	 */
	protected $rateValue;

	/**
	 * Noneを取得
	 *
	 * @return float|null None
	 */
	public function getRateValue(): ?float {
		return $this->rateValue;
	}

	/**
	 * Noneを設定
	 *
	 * @param float|null $rateValue None
	 */
	public function setRateValue(?float $rateValue) {
		$this->rateValue = $rateValue;
	}

	/**
	 * Noneを設定
	 *
	 * @param float|null $rateValue None
	 * @return Rating $this
	 */
	public function withRateValue(?float $rateValue): Rating {
		$this->rateValue = $rateValue;
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
	 * @return Rating $this
	 */
	public function withCreatedAt(?int $createdAt): Rating {
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
	 * @return Rating $this
	 */
	public function withUpdatedAt(?int $updatedAt): Rating {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "ratingId" => $this->ratingId,
            "name" => $this->name,
            "userId" => $this->userId,
            "rateValue" => $this->rateValue,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Rating {
        $model = new Rating();
        $model->setRatingId(isset($data["ratingId"]) ? $data["ratingId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setRateValue(isset($data["rateValue"]) ? $data["rateValue"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}