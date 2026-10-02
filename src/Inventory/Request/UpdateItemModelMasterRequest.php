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
 * Request for updateItemModelMaster: Update Item Model Master
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#updateitemmodelmaster
 */
class UpdateItemModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Inventory Model name */
    private $inventoryName;
    /** @var string Item Model name */
    private $itemName;
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
     * @return UpdateItemModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateItemModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Inventory Model name */
	public function getInventoryName(): ?string {
		return $this->inventoryName;
	}
    /** @param string|null $inventoryName Inventory Model name */
	public function setInventoryName(?string $inventoryName) {
		$this->inventoryName = $inventoryName;
	}
    /**
     * @param string|null $inventoryName Inventory Model name
     * @return UpdateItemModelMasterRequest
     */
	public function withInventoryName(?string $inventoryName): UpdateItemModelMasterRequest {
		$this->inventoryName = $inventoryName;
		return $this;
	}
    /** @return string|null Item Model name */
	public function getItemName(): ?string {
		return $this->itemName;
	}
    /** @param string|null $itemName Item Model name */
	public function setItemName(?string $itemName) {
		$this->itemName = $itemName;
	}
    /**
     * @param string|null $itemName Item Model name
     * @return UpdateItemModelMasterRequest
     */
	public function withItemName(?string $itemName): UpdateItemModelMasterRequest {
		$this->itemName = $itemName;
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
     * @return UpdateItemModelMasterRequest
     */
	public function withDescription(?string $description): UpdateItemModelMasterRequest {
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
     * @return UpdateItemModelMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateItemModelMasterRequest {
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
     * @return UpdateItemModelMasterRequest
     */
	public function withStackingLimit(?int $stackingLimit): UpdateItemModelMasterRequest {
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
     * @return UpdateItemModelMasterRequest
     */
	public function withAllowMultipleStacks(?bool $allowMultipleStacks): UpdateItemModelMasterRequest {
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
     * @return UpdateItemModelMasterRequest
     */
	public function withSortValue(?int $sortValue): UpdateItemModelMasterRequest {
		$this->sortValue = $sortValue;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateItemModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateItemModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withInventoryName(array_key_exists('inventoryName', $data) && $data['inventoryName'] !== null ? $data['inventoryName'] : null)
            ->withItemName(array_key_exists('itemName', $data) && $data['itemName'] !== null ? $data['itemName'] : null)
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
            "itemName" => $this->getItemName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "stackingLimit" => $this->getStackingLimit(),
            "allowMultipleStacks" => $this->getAllowMultipleStacks(),
            "sortValue" => $this->getSortValue(),
        );
    }
}