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
use Gs2\Lottery\Model\CurrentLotteryMaster;

/**
 * Result of getCurrentLotteryMaster: Get currently active Lottery Model master data
 *
 * @see https://docs.gs2.io/api_reference/lottery/sdk/#getcurrentlotterymaster
 */
class GetCurrentLotteryMasterResult implements IResult {
    /** @var CurrentLotteryMaster Currently Active Lottery Model Master Data */
    private $item;

    /** @return CurrentLotteryMaster|null Currently Active Lottery Model Master Data */
	public function getItem(): ?CurrentLotteryMaster {
		return $this->item;
	}

    /** @param CurrentLotteryMaster|null $item Currently Active Lottery Model Master Data */
	public function setItem(?CurrentLotteryMaster $item) {
		$this->item = $item;
	}

    /**
     * @param CurrentLotteryMaster|null $item Currently Active Lottery Model Master Data
     * @return GetCurrentLotteryMasterResult
     */
	public function withItem(?CurrentLotteryMaster $item): GetCurrentLotteryMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetCurrentLotteryMasterResult {
        if ($data === null) {
            return null;
        }
        return (new GetCurrentLotteryMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? CurrentLotteryMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}