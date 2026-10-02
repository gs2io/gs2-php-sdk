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
 * Request for updateInventoryModelMaster: Update Inventory Model Master
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#updateinventorymodelmaster
 */
class UpdateInventoryModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Inventory Model name */
    private $inventoryName;
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
     * @return UpdateInventoryModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateInventoryModelMasterRequest {
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
     * @return UpdateInventoryModelMasterRequest
     */
	public function withInventoryName(?string $inventoryName): UpdateInventoryModelMasterRequest {
		$this->inventoryName = $inventoryName;
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
     * @return UpdateInventoryModelMasterRequest
     */
	public function withDescription(?string $description): UpdateInventoryModelMasterRequest {
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
     * @return UpdateInventoryModelMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateInventoryModelMasterRequest {
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
     * @return UpdateInventoryModelMasterRequest
     */
	public function withInitialCapacity(?int $initialCapacity): UpdateInventoryModelMasterRequest {
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
     * @return UpdateInventoryModelMasterRequest
     */
	public function withMaxCapacity(?int $maxCapacity): UpdateInventoryModelMasterRequest {
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
     * @return UpdateInventoryModelMasterRequest
     */
	public function withProtectReferencedItem(?bool $protectReferencedItem): UpdateInventoryModelMasterRequest {
		$this->protectReferencedItem = $protectReferencedItem;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateInventoryModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateInventoryModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withInventoryName(array_key_exists('inventoryName', $data) && $data['inventoryName'] !== null ? $data['inventoryName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withInitialCapacity(array_key_exists('initialCapacity', $data) && $data['initialCapacity'] !== null ? $data['initialCapacity'] : null)
            ->withMaxCapacity(array_key_exists('maxCapacity', $data) && $data['maxCapacity'] !== null ? $data['maxCapacity'] : null)
            ->withProtectReferencedItem(array_key_exists('protectReferencedItem', $data) ? $data['protectReferencedItem'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "inventoryName" => $this->getInventoryName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "initialCapacity" => $this->getInitialCapacity(),
            "maxCapacity" => $this->getMaxCapacity(),
            "protectReferencedItem" => $this->getProtectReferencedItem(),
        );
    }
}