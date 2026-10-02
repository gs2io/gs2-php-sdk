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

namespace Gs2\Schedule\Result;

use Gs2\Core\Model\IResult;
use Gs2\Schedule\Model\RepeatSetting;
use Gs2\Schedule\Model\EventMaster;

/**
 * Result of deleteEventMaster: Delete Event Master
 *
 * @see https://docs.gs2.io/api_reference/schedule/sdk/#deleteeventmaster
 */
class DeleteEventMasterResult implements IResult {
    /** @var EventMaster Event Master deleted */
    private $item;

    /** @return EventMaster|null Event Master deleted */
	public function getItem(): ?EventMaster {
		return $this->item;
	}

    /** @param EventMaster|null $item Event Master deleted */
	public function setItem(?EventMaster $item) {
		$this->item = $item;
	}

    /**
     * @param EventMaster|null $item Event Master deleted
     * @return DeleteEventMasterResult
     */
	public function withItem(?EventMaster $item): DeleteEventMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteEventMasterResult {
        if ($data === null) {
            return null;
        }
        return (new DeleteEventMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? EventMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}