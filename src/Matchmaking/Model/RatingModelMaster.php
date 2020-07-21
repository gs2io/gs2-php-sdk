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
 * レーティングモデルマスター
 *
 * @author Game Server Services, Inc.
 *
 */
class RatingModelMaster implements IModel {
	/**
     * @var string レーティングモデルマスター
	 */
	protected $ratingModelId;

	/**
	 * レーティングモデルマスターを取得
	 *
	 * @return string|null レーティングモデルマスター
	 */
	public function getRatingModelId(): ?string {
		return $this->ratingModelId;
	}

	/**
	 * レーティングモデルマスターを設定
	 *
	 * @param string|null $ratingModelId レーティングモデルマスター
	 */
	public function setRatingModelId(?string $ratingModelId) {
		$this->ratingModelId = $ratingModelId;
	}

	/**
	 * レーティングモデルマスターを設定
	 *
	 * @param string|null $ratingModelId レーティングモデルマスター
	 * @return RatingModelMaster $this
	 */
	public function withRatingModelId(?string $ratingModelId): RatingModelMaster {
		$this->ratingModelId = $ratingModelId;
		return $this;
	}
	/**
     * @var string レーティングの種類名
	 */
	protected $name;

	/**
	 * レーティングの種類名を取得
	 *
	 * @return string|null レーティングの種類名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * レーティングの種類名を設定
	 *
	 * @param string|null $name レーティングの種類名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * レーティングの種類名を設定
	 *
	 * @param string|null $name レーティングの種類名
	 * @return RatingModelMaster $this
	 */
	public function withName(?string $name): RatingModelMaster {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string レーティングの種類のメタデータ
	 */
	protected $metadata;

	/**
	 * レーティングの種類のメタデータを取得
	 *
	 * @return string|null レーティングの種類のメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * レーティングの種類のメタデータを設定
	 *
	 * @param string|null $metadata レーティングの種類のメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * レーティングの種類のメタデータを設定
	 *
	 * @param string|null $metadata レーティングの種類のメタデータ
	 * @return RatingModelMaster $this
	 */
	public function withMetadata(?string $metadata): RatingModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var string レーティングモデルマスターの説明
	 */
	protected $description;

	/**
	 * レーティングモデルマスターの説明を取得
	 *
	 * @return string|null レーティングモデルマスターの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * レーティングモデルマスターの説明を設定
	 *
	 * @param string|null $description レーティングモデルマスターの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * レーティングモデルマスターの説明を設定
	 *
	 * @param string|null $description レーティングモデルマスターの説明
	 * @return RatingModelMaster $this
	 */
	public function withDescription(?string $description): RatingModelMaster {
		$this->description = $description;
		return $this;
	}
	/**
     * @var int レート値の変動の大きさ
	 */
	protected $volatility;

	/**
	 * レート値の変動の大きさを取得
	 *
	 * @return int|null レート値の変動の大きさ
	 */
	public function getVolatility(): ?int {
		return $this->volatility;
	}

	/**
	 * レート値の変動の大きさを設定
	 *
	 * @param int|null $volatility レート値の変動の大きさ
	 */
	public function setVolatility(?int $volatility) {
		$this->volatility = $volatility;
	}

	/**
	 * レート値の変動の大きさを設定
	 *
	 * @param int|null $volatility レート値の変動の大きさ
	 * @return RatingModelMaster $this
	 */
	public function withVolatility(?int $volatility): RatingModelMaster {
		$this->volatility = $volatility;
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
	 * @return RatingModelMaster $this
	 */
	public function withCreatedAt(?int $createdAt): RatingModelMaster {
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
	 * @return RatingModelMaster $this
	 */
	public function withUpdatedAt(?int $updatedAt): RatingModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "ratingModelId" => $this->ratingModelId,
            "name" => $this->name,
            "metadata" => $this->metadata,
            "description" => $this->description,
            "volatility" => $this->volatility,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): RatingModelMaster {
        $model = new RatingModelMaster();
        $model->setRatingModelId(isset($data["ratingModelId"]) ? $data["ratingModelId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setVolatility(isset($data["volatility"]) ? $data["volatility"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}