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
use Gs2\Ranking2\Model\ClusterRankingScore;

/**
 * Result of getClusterRankingScoreByUserId: Get Cluster Ranking Score specifying User ID
 *
 * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getclusterrankingscorebyuserid
 */
class GetClusterRankingScoreByUserIdResult implements IResult {
    /** @var ClusterRankingScore Cluster Ranking Score */
    private $item;

    /** @return ClusterRankingScore|null Cluster Ranking Score */
	public function getItem(): ?ClusterRankingScore {
		return $this->item;
	}

    /** @param ClusterRankingScore|null $item Cluster Ranking Score */
	public function setItem(?ClusterRankingScore $item) {
		$this->item = $item;
	}

    /**
     * @param ClusterRankingScore|null $item Cluster Ranking Score
     * @return GetClusterRankingScoreByUserIdResult
     */
	public function withItem(?ClusterRankingScore $item): GetClusterRankingScoreByUserIdResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetClusterRankingScoreByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new GetClusterRankingScoreByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? ClusterRankingScore::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}