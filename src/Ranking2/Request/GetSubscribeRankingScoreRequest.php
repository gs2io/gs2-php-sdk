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
 * Request for getSubscribeRankingScore: Get Subscribe Ranking Score
 *
 * @see https://docs.gs2.io/api_reference/ranking2/sdk/#getsubscriberankingscore
 */
class GetSubscribeRankingScoreRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Subscribe Ranking Model name */
    private $rankingName;
    /** @var string User ID */
    private $accessToken;
    /** @var int Season */
    private $season;
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
     * @return GetSubscribeRankingScoreRequest
     */
	public function withNamespaceName(?string $namespaceName): GetSubscribeRankingScoreRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Subscribe Ranking Model name */
	public function getRankingName(): ?string {
		return $this->rankingName;
	}
    /** @param string|null $rankingName Subscribe Ranking Model name */
	public function setRankingName(?string $rankingName) {
		$this->rankingName = $rankingName;
	}
    /**
     * @param string|null $rankingName Subscribe Ranking Model name
     * @return GetSubscribeRankingScoreRequest
     */
	public function withRankingName(?string $rankingName): GetSubscribeRankingScoreRequest {
		$this->rankingName = $rankingName;
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
     * @return GetSubscribeRankingScoreRequest
     */
	public function withAccessToken(?string $accessToken): GetSubscribeRankingScoreRequest {
		$this->accessToken = $accessToken;
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
     * @return GetSubscribeRankingScoreRequest
     */
	public function withSeason(?int $season): GetSubscribeRankingScoreRequest {
		$this->season = $season;
		return $this;
	}

    public static function fromJson(?array $data): ?GetSubscribeRankingScoreRequest {
        if ($data === null) {
            return null;
        }
        return (new GetSubscribeRankingScoreRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRankingName(array_key_exists('rankingName', $data) && $data['rankingName'] !== null ? $data['rankingName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withSeason(array_key_exists('season', $data) && $data['season'] !== null ? $data['season'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "rankingName" => $this->getRankingName(),
            "accessToken" => $this->getAccessToken(),
            "season" => $this->getSeason(),
        );
    }
}