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

namespace Gs2\Idle\Model;

use Gs2\Core\Model\IModel;


/**
 * Status
 *
 * @see https://docs.gs2.io/api_reference/idle/sdk/#status
 */
class Status implements IModel {
	/**
     * @var string Status GRN
	 */
	private $statusId;
	/**
     * @var string Category Model Name
	 */
	private $categoryName;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var int Random Seed
	 */
	private $randomSeed;
	/**
     * @var int Idle Minutes
	 */
	private $idleMinutes;
	/**
     * @var int Time when additional rewards can be obtained next
	 */
	private $nextRewardsAt;
	/**
     * @var int Maximum Idle Minutes
	 */
	private $maximumIdleMinutes;
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
    /** @return string|null Status GRN */
	public function getStatusId(): ?string {
		return $this->statusId;
	}
    /** @param string|null $statusId Status GRN */
	public function setStatusId(?string $statusId) {
		$this->statusId = $statusId;
	}
    /**
     * @param string|null $statusId Status GRN
     * @return Status
     */
	public function withStatusId(?string $statusId): Status {
		$this->statusId = $statusId;
		return $this;
	}
    /** @return string|null Category Model Name */
	public function getCategoryName(): ?string {
		return $this->categoryName;
	}
    /** @param string|null $categoryName Category Model Name */
	public function setCategoryName(?string $categoryName) {
		$this->categoryName = $categoryName;
	}
    /**
     * @param string|null $categoryName Category Model Name
     * @return Status
     */
	public function withCategoryName(?string $categoryName): Status {
		$this->categoryName = $categoryName;
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
     * @return Status
     */
	public function withUserId(?string $userId): Status {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Random Seed */
	public function getRandomSeed(): ?int {
		return $this->randomSeed;
	}
    /** @param int|null $randomSeed Random Seed */
	public function setRandomSeed(?int $randomSeed) {
		$this->randomSeed = $randomSeed;
	}
    /**
     * @param int|null $randomSeed Random Seed
     * @return Status
     */
	public function withRandomSeed(?int $randomSeed): Status {
		$this->randomSeed = $randomSeed;
		return $this;
	}
    /** @return int|null Idle Minutes */
	public function getIdleMinutes(): ?int {
		return $this->idleMinutes;
	}
    /** @param int|null $idleMinutes Idle Minutes */
	public function setIdleMinutes(?int $idleMinutes) {
		$this->idleMinutes = $idleMinutes;
	}
    /**
     * @param int|null $idleMinutes Idle Minutes
     * @return Status
     */
	public function withIdleMinutes(?int $idleMinutes): Status {
		$this->idleMinutes = $idleMinutes;
		return $this;
	}
    /** @return int|null Time when additional rewards can be obtained next */
	public function getNextRewardsAt(): ?int {
		return $this->nextRewardsAt;
	}
    /** @param int|null $nextRewardsAt Time when additional rewards can be obtained next */
	public function setNextRewardsAt(?int $nextRewardsAt) {
		$this->nextRewardsAt = $nextRewardsAt;
	}
    /**
     * @param int|null $nextRewardsAt Time when additional rewards can be obtained next
     * @return Status
     */
	public function withNextRewardsAt(?int $nextRewardsAt): Status {
		$this->nextRewardsAt = $nextRewardsAt;
		return $this;
	}
    /** @return int|null Maximum Idle Minutes */
	public function getMaximumIdleMinutes(): ?int {
		return $this->maximumIdleMinutes;
	}
    /** @param int|null $maximumIdleMinutes Maximum Idle Minutes */
	public function setMaximumIdleMinutes(?int $maximumIdleMinutes) {
		$this->maximumIdleMinutes = $maximumIdleMinutes;
	}
    /**
     * @param int|null $maximumIdleMinutes Maximum Idle Minutes
     * @return Status
     */
	public function withMaximumIdleMinutes(?int $maximumIdleMinutes): Status {
		$this->maximumIdleMinutes = $maximumIdleMinutes;
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
     * @return Status
     */
	public function withCreatedAt(?int $createdAt): Status {
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
     * @return Status
     */
	public function withUpdatedAt(?int $updatedAt): Status {
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
     * @return Status
     */
	public function withRevision(?int $revision): Status {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Status {
        if ($data === null) {
            return null;
        }
        return (new Status())
            ->withStatusId(array_key_exists('statusId', $data) && $data['statusId'] !== null ? $data['statusId'] : null)
            ->withCategoryName(array_key_exists('categoryName', $data) && $data['categoryName'] !== null ? $data['categoryName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withRandomSeed(array_key_exists('randomSeed', $data) && $data['randomSeed'] !== null ? $data['randomSeed'] : null)
            ->withIdleMinutes(array_key_exists('idleMinutes', $data) && $data['idleMinutes'] !== null ? $data['idleMinutes'] : null)
            ->withNextRewardsAt(array_key_exists('nextRewardsAt', $data) && $data['nextRewardsAt'] !== null ? $data['nextRewardsAt'] : null)
            ->withMaximumIdleMinutes(array_key_exists('maximumIdleMinutes', $data) && $data['maximumIdleMinutes'] !== null ? $data['maximumIdleMinutes'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "statusId" => $this->getStatusId(),
            "categoryName" => $this->getCategoryName(),
            "userId" => $this->getUserId(),
            "randomSeed" => $this->getRandomSeed(),
            "idleMinutes" => $this->getIdleMinutes(),
            "nextRewardsAt" => $this->getNextRewardsAt(),
            "maximumIdleMinutes" => $this->getMaximumIdleMinutes(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}