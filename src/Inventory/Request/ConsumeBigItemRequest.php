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
 * Request for consumeBigItem: Consume Big Items
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#consumebigitem
 */
class ConsumeBigItemRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Big Inventory Model name */
    private $inventoryName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Big Item Model name */
    private $itemName;
    /** @var string Consumption quantity of a Big Item */
    private $consumeCount;
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
     * @return ConsumeBigItemRequest
     */
	public function withNamespaceName(?string $namespaceName): ConsumeBigItemRequest {
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
     * @return ConsumeBigItemRequest
     */
	public function withInventoryName(?string $inventoryName): ConsumeBigItemRequest {
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
     * @return ConsumeBigItemRequest
     */
	public function withAccessToken(?string $accessToken): ConsumeBigItemRequest {
		$this->accessToken = $accessToken;
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
     * @return ConsumeBigItemRequest
     */
	public function withItemName(?string $itemName): ConsumeBigItemRequest {
		$this->itemName = $itemName;
		return $this;
	}
    /** @return string|null Consumption quantity of a Big Item */
	public function getConsumeCount(): ?string {
		return $this->consumeCount;
	}
    /** @param string|null $consumeCount Consumption quantity of a Big Item */
	public function setConsumeCount(?string $consumeCount) {
		$this->consumeCount = $consumeCount;
	}
    /**
     * @param string|null $consumeCount Consumption quantity of a Big Item
     * @return ConsumeBigItemRequest
     */
	public function withConsumeCount(?string $consumeCount): ConsumeBigItemRequest {
		$this->consumeCount = $consumeCount;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): ConsumeBigItemRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?ConsumeBigItemRequest {
        if ($data === null) {
            return null;
        }
        return (new ConsumeBigItemRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withInventoryName(array_key_exists('inventoryName', $data) && $data['inventoryName'] !== null ? $data['inventoryName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withItemName(array_key_exists('itemName', $data) && $data['itemName'] !== null ? $data['itemName'] : null)
            ->withConsumeCount(array_key_exists('consumeCount', $data) && $data['consumeCount'] !== null ? $data['consumeCount'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "inventoryName" => $this->getInventoryName(),
            "accessToken" => $this->getAccessToken(),
            "itemName" => $this->getItemName(),
            "consumeCount" => $this->getConsumeCount(),
        );
    }
}