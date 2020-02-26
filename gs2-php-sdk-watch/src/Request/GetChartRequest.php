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

/**
 * チャートを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetChartRequest extends Gs2BasicRequest {

    /** @var string 指標 */
    private $metrics;

    /**
     * 指標を取得
     *
     * @return string|null チャートを取得
     */
    public function getMetrics(): ?string {
        return $this->metrics;
    }

    /**
     * 指標を設定
     *
     * @param string $metrics チャートを取得
     */
    public function setMetrics(string $metrics) {
        $this->metrics = $metrics;
    }

    /**
     * 指標を設定
     *
     * @param string $metrics チャートを取得
     * @return GetChartRequest $this
     */
    public function withMetrics(string $metrics): GetChartRequest {
        $this->setMetrics($metrics);
        return $this;
    }

    /** @var string リソースのGRN */
    private $grn;

    /**
     * リソースのGRNを取得
     *
     * @return string|null チャートを取得
     */
    public function getGrn(): ?string {
        return $this->grn;
    }

    /**
     * リソースのGRNを設定
     *
     * @param string $grn チャートを取得
     */
    public function setGrn(string $grn) {
        $this->grn = $grn;
    }

    /**
     * リソースのGRNを設定
     *
     * @param string $grn チャートを取得
     * @return GetChartRequest $this
     */
    public function withGrn(string $grn): GetChartRequest {
        $this->setGrn($grn);
        return $this;
    }

    /** @var string[] クエリリスト */
    private $queries;

    /**
     * クエリリストを取得
     *
     * @return string[]|null チャートを取得
     */
    public function getQueries(): ?array {
        return $this->queries;
    }

    /**
     * クエリリストを設定
     *
     * @param string[] $queries チャートを取得
     */
    public function setQueries(array $queries) {
        $this->queries = $queries;
    }

    /**
     * クエリリストを設定
     *
     * @param string[] $queries チャートを取得
     * @return GetChartRequest $this
     */
    public function withQueries(array $queries): GetChartRequest {
        $this->setQueries($queries);
        return $this;
    }

    /** @var string グルーピング対象 */
    private $by;

    /**
     * グルーピング対象を取得
     *
     * @return string|null チャートを取得
     */
    public function getBy(): ?string {
        return $this->by;
    }

    /**
     * グルーピング対象を設定
     *
     * @param string $by チャートを取得
     */
    public function setBy(string $by) {
        $this->by = $by;
    }

    /**
     * グルーピング対象を設定
     *
     * @param string $by チャートを取得
     * @return GetChartRequest $this
     */
    public function withBy(string $by): GetChartRequest {
        $this->setBy($by);
        return $this;
    }

    /** @var string データの取得期間 */
    private $timeframe;

    /**
     * データの取得期間を取得
     *
     * @return string|null チャートを取得
     */
    public function getTimeframe(): ?string {
        return $this->timeframe;
    }

    /**
     * データの取得期間を設定
     *
     * @param string $timeframe チャートを取得
     */
    public function setTimeframe(string $timeframe) {
        $this->timeframe = $timeframe;
    }

    /**
     * データの取得期間を設定
     *
     * @param string $timeframe チャートを取得
     * @return GetChartRequest $this
     */
    public function withTimeframe(string $timeframe): GetChartRequest {
        $this->setTimeframe($timeframe);
        return $this;
    }

    /** @var string グラフのサイズ */
    private $size;

    /**
     * グラフのサイズを取得
     *
     * @return string|null チャートを取得
     */
    public function getSize(): ?string {
        return $this->size;
    }

    /**
     * グラフのサイズを設定
     *
     * @param string $size チャートを取得
     */
    public function setSize(string $size) {
        $this->size = $size;
    }

    /**
     * グラフのサイズを設定
     *
     * @param string $size チャートを取得
     * @return GetChartRequest $this
     */
    public function withSize(string $size): GetChartRequest {
        $this->setSize($size);
        return $this;
    }

    /** @var string フォーマット */
    private $format;

    /**
     * フォーマットを取得
     *
     * @return string|null チャートを取得
     */
    public function getFormat(): ?string {
        return $this->format;
    }

    /**
     * フォーマットを設定
     *
     * @param string $format チャートを取得
     */
    public function setFormat(string $format) {
        $this->format = $format;
    }

    /**
     * フォーマットを設定
     *
     * @param string $format チャートを取得
     * @return GetChartRequest $this
     */
    public function withFormat(string $format): GetChartRequest {
        $this->setFormat($format);
        return $this;
    }

    /** @var string 集計方針 */
    private $aggregator;

    /**
     * 集計方針を取得
     *
     * @return string|null チャートを取得
     */
    public function getAggregator(): ?string {
        return $this->aggregator;
    }

    /**
     * 集計方針を設定
     *
     * @param string $aggregator チャートを取得
     */
    public function setAggregator(string $aggregator) {
        $this->aggregator = $aggregator;
    }

    /**
     * 集計方針を設定
     *
     * @param string $aggregator チャートを取得
     * @return GetChartRequest $this
     */
    public function withAggregator(string $aggregator): GetChartRequest {
        $this->setAggregator($aggregator);
        return $this;
    }

    /** @var string スタイル */
    private $style;

    /**
     * スタイルを取得
     *
     * @return string|null チャートを取得
     */
    public function getStyle(): ?string {
        return $this->style;
    }

    /**
     * スタイルを設定
     *
     * @param string $style チャートを取得
     */
    public function setStyle(string $style) {
        $this->style = $style;
    }

    /**
     * スタイルを設定
     *
     * @param string $style チャートを取得
     * @return GetChartRequest $this
     */
    public function withStyle(string $style): GetChartRequest {
        $this->setStyle($style);
        return $this;
    }

    /** @var string タイトル */
    private $title;

    /**
     * タイトルを取得
     *
     * @return string|null チャートを取得
     */
    public function getTitle(): ?string {
        return $this->title;
    }

    /**
     * タイトルを設定
     *
     * @param string $title チャートを取得
     */
    public function setTitle(string $title) {
        $this->title = $title;
    }

    /**
     * タイトルを設定
     *
     * @param string $title チャートを取得
     * @return GetChartRequest $this
     */
    public function withTitle(string $title): GetChartRequest {
        $this->setTitle($title);
        return $this;
    }

}