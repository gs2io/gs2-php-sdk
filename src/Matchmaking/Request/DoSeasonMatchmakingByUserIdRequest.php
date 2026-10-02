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

/**
 * Request for doSeasonMatchmakingByUserId: Find a Season Gathering you can join and participate.
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#doseasonmatchmakingbyuserid
 */
class DoSeasonMatchmakingByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Season Model name */
    private $seasonName;
    /** @var string User ID */
    private $userId;
    /** @var string Used to resume search Token that holds matchmaking state */
    private $matchmakingContextToken;
    /** @var string Time offset token */
    private $timeOffsetToken;
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
     * @return DoSeasonMatchmakingByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): DoSeasonMatchmakingByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Season Model name */
	public function getSeasonName(): ?string {
		return $this->seasonName;
	}
    /** @param string|null $seasonName Season Model name */
	public function setSeasonName(?string $seasonName) {
		$this->seasonName = $seasonName;
	}
    /**
     * @param string|null $seasonName Season Model name
     * @return DoSeasonMatchmakingByUserIdRequest
     */
	public function withSeasonName(?string $seasonName): DoSeasonMatchmakingByUserIdRequest {
		$this->seasonName = $seasonName;
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
     * @return DoSeasonMatchmakingByUserIdRequest
     */
	public function withUserId(?string $userId): DoSeasonMatchmakingByUserIdRequest {
		$this->userId = $userId;
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
     * @return DoSeasonMatchmakingByUserIdRequest
     */
	public function withMatchmakingContextToken(?string $matchmakingContextToken): DoSeasonMatchmakingByUserIdRequest {
		$this->matchmakingContextToken = $matchmakingContextToken;
		return $this;
	}
    /** @return string|null Time offset token */
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
    /** @param string|null $timeOffsetToken Time offset token */
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
    /**
     * @param string|null $timeOffsetToken Time offset token
     * @return DoSeasonMatchmakingByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): DoSeasonMatchmakingByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): DoSeasonMatchmakingByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?DoSeasonMatchmakingByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new DoSeasonMatchmakingByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withSeasonName(array_key_exists('seasonName', $data) && $data['seasonName'] !== null ? $data['seasonName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withMatchmakingContextToken(array_key_exists('matchmakingContextToken', $data) && $data['matchmakingContextToken'] !== null ? $data['matchmakingContextToken'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "seasonName" => $this->getSeasonName(),
            "userId" => $this->getUserId(),
            "matchmakingContextToken" => $this->getMatchmakingContextToken(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}