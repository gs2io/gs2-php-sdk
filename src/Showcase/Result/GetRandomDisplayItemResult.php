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

namespace Gs2\Showcase\Result;

use Gs2\Core\Model\IResult;
use Gs2\Showcase\Model\VerifyAction;
use Gs2\Showcase\Model\ConsumeAction;
use Gs2\Showcase\Model\AcquireAction;
use Gs2\Showcase\Model\RandomDisplayItem;

class GetRandomDisplayItemResult implements IResult {
    /** @var RandomDisplayItem */
    private $item;

	public function getItem(): ?RandomDisplayItem {
		return $this->item;
	}

	public function setItem(?RandomDisplayItem $item) {
		$this->item = $item;
	}

	public function withItem(?RandomDisplayItem $item): GetRandomDisplayItemResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetRandomDisplayItemResult {
        if ($data === null) {
            return null;
        }
        return (new GetRandomDisplayItemResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? RandomDisplayItem::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}