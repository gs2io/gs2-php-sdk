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
 * レーティングモデル
 *
 * @author Game Server Services, Inc.
 *
 */
class RatingModel implements IModel {
	/**
     * @var string レーティングモデル
	 */
	protected $ratingModelId;

	/**
	 * レーティングモデルを取得
	 *
	 * @return string|null レーティングモデル
	 */
	public function getRatingModelId(): ?string {
		return $this->ratingModelId;
	}

	/**
	 * レーティングモデルを設定
	 *
	 * @param string|null $ratingModelId レーティングモデル
	 */
	public function setRatingModelId(?string $ratingModelId) {
		$this->ratingModelId = $ratingModelId;
	}

	/**
	 * レーティングモデルを設定
	 *
	 * @param string|null $ratingModelId レーティングモデル
	 * @return RatingModel $this
	 */
	public function withRatingModelId(?string $ratingModelId): RatingModel {
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
	 * @return RatingModel $this
	 */
	public function withName(?string $name): RatingModel {
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
	 * @return RatingModel $this
	 */
	public function withMetadata(?string $metadata): RatingModel {
		$this->metadata = $metadata;
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
	 * @return RatingModel $this
	 */
	public function withVolatility(?int $volatility): RatingModel {
		$this->volatility = $volatility;
		return $this;
	}

    public function toJson(): array {
        return array(
            "ratingModelId" => $this->ratingModelId,
            "name" => $this->name,
            "metadata" => $this->metadata,
            "volatility" => $this->volatility,
        );
    }

    public static function fromJson(array $data): RatingModel {
        $model = new RatingModel();
        $model->setRatingModelId(isset($data["ratingModelId"]) ? $data["ratingModelId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setVolatility(isset($data["volatility"]) ? $data["volatility"] : null);
        return $model;
    }
}