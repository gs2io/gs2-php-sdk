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

class VerifyReferenceOfByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $inventoryName;
    /** @var string */
    private $userId;
    /** @var string */
    private $itemName;
    /** @var string */
    private $itemSetName;
    /** @var string */
    private $referenceOf;
    /** @var string */
    private $verifyType;
    /** @var string */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): VerifyReferenceOfByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getInventoryName(): ?string {
		return $this->inventoryName;
	}
	public function setInventoryName(?string $inventoryName) {
		$this->inventoryName = $inventoryName;
	}
	public function withInventoryName(?string $inventoryName): VerifyReferenceOfByUserIdRequest {
		$this->inventoryName = $inventoryName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): VerifyReferenceOfByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getItemName(): ?string {
		return $this->itemName;
	}
	public function setItemName(?string $itemName) {
		$this->itemName = $itemName;
	}
	public function withItemName(?string $itemName): VerifyReferenceOfByUserIdRequest {
		$this->itemName = $itemName;
		return $this;
	}
	public function getItemSetName(): ?string {
		return $this->itemSetName;
	}
	public function setItemSetName(?string $itemSetName) {
		$this->itemSetName = $itemSetName;
	}
	public function withItemSetName(?string $itemSetName): VerifyReferenceOfByUserIdRequest {
		$this->itemSetName = $itemSetName;
		return $this;
	}
	public function getReferenceOf(): ?string {
		return $this->referenceOf;
	}
	public function setReferenceOf(?string $referenceOf) {
		$this->referenceOf = $referenceOf;
	}
	public function withReferenceOf(?string $referenceOf): VerifyReferenceOfByUserIdRequest {
		$this->referenceOf = $referenceOf;
		return $this;
	}
	public function getVerifyType(): ?string {
		return $this->verifyType;
	}
	public function setVerifyType(?string $verifyType) {
		$this->verifyType = $verifyType;
	}
	public function withVerifyType(?string $verifyType): VerifyReferenceOfByUserIdRequest {
		$this->verifyType = $verifyType;
		return $this;
	}
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
	public function withTimeOffsetToken(?string $timeOffsetToken): VerifyReferenceOfByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyReferenceOfByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyReferenceOfByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyReferenceOfByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withInventoryName(array_key_exists('inventoryName', $data) && $data['inventoryName'] !== null ? $data['inventoryName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withItemName(array_key_exists('itemName', $data) && $data['itemName'] !== null ? $data['itemName'] : null)
            ->withItemSetName(array_key_exists('itemSetName', $data) && $data['itemSetName'] !== null ? $data['itemSetName'] : null)
            ->withReferenceOf(array_key_exists('referenceOf', $data) && $data['referenceOf'] !== null ? $data['referenceOf'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "inventoryName" => $this->getInventoryName(),
            "userId" => $this->getUserId(),
            "itemName" => $this->getItemName(),
            "itemSetName" => $this->getItemSetName(),
            "referenceOf" => $this->getReferenceOf(),
            "verifyType" => $this->getVerifyType(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}