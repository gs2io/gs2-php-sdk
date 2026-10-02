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
use Gs2\Ranking2\Model\SubscribeRankingScore;

/**
 * Result of putSubscribeRankingScoreByUserId: Register Subscribe Ranking Score specifying User ID
 *
 * @see https://docs.gs2.io/api_reference/ranking2/sdk/#putsubscriberankingscorebyuserid
 */
class PutSubscribeRankingScoreByUserIdResult implements IResult {
    /** @var SubscribeRankingScore Registered Subscribe Ranking Score */
    private $item;

    /** @return SubscribeRankingScore|null Registered Subscribe Ranking Score */
	public function getItem(): ?SubscribeRankingScore {
		return $this->item;
	}

    /** @param SubscribeRankingScore|null $item Registered Subscribe Ranking Score */
	public function setItem(?SubscribeRankingScore $item) {
		$this->item = $item;
	}

    /**
     * @param SubscribeRankingScore|null $item Registered Subscribe Ranking Score
     * @return PutSubscribeRankingScoreByUserIdResult
     */
	public function withItem(?SubscribeRankingScore $item): PutSubscribeRankingScoreByUserIdResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?PutSubscribeRankingScoreByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new PutSubscribeRankingScoreByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? SubscribeRankingScore::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}