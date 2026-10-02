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
 * Simple Item
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#simpleitem
 */
class SimpleItem implements IModel {
	/**
     * @var string Simple Item GRN
	 */
	private $itemId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Simple Item Model Name
	 */
	private $itemName;
	/**
     * @var int Quantity in Possession
	 */
	private $count;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Simple Item GRN */
	public function getItemId(): ?string {
		return $this->itemId;
	}
    /** @param string|null $itemId Simple Item GRN */
	public function setItemId(?string $itemId) {
		$this->itemId = $itemId;
	}
    /**
     * @param string|null $itemId Simple Item GRN
     * @return SimpleItem
     */
	public function withItemId(?string $itemId): SimpleItem {
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
     * @return SimpleItem
     */
	public function withUserId(?string $userId): SimpleItem {
		$this->userId = $userId;
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
     * @return SimpleItem
     */
	public function withItemName(?string $itemName): SimpleItem {
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
     * @return SimpleItem
     */
	public function withCount(?int $count): SimpleItem {
		$this->count = $count;
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
     * @return SimpleItem
     */
	public function withRevision(?int $revision): SimpleItem {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?SimpleItem {
        if ($data === null) {
            return null;
        }
        return (new SimpleItem())
            ->withItemId(array_key_exists('itemId', $data) && $data['itemId'] !== null ? $data['itemId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withItemName(array_key_exists('itemName', $data) && $data['itemName'] !== null ? $data['itemName'] : null)
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "itemId" => $this->getItemId(),
            "userId" => $this->getUserId(),
            "itemName" => $this->getItemName(),
            "count" => $this->getCount(),
            "revision" => $this->getRevision(),
        );
    }
}