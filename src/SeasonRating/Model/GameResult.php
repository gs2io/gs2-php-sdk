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

namespace Gs2\SeasonRating\Model;

use Gs2\Core\Model\IModel;


/**
 * Match Result
 *
 * @see https://docs.gs2.io/api_reference/season_rating/sdk/#gameresult
 */
class GameResult implements IModel {
	/**
     * @var int Rank
	 */
	private $rank;
	/**
     * @var string User ID
	 */
	private $userId;
    /** @return int|null Rank */
	public function getRank(): ?int {
		return $this->rank;
	}
    /** @param int|null $rank Rank */
	public function setRank(?int $rank) {
		$this->rank = $rank;
	}
    /**
     * @param int|null $rank Rank
     * @return GameResult
     */
	public function withRank(?int $rank): GameResult {
		$this->rank = $rank;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return GameResult
     */
	public function withUserId(?string $userId): GameResult {
		$this->userId = $userId;
		return $this;
	}

    public static function fromJson(?array $data): ?GameResult {
        if ($data === null) {
            return null;
        }
        return (new GameResult())
            ->withRank(array_key_exists('rank', $data) && $data['rank'] !== null ? $data['rank'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null);
    }

    public function toJson(): array {
        return array(
            "rank" => $this->getRank(),
            "userId" => $this->getUserId(),
        );
    }
}