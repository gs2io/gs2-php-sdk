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

class DeleteItemSetByUserIdRequest extends Gs2BasicRequest {
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

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): DeleteItemSetByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getInventoryName(): ?string {
		return $this->inventoryName;
	}

	public function setInventoryName(?string $inventoryName) {
		$this->inventoryName = $inventoryName;
	}

	public function withInventoryName(?string $inventoryName): DeleteItemSetByUserIdRequest {
		$this->inventoryName = $inventoryName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): DeleteItemSetByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getItemName(): ?string {
		return $this->itemName;
	}

	public function setItemName(?string $itemName) {
		$this->itemName = $itemName;
	}

	public function withItemName(?string $itemName): DeleteItemSetByUserIdRequest {
		$this->itemName = $itemName;
		return $this;
	}

	public function getItemSetName(): ?string {
		return $this->itemSetName;
	}

	public function setItemSetName(?string $itemSetName) {
		$this->itemSetName = $itemSetName;
	}

	public function withItemSetName(?string $itemSetName): DeleteItemSetByUserIdRequest {
		$this->itemSetName = $itemSetName;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteItemSetByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new DeleteItemSetByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withInventoryName(array_key_exists('inventoryName', $data) && $data['inventoryName'] !== null ? $data['inventoryName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withItemName(array_key_exists('itemName', $data) && $data['itemName'] !== null ? $data['itemName'] : null)
            ->withItemSetName(array_key_exists('itemSetName', $data) && $data['itemSetName'] !== null ? $data['itemSetName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "inventoryName" => $this->getInventoryName(),
            "userId" => $this->getUserId(),
            "itemName" => $this->getItemName(),
            "itemSetName" => $this->getItemSetName(),
        );
    }
}