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


/**
 * Stamina Model Master
 *
 * @see https://docs.gs2.io/api_reference/stamina/sdk/#staminamodelmaster
 */
class StaminaModelMaster implements IModel {
	/**
     * @var string Stamina Model Master GRN
	 */
	private $staminaModelId;
	/**
     * @var string Stamina Model name
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
     * @var int Recover Interval Minutes
	 */
	private $recoverIntervalMinutes;
	/**
     * @var int Recover Value
	 */
	private $recoverValue;
	/**
     * @var int Initial Capacity
	 */
	private $initialCapacity;
	/**
     * @var bool Is Overflow
	 */
	private $isOverflow;
	/**
     * @var int Max Capacity
	 */
	private $maxCapacity;
	/**
     * @var string Max Stamina Table Name
	 */
	private $maxStaminaTableName;
	/**
     * @var string Recover Interval Table Name
	 */
	private $recoverIntervalTableName;
	/**
     * @var string Recover Value Table Name
	 */
	private $recoverValueTableName;
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
    /** @return string|null Stamina Model Master GRN */
	public function getStaminaModelId(): ?string {
		return $this->staminaModelId;
	}
    /** @param string|null $staminaModelId Stamina Model Master GRN */
	public function setStaminaModelId(?string $staminaModelId) {
		$this->staminaModelId = $staminaModelId;
	}
    /**
     * @param string|null $staminaModelId Stamina Model Master GRN
     * @return StaminaModelMaster
     */
	public function withStaminaModelId(?string $staminaModelId): StaminaModelMaster {
		$this->staminaModelId = $staminaModelId;
		return $this;
	}
    /** @return string|null Stamina Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Stamina Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Stamina Model name
     * @return StaminaModelMaster
     */
	public function withName(?string $name): StaminaModelMaster {
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
     * @return StaminaModelMaster
     */
	public function withMetadata(?string $metadata): StaminaModelMaster {
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
     * @return StaminaModelMaster
     */
	public function withDescription(?string $description): StaminaModelMaster {
		$this->description = $description;
		return $this;
	}
    /** @return int|null Recover Interval Minutes */
	public function getRecoverIntervalMinutes(): ?int {
		return $this->recoverIntervalMinutes;
	}
    /** @param int|null $recoverIntervalMinutes Recover Interval Minutes */
	public function setRecoverIntervalMinutes(?int $recoverIntervalMinutes) {
		$this->recoverIntervalMinutes = $recoverIntervalMinutes;
	}
    /**
     * @param int|null $recoverIntervalMinutes Recover Interval Minutes
     * @return StaminaModelMaster
     */
	public function withRecoverIntervalMinutes(?int $recoverIntervalMinutes): StaminaModelMaster {
		$this->recoverIntervalMinutes = $recoverIntervalMinutes;
		return $this;
	}
    /** @return int|null Recover Value */
	public function getRecoverValue(): ?int {
		return $this->recoverValue;
	}
    /** @param int|null $recoverValue Recover Value */
	public function setRecoverValue(?int $recoverValue) {
		$this->recoverValue = $recoverValue;
	}
    /**
     * @param int|null $recoverValue Recover Value
     * @return StaminaModelMaster
     */
	public function withRecoverValue(?int $recoverValue): StaminaModelMaster {
		$this->recoverValue = $recoverValue;
		return $this;
	}
    /** @return int|null Initial Capacity */
	public function getInitialCapacity(): ?int {
		return $this->initialCapacity;
	}
    /** @param int|null $initialCapacity Initial Capacity */
	public function setInitialCapacity(?int $initialCapacity) {
		$this->initialCapacity = $initialCapacity;
	}
    /**
     * @param int|null $initialCapacity Initial Capacity
     * @return StaminaModelMaster
     */
	public function withInitialCapacity(?int $initialCapacity): StaminaModelMaster {
		$this->initialCapacity = $initialCapacity;
		return $this;
	}
    /** @return bool|null Is Overflow */
	public function getIsOverflow(): ?bool {
		return $this->isOverflow;
	}
    /** @param bool|null $isOverflow Is Overflow */
	public function setIsOverflow(?bool $isOverflow) {
		$this->isOverflow = $isOverflow;
	}
    /**
     * @param bool|null $isOverflow Is Overflow
     * @return StaminaModelMaster
     */
	public function withIsOverflow(?bool $isOverflow): StaminaModelMaster {
		$this->isOverflow = $isOverflow;
		return $this;
	}
    /** @return int|null Max Capacity */
	public function getMaxCapacity(): ?int {
		return $this->maxCapacity;
	}
    /** @param int|null $maxCapacity Max Capacity */
	public function setMaxCapacity(?int $maxCapacity) {
		$this->maxCapacity = $maxCapacity;
	}
    /**
     * @param int|null $maxCapacity Max Capacity
     * @return StaminaModelMaster
     */
	public function withMaxCapacity(?int $maxCapacity): StaminaModelMaster {
		$this->maxCapacity = $maxCapacity;
		return $this;
	}
    /** @return string|null Max Stamina Table Name */
	public function getMaxStaminaTableName(): ?string {
		return $this->maxStaminaTableName;
	}
    /** @param string|null $maxStaminaTableName Max Stamina Table Name */
	public function setMaxStaminaTableName(?string $maxStaminaTableName) {
		$this->maxStaminaTableName = $maxStaminaTableName;
	}
    /**
     * @param string|null $maxStaminaTableName Max Stamina Table Name
     * @return StaminaModelMaster
     */
	public function withMaxStaminaTableName(?string $maxStaminaTableName): StaminaModelMaster {
		$this->maxStaminaTableName = $maxStaminaTableName;
		return $this;
	}
    /** @return string|null Recover Interval Table Name */
	public function getRecoverIntervalTableName(): ?string {
		return $this->recoverIntervalTableName;
	}
    /** @param string|null $recoverIntervalTableName Recover Interval Table Name */
	public function setRecoverIntervalTableName(?string $recoverIntervalTableName) {
		$this->recoverIntervalTableName = $recoverIntervalTableName;
	}
    /**
     * @param string|null $recoverIntervalTableName Recover Interval Table Name
     * @return StaminaModelMaster
     */
	public function withRecoverIntervalTableName(?string $recoverIntervalTableName): StaminaModelMaster {
		$this->recoverIntervalTableName = $recoverIntervalTableName;
		return $this;
	}
    /** @return string|null Recover Value Table Name */
	public function getRecoverValueTableName(): ?string {
		return $this->recoverValueTableName;
	}
    /** @param string|null $recoverValueTableName Recover Value Table Name */
	public function setRecoverValueTableName(?string $recoverValueTableName) {
		$this->recoverValueTableName = $recoverValueTableName;
	}
    /**
     * @param string|null $recoverValueTableName Recover Value Table Name
     * @return StaminaModelMaster
     */
	public function withRecoverValueTableName(?string $recoverValueTableName): StaminaModelMaster {
		$this->recoverValueTableName = $recoverValueTableName;
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
     * @return StaminaModelMaster
     */
	public function withCreatedAt(?int $createdAt): StaminaModelMaster {
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
     * @return StaminaModelMaster
     */
	public function withUpdatedAt(?int $updatedAt): StaminaModelMaster {
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
     * @return StaminaModelMaster
     */
	public function withRevision(?int $revision): StaminaModelMaster {
		$this->revision = $revision;
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
            ->withIsOverflow(array_key_exists('isOverflow', $data) ? $data['isOverflow'] : null)
            ->withMaxCapacity(array_key_exists('maxCapacity', $data) && $data['maxCapacity'] !== null ? $data['maxCapacity'] : null)
            ->withMaxStaminaTableName(array_key_exists('maxStaminaTableName', $data) && $data['maxStaminaTableName'] !== null ? $data['maxStaminaTableName'] : null)
            ->withRecoverIntervalTableName(array_key_exists('recoverIntervalTableName', $data) && $data['recoverIntervalTableName'] !== null ? $data['recoverIntervalTableName'] : null)
            ->withRecoverValueTableName(array_key_exists('recoverValueTableName', $data) && $data['recoverValueTableName'] !== null ? $data['recoverValueTableName'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
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
            "revision" => $this->getRevision(),
        );
    }
}