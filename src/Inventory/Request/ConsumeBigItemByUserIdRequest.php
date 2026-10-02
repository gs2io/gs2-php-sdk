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
 * Request for consumeBigItemByUserId: Consume Big Items by User ID
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#consumebigitembyuserid
 */
class ConsumeBigItemByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Big Inventory Model name */
    private $inventoryName;
    /** @var string User ID */
    private $userId;
    /** @var string Big Item Model name */
    private $itemName;
    /** @var string Consumption quantity of a Big Item */
    private $consumeCount;
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
     * @return ConsumeBigItemByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): ConsumeBigItemByUserIdRequest {
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
     * @return ConsumeBigItemByUserIdRequest
     */
	public function withInventoryName(?string $inventoryName): ConsumeBigItemByUserIdRequest {
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
     * @return ConsumeBigItemByUserIdRequest
     */
	public function withUserId(?string $userId): ConsumeBigItemByUserIdRequest {
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
     * @return ConsumeBigItemByUserIdRequest
     */
	public function withItemName(?string $itemName): ConsumeBigItemByUserIdRequest {
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
     * @return ConsumeBigItemByUserIdRequest
     */
	public function withConsumeCount(?string $consumeCount): ConsumeBigItemByUserIdRequest {
		$this->consumeCount = $consumeCount;
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
     * @return ConsumeBigItemByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): ConsumeBigItemByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): ConsumeBigItemByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?ConsumeBigItemByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new ConsumeBigItemByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withInventoryName(array_key_exists('inventoryName', $data) && $data['inventoryName'] !== null ? $data['inventoryName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withItemName(array_key_exists('itemName', $data) && $data['itemName'] !== null ? $data['itemName'] : null)
            ->withConsumeCount(array_key_exists('consumeCount', $data) && $data['consumeCount'] !== null ? $data['consumeCount'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "inventoryName" => $this->getInventoryName(),
            "userId" => $this->getUserId(),
            "itemName" => $this->getItemName(),
            "consumeCount" => $this->getConsumeCount(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}