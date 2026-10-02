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

namespace Gs2\Log\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Log\Model\AggregationConfig;

/**
 * Request for queryTimeseries: Time Series Query (Log)
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#querytimeseries
 */
class QueryTimeseriesRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var int Search range start date and time */
    private $begin;
    /** @var int Search range end date and time */
    private $end;
    /** @var string Search query string */
    private $query;
    /** @var array Fields to group by */
    private $groupBy;
    /** @var AggregationConfig Aggregation configuration */
    private $aggregation;
    /** @var int Aggregation interval in milliseconds */
    private $interval;
    /** @var int Number of series to retrieve */
    private $seriesLimit;
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
     * @return QueryTimeseriesRequest
     */
	public function withNamespaceName(?string $namespaceName): QueryTimeseriesRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return int|null Search range start date and time */
	public function getBegin(): ?int {
		return $this->begin;
	}
    /** @param int|null $begin Search range start date and time */
	public function setBegin(?int $begin) {
		$this->begin = $begin;
	}
    /**
     * @param int|null $begin Search range start date and time
     * @return QueryTimeseriesRequest
     */
	public function withBegin(?int $begin): QueryTimeseriesRequest {
		$this->begin = $begin;
		return $this;
	}
    /** @return int|null Search range end date and time */
	public function getEnd(): ?int {
		return $this->end;
	}
    /** @param int|null $end Search range end date and time */
	public function setEnd(?int $end) {
		$this->end = $end;
	}
    /**
     * @param int|null $end Search range end date and time
     * @return QueryTimeseriesRequest
     */
	public function withEnd(?int $end): QueryTimeseriesRequest {
		$this->end = $end;
		return $this;
	}
    /** @return string|null Search query string */
	public function getQuery(): ?string {
		return $this->query;
	}
    /** @param string|null $query Search query string */
	public function setQuery(?string $query) {
		$this->query = $query;
	}
    /**
     * @param string|null $query Search query string
     * @return QueryTimeseriesRequest
     */
	public function withQuery(?string $query): QueryTimeseriesRequest {
		$this->query = $query;
		return $this;
	}
    /** @return array|null Fields to group by */
	public function getGroupBy(): ?array {
		return $this->groupBy;
	}
    /** @param array|null $groupBy Fields to group by */
	public function setGroupBy(?array $groupBy) {
		$this->groupBy = $groupBy;
	}
    /**
     * @param array|null $groupBy Fields to group by
     * @return QueryTimeseriesRequest
     */
	public function withGroupBy(?array $groupBy): QueryTimeseriesRequest {
		$this->groupBy = $groupBy;
		return $this;
	}
    /** @return AggregationConfig|null Aggregation configuration */
	public function getAggregation(): ?AggregationConfig {
		return $this->aggregation;
	}
    /** @param AggregationConfig|null $aggregation Aggregation configuration */
	public function setAggregation(?AggregationConfig $aggregation) {
		$this->aggregation = $aggregation;
	}
    /**
     * @param AggregationConfig|null $aggregation Aggregation configuration
     * @return QueryTimeseriesRequest
     */
	public function withAggregation(?AggregationConfig $aggregation): QueryTimeseriesRequest {
		$this->aggregation = $aggregation;
		return $this;
	}
    /** @return int|null Aggregation interval in milliseconds */
	public function getInterval(): ?int {
		return $this->interval;
	}
    /** @param int|null $interval Aggregation interval in milliseconds */
	public function setInterval(?int $interval) {
		$this->interval = $interval;
	}
    /**
     * @param int|null $interval Aggregation interval in milliseconds
     * @return QueryTimeseriesRequest
     */
	public function withInterval(?int $interval): QueryTimeseriesRequest {
		$this->interval = $interval;
		return $this;
	}
    /** @return int|null Number of series to retrieve */
	public function getSeriesLimit(): ?int {
		return $this->seriesLimit;
	}
    /** @param int|null $seriesLimit Number of series to retrieve */
	public function setSeriesLimit(?int $seriesLimit) {
		$this->seriesLimit = $seriesLimit;
	}
    /**
     * @param int|null $seriesLimit Number of series to retrieve
     * @return QueryTimeseriesRequest
     */
	public function withSeriesLimit(?int $seriesLimit): QueryTimeseriesRequest {
		$this->seriesLimit = $seriesLimit;
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
     * @return QueryTimeseriesRequest
     */
	public function withPageToken(?string $pageToken): QueryTimeseriesRequest {
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
     * @return QueryTimeseriesRequest
     */
	public function withLimit(?int $limit): QueryTimeseriesRequest {
		$this->limit = $limit;
		return $this;
	}

    public static function fromJson(?array $data): ?QueryTimeseriesRequest {
        if ($data === null) {
            return null;
        }
        return (new QueryTimeseriesRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withBegin(array_key_exists('begin', $data) && $data['begin'] !== null ? $data['begin'] : null)
            ->withEnd(array_key_exists('end', $data) && $data['end'] !== null ? $data['end'] : null)
            ->withQuery(array_key_exists('query', $data) && $data['query'] !== null ? $data['query'] : null)
            ->withGroupBy(!array_key_exists('groupBy', $data) || $data['groupBy'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['groupBy']
            ))
            ->withAggregation(array_key_exists('aggregation', $data) && $data['aggregation'] !== null ? AggregationConfig::fromJson($data['aggregation']) : null)
            ->withInterval(array_key_exists('interval', $data) && $data['interval'] !== null ? $data['interval'] : null)
            ->withSeriesLimit(array_key_exists('seriesLimit', $data) && $data['seriesLimit'] !== null ? $data['seriesLimit'] : null)
            ->withPageToken(array_key_exists('pageToken', $data) && $data['pageToken'] !== null ? $data['pageToken'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "begin" => $this->getBegin(),
            "end" => $this->getEnd(),
            "query" => $this->getQuery(),
            "groupBy" => $this->getGroupBy() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getGroupBy()
            ),
            "aggregation" => $this->getAggregation() !== null ? $this->getAggregation()->toJson() : null,
            "interval" => $this->getInterval(),
            "seriesLimit" => $this->getSeriesLimit(),
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
        );
    }
}