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

namespace Gs2\Dictionary\Result;

use Gs2\Core\Model\IResult;
use Gs2\Dictionary\Model\Entry;

/**
 * Result of getEntryByUserId: Get Entry by User ID
 *
 * @see https://docs.gs2.io/api_reference/dictionary/sdk/#getentrybyuserid
 */
class GetEntryByUserIdResult implements IResult {
    /** @var Entry Entry */
    private $item;

    /** @return Entry|null Entry */
	public function getItem(): ?Entry {
		return $this->item;
	}

    /** @param Entry|null $item Entry */
	public function setItem(?Entry $item) {
		$this->item = $item;
	}

    /**
     * @param Entry|null $item Entry
     * @return GetEntryByUserIdResult
     */
	public function withItem(?Entry $item): GetEntryByUserIdResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetEntryByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new GetEntryByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Entry::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}