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

class CreateStaminaModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $name;
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

	public function withNamespaceName(?string $namespaceName): CreateStaminaModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): CreateStaminaModelMasterRequest {
		$this->name = $name;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): CreateStaminaModelMasterRequest {
		$this->description = $description;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): CreateStaminaModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getRecoverIntervalMinutes(): ?int {
		return $this->recoverIntervalMinutes;
	}

	public function setRecoverIntervalMinutes(?int $recoverIntervalMinutes) {
		$this->recoverIntervalMinutes = $recoverIntervalMinutes;
	}

	public function withRecoverIntervalMinutes(?int $recoverIntervalMinutes): CreateStaminaModelMasterRequest {
		$this->recoverIntervalMinutes = $recoverIntervalMinutes;
		return $this;
	}

	public function getRecoverValue(): ?int {
		return $this->recoverValue;
	}

	public function setRecoverValue(?int $recoverValue) {
		$this->recoverValue = $recoverValue;
	}

	public function withRecoverValue(?int $recoverValue): CreateStaminaModelMasterRequest {
		$this->recoverValue = $recoverValue;
		return $this;
	}

	public function getInitialCapacity(): ?int {
		return $this->initialCapacity;
	}

	public function setInitialCapacity(?int $initialCapacity) {
		$this->initialCapacity = $initialCapacity;
	}

	public function withInitialCapacity(?int $initialCapacity): CreateStaminaModelMasterRequest {
		$this->initialCapacity = $initialCapacity;
		return $this;
	}

	public function getIsOverflow(): ?bool {
		return $this->isOverflow;
	}

	public function setIsOverflow(?bool $isOverflow) {
		$this->isOverflow = $isOverflow;
	}

	public function withIsOverflow(?bool $isOverflow): CreateStaminaModelMasterRequest {
		$this->isOverflow = $isOverflow;
		return $this;
	}

	public function getMaxCapacity(): ?int {
		return $this->maxCapacity;
	}

	public function setMaxCapacity(?int $maxCapacity) {
		$this->maxCapacity = $maxCapacity;
	}

	public function withMaxCapacity(?int $maxCapacity): CreateStaminaModelMasterRequest {
		$this->maxCapacity = $maxCapacity;
		return $this;
	}

	public function getMaxStaminaTableName(): ?string {
		return $this->maxStaminaTableName;
	}

	public function setMaxStaminaTableName(?string $maxStaminaTableName) {
		$this->maxStaminaTableName = $maxStaminaTableName;
	}

	public function withMaxStaminaTableName(?string $maxStaminaTableName): CreateStaminaModelMasterRequest {
		$this->maxStaminaTableName = $maxStaminaTableName;
		return $this;
	}

	public function getRecoverIntervalTableName(): ?string {
		return $this->recoverIntervalTableName;
	}

	public function setRecoverIntervalTableName(?string $recoverIntervalTableName) {
		$this->recoverIntervalTableName = $recoverIntervalTableName;
	}

	public function withRecoverIntervalTableName(?string $recoverIntervalTableName): CreateStaminaModelMasterRequest {
		$this->recoverIntervalTableName = $recoverIntervalTableName;
		return $this;
	}

	public function getRecoverValueTableName(): ?string {
		return $this->recoverValueTableName;
	}

	public function setRecoverValueTableName(?string $recoverValueTableName) {
		$this->recoverValueTableName = $recoverValueTableName;
	}

	public function withRecoverValueTableName(?string $recoverValueTableName): CreateStaminaModelMasterRequest {
		$this->recoverValueTableName = $recoverValueTableName;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateStaminaModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateStaminaModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withRecoverIntervalMinutes(array_key_exists('recoverIntervalMinutes', $data) && $data['recoverIntervalMinutes'] !== null ? $data['recoverIntervalMinutes'] : null)
            ->withRecoverValue(array_key_exists('recoverValue', $data) && $data['recoverValue'] !== null ? $data['recoverValue'] : null)
            ->withInitialCapacity(array_key_exists('initialCapacity', $data) && $data['initialCapacity'] !== null ? $data['initialCapacity'] : null)
            ->withIsOverflow($data['isOverflow'])
            ->withMaxCapacity(array_key_exists('maxCapacity', $data) && $data['maxCapacity'] !== null ? $data['maxCapacity'] : null)
            ->withMaxStaminaTableName(array_key_exists('maxStaminaTableName', $data) && $data['maxStaminaTableName'] !== null ? $data['maxStaminaTableName'] : null)
            ->withRecoverIntervalTableName(array_key_exists('recoverIntervalTableName', $data) && $data['recoverIntervalTableName'] !== null ? $data['recoverIntervalTableName'] : null)
            ->withRecoverValueTableName(array_key_exists('recoverValueTableName', $data) && $data['recoverValueTableName'] !== null ? $data['recoverValueTableName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "name" => $this->getName(),
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