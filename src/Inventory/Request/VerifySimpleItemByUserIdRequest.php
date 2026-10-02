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
 * Request for verifySimpleItemByUserId: Verify the quantity of possessions in simple items by User ID
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#verifysimpleitembyuserid
 */
class VerifySimpleItemByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Simple Inventory Model name */
    private $inventoryName;
    /** @var string Simple Item Model Name */
    private $itemName;
    /** @var string Type of verification */
    private $verifyType;
    /** @var int Quantity in Possession */
    private $count;
    /** @var bool Whether to multiply the value used for verification when specifying the quantity */
    private $multiplyValueSpecifyingQuantity;
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
     * @return VerifySimpleItemByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): VerifySimpleItemByUserIdRequest {
		$this->namespaceName = $namespaceName;
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
     * @return VerifySimpleItemByUserIdRequest
     */
	public function withUserId(?string $userId): VerifySimpleItemByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Simple Inventory Model name */
	public function getInventoryName(): ?string {
		return $this->inventoryName;
	}
    /** @param string|null $inventoryName Simple Inventory Model name */
	public function setInventoryName(?string $inventoryName) {
		$this->inventoryName = $inventoryName;
	}
    /**
     * @param string|null $inventoryName Simple Inventory Model name
     * @return VerifySimpleItemByUserIdRequest
     */
	public function withInventoryName(?string $inventoryName): VerifySimpleItemByUserIdRequest {
		$this->inventoryName = $inventoryName;
		return $this;
	}
    /** @return string|null Simple Item Model Name */
	public function getItemName(): ?string {
		return $this->itemName;
	}
    /** @param string|null $itemName Simple Item Model Name */
	public function setItemName(?string $itemName) {
		$this->itemName = $itemName;
	}
    /**
     * @param string|null $itemName Simple Item Model Name
     * @return VerifySimpleItemByUserIdRequest
     */
	public function withItemName(?string $itemName): VerifySimpleItemByUserIdRequest {
		$this->itemName = $itemName;
		return $this;
	}
    /** @return string|null Type of verification */
	public function getVerifyType(): ?string {
		return $this->verifyType;
	}
    /** @param string|null $verifyType Type of verification */
	public function setVerifyType(?string $verifyType) {
		$this->verifyType = $verifyType;
	}
    /**
     * @param string|null $verifyType Type of verification
     * @return VerifySimpleItemByUserIdRequest
     */
	public function withVerifyType(?string $verifyType): VerifySimpleItemByUserIdRequest {
		$this->verifyType = $verifyType;
		return $this;
	}
    /** @return int|null Quantity in Possession */
	public function getCount(): ?int {
		return $this->count;
	}
    /** @param int|null $count Quantity in Possession */
	public function setCount(?int $count) {
		$this->count = $count;
	}
    /**
     * @param int|null $count Quantity in Possession
     * @return VerifySimpleItemByUserIdRequest
     */
	public function withCount(?int $count): VerifySimpleItemByUserIdRequest {
		$this->count = $count;
		return $this;
	}
    /** @return bool|null Whether to multiply the value used for verification when specifying the quantity */
	public function getMultiplyValueSpecifyingQuantity(): ?bool {
		return $this->multiplyValueSpecifyingQuantity;
	}
    /** @param bool|null $multiplyValueSpecifyingQuantity Whether to multiply the value used for verification when specifying the quantity */
	public function setMultiplyValueSpecifyingQuantity(?bool $multiplyValueSpecifyingQuantity) {
		$this->multiplyValueSpecifyingQuantity = $multiplyValueSpecifyingQuantity;
	}
    /**
     * @param bool|null $multiplyValueSpecifyingQuantity Whether to multiply the value used for verification when specifying the quantity
     * @return VerifySimpleItemByUserIdRequest
     */
	public function withMultiplyValueSpecifyingQuantity(?bool $multiplyValueSpecifyingQuantity): VerifySimpleItemByUserIdRequest {
		$this->multiplyValueSpecifyingQuantity = $multiplyValueSpecifyingQuantity;
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
     * @return VerifySimpleItemByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): VerifySimpleItemByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifySimpleItemByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifySimpleItemByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifySimpleItemByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withInventoryName(array_key_exists('inventoryName', $data) && $data['inventoryName'] !== null ? $data['inventoryName'] : null)
            ->withItemName(array_key_exists('itemName', $data) && $data['itemName'] !== null ? $data['itemName'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null)
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null)
            ->withMultiplyValueSpecifyingQuantity(array_key_exists('multiplyValueSpecifyingQuantity', $data) ? $data['multiplyValueSpecifyingQuantity'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "inventoryName" => $this->getInventoryName(),
            "itemName" => $this->getItemName(),
            "verifyType" => $this->getVerifyType(),
            "count" => $this->getCount(),
            "multiplyValueSpecifyingQuantity" => $this->getMultiplyValueSpecifyingQuantity(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}