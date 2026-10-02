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

namespace Gs2\Inventory\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for createItemModelMaster: Create Item Model Master
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#createitemmodelmaster
 */
class CreateItemModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Inventory Model Name */
    private $inventoryName;
    /** @var string Item Model name */
    private $name;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var int Maximum Stackable Quantity */
    private $stackingLimit;
    /** @var bool Allow Multiple Stacks */
    private $allowMultipleStacks;
    /** @var int Display Order */
    private $sortValue;
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
     * @return CreateItemModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): CreateItemModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Inventory Model Name */
	public function getInventoryName(): ?string {
		return $this->inventoryName;
	}
    /** @param string|null $inventoryName Inventory Model Name */
	public function setInventoryName(?string $inventoryName) {
		$this->inventoryName = $inventoryName;
	}
    /**
     * @param string|null $inventoryName Inventory Model Name
     * @return CreateItemModelMasterRequest
     */
	public function withInventoryName(?string $inventoryName): CreateItemModelMasterRequest {
		$this->inventoryName = $inventoryName;
		return $this;
	}
    /** @return string|null Item Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Item Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Item Model name
     * @return CreateItemModelMasterRequest
     */
	public function withName(?string $name): CreateItemModelMasterRequest {
		$this->name = $name;
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
     * @return CreateItemModelMasterRequest
     */
	public function withDescription(?string $description): CreateItemModelMasterRequest {
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
     * @return CreateItemModelMasterRequest
     */
	public function withMetadata(?string $metadata): CreateItemModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return int|null Maximum Stackable Quantity */
	public function getStackingLimit(): ?int {
		return $this->stackingLimit;
	}
    /** @param int|null $stackingLimit Maximum Stackable Quantity */
	public function setStackingLimit(?int $stackingLimit) {
		$this->stackingLimit = $stackingLimit;
	}
    /**
     * @param int|null $stackingLimit Maximum Stackable Quantity
     * @return CreateItemModelMasterRequest
     */
	public function withStackingLimit(?int $stackingLimit): CreateItemModelMasterRequest {
		$this->stackingLimit = $stackingLimit;
		return $this;
	}
    /** @return bool|null Allow Multiple Stacks */
	public function getAllowMultipleStacks(): ?bool {
		return $this->allowMultipleStacks;
	}
    /** @param bool|null $allowMultipleStacks Allow Multiple Stacks */
	public function setAllowMultipleStacks(?bool $allowMultipleStacks) {
		$this->allowMultipleStacks = $allowMultipleStacks;
	}
    /**
     * @param bool|null $allowMultipleStacks Allow Multiple Stacks
     * @return CreateItemModelMasterRequest
     */
	public function withAllowMultipleStacks(?bool $allowMultipleStacks): CreateItemModelMasterRequest {
		$this->allowMultipleStacks = $allowMultipleStacks;
		return $this;
	}
    /** @return int|null Display Order */
	public function getSortValue(): ?int {
		return $this->sortValue;
	}
    /** @param int|null $sortValue Display Order */
	public function setSortValue(?int $sortValue) {
		$this->sortValue = $sortValue;
	}
    /**
     * @param int|null $sortValue Display Order
     * @return CreateItemModelMasterRequest
     */
	public function withSortValue(?int $sortValue): CreateItemModelMasterRequest {
		$this->sortValue = $sortValue;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateItemModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateItemModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withInventoryName(array_key_exists('inventoryName', $data) && $data['inventoryName'] !== null ? $data['inventoryName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withStackingLimit(array_key_exists('stackingLimit', $data) && $data['stackingLimit'] !== null ? $data['stackingLimit'] : null)
            ->withAllowMultipleStacks(array_key_exists('allowMultipleStacks', $data) ? $data['allowMultipleStacks'] : null)
            ->withSortValue(array_key_exists('sortValue', $data) && $data['sortValue'] !== null ? $data['sortValue'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "inventoryName" => $this->getInventoryName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "stackingLimit" => $this->getStackingLimit(),
            "allowMultipleStacks" => $this->getAllowMultipleStacks(),
            "sortValue" => $this->getSortValue(),
        );
    }
}