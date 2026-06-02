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

class QueryMetricsTimeseriesRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var int */
    private $begin;
    /** @var int */
    private $end;
    /** @var string */
    private $query;
    /** @var array */
    private $groupBy;
    /** @var array */
    private $aggregations;
    /** @var int */
    private $interval;
    /** @var int */
    private $seriesLimit;
    /** @var string */
    private $orderKey;
    /** @var string */
    private $orderBy;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): QueryMetricsTimeseriesRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getBegin(): ?int {
		return $this->begin;
	}
	public function setBegin(?int $begin) {
		$this->begin = $begin;
	}
	public function withBegin(?int $begin): QueryMetricsTimeseriesRequest {
		$this->begin = $begin;
		return $this;
	}
	public function getEnd(): ?int {
		return $this->end;
	}
	public function setEnd(?int $end) {
		$this->end = $end;
	}
	public function withEnd(?int $end): QueryMetricsTimeseriesRequest {
		$this->end = $end;
		return $this;
	}
	public function getQuery(): ?string {
		return $this->query;
	}
	public function setQuery(?string $query) {
		$this->query = $query;
	}
	public function withQuery(?string $query): QueryMetricsTimeseriesRequest {
		$this->query = $query;
		return $this;
	}
	public function getGroupBy(): ?array {
		return $this->groupBy;
	}
	public function setGroupBy(?array $groupBy) {
		$this->groupBy = $groupBy;
	}
	public function withGroupBy(?array $groupBy): QueryMetricsTimeseriesRequest {
		$this->groupBy = $groupBy;
		return $this;
	}
	public function getAggregations(): ?array {
		return $this->aggregations;
	}
	public function setAggregations(?array $aggregations) {
		$this->aggregations = $aggregations;
	}
	public function withAggregations(?array $aggregations): QueryMetricsTimeseriesRequest {
		$this->aggregations = $aggregations;
		return $this;
	}
	public function getInterval(): ?int {
		return $this->interval;
	}
	public function setInterval(?int $interval) {
		$this->interval = $interval;
	}
	public function withInterval(?int $interval): QueryMetricsTimeseriesRequest {
		$this->interval = $interval;
		return $this;
	}
	public function getSeriesLimit(): ?int {
		return $this->seriesLimit;
	}
	public function setSeriesLimit(?int $seriesLimit) {
		$this->seriesLimit = $seriesLimit;
	}
	public function withSeriesLimit(?int $seriesLimit): QueryMetricsTimeseriesRequest {
		$this->seriesLimit = $seriesLimit;
		return $this;
	}
	public function getOrderKey(): ?string {
		return $this->orderKey;
	}
	public function setOrderKey(?string $orderKey) {
		$this->orderKey = $orderKey;
	}
	public function withOrderKey(?string $orderKey): QueryMetricsTimeseriesRequest {
		$this->orderKey = $orderKey;
		return $this;
	}
	public function getOrderBy(): ?string {
		return $this->orderBy;
	}
	public function setOrderBy(?string $orderBy) {
		$this->orderBy = $orderBy;
	}
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