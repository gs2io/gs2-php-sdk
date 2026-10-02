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
 * Request for addReferenceOf: Add a reference
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#addreferenceof
 */
class AddReferenceOfRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Inventory Model Name */
    private $inventoryName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Item Model Name */
    private $itemName;
    /** @var string Name identifying the Item Set */
    private $itemSetName;
    /** @var string Reference */
    private $referenceOf;
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
     * @return AddReferenceOfRequest
     */
	public function withNamespaceName(?string $namespaceName): AddReferenceOfRequest {
		$this->namespaceName = $namespaceName;
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
     * @return AddReferenceOfRequest
     */
	public function withInventoryName(?string $inventoryName): AddReferenceOfRequest {
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
     * @return AddReferenceOfRequest
     */
	public function withAccessToken(?string $accessToken): AddReferenceOfRequest {
		$this->accessToken = $accessToken;
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
     * @return AddReferenceOfRequest
     */
	public function withItemName(?string $itemName): AddReferenceOfRequest {
		$this->itemName = $itemName;
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
     * @return AddReferenceOfRequest
     */
	public function withItemSetName(?string $itemSetName): AddReferenceOfRequest {
		$this->itemSetName = $itemSetName;
		return $this;
	}
    /** @return string|null Reference */
	public function getReferenceOf(): ?string {
		return $this->referenceOf;
	}
    /** @param string|null $referenceOf Reference */
	public function setReferenceOf(?string $referenceOf) {
		$this->referenceOf = $referenceOf;
	}
    /**
     * @param string|null $referenceOf Reference
     * @return AddReferenceOfRequest
     */
	public function withReferenceOf(?string $referenceOf): AddReferenceOfRequest {
		$this->referenceOf = $referenceOf;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): AddReferenceOfRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?AddReferenceOfRequest {
        if ($data === null) {
            return null;
        }
        return (new AddReferenceOfRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withInventoryName(array_key_exists('inventoryName', $data) && $data['inventoryName'] !== null ? $data['inventoryName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withItemName(array_key_exists('itemName', $data) && $data['itemName'] !== null ? $data['itemName'] : null)
            ->withItemSetName(array_key_exists('itemSetName', $data) && $data['itemSetName'] !== null ? $data['itemSetName'] : null)
            ->withReferenceOf(array_key_exists('referenceOf', $data) && $data['referenceOf'] !== null ? $data['referenceOf'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "inventoryName" => $this->getInventoryName(),
            "accessToken" => $this->getAccessToken(),
            "itemName" => $this->getItemName(),
            "itemSetName" => $this->getItemSetName(),
            "referenceOf" => $this->getReferenceOf(),
        );
    }
}