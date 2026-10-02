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
use Gs2\Lottery\Model\PrizeLimit;

/**
 * Result of getPrizeLimit: Get Prize Limit
 *
 * @see https://docs.gs2.io/api_reference/lottery/sdk/#getprizelimit
 */
class GetPrizeLimitResult implements IResult {
    /** @var PrizeLimit Prize Limit */
    private $item;

    /** @return PrizeLimit|null Prize Limit */
	public function getItem(): ?PrizeLimit {
		return $this->item;
	}

    /** @param PrizeLimit|null $item Prize Limit */
	public function setItem(?PrizeLimit $item) {
		$this->item = $item;
	}

    /**
     * @param PrizeLimit|null $item Prize Limit
     * @return GetPrizeLimitResult
     */
	public function withItem(?PrizeLimit $item): GetPrizeLimitResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetPrizeLimitResult {
        if ($data === null) {
            return null;
        }
        return (new GetPrizeLimitResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? PrizeLimit::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}