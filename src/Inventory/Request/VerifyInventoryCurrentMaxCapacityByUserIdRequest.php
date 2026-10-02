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
 * Request for verifyInventoryCurrentMaxCapacityByUserId: Verify current max inventory capacity by User ID
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#verifyinventorycurrentmaxcapacitybyuserid
 */
class VerifyInventoryCurrentMaxCapacityByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Inventory Model Name */
    private $inventoryName;
    /** @var string Type of verification */
    private $verifyType;
    /** @var int Current max inventory capacity */
    private $currentInventoryMaxCapacity;
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
     * @return VerifyInventoryCurrentMaxCapacityByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): VerifyInventoryCurrentMaxCapacityByUserIdRequest {
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
     * @return VerifyInventoryCurrentMaxCapacityByUserIdRequest
     */
	public function withUserId(?string $userId): VerifyInventoryCurrentMaxCapacityByUserIdRequest {
		$this->userId = $userId;
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
     * @return VerifyInventoryCurrentMaxCapacityByUserIdRequest
     */
	public function withInventoryName(?string $inventoryName): VerifyInventoryCurrentMaxCapacityByUserIdRequest {
		$this->inventoryName = $inventoryName;
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
     * @return VerifyInventoryCurrentMaxCapacityByUserIdRequest
     */
	public function withVerifyType(?string $verifyType): VerifyInventoryCurrentMaxCapacityByUserIdRequest {
		$this->verifyType = $verifyType;
		return $this;
	}
    /** @return int|null Current max inventory capacity */
	public function getCurrentInventoryMaxCapacity(): ?int {
		return $this->currentInventoryMaxCapacity;
	}
    /** @param int|null $currentInventoryMaxCapacity Current max inventory capacity */
	public function setCurrentInventoryMaxCapacity(?int $currentInventoryMaxCapacity) {
		$this->currentInventoryMaxCapacity = $currentInventoryMaxCapacity;
	}
    /**
     * @param int|null $currentInventoryMaxCapacity Current max inventory capacity
     * @return VerifyInventoryCurrentMaxCapacityByUserIdRequest
     */
	public function withCurrentInventoryMaxCapacity(?int $currentInventoryMaxCapacity): VerifyInventoryCurrentMaxCapacityByUserIdRequest {
		$this->currentInventoryMaxCapacity = $currentInventoryMaxCapacity;
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
     * @return VerifyInventoryCurrentMaxCapacityByUserIdRequest
     */
	public function withMultiplyValueSpecifyingQuantity(?bool $multiplyValueSpecifyingQuantity): VerifyInventoryCurrentMaxCapacityByUserIdRequest {
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
     * @return VerifyInventoryCurrentMaxCapacityByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): VerifyInventoryCurrentMaxCapacityByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyInventoryCurrentMaxCapacityByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyInventoryCurrentMaxCapacityByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyInventoryCurrentMaxCapacityByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withInventoryName(array_key_exists('inventoryName', $data) && $data['inventoryName'] !== null ? $data['inventoryName'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null)
            ->withCurrentInventoryMaxCapacity(array_key_exists('currentInventoryMaxCapacity', $data) && $data['currentInventoryMaxCapacity'] !== null ? $data['currentInventoryMaxCapacity'] : null)
            ->withMultiplyValueSpecifyingQuantity(array_key_exists('multiplyValueSpecifyingQuantity', $data) ? $data['multiplyValueSpecifyingQuantity'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "inventoryName" => $this->getInventoryName(),
            "verifyType" => $this->getVerifyType(),
            "currentInventoryMaxCapacity" => $this->getCurrentInventoryMaxCapacity(),
            "multiplyValueSpecifyingQuantity" => $this->getMultiplyValueSpecifyingQuantity(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}