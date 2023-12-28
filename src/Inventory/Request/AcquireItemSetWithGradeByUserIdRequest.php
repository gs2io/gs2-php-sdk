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

class AcquireItemSetWithGradeByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $inventoryName;
    /** @var string */
    private $itemName;
    /** @var string */
    private $userId;
    /** @var string */
    private $gradeModelId;
    /** @var int */
    private $gradeValue;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): AcquireItemSetWithGradeByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getInventoryName(): ?string {
		return $this->inventoryName;
	}
	public function setInventoryName(?string $inventoryName) {
		$this->inventoryName = $inventoryName;
	}
	public function withInventoryName(?string $inventoryName): AcquireItemSetWithGradeByUserIdRequest {
		$this->inventoryName = $inventoryName;
		return $this;
	}
	public function getItemName(): ?string {
		return $this->itemName;
	}
	public function setItemName(?string $itemName) {
		$this->itemName = $itemName;
	}
	public function withItemName(?string $itemName): AcquireItemSetWithGradeByUserIdRequest {
		$this->itemName = $itemName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): AcquireItemSetWithGradeByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getGradeModelId(): ?string {
		return $this->gradeModelId;
	}
	public function setGradeModelId(?string $gradeModelId) {
		$this->gradeModelId = $gradeModelId;
	}
	public function withGradeModelId(?string $gradeModelId): AcquireItemSetWithGradeByUserIdRequest {
		$this->gradeModelId = $gradeModelId;
		return $this;
	}
	public function getGradeValue(): ?int {
		return $this->gradeValue;
	}
	public function setGradeValue(?int $gradeValue) {
		$this->gradeValue = $gradeValue;
	}
	public function withGradeValue(?int $gradeValue): AcquireItemSetWithGradeByUserIdRequest {
		$this->gradeValue = $gradeValue;
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
            ->withGradeValue(array_key_exists('gradeValue', $data) && $data['gradeValue'] !== null ? $data['gradeValue'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "inventoryName" => $this->getInventoryName(),
            "itemName" => $this->getItemName(),
            "userId" => $this->getUserId(),
            "gradeModelId" => $this->getGradeModelId(),
            "gradeValue" => $this->getGradeValue(),
        );
    }
}