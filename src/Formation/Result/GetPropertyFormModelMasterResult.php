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

namespace Gs2\Formation\Result;

use Gs2\Core\Model\IResult;
use Gs2\Formation\Model\SlotModel;
use Gs2\Formation\Model\PropertyFormModelMaster;

/**
 * Result of getPropertyFormModelMaster: Get Property Form Model Master
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#getpropertyformmodelmaster
 */
class GetPropertyFormModelMasterResult implements IResult {
    /** @var PropertyFormModelMaster Form Model Master */
    private $item;

    /** @return PropertyFormModelMaster|null Form Model Master */
	public function getItem(): ?PropertyFormModelMaster {
		return $this->item;
	}

    /** @param PropertyFormModelMaster|null $item Form Model Master */
	public function setItem(?PropertyFormModelMaster $item) {
		$this->item = $item;
	}

    /**
     * @param PropertyFormModelMaster|null $item Form Model Master
     * @return GetPropertyFormModelMasterResult
     */
	public function withItem(?PropertyFormModelMaster $item): GetPropertyFormModelMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetPropertyFormModelMasterResult {
        if ($data === null) {
            return null;
        }
        return (new GetPropertyFormModelMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? PropertyFormModelMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}