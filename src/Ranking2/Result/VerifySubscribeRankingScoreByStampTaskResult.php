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

class VerifySubscribeRankingScoreByStampTaskResult implements IResult {
    /** @var SubscribeRankingScore */
    private $item;
    /** @var string */
    private $newContextStack;

	public function getItem(): ?SubscribeRankingScore {
		return $this->item;
	}

	public function setItem(?SubscribeRankingScore $item) {
		$this->item = $item;
	}

	public function withItem(?SubscribeRankingScore $item): VerifySubscribeRankingScoreByStampTaskResult {
		$this->item = $item;
		return $this;
	}

	public function getNewContextStack(): ?string {
		return $this->newContextStack;
	}

	public function setNewContextStack(?string $newContextStack) {
		$this->newContextStack = $newContextStack;
	}

	public function withNewContextStack(?string $newContextStack): VerifySubscribeRankingScoreByStampTaskResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifySubscribeRankingScoreByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new VerifySubscribeRankingScoreByStampTaskResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? SubscribeRankingScore::fromJson($data['item']) : null)
            ->withNewContextStack(array_key_exists('newContextStack', $data) && $data['newContextStack'] !== null ? $data['newContextStack'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}