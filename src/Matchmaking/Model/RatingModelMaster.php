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
 * Rating Model Master
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#ratingmodelmaster
 */
class RatingModelMaster implements IModel {
	/**
     * @var string Rating Model Master GRN
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
     * @var string Description
	 */
	private $description;
	/**
     * @var int Initial Rating Value
	 */
	private $initialValue;
	/**
     * @var int Rating Volatility
	 */
	private $volatility;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Rating Model Master GRN */
	public function getRatingModelId(): ?string {
		return $this->ratingModelId;
	}
    /** @param string|null $ratingModelId Rating Model Master GRN */
	public function setRatingModelId(?string $ratingModelId) {
		$this->ratingModelId = $ratingModelId;
	}
    /**
     * @param string|null $ratingModelId Rating Model Master GRN
     * @return RatingModelMaster
     */
	public function withRatingModelId(?string $ratingModelId): RatingModelMaster {
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
     * @return RatingModelMaster
     */
	public function withName(?string $name): RatingModelMaster {
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
     * @return RatingModelMaster
     */
	public function withMetadata(?string $metadata): RatingModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return RatingModelMaster
     */
	public function withDescription(?string $description): RatingModelMaster {
		$this->description = $description;
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
     * @return RatingModelMaster
     */
	public function withInitialValue(?int $initialValue): RatingModelMaster {
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
     * @return RatingModelMaster
     */
	public function withVolatility(?int $volatility): RatingModelMaster {
		$this->volatility = $volatility;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return RatingModelMaster
     */
	public function withCreatedAt(?int $createdAt): RatingModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return RatingModelMaster
     */
	public function withUpdatedAt(?int $updatedAt): RatingModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return RatingModelMaster
     */
	public function withRevision(?int $revision): RatingModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?RatingModelMaster {
        if ($data === null) {
            return null;
        }
        return (new RatingModelMaster())
            ->withRatingModelId(array_key_exists('ratingModelId', $data) && $data['ratingModelId'] !== null ? $data['ratingModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withInitialValue(array_key_exists('initialValue', $data) && $data['initialValue'] !== null ? $data['initialValue'] : null)
            ->withVolatility(array_key_exists('volatility', $data) && $data['volatility'] !== null ? $data['volatility'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "ratingModelId" => $this->getRatingModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "description" => $this->getDescription(),
            "initialValue" => $this->getInitialValue(),
            "volatility" => $this->getVolatility(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}