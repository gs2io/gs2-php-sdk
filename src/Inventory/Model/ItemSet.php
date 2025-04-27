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


class ItemSet implements IModel {
	/**
     * @var string
	 */
	private $itemSetId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $inventoryName;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $itemName;
	/**
     * @var int
	 */
	private $count;
	/**
     * @var array
	 */
	private $referenceOf;
	/**
     * @var int
	 */
	private $sortValue;
	/**
     * @var int
	 */
	private $expiresAt;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	public function getItemSetId(): ?string {
		return $this->itemSetId;
	}
	public function setItemSetId(?string $itemSetId) {
		$this->itemSetId = $itemSetId;
	}
	public function withItemSetId(?string $itemSetId): ItemSet {
		$this->itemSetId = $itemSetId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): ItemSet {
		$this->name = $name;
		return $this;
	}
	public function getInventoryName(): ?string {
		return $this->inventoryName;
	}
	public function setInventoryName(?string $inventoryName) {
		$this->inventoryName = $inventoryName;
	}
	public function withInventoryName(?string $inventoryName): ItemSet {
		$this->inventoryName = $inventoryName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): ItemSet {
		$this->userId = $userId;
		return $this;
	}
	public function getItemName(): ?string {
		return $this->itemName;
	}
	public function setItemName(?string $itemName) {
		$this->itemName = $itemName;
	}
	public function withItemName(?string $itemName): ItemSet {
		$this->itemName = $itemName;
		return $this;
	}
	public function getCount(): ?int {
		return $this->count;
	}
	public function setCount(?int $count) {
		$this->count = $count;
	}
	public function withCount(?int $count): ItemSet {
		$this->count = $count;
		return $this;
	}
	public function getReferenceOf(): ?array {
		return $this->referenceOf;
	}
	public function setReferenceOf(?array $referenceOf) {
		$this->referenceOf = $referenceOf;
	}
	public function withReferenceOf(?array $referenceOf): ItemSet {
		$this->referenceOf = $referenceOf;
		return $this;
	}
	public function getSortValue(): ?int {
		return $this->sortValue;
	}
	public function setSortValue(?int $sortValue) {
		$this->sortValue = $sortValue;
	}
	public function withSortValue(?int $sortValue): ItemSet {
		$this->sortValue = $sortValue;
		return $this;
	}
	public function getExpiresAt(): ?int {
		return $this->expiresAt;
	}
	public function setExpiresAt(?int $expiresAt) {
		$this->expiresAt = $expiresAt;
	}
	public function withExpiresAt(?int $expiresAt): ItemSet {
		$this->expiresAt = $expiresAt;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): ItemSet {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
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