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

namespace Gs2\Inventory\Model;

use Gs2\Core\Model\IModel;


/**
 * Item Model
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#itemmodel
 */
class ItemModel implements IModel {
	/**
     * @var string Item Model GRN
	 */
	private $itemModelId;
	/**
     * @var string Item Model name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var int Maximum Stackable Quantity
	 */
	private $stackingLimit;
	/**
     * @var bool Allow Multiple Stacks
	 */
	private $allowMultipleStacks;
	/**
     * @var int Display Order
	 */
	private $sortValue;
    /** @return string|null Item Model GRN */
	public function getItemModelId(): ?string {
		return $this->itemModelId;
	}
    /** @param string|null $itemModelId Item Model GRN */
	public function setItemModelId(?string $itemModelId) {
		$this->itemModelId = $itemModelId;
	}
    /**
     * @param string|null $itemModelId Item Model GRN
     * @return ItemModel
     */
	public function withItemModelId(?string $itemModelId): ItemModel {
		$this->itemModelId = $itemModelId;
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
     * @return ItemModel
     */
	public function withName(?string $name): ItemModel {
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
     * @return ItemModel
     */
	public function withMetadata(?string $metadata): ItemModel {
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
     * @return ItemModel
     */
	public function withStackingLimit(?int $stackingLimit): ItemModel {
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
     * @return ItemModel
     */
	public function withAllowMultipleStacks(?bool $allowMultipleStacks): ItemModel {
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
     * @return ItemModel
     */
	public function withSortValue(?int $sortValue): ItemModel {
		$this->sortValue = $sortValue;
		return $this;
	}

    public static function fromJson(?array $data): ?ItemModel {
        if ($data === null) {
            return null;
        }
        return (new ItemModel())
            ->withItemModelId(array_key_exists('itemModelId', $data) && $data['itemModelId'] !== null ? $data['itemModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withStackingLimit(array_key_exists('stackingLimit', $data) && $data['stackingLimit'] !== null ? $data['stackingLimit'] : null)
            ->withAllowMultipleStacks(array_key_exists('allowMultipleStacks', $data) ? $data['allowMultipleStacks'] : null)
            ->withSortValue(array_key_exists('sortValue', $data) && $data['sortValue'] !== null ? $data['sortValue'] : null);
    }

    public function toJson(): array {
        return array(
            "itemModelId" => $this->getItemModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "stackingLimit" => $this->getStackingLimit(),
            "allowMultipleStacks" => $this->getAllowMultipleStacks(),
            "sortValue" => $this->getSortValue(),
        );
    }
}