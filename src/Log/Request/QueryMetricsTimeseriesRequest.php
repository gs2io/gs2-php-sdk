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
 * Request for queryMetricsTimeseries: Time Series Query (Metrics)
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#querymetricstimeseries
 */
class QueryMetricsTimeseriesRequest extends Gs2BasicRequest {
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
    /** @var array List of aggregation configurations */
    private $aggregations;
    /** @var int Aggregation interval in milliseconds */
    private $interval;
    /** @var int Number of series to retrieve */
    private $seriesLimit;
    /** @var string Order key */
    private $orderKey;
    /** @var string Order by */
    private $orderBy;
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
     * @return QueryMetricsTimeseriesRequest
     */
	public function withNamespaceName(?string $namespaceName): QueryMetricsTimeseriesRequest {
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
     * @return QueryMetricsTimeseriesRequest
     */
	public function withBegin(?int $begin): QueryMetricsTimeseriesRequest {
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
     * @return QueryMetricsTimeseriesRequest
     */
	public function withEnd(?int $end): QueryMetricsTimeseriesRequest {
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
     * @return QueryMetricsTimeseriesRequest
     */
	public function withQuery(?string $query): QueryMetricsTimeseriesRequest {
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
     * @return QueryMetricsTimeseriesRequest
     */
	public function withGroupBy(?array $groupBy): QueryMetricsTimeseriesRequest {
		$this->groupBy = $groupBy;
		return $this;
	}
    /** @return array|null List of aggregation configurations */
	public function getAggregations(): ?array {
		return $this->aggregations;
	}
    /** @param array|null $aggregations List of aggregation configurations */
	public function setAggregations(?array $aggregations) {
		$this->aggregations = $aggregations;
	}
    /**
     * @param array|null $aggregations List of aggregation configurations
     * @return QueryMetricsTimeseriesRequest
     */
	public function withAggregations(?array $aggregations): QueryMetricsTimeseriesRequest {
		$this->aggregations = $aggregations;
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
     * @return QueryMetricsTimeseriesRequest
     */
	public function withInterval(?int $interval): QueryMetricsTimeseriesRequest {
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
     * @return QueryMetricsTimeseriesRequest
     */
	public function withSeriesLimit(?int $seriesLimit): QueryMetricsTimeseriesRequest {
		$this->seriesLimit = $seriesLimit;
		return $this;
	}
    /** @return string|null Order key */
	public function getOrderKey(): ?string {
		return $this->orderKey;
	}
    /** @param string|null $orderKey Order key */
	public function setOrderKey(?string $orderKey) {
		$this->orderKey = $orderKey;
	}
    /**
     * @param string|null $orderKey Order key
     * @return QueryMetricsTimeseriesRequest
     */
	public function withOrderKey(?string $orderKey): QueryMetricsTimeseriesRequest {
		$this->orderKey = $orderKey;
		return $this;
	}
    /** @return string|null Order by */
	public function getOrderBy(): ?string {
		return $this->orderBy;
	}
    /** @param string|null $orderBy Order by */
	public function setOrderBy(?string $orderBy) {
		$this->orderBy = $orderBy;
	}
    /**
     * @param string|null $orderBy Order by
     * @return QueryMetricsTimeseriesRequest
     */
	public function withOrderBy(?string $orderBy): QueryMetricsTimeseriesRequest {
		$this->orderBy = $orderBy;
		return $this;
	}

    public static function fromJson(?array $data): ?QueryMetricsTimeseriesRequest {
        if ($data === null) {
            return null;
        }
        return (new QueryMetricsTimeseriesRequest())
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
            ->withAggregations(!array_key_exists('aggregations', $data) || $data['aggregations'] === null ? null : array_map(
                function ($item) {
                    return AggregationConfig::fromJson($item);
                },
                $data['aggregations']
            ))
            ->withInterval(array_key_exists('interval', $data) && $data['interval'] !== null ? $data['interval'] : null)
            ->withSeriesLimit(array_key_exists('seriesLimit', $data) && $data['seriesLimit'] !== null ? $data['seriesLimit'] : null)
            ->withOrderKey(array_key_exists('orderKey', $data) && $data['orderKey'] !== null ? $data['orderKey'] : null)
            ->withOrderBy(array_key_exists('orderBy', $data) && $data['orderBy'] !== null ? $data['orderBy'] : null);
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
            "aggregations" => $this->getAggregations() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAggregations()
            ),
            "interval" => $this->getInterval(),
            "seriesLimit" => $this->getSeriesLimit(),
            "orderKey" => $this->getOrderKey(),
            "orderBy" => $this->getOrderBy(),
        );
    }
}