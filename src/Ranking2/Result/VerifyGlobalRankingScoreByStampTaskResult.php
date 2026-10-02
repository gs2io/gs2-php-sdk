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
use Gs2\Ranking2\Model\GlobalRankingScore;

/**
 * Result of verifyGlobalRankingScoreByStampTask: Execute the verification of the global ranking score as a verification action
 *
 * @see https://docs.gs2.io/api_reference/ranking2/stamp_sheet/#gs2ranking2verifyglobalrankingscorebyuserid
 */
class VerifyGlobalRankingScoreByStampTaskResult implements IResult {
    /** @var GlobalRankingScore Global Ranking Score */
    private $item;
    /** @var string Context recording the execution results of verification actions */
    private $newContextStack;

    /** @return GlobalRankingScore|null Global Ranking Score */
	public function getItem(): ?GlobalRankingScore {
		return $this->item;
	}

    /** @param GlobalRankingScore|null $item Global Ranking Score */
	public function setItem(?GlobalRankingScore $item) {
		$this->item = $item;
	}

    /**
     * @param GlobalRankingScore|null $item Global Ranking Score
     * @return VerifyGlobalRankingScoreByStampTaskResult
     */
	public function withItem(?GlobalRankingScore $item): VerifyGlobalRankingScoreByStampTaskResult {
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
     * @return VerifyGlobalRankingScoreByStampTaskResult
     */
	public function withNewContextStack(?string $newContextStack): VerifyGlobalRankingScoreByStampTaskResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyGlobalRankingScoreByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new VerifyGlobalRankingScoreByStampTaskResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? GlobalRankingScore::fromJson($data['item']) : null)
            ->withNewContextStack(array_key_exists('newContextStack', $data) && $data['newContextStack'] !== null ? $data['newContextStack'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}