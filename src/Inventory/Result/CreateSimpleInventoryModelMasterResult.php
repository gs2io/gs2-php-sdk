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
use Gs2\Inventory\Model\SimpleInventoryModelMaster;

class CreateSimpleInventoryModelMasterResult implements IResult {
    /** @var SimpleInventoryModelMaster */
    private $item;

	public function getItem(): ?SimpleInventoryModelMaster {
		return $this->item;
	}

	public function setItem(?SimpleInventoryModelMaster $item) {
		$this->item = $item;
	}

	public function withItem(?SimpleInventoryModelMaster $item): CreateSimpleInventoryModelMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateSimpleInventoryModelMasterResult {
        if ($data === null) {
            return null;
        }
        return (new CreateSimpleInventoryModelMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? SimpleInventoryModelMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}