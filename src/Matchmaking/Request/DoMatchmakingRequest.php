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
 * Request for doMatchmaking: Find a Gathering you can join and participate.
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#domatchmaking
 */
class DoMatchmakingRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var Player Own player information */
    private $player;
    /** @var string Used to resume search Token that holds matchmaking state */
    private $matchmakingContextToken;
    /** @var string */
    private $duplicationAvoider;
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
     * @return DoMatchmakingRequest
     */
	public function withNamespaceName(?string $namespaceName): DoMatchmakingRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID
     * @return DoMatchmakingRequest
     */
	public function withAccessToken(?string $accessToken): DoMatchmakingRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return Player|null Own player information */
	public function getPlayer(): ?Player {
		return $this->player;
	}
    /** @param Player|null $player Own player information */
	public function setPlayer(?Player $player) {
		$this->player = $player;
	}
    /**
     * @param Player|null $player Own player information
     * @return DoMatchmakingRequest
     */
	public function withPlayer(?Player $player): DoMatchmakingRequest {
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
     * @return DoMatchmakingRequest
     */
	public function withMatchmakingContextToken(?string $matchmakingContextToken): DoMatchmakingRequest {
		$this->matchmakingContextToken = $matchmakingContextToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): DoMatchmakingRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?DoMatchmakingRequest {
        if ($data === null) {
            return null;
        }
        return (new DoMatchmakingRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withPlayer(array_key_exists('player', $data) && $data['player'] !== null ? Player::fromJson($data['player']) : null)
            ->withMatchmakingContextToken(array_key_exists('matchmakingContextToken', $data) && $data['matchmakingContextToken'] !== null ? $data['matchmakingContextToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "player" => $this->getPlayer() !== null ? $this->getPlayer()->toJson() : null,
            "matchmakingContextToken" => $this->getMatchmakingContextToken(),
        );
    }
}