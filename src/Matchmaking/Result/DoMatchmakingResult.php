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
use Gs2\Matchmaking\Model\AttributeRange;
use Gs2\Matchmaking\Model\Attribute;
use Gs2\Matchmaking\Model\Player;
use Gs2\Matchmaking\Model\CapacityOfRole;
use Gs2\Matchmaking\Model\Gathering;

/**
 * Result of doMatchmaking: Find a Gathering you can join and participate.
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#domatchmaking
 */
class DoMatchmakingResult implements IResult {
    /** @var Gathering Participated Gatherings */
    private $item;
    /** @var string Token that preserves matchmaking status */
    private $matchmakingContextToken;

    /** @return Gathering|null Participated Gatherings */
	public function getItem(): ?Gathering {
		return $this->item;
	}

    /** @param Gathering|null $item Participated Gatherings */
	public function setItem(?Gathering $item) {
		$this->item = $item;
	}

    /**
     * @param Gathering|null $item Participated Gatherings
     * @return DoMatchmakingResult
     */
	public function withItem(?Gathering $item): DoMatchmakingResult {
		$this->item = $item;
		return $this;
	}

    /** @return string|null Token that preserves matchmaking status */
	public function getMatchmakingContextToken(): ?string {
		return $this->matchmakingContextToken;
	}

    /** @param string|null $matchmakingContextToken Token that preserves matchmaking status */
	public function setMatchmakingContextToken(?string $matchmakingContextToken) {
		$this->matchmakingContextToken = $matchmakingContextToken;
	}

    /**
     * @param string|null $matchmakingContextToken Token that preserves matchmaking status
     * @return DoMatchmakingResult
     */
	public function withMatchmakingContextToken(?string $matchmakingContextToken): DoMatchmakingResult {
		$this->matchmakingContextToken = $matchmakingContextToken;
		return $this;
	}

    public static function fromJson(?array $data): ?DoMatchmakingResult {
        if ($data === null) {
            return null;
        }
        return (new DoMatchmakingResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Gathering::fromJson($data['item']) : null)
            ->withMatchmakingContextToken(array_key_exists('matchmakingContextToken', $data) && $data['matchmakingContextToken'] !== null ? $data['matchmakingContextToken'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "matchmakingContextToken" => $this->getMatchmakingContextToken(),
        );
    }
}