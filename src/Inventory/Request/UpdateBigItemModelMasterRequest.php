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
 * Request for updateBigItemModelMaster: Update Big Item Model Master
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#updatebigitemmodelmaster
 */
class UpdateBigItemModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Big Inventory Model name */
    private $inventoryName;
    /** @var string Big Item Model name */
    private $itemName;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
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
     * @return UpdateBigItemModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateBigItemModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Big Inventory Model name */
	public function getInventoryName(): ?string {
		return $this->inventoryName;
	}
    /** @param string|null $inventoryName Big Inventory Model name */
	public function setInventoryName(?string $inventoryName) {
		$this->inventoryName = $inventoryName;
	}
    /**
     * @param string|null $inventoryName Big Inventory Model name
     * @return UpdateBigItemModelMasterRequest
     */
	public function withInventoryName(?string $inventoryName): UpdateBigItemModelMasterRequest {
		$this->inventoryName = $inventoryName;
		return $this;
	}
    /** @return string|null Big Item Model name */
	public function getItemName(): ?string {
		return $this->itemName;
	}
    /** @param string|null $itemName Big Item Model name */
	public function setItemName(?string $itemName) {
		$this->itemName = $itemName;
	}
    /**
     * @param string|null $itemName Big Item Model name
     * @return UpdateBigItemModelMasterRequest
     */
	public function withItemName(?string $itemName): UpdateBigItemModelMasterRequest {
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
     * @return UpdateBigItemModelMasterRequest
     */
	public function withDescription(?string $description): UpdateBigItemModelMasterRequest {
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
     * @return UpdateBigItemModelMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateBigItemModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateBigItemModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateBigItemModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withInventoryName(array_key_exists('inventoryName', $data) && $data['inventoryName'] !== null ? $data['inventoryName'] : null)
            ->withItemName(array_key_exists('itemName', $data) && $data['itemName'] !== null ? $data['itemName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "inventoryName" => $this->getInventoryName(),
            "itemName" => $this->getItemName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
        );
    }
}