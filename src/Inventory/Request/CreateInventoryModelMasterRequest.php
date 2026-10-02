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
 * Request for createInventoryModelMaster: Create Inventory Model Master
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#createinventorymodelmaster
 */
class CreateInventoryModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Inventory Model name */
    private $name;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var int Initial Capacity */
    private $initialCapacity;
    /** @var int Maximum Capacity */
    private $maxCapacity;
    /** @var bool Protect Referenced Items */
    private $protectReferencedItem;
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
     * @return CreateInventoryModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): CreateInventoryModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Inventory Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Inventory Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Inventory Model name
     * @return CreateInventoryModelMasterRequest
     */
	public function withName(?string $name): CreateInventoryModelMasterRequest {
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
     * @return CreateInventoryModelMasterRequest
     */
	public function withDescription(?string $description): CreateInventoryModelMasterRequest {
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
     * @return CreateInventoryModelMasterRequest
     */
	public function withMetadata(?string $metadata): CreateInventoryModelMasterRequest {
		$this->metadata = $metadata;
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
     * @return CreateInventoryModelMasterRequest
     */
	public function withInitialCapacity(?int $initialCapacity): CreateInventoryModelMasterRequest {
		$this->initialCapacity = $initialCapacity;
		return $this;
	}
    /** @return int|null Maximum Capacity */
	public function getMaxCapacity(): ?int {
		return $this->maxCapacity;
	}
    /** @param int|null $maxCapacity Maximum Capacity */
	public function setMaxCapacity(?int $maxCapacity) {
		$this->maxCapacity = $maxCapacity;
	}
    /**
     * @param int|null $maxCapacity Maximum Capacity
     * @return CreateInventoryModelMasterRequest
     */
	public function withMaxCapacity(?int $maxCapacity): CreateInventoryModelMasterRequest {
		$this->maxCapacity = $maxCapacity;
		return $this;
	}
    /** @return bool|null Protect Referenced Items */
	public function getProtectReferencedItem(): ?bool {
		return $this->protectReferencedItem;
	}
    /** @param bool|null $protectReferencedItem Protect Referenced Items */
	public function setProtectReferencedItem(?bool $protectReferencedItem) {
		$this->protectReferencedItem = $protectReferencedItem;
	}
    /**
     * @param bool|null $protectReferencedItem Protect Referenced Items
     * @return CreateInventoryModelMasterRequest
     */
	public function withProtectReferencedItem(?bool $protectReferencedItem): CreateInventoryModelMasterRequest {
		$this->protectReferencedItem = $protectReferencedItem;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateInventoryModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateInventoryModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withInitialCapacity(array_key_exists('initialCapacity', $data) && $data['initialCapacity'] !== null ? $data['initialCapacity'] : null)
            ->withMaxCapacity(array_key_exists('maxCapacity', $data) && $data['maxCapacity'] !== null ? $data['maxCapacity'] : null)
            ->withProtectReferencedItem(array_key_exists('protectReferencedItem', $data) ? $data['protectReferencedItem'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "initialCapacity" => $this->getInitialCapacity(),
            "maxCapacity" => $this->getMaxCapacity(),
            "protectReferencedItem" => $this->getProtectReferencedItem(),
        );
    }
}