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

namespace Gs2\Quest\Result;

use Gs2\Core\Model\IResult;
use Gs2\Quest\Model\CurrentQuestMaster;

/**
 * Result of getCurrentQuestMaster: Get currently active Quest Model master data
 *
 * @see https://docs.gs2.io/api_reference/quest/sdk/#getcurrentquestmaster
 */
class GetCurrentQuestMasterResult implements IResult {
    /** @var CurrentQuestMaster Currently active Quest Model master data */
    private $item;

    /** @return CurrentQuestMaster|null Currently active Quest Model master data */
	public function getItem(): ?CurrentQuestMaster {
		return $this->item;
	}

    /** @param CurrentQuestMaster|null $item Currently active Quest Model master data */
	public function setItem(?CurrentQuestMaster $item) {
		$this->item = $item;
	}

    /**
     * @param CurrentQuestMaster|null $item Currently active Quest Model master data
     * @return GetCurrentQuestMasterResult
     */
	public function withItem(?CurrentQuestMaster $item): GetCurrentQuestMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetCurrentQuestMasterResult {
        if ($data === null) {
            return null;
        }
        return (new GetCurrentQuestMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? CurrentQuestMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}