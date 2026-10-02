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

namespace Gs2\Inventory\Model;

use Gs2\Core\Model\IModel;


/**
 * Item Set
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#itemset
 */
class ItemSet implements IModel {
	/**
     * @var string Item Set GRN
	 */
	private $itemSetId;
	/**
     * @var string Name identifying the Item Set
	 */
	private $name;
	/**
     * @var string Inventory Model Name
	 */
	private $inventoryName;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Item Model Name
	 */
	private $itemName;
	/**
     * @var int Quantity in Possession
	 */
	private $count;
	/**
     * @var array List of References
	 */
	private $referenceOf;
	/**
     * @var int Display Order
	 */
	private $sortValue;
	/**
     * @var int Expiration time
	 */
	private $expiresAt;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
    /** @return string|null Item Set GRN */
	public function getItemSetId(): ?string {
		return $this->itemSetId;
	}
    /** @param string|null $itemSetId Item Set GRN */
	public function setItemSetId(?string $itemSetId) {
		$this->itemSetId = $itemSetId;
	}
    /**
     * @param string|null $itemSetId Item Set GRN
     * @return ItemSet
     */
	public function withItemSetId(?string $itemSetId): ItemSet {
		$this->itemSetId = $itemSetId;
		return $this;
	}
    /** @return string|null Name identifying the Item Set */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Name identifying the Item Set */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Name identifying the Item Set
     * @return ItemSet
     */
	public function withName(?string $name): ItemSet {
		$this->name = $name;
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
     * @return ItemSet
     */
	public function withInventoryName(?string $inventoryName): ItemSet {
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
     * @return ItemSet
     */
	public function withUserId(?string $userId): ItemSet {
		$this->userId = $userId;
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
     * @return ItemSet
     */
	public function withItemName(?string $itemName): ItemSet {
		$this->itemName = $itemName;
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
     * @return ItemSet
     */
	public function withCount(?int $count): ItemSet {
		$this->count = $count;
		return $this;
	}
    /** @return array|null List of References */
	public function getReferenceOf(): ?array {
		return $this->referenceOf;
	}
    /** @param array|null $referenceOf List of References */
	public function setReferenceOf(?array $referenceOf) {
		$this->referenceOf = $referenceOf;
	}
    /**
     * @param array|null $referenceOf List of References
     * @return ItemSet
     */
	public function withReferenceOf(?array $referenceOf): ItemSet {
		$this->referenceOf = $referenceOf;
		return $this;
	}
    /** @return int|null Display Order */
	public function getSortValue(): ?int {
		return $this->sortValue;
	}
    /** @param int|null $sortValue Display Order */
	public function setSortValue(?int $sortValue) {
		$this->sortValue = $sortValue;
	}
    /**
     * @param int|null $sortValue Display Order
     * @return ItemSet
     */
	public function withSortValue(?int $sortValue): ItemSet {
		$this->sortValue = $sortValue;
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
     * @return ItemSet
     */
	public function withExpiresAt(?int $expiresAt): ItemSet {
		$this->expiresAt = $expiresAt;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return ItemSet
     */
	public function withCreatedAt(?int $createdAt): ItemSet {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return ItemSet
     */
	public function withUpdatedAt(?int $updatedAt): ItemSet {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?ItemSet {
        if ($data === null) {
            return null;
        }
        return (new ItemSet())
            ->withItemSetId(array_key_exists('itemSetId', $data) && $data['itemSetId'] !== null ? $data['itemSetId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withInventoryName(array_key_exists('inventoryName', $data) && $data['inventoryName'] !== null ? $data['inventoryName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withItemName(array_key_exists('itemName', $data) && $data['itemName'] !== null ? $data['itemName'] : null)
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null)
            ->withReferenceOf(!array_key_exists('referenceOf', $data) || $data['referenceOf'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['referenceOf']
            ))
            ->withSortValue(array_key_exists('sortValue', $data) && $data['sortValue'] !== null ? $data['sortValue'] : null)
            ->withExpiresAt(array_key_exists('expiresAt', $data) && $data['expiresAt'] !== null ? $data['expiresAt'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "itemSetId" => $this->getItemSetId(),
            "name" => $this->getName(),
            "inventoryName" => $this->getInventoryName(),
            "userId" => $this->getUserId(),
            "itemName" => $this->getItemName(),
            "count" => $this->getCount(),
            "referenceOf" => $this->getReferenceOf() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getReferenceOf()
            ),
            "sortValue" => $this->getSortValue(),
            "expiresAt" => $this->getExpiresAt(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}