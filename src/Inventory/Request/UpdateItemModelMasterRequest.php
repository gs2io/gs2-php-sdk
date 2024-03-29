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

class UpdateItemModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $inventoryName;
    /** @var string */
    private $itemName;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var int */
    private $stackingLimit;
    /** @var bool */
    private $allowMultipleStacks;
    /** @var int */
    private $sortValue;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): UpdateItemModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getInventoryName(): ?string {
		return $this->inventoryName;
	}
	public function setInventoryName(?string $inventoryName) {
		$this->inventoryName = $inventoryName;
	}
	public function withInventoryName(?string $inventoryName): UpdateItemModelMasterRequest {
		$this->inventoryName = $inventoryName;
		return $this;
	}
	public function getItemName(): ?string {
		return $this->itemName;
	}
	public function setItemName(?string $itemName) {
		$this->itemName = $itemName;
	}
	public function withItemName(?string $itemName): UpdateItemModelMasterRequest {
		$this->itemName = $itemName;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): UpdateItemModelMasterRequest {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): UpdateItemModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
	public function getStackingLimit(): ?int {
		return $this->stackingLimit;
	}
	public function setStackingLimit(?int $stackingLimit) {
		$this->stackingLimit = $stackingLimit;
	}
	public function withStackingLimit(?int $stackingLimit): UpdateItemModelMasterRequest {
		$this->stackingLimit = $stackingLimit;
		return $this;
	}
	public function getAllowMultipleStacks(): ?bool {
		return $this->allowMultipleStacks;
	}
	public function setAllowMultipleStacks(?bool $allowMultipleStacks) {
		$this->allowMultipleStacks = $allowMultipleStacks;
	}
	public function withAllowMultipleStacks(?bool $allowMultipleStacks): UpdateItemModelMasterRequest {
		$this->allowMultipleStacks = $allowMultipleStacks;
		return $this;
	}
	public function getSortValue(): ?int {
		return $this->sortValue;
	}
	public function setSortValue(?int $sortValue) {
		$this->sortValue = $sortValue;
	}
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