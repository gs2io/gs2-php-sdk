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
 * Result of getCurrentFormMaster: Get currently active Form Model master data
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#getcurrentformmaster
 */
class GetCurrentFormMasterResult implements IResult {
    /** @var CurrentFormMaster Currently active Form Model master data */
    private $item;

    /** @return CurrentFormMaster|null Currently active Form Model master data */
	public function getItem(): ?CurrentFormMaster {
		return $this->item;
	}

    /** @param CurrentFormMaster|null $item Currently active Form Model master data */
	public function setItem(?CurrentFormMaster $item) {
		$this->item = $item;
	}

    /**
     * @param CurrentFormMaster|null $item Currently active Form Model master data
     * @return GetCurrentFormMasterResult
     */
	public function withItem(?CurrentFormMaster $item): GetCurrentFormMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetCurrentFormMasterResult {
        if ($data === null) {
            return null;
        }
        return (new GetCurrentFormMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? CurrentFormMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}