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
 * Big Item
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#bigitem
 */
class BigItem implements IModel {
	/**
     * @var string Big Item GRN
	 */
	private $itemId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Big Item Model Name
	 */
	private $itemName;
	/**
     * @var string Quantity in Possession
	 */
	private $count;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Big Item GRN */
	public function getItemId(): ?string {
		return $this->itemId;
	}
    /** @param string|null $itemId Big Item GRN */
	public function setItemId(?string $itemId) {
		$this->itemId = $itemId;
	}
    /**
     * @param string|null $itemId Big Item GRN
     * @return BigItem
     */
	public function withItemId(?string $itemId): BigItem {
		$this->itemId = $itemId;
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
     * @return BigItem
     */
	public function withUserId(?string $userId): BigItem {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Big Item Model Name */
	public function getItemName(): ?string {
		return $this->itemName;
	}
    /** @param string|null $itemName Big Item Model Name */
	public function setItemName(?string $itemName) {
		$this->itemName = $itemName;
	}
    /**
     * @param string|null $itemName Big Item Model Name
     * @return BigItem
     */
	public function withItemName(?string $itemName): BigItem {
		$this->itemName = $itemName;
		return $this;
	}
    /** @return string|null Quantity in Possession */
	public function getCount(): ?string {
		return $this->count;
	}
    /** @param string|null $count Quantity in Possession */
	public function setCount(?string $count) {
		$this->count = $count;
	}
    /**
     * @param string|null $count Quantity in Possession
     * @return BigItem
     */
	public function withCount(?string $count): BigItem {
		$this->count = $count;
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
     * @return BigItem
     */
	public function withCreatedAt(?int $createdAt): BigItem {
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
     * @return BigItem
     */
	public function withUpdatedAt(?int $updatedAt): BigItem {
		$this->updatedAt = $updatedAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return BigItem
     */
	public function withRevision(?int $revision): BigItem {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?BigItem {
        if ($data === null) {
            return null;
        }
        return (new BigItem())
            ->withItemId(array_key_exists('itemId', $data) && $data['itemId'] !== null ? $data['itemId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withItemName(array_key_exists('itemName', $data) && $data['itemName'] !== null ? $data['itemName'] : null)
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "itemId" => $this->getItemId(),
            "userId" => $this->getUserId(),
            "itemName" => $this->getItemName(),
            "count" => $this->getCount(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}