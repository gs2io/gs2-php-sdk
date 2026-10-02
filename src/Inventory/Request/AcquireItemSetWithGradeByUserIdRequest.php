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
 * Request for acquireItemSetWithGradeByUserId: Acquire one Item Set while setting the grade to GS2-Grade by specifying the user ID
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#acquireitemsetwithgradebyuserid
 */
class AcquireItemSetWithGradeByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Inventory Model name */
    private $inventoryName;
    /** @var string Item Model Name */
    private $itemName;
    /** @var string User ID */
    private $userId;
    /** @var string Grade Model GRN */
    private $gradeModelId;
    /** @var int Grade value to set */
    private $gradeValue;
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
     * @return AcquireItemSetWithGradeByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): AcquireItemSetWithGradeByUserIdRequest {
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
     * @return AcquireItemSetWithGradeByUserIdRequest
     */
	public function withInventoryName(?string $inventoryName): AcquireItemSetWithGradeByUserIdRequest {
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
     * @return AcquireItemSetWithGradeByUserIdRequest
     */
	public function withItemName(?string $itemName): AcquireItemSetWithGradeByUserIdRequest {
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
     * @return AcquireItemSetWithGradeByUserIdRequest
     */
	public function withUserId(?string $userId): AcquireItemSetWithGradeByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Grade Model GRN */
	public function getGradeModelId(): ?string {
		return $this->gradeModelId;
	}
    /** @param string|null $gradeModelId Grade Model GRN */
	public function setGradeModelId(?string $gradeModelId) {
		$this->gradeModelId = $gradeModelId;
	}
    /**
     * @param string|null $gradeModelId Grade Model GRN
     * @return AcquireItemSetWithGradeByUserIdRequest
     */
	public function withGradeModelId(?string $gradeModelId): AcquireItemSetWithGradeByUserIdRequest {
		$this->gradeModelId = $gradeModelId;
		return $this;
	}
    /** @return int|null Grade value to set */
	public function getGradeValue(): ?int {
		return $this->gradeValue;
	}
    /** @param int|null $gradeValue Grade value to set */
	public function setGradeValue(?int $gradeValue) {
		$this->gradeValue = $gradeValue;
	}
    /**
     * @param int|null $gradeValue Grade value to set
     * @return AcquireItemSetWithGradeByUserIdRequest
     */
	public function withGradeValue(?int $gradeValue): AcquireItemSetWithGradeByUserIdRequest {
		$this->gradeValue = $gradeValue;
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
     * @return AcquireItemSetWithGradeByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): AcquireItemSetWithGradeByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): AcquireItemSetWithGradeByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?AcquireItemSetWithGradeByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new AcquireItemSetWithGradeByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withInventoryName(array_key_exists('inventoryName', $data) && $data['inventoryName'] !== null ? $data['inventoryName'] : null)
            ->withItemName(array_key_exists('itemName', $data) && $data['itemName'] !== null ? $data['itemName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withGradeModelId(array_key_exists('gradeModelId', $data) && $data['gradeModelId'] !== null ? $data['gradeModelId'] : null)
            ->withGradeValue(array_key_exists('gradeValue', $data) && $data['gradeValue'] !== null ? $data['gradeValue'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "inventoryName" => $this->getInventoryName(),
            "itemName" => $this->getItemName(),
            "userId" => $this->getUserId(),
            "gradeModelId" => $this->getGradeModelId(),
            "gradeValue" => $this->getGradeValue(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}