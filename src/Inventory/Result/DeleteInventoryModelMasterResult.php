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

namespace Gs2\Inventory\Result;

use Gs2\Core\Model\IResult;
use Gs2\Inventory\Model\InventoryModelMaster;

/**
 * Result of deleteInventoryModelMaster: Delete Inventory Model Master
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#deleteinventorymodelmaster
 */
class DeleteInventoryModelMasterResult implements IResult {
    /** @var InventoryModelMaster Inventory Model Master deleted */
    private $item;

    /** @return InventoryModelMaster|null Inventory Model Master deleted */
	public function getItem(): ?InventoryModelMaster {
		return $this->item;
	}

    /** @param InventoryModelMaster|null $item Inventory Model Master deleted */
	public function setItem(?InventoryModelMaster $item) {
		$this->item = $item;
	}

    /**
     * @param InventoryModelMaster|null $item Inventory Model Master deleted
     * @return DeleteInventoryModelMasterResult
     */
	public function withItem(?InventoryModelMaster $item): DeleteInventoryModelMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteInventoryModelMasterResult {
        if ($data === null) {
            return null;
        }
        return (new DeleteInventoryModelMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? InventoryModelMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}