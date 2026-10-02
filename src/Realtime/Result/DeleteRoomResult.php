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

namespace Gs2\Realtime\Result;

use Gs2\Core\Model\IResult;
use Gs2\Realtime\Model\Room;

/**
 * Result of deleteRoom: Delete Room
 *
 * @see https://docs.gs2.io/api_reference/realtime/sdk/#deleteroom
 */
class DeleteRoomResult implements IResult {
    /** @var Room Room Information */
    private $item;

    /** @return Room|null Room Information */
	public function getItem(): ?Room {
		return $this->item;
	}

    /** @param Room|null $item Room Information */
	public function setItem(?Room $item) {
		$this->item = $item;
	}

    /**
     * @param Room|null $item Room Information
     * @return DeleteRoomResult
     */
	public function withItem(?Room $item): DeleteRoomResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteRoomResult {
        if ($data === null) {
            return null;
        }
        return (new DeleteRoomResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Room::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}