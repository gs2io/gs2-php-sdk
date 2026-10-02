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

namespace Gs2\Matchmaking\Result;

use Gs2\Core\Model\IResult;
use Gs2\Matchmaking\Model\Ballot;

/**
 * Result of vote: Vote on match results
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#vote-1
 */
class VoteResult implements IResult {
    /** @var Ballot Ballot */
    private $item;

    /** @return Ballot|null Ballot */
	public function getItem(): ?Ballot {
		return $this->item;
	}

    /** @param Ballot|null $item Ballot */
	public function setItem(?Ballot $item) {
		$this->item = $item;
	}

    /**
     * @param Ballot|null $item Ballot
     * @return VoteResult
     */
	public function withItem(?Ballot $item): VoteResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?VoteResult {
        if ($data === null) {
            return null;
        }
        return (new VoteResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Ballot::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}