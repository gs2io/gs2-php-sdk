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


class StaminaModel implements IModel {
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
     * @var MaxStaminaTable
	 */
	private $maxStaminaTable;
	/**
     * @var RecoverIntervalTable
	 */
	private $recoverIntervalTable;
	/**
     * @var RecoverValueTable
	 */
	private $recoverValueTable;

	public function getStaminaModelId(): ?string {
		return $this->staminaModelId;
	}

	public function setStaminaModelId(?string $staminaModelId) {
		$this->staminaModelId = $staminaModelId;
	}

	public function withStaminaModelId(?string $staminaModelId): StaminaModel {
		$this->staminaModelId = $staminaModelId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): StaminaModel {
		$this->name = $name;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): StaminaModel {
		$this->metadata = $metadata;
		return $this;
	}

	public function getRecoverIntervalMinutes(): ?int {
		return $this->recoverIntervalMinutes;
	}

	public function setRecoverIntervalMinutes(?int $recoverIntervalMinutes) {
		$this->recoverIntervalMinutes = $recoverIntervalMinutes;
	}

	public function withRecoverIntervalMinutes(?int $recoverIntervalMinutes): StaminaModel {
		$this->recoverIntervalMinutes = $recoverIntervalMinutes;
		return $this;
	}

	public function getRecoverValue(): ?int {
		return $this->recoverValue;
	}

	public function setRecoverValue(?int $recoverValue) {
		$this->recoverValue = $recoverValue;
	}

	public function withRecoverValue(?int $recoverValue): StaminaModel {
		$this->recoverValue = $recoverValue;
		return $this;
	}

	public function getInitialCapacity(): ?int {
		return $this->initialCapacity;
	}

	public function setInitialCapacity(?int $initialCapacity) {
		$this->initialCapacity = $initialCapacity;
	}

	public function withInitialCapacity(?int $initialCapacity): StaminaModel {
		$this->initialCapacity = $initialCapacity;
		return $this;
	}

	public function getIsOverflow(): ?bool {
		return $this->isOverflow;
	}

	public function setIsOverflow(?bool $isOverflow) {
		$this->isOverflow = $isOverflow;
	}

	public function withIsOverflow(?bool $isOverflow): StaminaModel {
		$this->isOverflow = $isOverflow;
		return $this;
	}

	public function getMaxCapacity(): ?int {
		return $this->maxCapacity;
	}

	public function setMaxCapacity(?int $maxCapacity) {
		$this->maxCapacity = $maxCapacity;
	}

	public function withMaxCapacity(?int $maxCapacity): StaminaModel {
		$this->maxCapacity = $maxCapacity;
		return $this;
	}

	public function getMaxStaminaTable(): ?MaxStaminaTable {
		return $this->maxStaminaTable;
	}

	public function setMaxStaminaTable(?MaxStaminaTable $maxStaminaTable) {
		$this->maxStaminaTable = $maxStaminaTable;
	}

	public function withMaxStaminaTable(?MaxStaminaTable $maxStaminaTable): StaminaModel {
		$this->maxStaminaTable = $maxStaminaTable;
		return $this;
	}

	public function getRecoverIntervalTable(): ?RecoverIntervalTable {
		return $this->recoverIntervalTable;
	}

	public function setRecoverIntervalTable(?RecoverIntervalTable $recoverIntervalTable) {
		$this->recoverIntervalTable = $recoverIntervalTable;
	}

	public function withRecoverIntervalTable(?RecoverIntervalTable $recoverIntervalTable): StaminaModel {
		$this->recoverIntervalTable = $recoverIntervalTable;
		return $this;
	}

	public function getRecoverValueTable(): ?RecoverValueTable {
		return $this->recoverValueTable;
	}

	public function setRecoverValueTable(?RecoverValueTable $recoverValueTable) {
		$this->recoverValueTable = $recoverValueTable;
	}

	public function withRecoverValueTable(?RecoverValueTable $recoverValueTable): StaminaModel {
		$this->recoverValueTable = $recoverValueTable;
		return $this;
	}

    public static function fromJson(?array $data): ?StaminaModel {
        if ($data === null) {
            return null;
        }
        return (new StaminaModel())
            ->withStaminaModelId(empty($data['staminaModelId']) ? null : $data['staminaModelId'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withRecoverIntervalMinutes(empty($data['recoverIntervalMinutes']) && $data['recoverIntervalMinutes'] !== 0 ? null : $data['recoverIntervalMinutes'])
            ->withRecoverValue(empty($data['recoverValue']) && $data['recoverValue'] !== 0 ? null : $data['recoverValue'])
            ->withInitialCapacity(empty($data['initialCapacity']) && $data['initialCapacity'] !== 0 ? null : $data['initialCapacity'])
            ->withIsOverflow(empty($data['isOverflow']) ? null : $data['isOverflow'])
            ->withMaxCapacity(empty($data['maxCapacity']) && $data['maxCapacity'] !== 0 ? null : $data['maxCapacity'])
            ->withMaxStaminaTable(empty($data['maxStaminaTable']) ? null : MaxStaminaTable::fromJson($data['maxStaminaTable']))
            ->withRecoverIntervalTable(empty($data['recoverIntervalTable']) ? null : RecoverIntervalTable::fromJson($data['recoverIntervalTable']))
            ->withRecoverValueTable(empty($data['recoverValueTable']) ? null : RecoverValueTable::fromJson($data['recoverValueTable']));
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