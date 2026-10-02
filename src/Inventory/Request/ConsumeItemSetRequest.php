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
 * Request for consumeItemSet: Consume Item Sets
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#consumeitemset
 */
class ConsumeItemSetRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Inventory Model Name */
    private $inventoryName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Item Model Name */
    private $itemName;
    /** @var int Consumption quantity */
    private $consumeCount;
    /** @var string Name identifying the Item Set */
    private $itemSetName;
    /** @var string */
    private $duplicationAvoider;
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
     * @return ConsumeItemSetRequest
     */
	public function withNamespaceName(?string $namespaceName): ConsumeItemSetRequest {
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
     * @return ConsumeItemSetRequest
     */
	public function withInventoryName(?string $inventoryName): ConsumeItemSetRequest {
		$this->inventoryName = $inventoryName;
		return $this;
	}
    /** @return string|null User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID
     * @return ConsumeItemSetRequest
     */
	public function withAccessToken(?string $accessToken): ConsumeItemSetRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Item Model Name */
	public function getItemName(): ?string {
		return $this->itemName;
	}
    /** @param string|null $itemName Item Model Name */
	public function setItemName(?string $itemName) {
		$this->itemName = $itemName;
	}
    /**
     * @param string|null $itemName Item Model Name
     * @return ConsumeItemSetRequest
     */
	public function withItemName(?string $itemName): ConsumeItemSetRequest {
		$this->itemName = $itemName;
		return $this;
	}
    /** @return int|null Consumption quantity */
	public function getConsumeCount(): ?int {
		return $this->consumeCount;
	}
    /** @param int|null $consumeCount Consumption quantity */
	public function setConsumeCount(?int $consumeCount) {
		$this->consumeCount = $consumeCount;
	}
    /**
     * @param int|null $consumeCount Consumption quantity
     * @return ConsumeItemSetRequest
     */
	public function withConsumeCount(?int $consumeCount): ConsumeItemSetRequest {
		$this->consumeCount = $consumeCount;
		return $this;
	}
    /** @return string|null Name identifying the Item Set */
	public function getItemSetName(): ?string {
		return $this->itemSetName;
	}
    /** @param string|null $itemSetName Name identifying the Item Set */
	public function setItemSetName(?string $itemSetName) {
		$this->itemSetName = $itemSetName;
	}
    /**
     * @param string|null $itemSetName Name identifying the Item Set
     * @return ConsumeItemSetRequest
     */
	public function withItemSetName(?string $itemSetName): ConsumeItemSetRequest {
		$this->itemSetName = $itemSetName;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): ConsumeItemSetRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?ConsumeItemSetRequest {
        if ($data === null) {
            return null;
        }
        return (new ConsumeItemSetRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withInventoryName(array_key_exists('inventoryName', $data) && $data['inventoryName'] !== null ? $data['inventoryName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withItemName(array_key_exists('itemName', $data) && $data['itemName'] !== null ? $data['itemName'] : null)
            ->withConsumeCount(array_key_exists('consumeCount', $data) && $data['consumeCount'] !== null ? $data['consumeCount'] : null)
            ->withItemSetName(array_key_exists('itemSetName', $data) && $data['itemSetName'] !== null ? $data['itemSetName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "inventoryName" => $this->getInventoryName(),
            "accessToken" => $this->getAccessToken(),
            "itemName" => $this->getItemName(),
            "consumeCount" => $this->getConsumeCount(),
            "itemSetName" => $this->getItemSetName(),
        );
    }
}