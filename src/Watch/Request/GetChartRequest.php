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
use Gs2\Watch\Model\Filter;

class GetChartRequest extends Gs2BasicRequest {
    /** @var string */
    private $measure;
    /** @var string */
    private $grn;
    /** @var string */
    private $round;
    /** @var array */
    private $filters;
    /** @var array */
    private $groupBys;
    /** @var string */
    private $countBy;
    /** @var int */
    private $begin;
    /** @var int */
    private $end;
    /** @var string */
    private $pageToken;
    /** @var int */
    private $limit;
	public function getMeasure(): ?string {
		return $this->measure;
	}
	public function setMeasure(?string $measure) {
		$this->measure = $measure;
	}
	public function withMeasure(?string $measure): GetChartRequest {
		$this->measure = $measure;
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
	public function getRound(): ?string {
		return $this->round;
	}
	public function setRound(?string $round) {
		$this->round = $round;
	}
	public function withRound(?string $round): GetChartRequest {
		$this->round = $round;
		return $this;
	}
	public function getFilters(): ?array {
		return $this->filters;
	}
	public function setFilters(?array $filters) {
		$this->filters = $filters;
	}
	public function withFilters(?array $filters): GetChartRequest {
		$this->filters = $filters;
		return $this;
	}
	public function getGroupBys(): ?array {
		return $this->groupBys;
	}
	public function setGroupBys(?array $groupBys) {
		$this->groupBys = $groupBys;
	}
	public function withGroupBys(?array $groupBys): GetChartRequest {
		$this->groupBys = $groupBys;
		return $this;
	}
	public function getCountBy(): ?string {
		return $this->countBy;
	}
	public function setCountBy(?string $countBy) {
		$this->countBy = $countBy;
	}
	public function withCountBy(?string $countBy): GetChartRequest {
		$this->countBy = $countBy;
		return $this;
	}
	public function getBegin(): ?int {
		return $this->begin;
	}
	public function setBegin(?int $begin) {
		$this->begin = $begin;
	}
	public function withBegin(?int $begin): GetChartRequest {
		$this->begin = $begin;
		return $this;
	}
	public function getEnd(): ?int {
		return $this->end;
	}
	public function setEnd(?int $end) {
		$this->end = $end;
	}
	public function withEnd(?int $end): GetChartRequest {
		$this->end = $end;
		return $this;
	}
	public function getPageToken(): ?string {
		return $this->pageToken;
	}
	public function setPageToken(?string $pageToken) {
		$this->pageToken = $pageToken;
	}
	public function withPageToken(?string $pageToken): GetChartRequest {
		$this->pageToken = $pageToken;
		return $this;
	}
	public function getLimit(): ?int {
		return $this->limit;
	}
	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}
	public function withLimit(?int $limit): GetChartRequest {
		$this->limit = $limit;
		return $this;
	}

    public static function fromJson(?array $data): ?GetChartRequest {
        if ($data === null) {
            return null;
        }
        return (new GetChartRequest())
            ->withMeasure(array_key_exists('measure', $data) && $data['measure'] !== null ? $data['measure'] : null)
            ->withGrn(array_key_exists('grn', $data) && $data['grn'] !== null ? $data['grn'] : null)
            ->withRound(array_key_exists('round', $data) && $data['round'] !== null ? $data['round'] : null)
            ->withFilters(array_map(
                function ($item) {
                    return Filter::fromJson($item);
                },
                array_key_exists('filters', $data) && $data['filters'] !== null ? $data['filters'] : []
            ))
            ->withGroupBys(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('groupBys', $data) && $data['groupBys'] !== null ? $data['groupBys'] : []
            ))
            ->withCountBy(array_key_exists('countBy', $data) && $data['countBy'] !== null ? $data['countBy'] : null)
            ->withBegin(array_key_exists('begin', $data) && $data['begin'] !== null ? $data['begin'] : null)
            ->withEnd(array_key_exists('end', $data) && $data['end'] !== null ? $data['end'] : null)
            ->withPageToken(array_key_exists('pageToken', $data) && $data['pageToken'] !== null ? $data['pageToken'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null);
    }

    public function toJson(): array {
        return array(
            "measure" => $this->getMeasure(),
            "grn" => $this->getGrn(),
            "round" => $this->getRound(),
            "filters" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getFilters() !== null && $this->getFilters() !== null ? $this->getFilters() : []
            ),
            "groupBys" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getGroupBys() !== null && $this->getGroupBys() !== null ? $this->getGroupBys() : []
            ),
            "countBy" => $this->getCountBy(),
            "begin" => $this->getBegin(),
            "end" => $this->getEnd(),
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
        );
    }
}