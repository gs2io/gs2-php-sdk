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
use Gs2\Lottery\Model\LotteryModelMaster;

/**
 * Result of updateLotteryModelMaster: Update Lottery Model Master
 *
 * @see https://docs.gs2.io/api_reference/lottery/sdk/#updatelotterymodelmaster
 */
class UpdateLotteryModelMasterResult implements IResult {
    /** @var LotteryModelMaster Lottery Model Master updated */
    private $item;

    /** @return LotteryModelMaster|null Lottery Model Master updated */
	public function getItem(): ?LotteryModelMaster {
		return $this->item;
	}

    /** @param LotteryModelMaster|null $item Lottery Model Master updated */
	public function setItem(?LotteryModelMaster $item) {
		$this->item = $item;
	}

    /**
     * @param LotteryModelMaster|null $item Lottery Model Master updated
     * @return UpdateLotteryModelMasterResult
     */
	public function withItem(?LotteryModelMaster $item): UpdateLotteryModelMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateLotteryModelMasterResult {
        if ($data === null) {
            return null;
        }
        return (new UpdateLotteryModelMasterResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? LotteryModelMaster::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}