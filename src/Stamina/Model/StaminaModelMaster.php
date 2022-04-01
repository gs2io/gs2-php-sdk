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

namespace Gs2\Stamina\Model;

use Gs2\Core\Model\IModel;


class StaminaModelMaster implements IModel {
	/**
     * @var string
	 */
	private $staminaModelId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var string
	 */
	private $description;
	/**
     * @var int
	 */
	private $recoverIntervalMinutes;
	/**
     * @var int
	 */
	private $recoverValue;
	/**
     * @var int
	 */
	private $initialCapacity;
	/**
     * @var bool
	 */
	private $isOverflow;
	/**
     * @var int
	 */
	private $maxCapacity;
	/**
     * @var string
	 */
	private $maxStaminaTableName;
	/**
     * @var string
	 */
	private $recoverIntervalTableName;
	/**
     * @var string
	 */
	private $recoverValueTableName;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getStaminaModelId(): ?string {
		return $this->staminaModelId;
	}

	public function setStaminaModelId(?string $staminaModelId) {
		$this->staminaModelId = $staminaModelId;
	}

	public function withStaminaModelId(?string $staminaModelId): StaminaModelMaster {
		$this->staminaModelId = $staminaModelId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): StaminaModelMaster {
		$this->name = $name;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): StaminaModelMaster {
		$this->metadata = $metadata;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): StaminaModelMaster {
		$this->description = $description;
		return $this;
	}

	public function getRecoverIntervalMinutes(): ?int {
		return $this->recoverIntervalMinutes;
	}

	public function setRecoverIntervalMinutes(?int $recoverIntervalMinutes) {
		$this->recoverIntervalMinutes = $recoverIntervalMinutes;
	}

	public function withRecoverIntervalMinutes(?int $recoverIntervalMinutes): StaminaModelMaster {
		$this->recoverIntervalMinutes = $recoverIntervalMinutes;
		return $this;
	}

	public function getRecoverValue(): ?int {
		return $this->recoverValue;
	}

	public function setRecoverValue(?int $recoverValue) {
		$this->recoverValue = $recoverValue;
	}

	public function withRecoverValue(?int $recoverValue): StaminaModelMaster {
		$this->recoverValue = $recoverValue;
		return $this;
	}

	public function getInitialCapacity(): ?int {
		return $this->initialCapacity;
	}

	public function setInitialCapacity(?int $initialCapacity) {
		$this->initialCapacity = $initialCapacity;
	}

	public function withInitialCapacity(?int $initialCapacity): StaminaModelMaster {
		$this->initialCapacity = $initialCapacity;
		return $this;
	}

	public function getIsOverflow(): ?bool {
		return $this->isOverflow;
	}

	public function setIsOverflow(?bool $isOverflow) {
		$this->isOverflow = $isOverflow;
	}

	public function withIsOverflow(?bool $isOverflow): StaminaModelMaster {
		$this->isOverflow = $isOverflow;
		return $this;
	}

	public function getMaxCapacity(): ?int {
		return $this->maxCapacity;
	}

	public function setMaxCapacity(?int $maxCapacity) {
		$this->maxCapacity = $maxCapacity;
	}

	public function withMaxCapacity(?int $maxCapacity): StaminaModelMaster {
		$this->maxCapacity = $maxCapacity;
		return $this;
	}

	public function getMaxStaminaTableName(): ?string {
		return $this->maxStaminaTableName;
	}

	public function setMaxStaminaTableName(?string $maxStaminaTableName) {
		$this->maxStaminaTableName = $maxStaminaTableName;
	}

	public function withMaxStaminaTableName(?string $maxStaminaTableName): StaminaModelMaster {
		$this->maxStaminaTableName = $maxStaminaTableName;
		return $this;
	}

	public function getRecoverIntervalTableName(): ?string {
		return $this->recoverIntervalTableName;
	}

	public function setRecoverIntervalTableName(?string $recoverIntervalTableName) {
		$this->recoverIntervalTableName = $recoverIntervalTableName;
	}

	public function withRecoverIntervalTableName(?string $recoverIntervalTableName): StaminaModelMaster {
		$this->recoverIntervalTableName = $recoverIntervalTableName;
		return $this;
	}

	public function getRecoverValueTableName(): ?string {
		return $this->recoverValueTableName;
	}

	public function setRecoverValueTableName(?string $recoverValueTableName) {
		$this->recoverValueTableName = $recoverValueTableName;
	}

	public function withRecoverValueTableName(?string $recoverValueTableName): StaminaModelMaster {
		$this->recoverValueTableName = $recoverValueTableName;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): StaminaModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): StaminaModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?StaminaModelMaster {
        if ($data === null) {
            return null;
        }
        return (new StaminaModelMaster())
            ->withStaminaModelId(array_key_exists('staminaModelId', $data) && $data['staminaModelId'] !== null ? $data['staminaModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withRecoverIntervalMinutes(array_key_exists('recoverIntervalMinutes', $data) && $data['recoverIntervalMinutes'] !== null ? $data['recoverIntervalMinutes'] : null)
            ->withRecoverValue(array_key_exists('recoverValue', $data) && $data['recoverValue'] !== null ? $data['recoverValue'] : null)
            ->withInitialCapacity(array_key_exists('initialCapacity', $data) && $data['initialCapacity'] !== null ? $data['initialCapacity'] : null)
            ->withIsOverflow($data['isOverflow'])
            ->withMaxCapacity(array_key_exists('maxCapacity', $data) && $data['maxCapacity'] !== null ? $data['maxCapacity'] : null)
            ->withMaxStaminaTableName(array_key_exists('maxStaminaTableName', $data) && $data['maxStaminaTableName'] !== null ? $data['maxStaminaTableName'] : null)
            ->withRecoverIntervalTableName(array_key_exists('recoverIntervalTableName', $data) && $data['recoverIntervalTableName'] !== null ? $data['recoverIntervalTableName'] : null)
            ->withRecoverValueTableName(array_key_exists('recoverValueTableName', $data) && $data['recoverValueTableName'] !== null ? $data['recoverValueTableName'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "staminaModelId" => $this->getStaminaModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "description" => $this->getDescription(),
            "recoverIntervalMinutes" => $this->getRecoverIntervalMinutes(),
            "recoverValue" => $this->getRecoverValue(),
            "initialCapacity" => $this->getInitialCapacity(),
            "isOverflow" => $this->getIsOverflow(),
            "maxCapacity" => $this->getMaxCapacity(),
            "maxStaminaTableName" => $this->getMaxStaminaTableName(),
            "recoverIntervalTableName" => $this->getRecoverIntervalTableName(),
            "recoverValueTableName" => $this->getRecoverValueTableName(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}