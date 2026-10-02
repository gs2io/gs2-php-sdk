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
 * Rating Model
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#ratingmodel
 */
class RatingModel implements IModel {
	/**
     * @var string Rating Model GRN
	 */
	private $ratingModelId;
	/**
     * @var string Rating Model name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var int Initial Rating Value
	 */
	private $initialValue;
	/**
     * @var int Rating Volatility
	 */
	private $volatility;
    /** @return string|null Rating Model GRN */
	public function getRatingModelId(): ?string {
		return $this->ratingModelId;
	}
    /** @param string|null $ratingModelId Rating Model GRN */
	public function setRatingModelId(?string $ratingModelId) {
		$this->ratingModelId = $ratingModelId;
	}
    /**
     * @param string|null $ratingModelId Rating Model GRN
     * @return RatingModel
     */
	public function withRatingModelId(?string $ratingModelId): RatingModel {
		$this->ratingModelId = $ratingModelId;
		return $this;
	}
    /** @return string|null Rating Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Rating Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Rating Model name
     * @return RatingModel
     */
	public function withName(?string $name): RatingModel {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return RatingModel
     */
	public function withMetadata(?string $metadata): RatingModel {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return int|null Initial Rating Value */
	public function getInitialValue(): ?int {
		return $this->initialValue;
	}
    /** @param int|null $initialValue Initial Rating Value */
	public function setInitialValue(?int $initialValue) {
		$this->initialValue = $initialValue;
	}
    /**
     * @param int|null $initialValue Initial Rating Value
     * @return RatingModel
     */
	public function withInitialValue(?int $initialValue): RatingModel {
		$this->initialValue = $initialValue;
		return $this;
	}
    /** @return int|null Rating Volatility */
	public function getVolatility(): ?int {
		return $this->volatility;
	}
    /** @param int|null $volatility Rating Volatility */
	public function setVolatility(?int $volatility) {
		$this->volatility = $volatility;
	}
    /**
     * @param int|null $volatility Rating Volatility
     * @return RatingModel
     */
	public function withVolatility(?int $volatility): RatingModel {
		$this->volatility = $volatility;
		return $this;
	}

    public static function fromJson(?array $data): ?RatingModel {
        if ($data === null) {
            return null;
        }
        return (new RatingModel())
            ->withRatingModelId(array_key_exists('ratingModelId', $data) && $data['ratingModelId'] !== null ? $data['ratingModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withInitialValue(array_key_exists('initialValue', $data) && $data['initialValue'] !== null ? $data['initialValue'] : null)
            ->withVolatility(array_key_exists('volatility', $data) && $data['volatility'] !== null ? $data['volatility'] : null);
    }

    public function toJson(): array {
        return array(
            "ratingModelId" => $this->getRatingModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "initialValue" => $this->getInitialValue(),
            "volatility" => $this->getVolatility(),
        );
    }
}