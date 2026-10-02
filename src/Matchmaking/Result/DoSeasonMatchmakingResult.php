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
use Gs2\Matchmaking\Model\SeasonGathering;

/**
 * Result of doSeasonMatchmaking: Find a Season Gathering you can join and participate.
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#doseasonmatchmaking
 */
class DoSeasonMatchmakingResult implements IResult {
    /** @var SeasonGathering Participated Season Gatherings */
    private $item;
    /** @var string Token that preserves matchmaking status */
    private $matchmakingContextToken;

    /** @return SeasonGathering|null Participated Season Gatherings */
	public function getItem(): ?SeasonGathering {
		return $this->item;
	}

    /** @param SeasonGathering|null $item Participated Season Gatherings */
	public function setItem(?SeasonGathering $item) {
		$this->item = $item;
	}

    /**
     * @param SeasonGathering|null $item Participated Season Gatherings
     * @return DoSeasonMatchmakingResult
     */
	public function withItem(?SeasonGathering $item): DoSeasonMatchmakingResult {
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
     * @return DoSeasonMatchmakingResult
     */
	public function withMatchmakingContextToken(?string $matchmakingContextToken): DoSeasonMatchmakingResult {
		$this->matchmakingContextToken = $matchmakingContextToken;
		return $this;
	}

    public static function fromJson(?array $data): ?DoSeasonMatchmakingResult {
        if ($data === null) {
            return null;
        }
        return (new DoSeasonMatchmakingResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? SeasonGathering::fromJson($data['item']) : null)
            ->withMatchmakingContextToken(array_key_exists('matchmakingContextToken', $data) && $data['matchmakingContextToken'] !== null ? $data['matchmakingContextToken'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "matchmakingContextToken" => $this->getMatchmakingContextToken(),
        );
    }
}