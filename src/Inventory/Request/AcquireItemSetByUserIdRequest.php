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

class AcquireItemSetByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $inventoryName;
    /** @var string */
    private $itemName;
    /** @var string */
    private $userId;
    /** @var int */
    private $acquireCount;
    /** @var int */
    private $expiresAt;
    /** @var bool */
    private $createNewItemSet;
    /** @var string */
    private $itemSetName;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): AcquireItemSetByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getInventoryName(): ?string {
		return $this->inventoryName;
	}

	public function setInventoryName(?string $inventoryName) {
		$this->inventoryName = $inventoryName;
	}

	public function withInventoryName(?string $inventoryName): AcquireItemSetByUserIdRequest {
		$this->inventoryName = $inventoryName;
		return $this;
	}

	public function getItemName(): ?string {
		return $this->itemName;
	}

	public function setItemName(?string $itemName) {
		$this->itemName = $itemName;
	}

	public function withItemName(?string $itemName): AcquireItemSetByUserIdRequest {
		$this->itemName = $itemName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): AcquireItemSetByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getAcquireCount(): ?int {
		return $this->acquireCount;
	}

	public function setAcquireCount(?int $acquireCount) {
		$this->acquireCount = $acquireCount;
	}

	public function withAcquireCount(?int $acquireCount): AcquireItemSetByUserIdRequest {
		$this->acquireCount = $acquireCount;
		return $this;
	}

	public function getExpiresAt(): ?int {
		return $this->expiresAt;
	}

	public function setExpiresAt(?int $expiresAt) {
		$this->expiresAt = $expiresAt;
	}

	public function withExpiresAt(?int $expiresAt): AcquireItemSetByUserIdRequest {
		$this->expiresAt = $expiresAt;
		return $this;
	}

	public function getCreateNewItemSet(): ?bool {
		return $this->createNewItemSet;
	}

	public function setCreateNewItemSet(?bool $createNewItemSet) {
		$this->createNewItemSet = $createNewItemSet;
	}

	public function withCreateNewItemSet(?bool $createNewItemSet): AcquireItemSetByUserIdRequest {
		$this->createNewItemSet = $createNewItemSet;
		return $this;
	}

	public function getItemSetName(): ?string {
		return $this->itemSetName;
	}

	public function setItemSetName(?string $itemSetName) {
		$this->itemSetName = $itemSetName;
	}

	public function withItemSetName(?string $itemSetName): AcquireItemSetByUserIdRequest {
		$this->itemSetName = $itemSetName;
		return $this;
	}

    public static function fromJson(?array $data): ?AcquireItemSetByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new AcquireItemSetByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withInventoryName(array_key_exists('inventoryName', $data) && $data['inventoryName'] !== null ? $data['inventoryName'] : null)
            ->withItemName(array_key_exists('itemName', $data) && $data['itemName'] !== null ? $data['itemName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withAcquireCount(array_key_exists('acquireCount', $data) && $data['acquireCount'] !== null ? $data['acquireCount'] : null)
            ->withExpiresAt(array_key_exists('expiresAt', $data) && $data['expiresAt'] !== null ? $data['expiresAt'] : null)
            ->withCreateNewItemSet($data['createNewItemSet'])
            ->withItemSetName(array_key_exists('itemSetName', $data) && $data['itemSetName'] !== null ? $data['itemSetName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "inventoryName" => $this->getInventoryName(),
            "itemName" => $this->getItemName(),
            "userId" => $this->getUserId(),
            "acquireCount" => $this->getAcquireCount(),
            "expiresAt" => $this->getExpiresAt(),
            "createNewItemSet" => $this->getCreateNewItemSet(),
            "itemSetName" => $this->getItemSetName(),
        );
    }
}