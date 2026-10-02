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
 * Status
 *
 * @see https://docs.gs2.io/api_reference/experience/sdk/#status
 */
class Status implements IModel {
	/**
     * @var string Status GRN
	 */
	private $statusId;
	/**
     * @var string Experience Model name
	 */
	private $experienceName;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Property ID
	 */
	private $propertyId;
	/**
     * @var int Cumulative experience gained
	 */
	private $experienceValue;
	/**
     * @var int Current Rank
	 */
	private $rankValue;
	/**
     * @var int Current Rank Cap
	 */
	private $rankCapValue;
	/**
     * @var int Experience points required for the next rank-up
	 */
	private $nextRankUpExperienceValue;
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
    /** @return string|null Experience Model name */
	public function getExperienceName(): ?string {
		return $this->experienceName;
	}
    /** @param string|null $experienceName Experience Model name */
	public function setExperienceName(?string $experienceName) {
		$this->experienceName = $experienceName;
	}
    /**
     * @param string|null $experienceName Experience Model name
     * @return Status
     */
	public function withExperienceName(?string $experienceName): Status {
		$this->experienceName = $experienceName;
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
    /** @return string|null Property ID */
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
    /** @param string|null $propertyId Property ID */
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
    /**
     * @param string|null $propertyId Property ID
     * @return Status
     */
	public function withPropertyId(?string $propertyId): Status {
		$this->propertyId = $propertyId;
		return $this;
	}
    /** @return int|null Cumulative experience gained */
	public function getExperienceValue(): ?int {
		return $this->experienceValue;
	}
    /** @param int|null $experienceValue Cumulative experience gained */
	public function setExperienceValue(?int $experienceValue) {
		$this->experienceValue = $experienceValue;
	}
    /**
     * @param int|null $experienceValue Cumulative experience gained
     * @return Status
     */
	public function withExperienceValue(?int $experienceValue): Status {
		$this->experienceValue = $experienceValue;
		return $this;
	}
    /** @return int|null Current Rank */
	public function getRankValue(): ?int {
		return $this->rankValue;
	}
    /** @param int|null $rankValue Current Rank */
	public function setRankValue(?int $rankValue) {
		$this->rankValue = $rankValue;
	}
    /**
     * @param int|null $rankValue Current Rank
     * @return Status
     */
	public function withRankValue(?int $rankValue): Status {
		$this->rankValue = $rankValue;
		return $this;
	}
    /** @return int|null Current Rank Cap */
	public function getRankCapValue(): ?int {
		return $this->rankCapValue;
	}
    /** @param int|null $rankCapValue Current Rank Cap */
	public function setRankCapValue(?int $rankCapValue) {
		$this->rankCapValue = $rankCapValue;
	}
    /**
     * @param int|null $rankCapValue Current Rank Cap
     * @return Status
     */
	public function withRankCapValue(?int $rankCapValue): Status {
		$this->rankCapValue = $rankCapValue;
		return $this;
	}
    /** @return int|null Experience points required for the next rank-up */
	public function getNextRankUpExperienceValue(): ?int {
		return $this->nextRankUpExperienceValue;
	}
    /** @param int|null $nextRankUpExperienceValue Experience points required for the next rank-up */
	public function setNextRankUpExperienceValue(?int $nextRankUpExperienceValue) {
		$this->nextRankUpExperienceValue = $nextRankUpExperienceValue;
	}
    /**
     * @param int|null $nextRankUpExperienceValue Experience points required for the next rank-up
     * @return Status
     */
	public function withNextRankUpExperienceValue(?int $nextRankUpExperienceValue): Status {
		$this->nextRankUpExperienceValue = $nextRankUpExperienceValue;
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
            ->withExperienceName(array_key_exists('experienceName', $data) && $data['experienceName'] !== null ? $data['experienceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withExperienceValue(array_key_exists('experienceValue', $data) && $data['experienceValue'] !== null ? $data['experienceValue'] : null)
            ->withRankValue(array_key_exists('rankValue', $data) && $data['rankValue'] !== null ? $data['rankValue'] : null)
            ->withRankCapValue(array_key_exists('rankCapValue', $data) && $data['rankCapValue'] !== null ? $data['rankCapValue'] : null)
            ->withNextRankUpExperienceValue(array_key_exists('nextRankUpExperienceValue', $data) && $data['nextRankUpExperienceValue'] !== null ? $data['nextRankUpExperienceValue'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "statusId" => $this->getStatusId(),
            "experienceName" => $this->getExperienceName(),
            "userId" => $this->getUserId(),
            "propertyId" => $this->getPropertyId(),
            "experienceValue" => $this->getExperienceValue(),
            "rankValue" => $this->getRankValue(),
            "rankCapValue" => $this->getRankCapValue(),
            "nextRankUpExperienceValue" => $this->getNextRankUpExperienceValue(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}