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

namespace Gs2\Stamina\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for updateStaminaModelMaster: Update Stamina Model Master
 *
 * @see https://docs.gs2.io/api_reference/stamina/sdk/#updatestaminamodelmaster
 */
class UpdateStaminaModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Stamina Model name */
    private $staminaName;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var int Recover Interval Minutes */
    private $recoverIntervalMinutes;
    /** @var int Recover Value */
    private $recoverValue;
    /** @var int Initial Capacity */
    private $initialCapacity;
    /** @var bool Is Overflow */
    private $isOverflow;
    /** @var int Max Capacity */
    private $maxCapacity;
    /** @var string Max Stamina Table Name */
    private $maxStaminaTableName;
    /** @var string Recover Interval Table Name */
    private $recoverIntervalTableName;
    /** @var string Recover Value Table Name */
    private $recoverValueTableName;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return UpdateStaminaModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateStaminaModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Stamina Model name */
	public function getStaminaName(): ?string {
		return $this->staminaName;
	}
    /** @param string|null $staminaName Stamina Model name */
	public function setStaminaName(?string $staminaName) {
		$this->staminaName = $staminaName;
	}
    /**
     * @param string|null $staminaName Stamina Model name
     * @return UpdateStaminaModelMasterRequest
     */
	public function withStaminaName(?string $staminaName): UpdateStaminaModelMasterRequest {
		$this->staminaName = $staminaName;
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
     * @return UpdateStaminaModelMasterRequest
     */
	public function withDescription(?string $description): UpdateStaminaModelMasterRequest {
		$this->description = $description;
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
     * @return UpdateStaminaModelMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateStaminaModelMasterRequest {
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
     * @return UpdateStaminaModelMasterRequest
     */
	public function withRecoverIntervalMinutes(?int $recoverIntervalMinutes): UpdateStaminaModelMasterRequest {
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
     * @return UpdateStaminaModelMasterRequest
     */
	public function withRecoverValue(?int $recoverValue): UpdateStaminaModelMasterRequest {
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
     * @return UpdateStaminaModelMasterRequest
     */
	public function withInitialCapacity(?int $initialCapacity): UpdateStaminaModelMasterRequest {
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
     * @return UpdateStaminaModelMasterRequest
     */
	public function withIsOverflow(?bool $isOverflow): UpdateStaminaModelMasterRequest {
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
     * @return UpdateStaminaModelMasterRequest
     */
	public function withMaxCapacity(?int $maxCapacity): UpdateStaminaModelMasterRequest {
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
     * @return UpdateStaminaModelMasterRequest
     */
	public function withMaxStaminaTableName(?string $maxStaminaTableName): UpdateStaminaModelMasterRequest {
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
     * @return UpdateStaminaModelMasterRequest
     */
	public function withRecoverIntervalTableName(?string $recoverIntervalTableName): UpdateStaminaModelMasterRequest {
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
     * @return UpdateStaminaModelMasterRequest
     */
	public function withRecoverValueTableName(?string $recoverValueTableName): UpdateStaminaModelMasterRequest {
		$this->recoverValueTableName = $recoverValueTableName;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateStaminaModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateStaminaModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withStaminaName(array_key_exists('staminaName', $data) && $data['staminaName'] !== null ? $data['staminaName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withRecoverIntervalMinutes(array_key_exists('recoverIntervalMinutes', $data) && $data['recoverIntervalMinutes'] !== null ? $data['recoverIntervalMinutes'] : null)
            ->withRecoverValue(array_key_exists('recoverValue', $data) && $data['recoverValue'] !== null ? $data['recoverValue'] : null)
            ->withInitialCapacity(array_key_exists('initialCapacity', $data) && $data['initialCapacity'] !== null ? $data['initialCapacity'] : null)
            ->withIsOverflow(array_key_exists('isOverflow', $data) ? $data['isOverflow'] : null)
            ->withMaxCapacity(array_key_exists('maxCapacity', $data) && $data['maxCapacity'] !== null ? $data['maxCapacity'] : null)
            ->withMaxStaminaTableName(array_key_exists('maxStaminaTableName', $data) && $data['maxStaminaTableName'] !== null ? $data['maxStaminaTableName'] : null)
            ->withRecoverIntervalTableName(array_key_exists('recoverIntervalTableName', $data) && $data['recoverIntervalTableName'] !== null ? $data['recoverIntervalTableName'] : null)
            ->withRecoverValueTableName(array_key_exists('recoverValueTableName', $data) && $data['recoverValueTableName'] !== null ? $data['recoverValueTableName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "staminaName" => $this->getStaminaName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "recoverIntervalMinutes" => $this->getRecoverIntervalMinutes(),
            "recoverValue" => $this->getRecoverValue(),
            "initialCapacity" => $this->getInitialCapacity(),
            "isOverflow" => $this->getIsOverflow(),
            "maxCapacity" => $this->getMaxCapacity(),
            "maxStaminaTableName" => $this->getMaxStaminaTableName(),
            "recoverIntervalTableName" => $this->getRecoverIntervalTableName(),
            "recoverValueTableName" => $this->getRecoverValueTableName(),
        );
    }
}