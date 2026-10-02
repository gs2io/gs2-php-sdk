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
use Gs2\Formation\Model\CurrentFormMaster;

/**
 * Result of updateCurrentFormMaster: Update currently active Form Model master data
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#updatecurrentformmaster
 */
class UpdateCurrentFormMasterResult implements IResult {
    /** @var CurrentFormMaster Updated master data of the currently active Form Models */
    private $item;

    /** @return CurrentFormMaster|null Updated master data of the currently active Form Models */
	public function getItem(): ?CurrentFormMaster {
		return $this->item;
	}

    /** @param CurrentFormMaster|null $item Updated master data of the currently active Form Models */
	public function setItem(?CurrentFormMaster $item) {
		$this->item = $item;
	}

    /**
     * @param CurrentFormMaster|null $item Updated master data of the currently active Form Models
     * @return UpdateCurrentFormMasterResult
     */
	public function withItem(?CurrentFormMaster $item): UpdateCurrentFormMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateCurrentFormMasterResult {
        if ($data === null) {
            return null;
        }
        return (new UpdateCurrentFormMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? CurrentFormMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}