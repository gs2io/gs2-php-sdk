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


class RatingModel implements IModel {
	/**
     * @var string
	 */
	private $ratingModelId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var int
	 */
	private $volatility;
	public function getRatingModelId(): ?string {
		return $this->ratingModelId;
	}
	public function setRatingModelId(?string $ratingModelId) {
		$this->ratingModelId = $ratingModelId;
	}
	public function withRatingModelId(?string $ratingModelId): RatingModel {
		$this->ratingModelId = $ratingModelId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): RatingModel {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): RatingModel {
		$this->metadata = $metadata;
		return $this;
	}
	public function getVolatility(): ?int {
		return $this->volatility;
	}
	public function setVolatility(?int $volatility) {
		$this->volatility = $volatility;
	}
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
            ->withVolatility(array_key_exists('volatility', $data) && $data['volatility'] !== null ? $data['volatility'] : null);
    }

    public function toJson(): array {
        return array(
            "ratingModelId" => $this->getRatingModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "volatility" => $this->getVolatility(),
        );
    }
}