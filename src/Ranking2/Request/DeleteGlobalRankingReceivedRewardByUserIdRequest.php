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

namespace Gs2\Ranking2\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for deleteGlobalRankingReceivedRewardByUserId: Delete Global Ranking Reward Received History specifying User ID
 *
 * @see https://docs.gs2.io/api_reference/ranking2/sdk/#deleteglobalrankingreceivedrewardbyuserid
 */
class DeleteGlobalRankingReceivedRewardByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Global Ranking Model name */
    private $rankingName;
    /** @var string User ID */
    private $userId;
    /** @var int Season */
    private $season;
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
     * @return DeleteGlobalRankingReceivedRewardByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): DeleteGlobalRankingReceivedRewardByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Global Ranking Model name */
	public function getRankingName(): ?string {
		return $this->rankingName;
	}
    /** @param string|null $rankingName Global Ranking Model name */
	public function setRankingName(?string $rankingName) {
		$this->rankingName = $rankingName;
	}
    /**
     * @param string|null $rankingName Global Ranking Model name
     * @return DeleteGlobalRankingReceivedRewardByUserIdRequest
     */
	public function withRankingName(?string $rankingName): DeleteGlobalRankingReceivedRewardByUserIdRequest {
		$this->rankingName = $rankingName;
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
     * @return DeleteGlobalRankingReceivedRewardByUserIdRequest
     */
	public function withUserId(?string $userId): DeleteGlobalRankingReceivedRewardByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Season */
	public function getSeason(): ?int {
		return $this->season;
	}
    /** @param int|null $season Season */
	public function setSeason(?int $season) {
		$this->season = $season;
	}
    /**
     * @param int|null $season Season
     * @return DeleteGlobalRankingReceivedRewardByUserIdRequest
     */
	public function withSeason(?int $season): DeleteGlobalRankingReceivedRewardByUserIdRequest {
		$this->season = $season;
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
     * @return DeleteGlobalRankingReceivedRewardByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): DeleteGlobalRankingReceivedRewardByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): DeleteGlobalRankingReceivedRewardByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteGlobalRankingReceivedRewardByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new DeleteGlobalRankingReceivedRewardByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRankingName(array_key_exists('rankingName', $data) && $data['rankingName'] !== null ? $data['rankingName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withSeason(array_key_exists('season', $data) && $data['season'] !== null ? $data['season'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "rankingName" => $this->getRankingName(),
            "userId" => $this->getUserId(),
            "season" => $this->getSeason(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}