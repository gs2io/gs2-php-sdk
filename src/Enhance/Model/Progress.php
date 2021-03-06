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


class Progress implements IModel {
	/**
     * @var string
	 */
	private $progressId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $rateName;
	/**
     * @var string
	 */
	private $propertyId;
	/**
     * @var int
	 */
	private $experienceValue;
	/**
     * @var float
	 */
	private $rate;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getProgressId(): ?string {
		return $this->progressId;
	}

	public function setProgressId(?string $progressId) {
		$this->progressId = $progressId;
	}

	public function withProgressId(?string $progressId): Progress {
		$this->progressId = $progressId;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): Progress {
		$this->userId = $userId;
		return $this;
	}

	public function getRateName(): ?string {
		return $this->rateName;
	}

	public function setRateName(?string $rateName) {
		$this->rateName = $rateName;
	}

	public function withRateName(?string $rateName): Progress {
		$this->rateName = $rateName;
		return $this;
	}

	public function getPropertyId(): ?string {
		return $this->propertyId;
	}

	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}

	public function withPropertyId(?string $propertyId): Progress {
		$this->propertyId = $propertyId;
		return $this;
	}

	public function getExperienceValue(): ?int {
		return $this->experienceValue;
	}

	public function setExperienceValue(?int $experienceValue) {
		$this->experienceValue = $experienceValue;
	}

	public function withExperienceValue(?int $experienceValue): Progress {
		$this->experienceValue = $experienceValue;
		return $this;
	}

	public function getRate(): ?float {
		return $this->rate;
	}

	public function setRate(?float $rate) {
		$this->rate = $rate;
	}

	public function withRate(?float $rate): Progress {
		$this->rate = $rate;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): Progress {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): Progress {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Progress {
        if ($data === null) {
            return null;
        }
        return (new Progress())
            ->withProgressId(empty($data['progressId']) ? null : $data['progressId'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withRateName(empty($data['rateName']) ? null : $data['rateName'])
            ->withPropertyId(empty($data['propertyId']) ? null : $data['propertyId'])
            ->withExperienceValue(empty($data['experienceValue']) ? null : $data['experienceValue'])
            ->withRate(empty($data['rate']) ? null : $data['rate'])
            ->withCreatedAt(empty($data['createdAt']) ? null : $data['createdAt'])
            ->withUpdatedAt(empty($data['updatedAt']) ? null : $data['updatedAt']);
    }

    public function toJson(): array {
        return array(
            "progressId" => $this->getProgressId(),
            "userId" => $this->getUserId(),
            "rateName" => $this->getRateName(),
            "propertyId" => $this->getPropertyId(),
            "experienceValue" => $this->getExperienceValue(),
            "rate" => $this->getRate(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}