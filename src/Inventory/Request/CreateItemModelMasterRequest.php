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

class CreateItemModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $inventoryName;
    /** @var string */
    private $name;
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

	public function withNamespaceName(?string $namespaceName): CreateItemModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getInventoryName(): ?string {
		return $this->inventoryName;
	}

	public function setInventoryName(?string $inventoryName) {
		$this->inventoryName = $inventoryName;
	}

	public function withInventoryName(?string $inventoryName): CreateItemModelMasterRequest {
		$this->inventoryName = $inventoryName;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): CreateItemModelMasterRequest {
		$this->name = $name;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): CreateItemModelMasterRequest {
		$this->description = $description;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): CreateItemModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getStackingLimit(): ?int {
		return $this->stackingLimit;
	}

	public function setStackingLimit(?int $stackingLimit) {
		$this->stackingLimit = $stackingLimit;
	}

	public function withStackingLimit(?int $stackingLimit): CreateItemModelMasterRequest {
		$this->stackingLimit = $stackingLimit;
		return $this;
	}

	public function getAllowMultipleStacks(): ?bool {
		return $this->allowMultipleStacks;
	}

	public function setAllowMultipleStacks(?bool $allowMultipleStacks) {
		$this->allowMultipleStacks = $allowMultipleStacks;
	}

	public function withAllowMultipleStacks(?bool $allowMultipleStacks): CreateItemModelMasterRequest {
		$this->allowMultipleStacks = $allowMultipleStacks;
		return $this;
	}

	public function getSortValue(): ?int {
		return $this->sortValue;
	}

	public function setSortValue(?int $sortValue) {
		$this->sortValue = $sortValue;
	}

	public function withSortValue(?int $sortValue): CreateItemModelMasterRequest {
		$this->sortValue = $sortValue;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateItemModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateItemModelMasterRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withInventoryName(empty($data['inventoryName']) ? null : $data['inventoryName'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withStackingLimit(empty($data['stackingLimit']) && $data['stackingLimit'] !== 0 ? null : $data['stackingLimit'])
            ->withAllowMultipleStacks($data['allowMultipleStacks'])
            ->withSortValue(empty($data['sortValue']) && $data['sortValue'] !== 0 ? null : $data['sortValue']);
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