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
use Gs2\Quest\Model\CompletedQuestList;

/**
 * Result of verifyCompletedQuestList: Verify Completed Quest List
 *
 * @see https://docs.gs2.io/api_reference/quest/sdk/#verifycompletedquestlist
 */
class VerifyCompletedQuestListResult implements IResult {
    /** @var CompletedQuestList Completed Quest List */
    private $item;

    /** @return CompletedQuestList|null Completed Quest List */
	public function getItem(): ?CompletedQuestList {
		return $this->item;
	}

    /** @param CompletedQuestList|null $item Completed Quest List */
	public function setItem(?CompletedQuestList $item) {
		$this->item = $item;
	}

    /**
     * @param CompletedQuestList|null $item Completed Quest List
     * @return VerifyCompletedQuestListResult
     */
	public function withItem(?CompletedQuestList $item): VerifyCompletedQuestListResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyCompletedQuestListResult {
        if ($data === null) {
            return null;
        }
        return (new VerifyCompletedQuestListResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? CompletedQuestList::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}