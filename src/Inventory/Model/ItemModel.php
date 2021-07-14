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


class ItemModel implements IModel {
	/**
     * @var string
	 */
	private $itemModelId;
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
	private $stackingLimit;
	/**
     * @var bool
	 */
	private $allowMultipleStacks;
	/**
     * @var int
	 */
	private $sortValue;

	public function getItemModelId(): ?string {
		return $this->itemModelId;
	}

	public function setItemModelId(?string $itemModelId) {
		$this->itemModelId = $itemModelId;
	}

	public function withItemModelId(?string $itemModelId): ItemModel {
		$this->itemModelId = $itemModelId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): ItemModel {
		$this->name = $name;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): ItemModel {
		$this->metadata = $metadata;
		return $this;
	}

	public function getStackingLimit(): ?int {
		return $this->stackingLimit;
	}

	public function setStackingLimit(?int $stackingLimit) {
		$this->stackingLimit = $stackingLimit;
	}

	public function withStackingLimit(?int $stackingLimit): ItemModel {
		$this->stackingLimit = $stackingLimit;
		return $this;
	}

	public function getAllowMultipleStacks(): ?bool {
		return $this->allowMultipleStacks;
	}

	public function setAllowMultipleStacks(?bool $allowMultipleStacks) {
		$this->allowMultipleStacks = $allowMultipleStacks;
	}

	public function withAllowMultipleStacks(?bool $allowMultipleStacks): ItemModel {
		$this->allowMultipleStacks = $allowMultipleStacks;
		return $this;
	}

	public function getSortValue(): ?int {
		return $this->sortValue;
	}

	public function setSortValue(?int $sortValue) {
		$this->sortValue = $sortValue;
	}

	public function withSortValue(?int $sortValue): ItemModel {
		$this->sortValue = $sortValue;
		return $this;
	}

    public static function fromJson(?array $data): ?ItemModel {
        if ($data === null) {
            return null;
        }
        return (new ItemModel())
            ->withItemModelId(empty($data['itemModelId']) ? null : $data['itemModelId'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withStackingLimit(empty($data['stackingLimit']) ? null : $data['stackingLimit'])
            ->withAllowMultipleStacks(empty($data['allowMultipleStacks']) ? null : $data['allowMultipleStacks'])
            ->withSortValue(empty($data['sortValue']) ? null : $data['sortValue']);
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