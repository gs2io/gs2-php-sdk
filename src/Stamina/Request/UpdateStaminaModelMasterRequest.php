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

class UpdateStaminaModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $staminaName;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var int */
    private $recoverIntervalMinutes;
    /** @var int */
    private $recoverValue;
    /** @var int */
    private $initialCapacity;
    /** @var bool */
    private $isOverflow;
    /** @var int */
    private $maxCapacity;
    /** @var string */
    private $maxStaminaTableName;
    /** @var string */
    private $recoverIntervalTableName;
    /** @var string */
    private $recoverValueTableName;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): UpdateStaminaModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getStaminaName(): ?string {
		return $this->staminaName;
	}

	public function setStaminaName(?string $staminaName) {
		$this->staminaName = $staminaName;
	}

	public function withStaminaName(?string $staminaName): UpdateStaminaModelMasterRequest {
		$this->staminaName = $staminaName;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): UpdateStaminaModelMasterRequest {
		$this->description = $description;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): UpdateStaminaModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getRecoverIntervalMinutes(): ?int {
		return $this->recoverIntervalMinutes;
	}

	public function setRecoverIntervalMinutes(?int $recoverIntervalMinutes) {
		$this->recoverIntervalMinutes = $recoverIntervalMinutes;
	}

	public function withRecoverIntervalMinutes(?int $recoverIntervalMinutes): UpdateStaminaModelMasterRequest {
		$this->recoverIntervalMinutes = $recoverIntervalMinutes;
		return $this;
	}

	public function getRecoverValue(): ?int {
		return $this->recoverValue;
	}

	public function setRecoverValue(?int $recoverValue) {
		$this->recoverValue = $recoverValue;
	}

	public function withRecoverValue(?int $recoverValue): UpdateStaminaModelMasterRequest {
		$this->recoverValue = $recoverValue;
		return $this;
	}

	public function getInitialCapacity(): ?int {
		return $this->initialCapacity;
	}

	public function setInitialCapacity(?int $initialCapacity) {
		$this->initialCapacity = $initialCapacity;
	}

	public function withInitialCapacity(?int $initialCapacity): UpdateStaminaModelMasterRequest {
		$this->initialCapacity = $initialCapacity;
		return $this;
	}

	public function getIsOverflow(): ?bool {
		return $this->isOverflow;
	}

	public function setIsOverflow(?bool $isOverflow) {
		$this->isOverflow = $isOverflow;
	}

	public function withIsOverflow(?bool $isOverflow): UpdateStaminaModelMasterRequest {
		$this->isOverflow = $isOverflow;
		return $this;
	}

	public function getMaxCapacity(): ?int {
		return $this->maxCapacity;
	}

	public function setMaxCapacity(?int $maxCapacity) {
		$this->maxCapacity = $maxCapacity;
	}

	public function withMaxCapacity(?int $maxCapacity): UpdateStaminaModelMasterRequest {
		$this->maxCapacity = $maxCapacity;
		return $this;
	}

	public function getMaxStaminaTableName(): ?string {
		return $this->maxStaminaTableName;
	}

	public function setMaxStaminaTableName(?string $maxStaminaTableName) {
		$this->maxStaminaTableName = $maxStaminaTableName;
	}

	public function withMaxStaminaTableName(?string $maxStaminaTableName): UpdateStaminaModelMasterRequest {
		$this->maxStaminaTableName = $maxStaminaTableName;
		return $this;
	}

	public function getRecoverIntervalTableName(): ?string {
		return $this->recoverIntervalTableName;
	}

	public function setRecoverIntervalTableName(?string $recoverIntervalTableName) {
		$this->recoverIntervalTableName = $recoverIntervalTableName;
	}

	public function withRecoverIntervalTableName(?string $recoverIntervalTableName): UpdateStaminaModelMasterRequest {
		$this->recoverIntervalTableName = $recoverIntervalTableName;
		return $this;
	}

	public function getRecoverValueTableName(): ?string {
		return $this->recoverValueTableName;
	}

	public function setRecoverValueTableName(?string $recoverValueTableName) {
		$this->recoverValueTableName = $recoverValueTableName;
	}

	public function withRecoverValueTableName(?string $recoverValueTableName): UpdateStaminaModelMasterRequest {
		$this->recoverValueTableName = $recoverValueTableName;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateStaminaModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateStaminaModelMasterRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withStaminaName(empty($data['staminaName']) ? null : $data['staminaName'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withRecoverIntervalMinutes(empty($data['recoverIntervalMinutes']) && $data['recoverIntervalMinutes'] !== 0 ? null : $data['recoverIntervalMinutes'])
            ->withRecoverValue(empty($data['recoverValue']) && $data['recoverValue'] !== 0 ? null : $data['recoverValue'])
            ->withInitialCapacity(empty($data['initialCapacity']) && $data['initialCapacity'] !== 0 ? null : $data['initialCapacity'])
            ->withIsOverflow(empty($data['isOverflow']) ? null : $data['isOverflow'])
            ->withMaxCapacity(empty($data['maxCapacity']) && $data['maxCapacity'] !== 0 ? null : $data['maxCapacity'])
            ->withMaxStaminaTableName(empty($data['maxStaminaTableName']) ? null : $data['maxStaminaTableName'])
            ->withRecoverIntervalTableName(empty($data['recoverIntervalTableName']) ? null : $data['recoverIntervalTableName'])
            ->withRecoverValueTableName(empty($data['recoverValueTableName']) ? null : $data['recoverValueTableName']);
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