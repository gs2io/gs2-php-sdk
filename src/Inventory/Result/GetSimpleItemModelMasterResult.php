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
use Gs2\Inventory\Model\SimpleItemModelMaster;

/**
 * Result of getSimpleItemModelMaster: Get Simple Item Model Master
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#getsimpleitemmodelmaster
 */
class GetSimpleItemModelMasterResult implements IResult {
    /** @var SimpleItemModelMaster Simple Item Model Master */
    private $item;

    /** @return SimpleItemModelMaster|null Simple Item Model Master */
	public function getItem(): ?SimpleItemModelMaster {
		return $this->item;
	}

    /** @param SimpleItemModelMaster|null $item Simple Item Model Master */
	public function setItem(?SimpleItemModelMaster $item) {
		$this->item = $item;
	}

    /**
     * @param SimpleItemModelMaster|null $item Simple Item Model Master
     * @return GetSimpleItemModelMasterResult
     */
	public function withItem(?SimpleItemModelMaster $item): GetSimpleItemModelMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetSimpleItemModelMasterResult {
        if ($data === null) {
            return null;
        }
        return (new GetSimpleItemModelMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? SimpleItemModelMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}