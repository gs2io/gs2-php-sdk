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


class Status implements IModel {
	/**
     * @var string
	 */
	private $statusId;
	/**
     * @var string
	 */
	private $experienceName;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $propertyId;
	/**
     * @var int
	 */
	private $experienceValue;
	/**
     * @var int
	 */
	private $rankValue;
	/**
     * @var int
	 */
	private $rankCapValue;
	/**
     * @var int
	 */
	private $nextRankUpExperienceValue;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	/**
     * @var int
	 */
	private $revision;
	public function getStatusId(): ?string {
		return $this->statusId;
	}
	public function setStatusId(?string $statusId) {
		$this->statusId = $statusId;
	}
	public function withStatusId(?string $statusId): Status {
		$this->statusId = $statusId;
		return $this;
	}
	public function getExperienceName(): ?string {
		return $this->experienceName;
	}
	public function setExperienceName(?string $experienceName) {
		$this->experienceName = $experienceName;
	}
	public function withExperienceName(?string $experienceName): Status {
		$this->experienceName = $experienceName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): Status {
		$this->userId = $userId;
		return $this;
	}
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
	public function withPropertyId(?string $propertyId): Status {
		$this->propertyId = $propertyId;
		return $this;
	}
	public function getExperienceValue(): ?int {
		return $this->experienceValue;
	}
	public function setExperienceValue(?int $experienceValue) {
		$this->experienceValue = $experienceValue;
	}
	public function withExperienceValue(?int $experienceValue): Status {
		$this->experienceValue = $experienceValue;
		return $this;
	}
	public function getRankValue(): ?int {
		return $this->rankValue;
	}
	public function setRankValue(?int $rankValue) {
		$this->rankValue = $rankValue;
	}
	public function withRankValue(?int $rankValue): Status {
		$this->rankValue = $rankValue;
		return $this;
	}
	public function getRankCapValue(): ?int {
		return $this->rankCapValue;
	}
	public function setRankCapValue(?int $rankCapValue) {
		$this->rankCapValue = $rankCapValue;
	}
	public function withRankCapValue(?int $rankCapValue): Status {
		$this->rankCapValue = $rankCapValue;
		return $this;
	}
	public function getNextRankUpExperienceValue(): ?int {
		return $this->nextRankUpExperienceValue;
	}
	public function setNextRankUpExperienceValue(?int $nextRankUpExperienceValue) {
		$this->nextRankUpExperienceValue = $nextRankUpExperienceValue;
	}
	public function withNextRankUpExperienceValue(?int $nextRankUpExperienceValue): Status {
		$this->nextRankUpExperienceValue = $nextRankUpExperienceValue;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Status {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): Status {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
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