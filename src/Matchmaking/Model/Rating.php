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
 * Rating
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#rating
 */
class Rating implements IModel {
	/**
     * @var string Rating GRN
	 */
	private $ratingId;
	/**
     * @var string Rating name
	 */
	private $name;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var float Rate Value
	 */
	private $rateValue;
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
    /** @return string|null Rating GRN */
	public function getRatingId(): ?string {
		return $this->ratingId;
	}
    /** @param string|null $ratingId Rating GRN */
	public function setRatingId(?string $ratingId) {
		$this->ratingId = $ratingId;
	}
    /**
     * @param string|null $ratingId Rating GRN
     * @return Rating
     */
	public function withRatingId(?string $ratingId): Rating {
		$this->ratingId = $ratingId;
		return $this;
	}
    /** @return string|null Rating name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Rating name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Rating name
     * @return Rating
     */
	public function withName(?string $name): Rating {
		$this->name = $name;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return Rating
     */
	public function withUserId(?string $userId): Rating {
		$this->userId = $userId;
		return $this;
	}
    /** @return float|null Rate Value */
	public function getRateValue(): ?float {
		return $this->rateValue;
	}
    /** @param float|null $rateValue Rate Value */
	public function setRateValue(?float $rateValue) {
		$this->rateValue = $rateValue;
	}
    /**
     * @param float|null $rateValue Rate Value
     * @return Rating
     */
	public function withRateValue(?float $rateValue): Rating {
		$this->rateValue = $rateValue;
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
     * @return Rating
     */
	public function withCreatedAt(?int $createdAt): Rating {
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
     * @return Rating
     */
	public function withUpdatedAt(?int $updatedAt): Rating {
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
     * @return Rating
     */
	public function withRevision(?int $revision): Rating {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Rating {
        if ($data === null) {
            return null;
        }
        return (new Rating())
            ->withRatingId(array_key_exists('ratingId', $data) && $data['ratingId'] !== null ? $data['ratingId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withRateValue(array_key_exists('rateValue', $data) && $data['rateValue'] !== null ? $data['rateValue'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "ratingId" => $this->getRatingId(),
            "name" => $this->getName(),
            "userId" => $this->getUserId(),
            "rateValue" => $this->getRateValue(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}