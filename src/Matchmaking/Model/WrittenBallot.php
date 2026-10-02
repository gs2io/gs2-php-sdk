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

namespace Gs2\Matchmaking\Model;

use Gs2\Core\Model\IModel;


/**
 * Written Ballot
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#writtenballot
 */
class WrittenBallot implements IModel {
	/**
     * @var Ballot Ballot
	 */
	private $ballot;
	/**
     * @var array List of Match Results
	 */
	private $gameResults;
    /** @return Ballot|null Ballot */
	public function getBallot(): ?Ballot {
		return $this->ballot;
	}
    /** @param Ballot|null $ballot Ballot */
	public function setBallot(?Ballot $ballot) {
		$this->ballot = $ballot;
	}
    /**
     * @param Ballot|null $ballot Ballot
     * @return WrittenBallot
     */
	public function withBallot(?Ballot $ballot): WrittenBallot {
		$this->ballot = $ballot;
		return $this;
	}
    /** @return array|null List of Match Results */
	public function getGameResults(): ?array {
		return $this->gameResults;
	}
    /** @param array|null $gameResults List of Match Results */
	public function setGameResults(?array $gameResults) {
		$this->gameResults = $gameResults;
	}
    /**
     * @param array|null $gameResults List of Match Results
     * @return WrittenBallot
     */
	public function withGameResults(?array $gameResults): WrittenBallot {
		$this->gameResults = $gameResults;
		return $this;
	}

    public static function fromJson(?array $data): ?WrittenBallot {
        if ($data === null) {
            return null;
        }
        return (new WrittenBallot())
            ->withBallot(array_key_exists('ballot', $data) && $data['ballot'] !== null ? Ballot::fromJson($data['ballot']) : null)
            ->withGameResults(!array_key_exists('gameResults', $data) || $data['gameResults'] === null ? null : array_map(
                function ($item) {
                    return GameResult::fromJson($item);
                },
                $data['gameResults']
            ));
    }

    public function toJson(): array {
        return array(
            "ballot" => $this->getBallot() !== null ? $this->getBallot()->toJson() : null,
            "gameResults" => $this->getGameResults() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getGameResults()
            ),
        );
    }
}