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

namespace Gs2\Watch\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class GetChartRequest extends Gs2BasicRequest {
    /** @var string */
    private $metrics;
    /** @var string */
    private $grn;
    /** @var array */
    private $queries;
    /** @var string */
    private $by;
    /** @var string */
    private $timeframe;
    /** @var string */
    private $size;
    /** @var string */
    private $format;
    /** @var string */
    private $aggregator;
    /** @var string */
    private $style;
    /** @var string */
    private $title;

	public function getMetrics(): ?string {
		return $this->metrics;
	}

	public function setMetrics(?string $metrics) {
		$this->metrics = $metrics;
	}

	public function withMetrics(?string $metrics): GetChartRequest {
		$this->metrics = $metrics;
		return $this;
	}

	public function getGrn(): ?string {
		return $this->grn;
	}

	public function setGrn(?string $grn) {
		$this->grn = $grn;
	}

	public function withGrn(?string $grn): GetChartRequest {
		$this->grn = $grn;
		return $this;
	}

	public function getQueries(): ?array {
		return $this->queries;
	}

	public function setQueries(?array $queries) {
		$this->queries = $queries;
	}

	public function withQueries(?array $queries): GetChartRequest {
		$this->queries = $queries;
		return $this;
	}

	public function getBy(): ?string {
		return $this->by;
	}

	public function setBy(?string $by) {
		$this->by = $by;
	}

	public function withBy(?string $by): GetChartRequest {
		$this->by = $by;
		return $this;
	}

	public function getTimeframe(): ?string {
		return $this->timeframe;
	}

	public function setTimeframe(?string $timeframe) {
		$this->timeframe = $timeframe;
	}

	public function withTimeframe(?string $timeframe): GetChartRequest {
		$this->timeframe = $timeframe;
		return $this;
	}

	public function getSize(): ?string {
		return $this->size;
	}

	public function setSize(?string $size) {
		$this->size = $size;
	}

	public function withSize(?string $size): GetChartRequest {
		$this->size = $size;
		return $this;
	}

	public function getFormat(): ?string {
		return $this->format;
	}

	public function setFormat(?string $format) {
		$this->format = $format;
	}

	public function withFormat(?string $format): GetChartRequest {
		$this->format = $format;
		return $this;
	}

	public function getAggregator(): ?string {
		return $this->aggregator;
	}

	public function setAggregator(?string $aggregator) {
		$this->aggregator = $aggregator;
	}

	public function withAggregator(?string $aggregator): GetChartRequest {
		$this->aggregator = $aggregator;
		return $this;
	}

	public function getStyle(): ?string {
		return $this->style;
	}

	public function setStyle(?string $style) {
		$this->style = $style;
	}

	public function withStyle(?string $style): GetChartRequest {
		$this->style = $style;
		return $this;
	}

	public function getTitle(): ?string {
		return $this->title;
	}

	public function setTitle(?string $title) {
		$this->title = $title;
	}

	public function withTitle(?string $title): GetChartRequest {
		$this->title = $title;
		return $this;
	}

    public static function fromJson(?array $data): ?GetChartRequest {
        if ($data === null) {
            return null;
        }
        return (new GetChartRequest())
            ->withMetrics(array_key_exists('metrics', $data) && $data['metrics'] !== null ? $data['metrics'] : null)
            ->withGrn(array_key_exists('grn', $data) && $data['grn'] !== null ? $data['grn'] : null)
            ->withQueries(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('queries', $data) && $data['queries'] !== null ? $data['queries'] : []
            ))
            ->withBy(array_key_exists('by', $data) && $data['by'] !== null ? $data['by'] : null)
            ->withTimeframe(array_key_exists('timeframe', $data) && $data['timeframe'] !== null ? $data['timeframe'] : null)
            ->withSize(array_key_exists('size', $data) && $data['size'] !== null ? $data['size'] : null)
            ->withFormat(array_key_exists('format', $data) && $data['format'] !== null ? $data['format'] : null)
            ->withAggregator(array_key_exists('aggregator', $data) && $data['aggregator'] !== null ? $data['aggregator'] : null)
            ->withStyle(array_key_exists('style', $data) && $data['style'] !== null ? $data['style'] : null)
            ->withTitle(array_key_exists('title', $data) && $data['title'] !== null ? $data['title'] : null);
    }

    public function toJson(): array {
        return array(
            "metrics" => $this->getMetrics(),
            "grn" => $this->getGrn(),
            "queries" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getQueries() !== null && $this->getQueries() !== null ? $this->getQueries() : []
            ),
            "by" => $this->getBy(),
            "timeframe" => $this->getTimeframe(),
            "size" => $this->getSize(),
            "format" => $this->getFormat(),
            "aggregator" => $this->getAggregator(),
            "style" => $this->getStyle(),
            "title" => $this->getTitle(),
        );
    }
}