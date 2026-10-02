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
 * Request for setBigItemByUserId: Set the Big Item by User ID
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#setbigitembyuserid
 */
class SetBigItemByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Big Inventory Model name */
    private $inventoryName;
    /** @var string User ID */
    private $userId;
    /** @var string Big Item Model name */
    private $itemName;
    /** @var string Quantity of Big Item */
    private $count;
    /** @var string Time offset token */
    private $timeOffsetToken;
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
     * @return SetBigItemByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): SetBigItemByUserIdRequest {
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
     * @return SetBigItemByUserIdRequest
     */
	public function withInventoryName(?string $inventoryName): SetBigItemByUserIdRequest {
		$this->inventoryName = $inventoryName;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return SetBigItemByUserIdRequest
     */
	public function withUserId(?string $userId): SetBigItemByUserIdRequest {
		$this->userId = $userId;
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
     * @return SetBigItemByUserIdRequest
     */
	public function withItemName(?string $itemName): SetBigItemByUserIdRequest {
		$this->itemName = $itemName;
		return $this;
	}
    /** @return string|null Quantity of Big Item */
	public function getCount(): ?string {
		return $this->count;
	}
    /** @param string|null $count Quantity of Big Item */
	public function setCount(?string $count) {
		$this->count = $count;
	}
    /**
     * @param string|null $count Quantity of Big Item
     * @return SetBigItemByUserIdRequest
     */
	public function withCount(?string $count): SetBigItemByUserIdRequest {
		$this->count = $count;
		return $this;
	}
    /** @return string|null Time offset token */
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
    /** @param string|null $timeOffsetToken Time offset token */
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
    /**
     * @param string|null $timeOffsetToken Time offset token
     * @return SetBigItemByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): SetBigItemByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SetBigItemByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SetBigItemByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new SetBigItemByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withInventoryName(array_key_exists('inventoryName', $data) && $data['inventoryName'] !== null ? $data['inventoryName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withItemName(array_key_exists('itemName', $data) && $data['itemName'] !== null ? $data['itemName'] : null)
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "inventoryName" => $this->getInventoryName(),
            "userId" => $this->getUserId(),
            "itemName" => $this->getItemName(),
            "count" => $this->getCount(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}