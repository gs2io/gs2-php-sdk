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

namespace Gs2\MegaField\Result;

use Gs2\Core\Model\IResult;
use Gs2\MegaField\Model\CurrentFieldMaster;

/**
 * Result of updateCurrentFieldMaster: Update currently active Field Model master data
 *
 * @see https://docs.gs2.io/api_reference/mega_field/sdk/#updatecurrentfieldmaster
 */
class UpdateCurrentFieldMasterResult implements IResult {
    /** @var CurrentFieldMaster Updated master data of the currently active Field Models */
    private $item;

    /** @return CurrentFieldMaster|null Updated master data of the currently active Field Models */
	public function getItem(): ?CurrentFieldMaster {
		return $this->item;
	}

    /** @param CurrentFieldMaster|null $item Updated master data of the currently active Field Models */
	public function setItem(?CurrentFieldMaster $item) {
		$this->item = $item;
	}

    /**
     * @param CurrentFieldMaster|null $item Updated master data of the currently active Field Models
     * @return UpdateCurrentFieldMasterResult
     */
	public function withItem(?CurrentFieldMaster $item): UpdateCurrentFieldMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateCurrentFieldMasterResult {
        if ($data === null) {
            return null;
        }
        return (new UpdateCurrentFieldMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? CurrentFieldMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}