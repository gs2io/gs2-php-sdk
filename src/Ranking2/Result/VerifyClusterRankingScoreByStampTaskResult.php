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
 * Result of verifyClusterRankingScoreByStampTask: Execute the verification of the cluster ranking score as a verification action
 *
 * @see https://docs.gs2.io/api_reference/ranking2/stamp_sheet/#gs2ranking2verifyclusterrankingscorebyuserid
 */
class VerifyClusterRankingScoreByStampTaskResult implements IResult {
    /** @var ClusterRankingScore Cluster Ranking Score */
    private $item;
    /** @var string Context recording the execution results of verification actions */
    private $newContextStack;

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
     * @return VerifyClusterRankingScoreByStampTaskResult
     */
	public function withItem(?ClusterRankingScore $item): VerifyClusterRankingScoreByStampTaskResult {
		$this->item = $item;
		return $this;
	}

    /** @return string|null Context recording the execution results of verification actions */
	public function getNewContextStack(): ?string {
		return $this->newContextStack;
	}

    /** @param string|null $newContextStack Context recording the execution results of verification actions */
	public function setNewContextStack(?string $newContextStack) {
		$this->newContextStack = $newContextStack;
	}

    /**
     * @param string|null $newContextStack Context recording the execution results of verification actions
     * @return VerifyClusterRankingScoreByStampTaskResult
     */
	public function withNewContextStack(?string $newContextStack): VerifyClusterRankingScoreByStampTaskResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyClusterRankingScoreByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new VerifyClusterRankingScoreByStampTaskResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? ClusterRankingScore::fromJson($data['item']) : null)
            ->withNewContextStack(array_key_exists('newContextStack', $data) && $data['newContextStack'] !== null ? $data['newContextStack'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}