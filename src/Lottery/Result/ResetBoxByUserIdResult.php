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

namespace Gs2\Lottery\Result;

use Gs2\Core\Model\IResult;
use Gs2\Lottery\Model\AcquireAction;
use Gs2\Lottery\Model\BoxItem;
use Gs2\Lottery\Model\BoxItems;

/**
 * Result of resetBoxByUserId: Reset box with specified user ID
 *
 * @see https://docs.gs2.io/api_reference/lottery/sdk/#resetboxbyuserid
 */
class ResetBoxByUserIdResult implements IResult {
    /** @var BoxItems Box state including prizes and their initial quantities */
    private $item;

    /** @return BoxItems|null Box state including prizes and their initial quantities */
	public function getItem(): ?BoxItems {
		return $this->item;
	}

    /** @param BoxItems|null $item Box state including prizes and their initial quantities */
	public function setItem(?BoxItems $item) {
		$this->item = $item;
	}

    /**
     * @param BoxItems|null $item Box state including prizes and their initial quantities
     * @return ResetBoxByUserIdResult
     */
	public function withItem(?BoxItems $item): ResetBoxByUserIdResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?ResetBoxByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new ResetBoxByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? BoxItems::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}