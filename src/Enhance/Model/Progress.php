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

namespace Gs2\Enhance\Model;

use Gs2\Core\Model\IModel;


/**
 * Enhance Progress
 *
 * @see https://docs.gs2.io/api_reference/enhance/sdk/#progress
 */
class Progress implements IModel {
	/**
     * @var string Progress GRN
	 */
	private $progressId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Enhancement Rate Model name
	 */
	private $rateName;
	/**
     * @var string Progress ID
	 */
	private $name;
	/**
     * @var string Property ID to be enhanced
	 */
	private $propertyId;
	/**
     * @var int Experience value obtainable
	 */
	private $experienceValue;
	/**
     * @var float Experience value scale factor
	 */
	private $rate;
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
    /** @return string|null Progress GRN */
	public function getProgressId(): ?string {
		return $this->progressId;
	}
    /** @param string|null $progressId Progress GRN */
	public function setProgressId(?string $progressId) {
		$this->progressId = $progressId;
	}
    /**
     * @param string|null $progressId Progress GRN
     * @return Progress
     */
	public function withProgressId(?string $progressId): Progress {
		$this->progressId = $progressId;
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
     * @return Progress
     */
	public function withUserId(?string $userId): Progress {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Enhancement Rate Model name */
	public function getRateName(): ?string {
		return $this->rateName;
	}
    /** @param string|null $rateName Enhancement Rate Model name */
	public function setRateName(?string $rateName) {
		$this->rateName = $rateName;
	}
    /**
     * @param string|null $rateName Enhancement Rate Model name
     * @return Progress
     */
	public function withRateName(?string $rateName): Progress {
		$this->rateName = $rateName;
		return $this;
	}
    /** @return string|null Progress ID */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Progress ID */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Progress ID
     * @return Progress
     */
	public function withName(?string $name): Progress {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Property ID to be enhanced */
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
    /** @param string|null $propertyId Property ID to be enhanced */
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
    /**
     * @param string|null $propertyId Property ID to be enhanced
     * @return Progress
     */
	public function withPropertyId(?string $propertyId): Progress {
		$this->propertyId = $propertyId;
		return $this;
	}
    /** @return int|null Experience value obtainable */
	public function getExperienceValue(): ?int {
		return $this->experienceValue;
	}
    /** @param int|null $experienceValue Experience value obtainable */
	public function setExperienceValue(?int $experienceValue) {
		$this->experienceValue = $experienceValue;
	}
    /**
     * @param int|null $experienceValue Experience value obtainable
     * @return Progress
     */
	public function withExperienceValue(?int $experienceValue): Progress {
		$this->experienceValue = $experienceValue;
		return $this;
	}
    /** @return float|null Experience value scale factor */
	public function getRate(): ?float {
		return $this->rate;
	}
    /** @param float|null $rate Experience value scale factor */
	public function setRate(?float $rate) {
		$this->rate = $rate;
	}
    /**
     * @param float|null $rate Experience value scale factor
     * @return Progress
     */
	public function withRate(?float $rate): Progress {
		$this->rate = $rate;
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
     * @return Progress
     */
	public function withCreatedAt(?int $createdAt): Progress {
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
     * @return Progress
     */
	public function withUpdatedAt(?int $updatedAt): Progress {
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
     * @return Progress
     */
	public function withRevision(?int $revision): Progress {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Progress {
        if ($data === null) {
            return null;
        }
        return (new Progress())
            ->withProgressId(array_key_exists('progressId', $data) && $data['progressId'] !== null ? $data['progressId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withRateName(array_key_exists('rateName', $data) && $data['rateName'] !== null ? $data['rateName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withExperienceValue(array_key_exists('experienceValue', $data) && $data['experienceValue'] !== null ? $data['experienceValue'] : null)
            ->withRate(array_key_exists('rate', $data) && $data['rate'] !== null ? $data['rate'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "progressId" => $this->getProgressId(),
            "userId" => $this->getUserId(),
            "rateName" => $this->getRateName(),
            "name" => $this->getName(),
            "propertyId" => $this->getPropertyId(),
            "experienceValue" => $this->getExperienceValue(),
            "rate" => $this->getRate(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}