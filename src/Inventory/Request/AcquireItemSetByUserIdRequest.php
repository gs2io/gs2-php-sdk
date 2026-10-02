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
 * Request for acquireItemSetByUserId: Acquire Item Sets by specifying the user ID
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#acquireitemsetbyuserid
 */
class AcquireItemSetByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Inventory Model name */
    private $inventoryName;
    /** @var string Item Model Name */
    private $itemName;
    /** @var string User ID */
    private $userId;
    /** @var int Acquisition quantity */
    private $acquireCount;
    /** @var int Expiration time */
    private $expiresAt;
    /** @var bool Even if there is room in an existing Item Set, you can create a new Item Set */
    private $createNewItemSet;
    /** @var string Name identifying the Item Set */
    private $itemSetName;
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
     * @return AcquireItemSetByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): AcquireItemSetByUserIdRequest {
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
     * @return AcquireItemSetByUserIdRequest
     */
	public function withInventoryName(?string $inventoryName): AcquireItemSetByUserIdRequest {
		$this->inventoryName = $inventoryName;
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
     * @return AcquireItemSetByUserIdRequest
     */
	public function withItemName(?string $itemName): AcquireItemSetByUserIdRequest {
		$this->itemName = $itemName;
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
     * @return AcquireItemSetByUserIdRequest
     */
	public function withUserId(?string $userId): AcquireItemSetByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Acquisition quantity */
	public function getAcquireCount(): ?int {
		return $this->acquireCount;
	}
    /** @param int|null $acquireCount Acquisition quantity */
	public function setAcquireCount(?int $acquireCount) {
		$this->acquireCount = $acquireCount;
	}
    /**
     * @param int|null $acquireCount Acquisition quantity
     * @return AcquireItemSetByUserIdRequest
     */
	public function withAcquireCount(?int $acquireCount): AcquireItemSetByUserIdRequest {
		$this->acquireCount = $acquireCount;
		return $this;
	}
    /** @return int|null Expiration time */
	public function getExpiresAt(): ?int {
		return $this->expiresAt;
	}
    /** @param int|null $expiresAt Expiration time */
	public function setExpiresAt(?int $expiresAt) {
		$this->expiresAt = $expiresAt;
	}
    /**
     * @param int|null $expiresAt Expiration time
     * @return AcquireItemSetByUserIdRequest
     */
	public function withExpiresAt(?int $expiresAt): AcquireItemSetByUserIdRequest {
		$this->expiresAt = $expiresAt;
		return $this;
	}
    /** @return bool|null Even if there is room in an existing Item Set, you can create a new Item Set */
	public function getCreateNewItemSet(): ?bool {
		return $this->createNewItemSet;
	}
    /** @param bool|null $createNewItemSet Even if there is room in an existing Item Set, you can create a new Item Set */
	public function setCreateNewItemSet(?bool $createNewItemSet) {
		$this->createNewItemSet = $createNewItemSet;
	}
    /**
     * @param bool|null $createNewItemSet Even if there is room in an existing Item Set, you can create a new Item Set
     * @return AcquireItemSetByUserIdRequest
     */
	public function withCreateNewItemSet(?bool $createNewItemSet): AcquireItemSetByUserIdRequest {
		$this->createNewItemSet = $createNewItemSet;
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
     * @return AcquireItemSetByUserIdRequest
     */
	public function withItemSetName(?string $itemSetName): AcquireItemSetByUserIdRequest {
		$this->itemSetName = $itemSetName;
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
     * @return AcquireItemSetByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): AcquireItemSetByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): AcquireItemSetByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?AcquireItemSetByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new AcquireItemSetByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withInventoryName(array_key_exists('inventoryName', $data) && $data['inventoryName'] !== null ? $data['inventoryName'] : null)
            ->withItemName(array_key_exists('itemName', $data) && $data['itemName'] !== null ? $data['itemName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withAcquireCount(array_key_exists('acquireCount', $data) && $data['acquireCount'] !== null ? $data['acquireCount'] : null)
            ->withExpiresAt(array_key_exists('expiresAt', $data) && $data['expiresAt'] !== null ? $data['expiresAt'] : null)
            ->withCreateNewItemSet(array_key_exists('createNewItemSet', $data) ? $data['createNewItemSet'] : null)
            ->withItemSetName(array_key_exists('itemSetName', $data) && $data['itemSetName'] !== null ? $data['itemSetName'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "inventoryName" => $this->getInventoryName(),
            "itemName" => $this->getItemName(),
            "userId" => $this->getUserId(),
            "acquireCount" => $this->getAcquireCount(),
            "expiresAt" => $this->getExpiresAt(),
            "createNewItemSet" => $this->getCreateNewItemSet(),
            "itemSetName" => $this->getItemSetName(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}