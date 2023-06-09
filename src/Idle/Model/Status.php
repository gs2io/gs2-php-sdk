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


class Status implements IModel {
	/**
     * @var string
	 */
	private $statusId;
	/**
     * @var string
	 */
	private $categoryName;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var int
	 */
	private $randomSeed;
	/**
     * @var int
	 */
	private $idleMinutes;
	/**
     * @var int
	 */
	private $maximumIdleMinutes;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
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
	public function getCategoryName(): ?string {
		return $this->categoryName;
	}
	public function setCategoryName(?string $categoryName) {
		$this->categoryName = $categoryName;
	}
	public function withCategoryName(?string $categoryName): Status {
		$this->categoryName = $categoryName;
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
	public function getRandomSeed(): ?int {
		return $this->randomSeed;
	}
	public function setRandomSeed(?int $randomSeed) {
		$this->randomSeed = $randomSeed;
	}
	public function withRandomSeed(?int $randomSeed): Status {
		$this->randomSeed = $randomSeed;
		return $this;
	}
	public function getIdleMinutes(): ?int {
		return $this->idleMinutes;
	}
	public function setIdleMinutes(?int $idleMinutes) {
		$this->idleMinutes = $idleMinutes;
	}
	public function withIdleMinutes(?int $idleMinutes): Status {
		$this->idleMinutes = $idleMinutes;
		return $this;
	}
	public function getMaximumIdleMinutes(): ?int {
		return $this->maximumIdleMinutes;
	}
	public function setMaximumIdleMinutes(?int $maximumIdleMinutes) {
		$this->maximumIdleMinutes = $maximumIdleMinutes;
	}
	public function withMaximumIdleMinutes(?int $maximumIdleMinutes): Status {
		$this->maximumIdleMinutes = $maximumIdleMinutes;
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
            ->withMaximumIdleMinutes(array_key_exists('maximumIdleMinutes', $data) && $data['maximumIdleMinutes'] !== null ? $data['maximumIdleMinutes'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "statusId" => $this->getStatusId(),
            "categoryName" => $this->getCategoryName(),
            "userId" => $this->getUserId(),
            "randomSeed" => $this->getRandomSeed(),
            "idleMinutes" => $this->getIdleMinutes(),
            "maximumIdleMinutes" => $this->getMaximumIdleMinutes(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}