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

namespace Gs2\Matchmaking\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Matchmaking\Model\Attribute;
use Gs2\Matchmaking\Model\Player;

/**
 * Request for doMatchmakingByPlayer: Find a Gathering in which the Player can participate and join.
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#domatchmakingbyplayer
 */
class DoMatchmakingByPlayerRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var Player Player Information */
    private $player;
    /** @var string Used to resume search Token that holds matchmaking state */
    private $matchmakingContextToken;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return DoMatchmakingByPlayerRequest
     */
	public function withNamespaceName(?string $namespaceName): DoMatchmakingByPlayerRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return Player|null Player Information */
	public function getPlayer(): ?Player {
		return $this->player;
	}
    /** @param Player|null $player Player Information */
	public function setPlayer(?Player $player) {
		$this->player = $player;
	}
    /**
     * @param Player|null $player Player Information
     * @return DoMatchmakingByPlayerRequest
     */
	public function withPlayer(?Player $player): DoMatchmakingByPlayerRequest {
		$this->player = $player;
		return $this;
	}
    /** @return string|null Used to resume search Token that holds matchmaking state */
	public function getMatchmakingContextToken(): ?string {
		return $this->matchmakingContextToken;
	}
    /** @param string|null $matchmakingContextToken Used to resume search Token that holds matchmaking state */
	public function setMatchmakingContextToken(?string $matchmakingContextToken) {
		$this->matchmakingContextToken = $matchmakingContextToken;
	}
    /**
     * @param string|null $matchmakingContextToken Used to resume search Token that holds matchmaking state
     * @return DoMatchmakingByPlayerRequest
     */
	public function withMatchmakingContextToken(?string $matchmakingContextToken): DoMatchmakingByPlayerRequest {
		$this->matchmakingContextToken = $matchmakingContextToken;
		return $this;
	}

    public static function fromJson(?array $data): ?DoMatchmakingByPlayerRequest {
        if ($data === null) {
            return null;
        }
        return (new DoMatchmakingByPlayerRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withPlayer(array_key_exists('player', $data) && $data['player'] !== null ? Player::fromJson($data['player']) : null)
            ->withMatchmakingContextToken(array_key_exists('matchmakingContextToken', $data) && $data['matchmakingContextToken'] !== null ? $data['matchmakingContextToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "player" => $this->getPlayer() !== null ? $this->getPlayer()->toJson() : null,
            "matchmakingContextToken" => $this->getMatchmakingContextToken(),
        );
    }
}