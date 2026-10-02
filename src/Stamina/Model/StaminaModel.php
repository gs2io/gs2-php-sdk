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
 * Stamina Model
 *
 * @see https://docs.gs2.io/api_reference/stamina/sdk/#staminamodel
 */
class StaminaModel implements IModel {
	/**
     * @var string Stamina Model GRN
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
     * @var MaxStaminaTable Max Stamina Table
	 */
	private $maxStaminaTable;
	/**
     * @var RecoverIntervalTable Recover Interval Table
	 */
	private $recoverIntervalTable;
	/**
     * @var RecoverValueTable Recover Value Table
	 */
	private $recoverValueTable;
    /** @return string|null Stamina Model GRN */
	public function getStaminaModelId(): ?string {
		return $this->staminaModelId;
	}
    /** @param string|null $staminaModelId Stamina Model GRN */
	public function setStaminaModelId(?string $staminaModelId) {
		$this->staminaModelId = $staminaModelId;
	}
    /**
     * @param string|null $staminaModelId Stamina Model GRN
     * @return StaminaModel
     */
	public function withStaminaModelId(?string $staminaModelId): StaminaModel {
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
     * @return StaminaModel
     */
	public function withName(?string $name): StaminaModel {
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
     * @return StaminaModel
     */
	public function withMetadata(?string $metadata): StaminaModel {
		$this->metadata = $metadata;
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
     * @return StaminaModel
     */
	public function withRecoverIntervalMinutes(?int $recoverIntervalMinutes): StaminaModel {
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
     * @return StaminaModel
     */
	public function withRecoverValue(?int $recoverValue): StaminaModel {
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
     * @return StaminaModel
     */
	public function withInitialCapacity(?int $initialCapacity): StaminaModel {
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
     * @return StaminaModel
     */
	public function withIsOverflow(?bool $isOverflow): StaminaModel {
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
     * @return StaminaModel
     */
	public function withMaxCapacity(?int $maxCapacity): StaminaModel {
		$this->maxCapacity = $maxCapacity;
		return $this;
	}
    /** @return MaxStaminaTable|null Max Stamina Table */
	public function getMaxStaminaTable(): ?MaxStaminaTable {
		return $this->maxStaminaTable;
	}
    /** @param MaxStaminaTable|null $maxStaminaTable Max Stamina Table */
	public function setMaxStaminaTable(?MaxStaminaTable $maxStaminaTable) {
		$this->maxStaminaTable = $maxStaminaTable;
	}
    /**
     * @param MaxStaminaTable|null $maxStaminaTable Max Stamina Table
     * @return StaminaModel
     */
	public function withMaxStaminaTable(?MaxStaminaTable $maxStaminaTable): StaminaModel {
		$this->maxStaminaTable = $maxStaminaTable;
		return $this;
	}
    /** @return RecoverIntervalTable|null Recover Interval Table */
	public function getRecoverIntervalTable(): ?RecoverIntervalTable {
		return $this->recoverIntervalTable;
	}
    /** @param RecoverIntervalTable|null $recoverIntervalTable Recover Interval Table */
	public function setRecoverIntervalTable(?RecoverIntervalTable $recoverIntervalTable) {
		$this->recoverIntervalTable = $recoverIntervalTable;
	}
    /**
     * @param RecoverIntervalTable|null $recoverIntervalTable Recover Interval Table
     * @return StaminaModel
     */
	public function withRecoverIntervalTable(?RecoverIntervalTable $recoverIntervalTable): StaminaModel {
		$this->recoverIntervalTable = $recoverIntervalTable;
		return $this;
	}
    /** @return RecoverValueTable|null Recover Value Table */
	public function getRecoverValueTable(): ?RecoverValueTable {
		return $this->recoverValueTable;
	}
    /** @param RecoverValueTable|null $recoverValueTable Recover Value Table */
	public function setRecoverValueTable(?RecoverValueTable $recoverValueTable) {
		$this->recoverValueTable = $recoverValueTable;
	}
    /**
     * @param RecoverValueTable|null $recoverValueTable Recover Value Table
     * @return StaminaModel
     */
	public function withRecoverValueTable(?RecoverValueTable $recoverValueTable): StaminaModel {
		$this->recoverValueTable = $recoverValueTable;
		return $this;
	}

    public static function fromJson(?array $data): ?StaminaModel {
        if ($data === null) {
            return null;
        }
        return (new StaminaModel())
            ->withStaminaModelId(array_key_exists('staminaModelId', $data) && $data['staminaModelId'] !== null ? $data['staminaModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withRecoverIntervalMinutes(array_key_exists('recoverIntervalMinutes', $data) && $data['recoverIntervalMinutes'] !== null ? $data['recoverIntervalMinutes'] : null)
            ->withRecoverValue(array_key_exists('recoverValue', $data) && $data['recoverValue'] !== null ? $data['recoverValue'] : null)
            ->withInitialCapacity(array_key_exists('initialCapacity', $data) && $data['initialCapacity'] !== null ? $data['initialCapacity'] : null)
            ->withIsOverflow(array_key_exists('isOverflow', $data) ? $data['isOverflow'] : null)
            ->withMaxCapacity(array_key_exists('maxCapacity', $data) && $data['maxCapacity'] !== null ? $data['maxCapacity'] : null)
            ->withMaxStaminaTable(array_key_exists('maxStaminaTable', $data) && $data['maxStaminaTable'] !== null ? MaxStaminaTable::fromJson($data['maxStaminaTable']) : null)
            ->withRecoverIntervalTable(array_key_exists('recoverIntervalTable', $data) && $data['recoverIntervalTable'] !== null ? RecoverIntervalTable::fromJson($data['recoverIntervalTable']) : null)
            ->withRecoverValueTable(array_key_exists('recoverValueTable', $data) && $data['recoverValueTable'] !== null ? RecoverValueTable::fromJson($data['recoverValueTable']) : null);
    }

    public function toJson(): array {
        return array(
            "staminaModelId" => $this->getStaminaModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "recoverIntervalMinutes" => $this->getRecoverIntervalMinutes(),
            "recoverValue" => $this->getRecoverValue(),
            "initialCapacity" => $this->getInitialCapacity(),
            "isOverflow" => $this->getIsOverflow(),
            "maxCapacity" => $this->getMaxCapacity(),
            "maxStaminaTable" => $this->getMaxStaminaTable() !== null ? $this->getMaxStaminaTable()->toJson() : null,
            "recoverIntervalTable" => $this->getRecoverIntervalTable() !== null ? $this->getRecoverIntervalTable()->toJson() : null,
            "recoverValueTable" => $this->getRecoverValueTable() !== null ? $this->getRecoverValueTable()->toJson() : null,
        );
    }
}