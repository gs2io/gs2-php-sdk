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

class GetClusterRankingScoreRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $rankingName;
    /** @var string */
    private $clusterName;
    /** @var string */
    private $accessToken;
    /** @var int */
    private $season;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): GetClusterRankingScoreRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getRankingName(): ?string {
		return $this->rankingName;
	}
	public function setRankingName(?string $rankingName) {
		$this->rankingName = $rankingName;
	}
	public function withRankingName(?string $rankingName): GetClusterRankingScoreRequest {
		$this->rankingName = $rankingName;
		return $this;
	}
	public function getClusterName(): ?string {
		return $this->clusterName;
	}
	public function setClusterName(?string $clusterName) {
		$this->clusterName = $clusterName;
	}
	public function withClusterName(?string $clusterName): GetClusterRankingScoreRequest {
		$this->clusterName = $clusterName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): GetClusterRankingScoreRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getSeason(): ?int {
		return $this->season;
	}
	public function setSeason(?int $season) {
		$this->season = $season;
	}
	public function withSeason(?int $season): GetClusterRankingScoreRequest {
		$this->season = $season;
		return $this;
	}

    public static function fromJson(?array $data): ?GetClusterRankingScoreRequest {
        if ($data === null) {
            return null;
        }
        return (new GetClusterRankingScoreRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRankingName(array_key_exists('rankingName', $data) && $data['rankingName'] !== null ? $data['rankingName'] : null)
            ->withClusterName(array_key_exists('clusterName', $data) && $data['clusterName'] !== null ? $data['clusterName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withSeason(array_key_exists('season', $data) && $data['season'] !== null ? $data['season'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "rankingName" => $this->getRankingName(),
            "clusterName" => $this->getClusterName(),
            "accessToken" => $this->getAccessToken(),
            "season" => $this->getSeason(),
        );
    }
}