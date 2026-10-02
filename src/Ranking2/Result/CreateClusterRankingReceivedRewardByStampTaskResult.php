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
use Gs2\Ranking2\Model\ClusterRankingReceivedReward;

/**
 * Result of createClusterRankingReceivedRewardByStampTask: Execute record history of cluster ranking rewards received as consume action
 *
 * @see https://docs.gs2.io/api_reference/ranking2/stamp_sheet/#gs2ranking2createclusterrankingreceivedrewardbyuserid
 */
class CreateClusterRankingReceivedRewardByStampTaskResult implements IResult {
    /** @var ClusterRankingReceivedReward Cluster Ranking Reward Received History */
    private $item;
    /** @var string Context recording the execution results of Consume Actions */
    private $newContextStack;

    /** @return ClusterRankingReceivedReward|null Cluster Ranking Reward Received History */
	public function getItem(): ?ClusterRankingReceivedReward {
		return $this->item;
	}

    /** @param ClusterRankingReceivedReward|null $item Cluster Ranking Reward Received History */
	public function setItem(?ClusterRankingReceivedReward $item) {
		$this->item = $item;
	}

    /**
     * @param ClusterRankingReceivedReward|null $item Cluster Ranking Reward Received History
     * @return CreateClusterRankingReceivedRewardByStampTaskResult
     */
	public function withItem(?ClusterRankingReceivedReward $item): CreateClusterRankingReceivedRewardByStampTaskResult {
		$this->item = $item;
		return $this;
	}

    /** @return string|null Context recording the execution results of Consume Actions */
	public function getNewContextStack(): ?string {
		return $this->newContextStack;
	}

    /** @param string|null $newContextStack Context recording the execution results of Consume Actions */
	public function setNewContextStack(?string $newContextStack) {
		$this->newContextStack = $newContextStack;
	}

    /**
     * @param string|null $newContextStack Context recording the execution results of Consume Actions
     * @return CreateClusterRankingReceivedRewardByStampTaskResult
     */
	public function withNewContextStack(?string $newContextStack): CreateClusterRankingReceivedRewardByStampTaskResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateClusterRankingReceivedRewardByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new CreateClusterRankingReceivedRewardByStampTaskResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? ClusterRankingReceivedReward::fromJson($data['item']) : null)
            ->withNewContextStack(array_key_exists('newContextStack', $data) && $data['newContextStack'] !== null ? $data['newContextStack'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}