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

class DoSeasonMatchmakingByUserIdResult implements IResult {
    /** @var SeasonGathering */
    private $item;
    /** @var string */
    private $matchmakingContextToken;

	public function getItem(): ?SeasonGathering {
		return $this->item;
	}

	public function setItem(?SeasonGathering $item) {
		$this->item = $item;
	}

	public function withItem(?SeasonGathering $item): DoSeasonMatchmakingByUserIdResult {
		$this->item = $item;
		return $this;
	}

	public function getMatchmakingContextToken(): ?string {
		return $this->matchmakingContextToken;
	}

	public function setMatchmakingContextToken(?string $matchmakingContextToken) {
		$this->matchmakingContextToken = $matchmakingContextToken;
	}

	public function withMatchmakingContextToken(?string $matchmakingContextToken): DoSeasonMatchmakingByUserIdResult {
		$this->matchmakingContextToken = $matchmakingContextToken;
		return $this;
	}

    public static function fromJson(?array $data): ?DoSeasonMatchmakingByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new DoSeasonMatchmakingByUserIdResult())
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