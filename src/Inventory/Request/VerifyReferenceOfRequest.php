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

class VerifyReferenceOfRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $inventoryName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $itemName;
    /** @var string */
    private $itemSetName;
    /** @var string */
    private $referenceOf;
    /** @var string */
    private $verifyType;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): VerifyReferenceOfRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getInventoryName(): ?string {
		return $this->inventoryName;
	}
	public function setInventoryName(?string $inventoryName) {
		$this->inventoryName = $inventoryName;
	}
	public function withInventoryName(?string $inventoryName): VerifyReferenceOfRequest {
		$this->inventoryName = $inventoryName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): VerifyReferenceOfRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getItemName(): ?string {
		return $this->itemName;
	}
	public function setItemName(?string $itemName) {
		$this->itemName = $itemName;
	}
	public function withItemName(?string $itemName): VerifyReferenceOfRequest {
		$this->itemName = $itemName;
		return $this;
	}
	public function getItemSetName(): ?string {
		return $this->itemSetName;
	}
	public function setItemSetName(?string $itemSetName) {
		$this->itemSetName = $itemSetName;
	}
	public function withItemSetName(?string $itemSetName): VerifyReferenceOfRequest {
		$this->itemSetName = $itemSetName;
		return $this;
	}
	public function getReferenceOf(): ?string {
		return $this->referenceOf;
	}
	public function setReferenceOf(?string $referenceOf) {
		$this->referenceOf = $referenceOf;
	}
	public function withReferenceOf(?string $referenceOf): VerifyReferenceOfRequest {
		$this->referenceOf = $referenceOf;
		return $this;
	}
	public function getVerifyType(): ?string {
		return $this->verifyType;
	}
	public function setVerifyType(?string $verifyType) {
		$this->verifyType = $verifyType;
	}
	public function withVerifyType(?string $verifyType): VerifyReferenceOfRequest {
		$this->verifyType = $verifyType;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyReferenceOfRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyReferenceOfRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyReferenceOfRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withInventoryName(array_key_exists('inventoryName', $data) && $data['inventoryName'] !== null ? $data['inventoryName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withItemName(array_key_exists('itemName', $data) && $data['itemName'] !== null ? $data['itemName'] : null)
            ->withItemSetName(array_key_exists('itemSetName', $data) && $data['itemSetName'] !== null ? $data['itemSetName'] : null)
            ->withReferenceOf(array_key_exists('referenceOf', $data) && $data['referenceOf'] !== null ? $data['referenceOf'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "inventoryName" => $this->getInventoryName(),
            "accessToken" => $this->getAccessToken(),
            "itemName" => $this->getItemName(),
            "itemSetName" => $this->getItemSetName(),
            "referenceOf" => $this->getReferenceOf(),
            "verifyType" => $this->getVerifyType(),
        );
    }
}