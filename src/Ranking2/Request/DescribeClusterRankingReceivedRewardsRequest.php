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
 * Request for describeClusterRankingReceivedRewards: List Cluster Ranking Rewards Received
 *
 * @see https://docs.gs2.io/api_reference/ranking2/sdk/#describeclusterrankingreceivedrewards
 */
class DescribeClusterRankingReceivedRewardsRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Cluster Ranking Model name */
    private $rankingName;
    /** @var string Cluster Name */
    private $clusterName;
    /** @var int Season */
    private $season;
    /** @var string Token specifying the position from which to start acquiring data */
    private $pageToken;
    /** @var int Number of data items to retrieve */
    private $limit;
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
     * @return DescribeClusterRankingReceivedRewardsRequest
     */
	public function withNamespaceName(?string $namespaceName): DescribeClusterRankingReceivedRewardsRequest {
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
     * @return DescribeClusterRankingReceivedRewardsRequest
     */
	public function withAccessToken(?string $accessToken): DescribeClusterRankingReceivedRewardsRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Cluster Ranking Model name */
	public function getRankingName(): ?string {
		return $this->rankingName;
	}
    /** @param string|null $rankingName Cluster Ranking Model name */
	public function setRankingName(?string $rankingName) {
		$this->rankingName = $rankingName;
	}
    /**
     * @param string|null $rankingName Cluster Ranking Model name
     * @return DescribeClusterRankingReceivedRewardsRequest
     */
	public function withRankingName(?string $rankingName): DescribeClusterRankingReceivedRewardsRequest {
		$this->rankingName = $rankingName;
		return $this;
	}
    /** @return string|null Cluster Name */
	public function getClusterName(): ?string {
		return $this->clusterName;
	}
    /** @param string|null $clusterName Cluster Name */
	public function setClusterName(?string $clusterName) {
		$this->clusterName = $clusterName;
	}
    /**
     * @param string|null $clusterName Cluster Name
     * @return DescribeClusterRankingReceivedRewardsRequest
     */
	public function withClusterName(?string $clusterName): DescribeClusterRankingReceivedRewardsRequest {
		$this->clusterName = $clusterName;
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
     * @return DescribeClusterRankingReceivedRewardsRequest
     */
	public function withSeason(?int $season): DescribeClusterRankingReceivedRewardsRequest {
		$this->season = $season;
		return $this;
	}
    /** @return string|null Token specifying the position from which to start acquiring data */
	public function getPageToken(): ?string {
		return $this->pageToken;
	}
    /** @param string|null $pageToken Token specifying the position from which to start acquiring data */
	public function setPageToken(?string $pageToken) {
		$this->pageToken = $pageToken;
	}
    /**
     * @param string|null $pageToken Token specifying the position from which to start acquiring data
     * @return DescribeClusterRankingReceivedRewardsRequest
     */
	public function withPageToken(?string $pageToken): DescribeClusterRankingReceivedRewardsRequest {
		$this->pageToken = $pageToken;
		return $this;
	}
    /** @return int|null Number of data items to retrieve */
	public function getLimit(): ?int {
		return $this->limit;
	}
    /** @param int|null $limit Number of data items to retrieve */
	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}
    /**
     * @param int|null $limit Number of data items to retrieve
     * @return DescribeClusterRankingReceivedRewardsRequest
     */
	public function withLimit(?int $limit): DescribeClusterRankingReceivedRewardsRequest {
		$this->limit = $limit;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeClusterRankingReceivedRewardsRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeClusterRankingReceivedRewardsRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withRankingName(array_key_exists('rankingName', $data) && $data['rankingName'] !== null ? $data['rankingName'] : null)
            ->withClusterName(array_key_exists('clusterName', $data) && $data['clusterName'] !== null ? $data['clusterName'] : null)
            ->withSeason(array_key_exists('season', $data) && $data['season'] !== null ? $data['season'] : null)
            ->withPageToken(array_key_exists('pageToken', $data) && $data['pageToken'] !== null ? $data['pageToken'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "rankingName" => $this->getRankingName(),
            "clusterName" => $this->getClusterName(),
            "season" => $this->getSeason(),
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
        );
    }
}