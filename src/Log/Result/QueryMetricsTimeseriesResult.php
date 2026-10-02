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

namespace Gs2\Log\Result;

use Gs2\Core\Model\IResult;
use Gs2\Log\Model\TimeseriesValue;
use Gs2\Log\Model\TimeseriesPoint;
use Gs2\Log\Model\TimeseriesMetadata;

/**
 * Result of queryMetricsTimeseries: Time Series Query (Metrics)
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#querymetricstimeseries
 */
class QueryMetricsTimeseriesResult implements IResult {
    /** @var array List of Time Series Values */
    private $items;
    /** @var TimeseriesMetadata Metadata of Time Series */
    private $timeseriesMetadata;

    /** @return array|null List of Time Series Values */
	public function getItems(): ?array {
		return $this->items;
	}

    /** @param array|null $items List of Time Series Values */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    /**
     * @param array|null $items List of Time Series Values
     * @return QueryMetricsTimeseriesResult
     */
	public function withItems(?array $items): QueryMetricsTimeseriesResult {
		$this->items = $items;
		return $this;
	}

    /** @return TimeseriesMetadata|null Metadata of Time Series */
	public function getTimeseriesMetadata(): ?TimeseriesMetadata {
		return $this->timeseriesMetadata;
	}

    /** @param TimeseriesMetadata|null $timeseriesMetadata Metadata of Time Series */
	public function setTimeseriesMetadata(?TimeseriesMetadata $timeseriesMetadata) {
		$this->timeseriesMetadata = $timeseriesMetadata;
	}

    /**
     * @param TimeseriesMetadata|null $timeseriesMetadata Metadata of Time Series
     * @return QueryMetricsTimeseriesResult
     */
	public function withTimeseriesMetadata(?TimeseriesMetadata $timeseriesMetadata): QueryMetricsTimeseriesResult {
		$this->timeseriesMetadata = $timeseriesMetadata;
		return $this;
	}

    public static function fromJson(?array $data): ?QueryMetricsTimeseriesResult {
        if ($data === null) {
            return null;
        }
        return (new QueryMetricsTimeseriesResult())
            ->withItems(!array_key_exists('items', $data) || $data['items'] === null ? null : array_map(
                function ($item) {
                    return TimeseriesPoint::fromJson($item);
                },
                $data['items']
            ))
            ->withTimeseriesMetadata(array_key_exists('timeseriesMetadata', $data) && $data['timeseriesMetadata'] !== null ? TimeseriesMetadata::fromJson($data['timeseriesMetadata']) : null);
    }

    public function toJson(): array {
        return array(
            "items" => $this->getItems() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getItems()
            ),
            "timeseriesMetadata" => $this->getTimeseriesMetadata() !== null ? $this->getTimeseriesMetadata()->toJson() : null,
        );
    }
}