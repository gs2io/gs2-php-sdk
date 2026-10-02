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

namespace Gs2\Ranking2\Result;

use Gs2\Core\Model\IResult;
use Gs2\Ranking2\Model\GlobalRankingReceivedReward;

/**
 * Result of createGlobalRankingReceivedReward: Record global ranking reward receipt history
 *
 * @see https://docs.gs2.io/api_reference/ranking2/sdk/#createglobalrankingreceivedreward
 */
class CreateGlobalRankingReceivedRewardResult implements IResult {
    /** @var GlobalRankingReceivedReward Global Ranking Reward Received History */
    private $item;

    /** @return GlobalRankingReceivedReward|null Global Ranking Reward Received History */
	public function getItem(): ?GlobalRankingReceivedReward {
		return $this->item;
	}

    /** @param GlobalRankingReceivedReward|null $item Global Ranking Reward Received History */
	public function setItem(?GlobalRankingReceivedReward $item) {
		$this->item = $item;
	}

    /**
     * @param GlobalRankingReceivedReward|null $item Global Ranking Reward Received History
     * @return CreateGlobalRankingReceivedRewardResult
     */
	public function withItem(?GlobalRankingReceivedReward $item): CreateGlobalRankingReceivedRewardResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateGlobalRankingReceivedRewardResult {
        if ($data === null) {
            return null;
        }
        return (new CreateGlobalRankingReceivedRewardResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? GlobalRankingReceivedReward::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}