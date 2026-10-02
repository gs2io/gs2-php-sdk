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

namespace Gs2\Stamina\Result;

use Gs2\Core\Model\IResult;
use Gs2\Stamina\Model\CurrentStaminaMaster;

/**
 * Result of getCurrentStaminaMaster: Get currently active Stamina Model master data
 *
 * @see https://docs.gs2.io/api_reference/stamina/sdk/#getcurrentstaminamaster
 */
class GetCurrentStaminaMasterResult implements IResult {
    /** @var CurrentStaminaMaster Currently active Stamina Model master data */
    private $item;

    /** @return CurrentStaminaMaster|null Currently active Stamina Model master data */
	public function getItem(): ?CurrentStaminaMaster {
		return $this->item;
	}

    /** @param CurrentStaminaMaster|null $item Currently active Stamina Model master data */
	public function setItem(?CurrentStaminaMaster $item) {
		$this->item = $item;
	}

    /**
     * @param CurrentStaminaMaster|null $item Currently active Stamina Model master data
     * @return GetCurrentStaminaMasterResult
     */
	public function withItem(?CurrentStaminaMaster $item): GetCurrentStaminaMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetCurrentStaminaMasterResult {
        if ($data === null) {
            return null;
        }
        return (new GetCurrentStaminaMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? CurrentStaminaMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}