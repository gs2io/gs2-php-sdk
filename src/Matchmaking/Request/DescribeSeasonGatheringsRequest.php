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
 * Request for describeSeasonGatherings: List Season Gatherings
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#describeseasongatherings
 */
class DescribeSeasonGatheringsRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Season Model name */
    private $seasonName;
    /** @var int Season */
    private $season;
    /** @var int Tier */
    private $tier;
    /** @var string Token specifying the position from which to start acquiring data */
    private $pageToken;
    /** @var int Number of data acquired */
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
     * @return DescribeSeasonGatheringsRequest
     */
	public function withNamespaceName(?string $namespaceName): DescribeSeasonGatheringsRequest {
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
     * @return DescribeSeasonGatheringsRequest
     */
	public function withSeasonName(?string $seasonName): DescribeSeasonGatheringsRequest {
		$this->seasonName = $seasonName;
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
     * @return DescribeSeasonGatheringsRequest
     */
	public function withSeason(?int $season): DescribeSeasonGatheringsRequest {
		$this->season = $season;
		return $this;
	}
    /** @return int|null Tier */
	public function getTier(): ?int {
		return $this->tier;
	}
    /** @param int|null $tier Tier */
	public function setTier(?int $tier) {
		$this->tier = $tier;
	}
    /**
     * @param int|null $tier Tier
     * @return DescribeSeasonGatheringsRequest
     */
	public function withTier(?int $tier): DescribeSeasonGatheringsRequest {
		$this->tier = $tier;
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
     * @return DescribeSeasonGatheringsRequest
     */
	public function withPageToken(?string $pageToken): DescribeSeasonGatheringsRequest {
		$this->pageToken = $pageToken;
		return $this;
	}
    /** @return int|null Number of data acquired */
	public function getLimit(): ?int {
		return $this->limit;
	}
    /** @param int|null $limit Number of data acquired */
	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}
    /**
     * @param int|null $limit Number of data acquired
     * @return DescribeSeasonGatheringsRequest
     */
	public function withLimit(?int $limit): DescribeSeasonGatheringsRequest {
		$this->limit = $limit;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeSeasonGatheringsRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeSeasonGatheringsRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withSeasonName(array_key_exists('seasonName', $data) && $data['seasonName'] !== null ? $data['seasonName'] : null)
            ->withSeason(array_key_exists('season', $data) && $data['season'] !== null ? $data['season'] : null)
            ->withTier(array_key_exists('tier', $data) && $data['tier'] !== null ? $data['tier'] : null)
            ->withPageToken(array_key_exists('pageToken', $data) && $data['pageToken'] !== null ? $data['pageToken'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "seasonName" => $this->getSeasonName(),
            "season" => $this->getSeason(),
            "tier" => $this->getTier(),
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
        );
    }
}