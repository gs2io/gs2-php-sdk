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
 * Request for getItemModelMaster: Get Item Model Master
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#getitemmodelmaster
 */
class GetItemModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Inventory Model name */
    private $inventoryName;
    /** @var string Item Model name */
    private $itemName;
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
     * @return GetItemModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): GetItemModelMasterRequest {
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
     * @return GetItemModelMasterRequest
     */
	public function withInventoryName(?string $inventoryName): GetItemModelMasterRequest {
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
     * @return GetItemModelMasterRequest
     */
	public function withItemName(?string $itemName): GetItemModelMasterRequest {
		$this->itemName = $itemName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetItemModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new GetItemModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withInventoryName(array_key_exists('inventoryName', $data) && $data['inventoryName'] !== null ? $data['inventoryName'] : null)
            ->withItemName(array_key_exists('itemName', $data) && $data['itemName'] !== null ? $data['itemName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "inventoryName" => $this->getInventoryName(),
            "itemName" => $this->getItemName(),
        );
    }
}