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

namespace Gs2\Limit\Model;

use Gs2\Core\Model\IModel;


class LimitModelMaster implements IModel {
	/**
     * @var string
	 */
	private $limitModelId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $description;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var string
	 */
	private $resetType;
	/**
     * @var int
	 */
	private $resetDayOfMonth;
	/**
     * @var string
	 */
	private $resetDayOfWeek;
	/**
     * @var int
	 */
	private $resetHour;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getLimitModelId(): ?string {
		return $this->limitModelId;
	}

	public function setLimitModelId(?string $limitModelId) {
		$this->limitModelId = $limitModelId;
	}

	public function withLimitModelId(?string $limitModelId): LimitModelMaster {
		$this->limitModelId = $limitModelId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): LimitModelMaster {
		$this->name = $name;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): LimitModelMaster {
		$this->description = $description;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): LimitModelMaster {
		$this->metadata = $metadata;
		return $this;
	}

	public function getResetType(): ?string {
		return $this->resetType;
	}

	public function setResetType(?string $resetType) {
		$this->resetType = $resetType;
	}

	public function withResetType(?string $resetType): LimitModelMaster {
		$this->resetType = $resetType;
		return $this;
	}

	public function getResetDayOfMonth(): ?int {
		return $this->resetDayOfMonth;
	}

	public function setResetDayOfMonth(?int $resetDayOfMonth) {
		$this->resetDayOfMonth = $resetDayOfMonth;
	}

	public function withResetDayOfMonth(?int $resetDayOfMonth): LimitModelMaster {
		$this->resetDayOfMonth = $resetDayOfMonth;
		return $this;
	}

	public function getResetDayOfWeek(): ?string {
		return $this->resetDayOfWeek;
	}

	public function setResetDayOfWeek(?string $resetDayOfWeek) {
		$this->resetDayOfWeek = $resetDayOfWeek;
	}

	public function withResetDayOfWeek(?string $resetDayOfWeek): LimitModelMaster {
		$this->resetDayOfWeek = $resetDayOfWeek;
		return $this;
	}

	public function getResetHour(): ?int {
		return $this->resetHour;
	}

	public function setResetHour(?int $resetHour) {
		$this->resetHour = $resetHour;
	}

	public function withResetHour(?int $resetHour): LimitModelMaster {
		$this->resetHour = $resetHour;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): LimitModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): LimitModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?LimitModelMaster {
        if ($data === null) {
            return null;
        }
        return (new LimitModelMaster())
            ->withLimitModelId(empty($data['limitModelId']) ? null : $data['limitModelId'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withResetType(empty($data['resetType']) ? null : $data['resetType'])
            ->withResetDayOfMonth(empty($data['resetDayOfMonth']) && $data['resetDayOfMonth'] !== 0 ? null : $data['resetDayOfMonth'])
            ->withResetDayOfWeek(empty($data['resetDayOfWeek']) ? null : $data['resetDayOfWeek'])
            ->withResetHour(empty($data['resetHour']) && $data['resetHour'] !== 0 ? null : $data['resetHour'])
            ->withCreatedAt(empty($data['createdAt']) && $data['createdAt'] !== 0 ? null : $data['createdAt'])
            ->withUpdatedAt(empty($data['updatedAt']) && $data['updatedAt'] !== 0 ? null : $data['updatedAt']);
    }

    public function toJson(): array {
        return array(
            "limitModelId" => $this->getLimitModelId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "resetType" => $this->getResetType(),
            "resetDayOfMonth" => $this->getResetDayOfMonth(),
            "resetDayOfWeek" => $this->getResetDayOfWeek(),
            "resetHour" => $this->getResetHour(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}