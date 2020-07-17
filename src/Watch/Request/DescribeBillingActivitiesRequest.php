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
 * 請求にまつわるアクティビティの一覧を取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DescribeBillingActivitiesRequest extends Gs2BasicRequest {

    /** @var int イベントの発生年 */
    private $year;

    /**
     * イベントの発生年を取得
     *
     * @return int|null 請求にまつわるアクティビティの一覧を取得
     */
    public function getYear(): ?int {
        return $this->year;
    }

    /**
     * イベントの発生年を設定
     *
     * @param int $year 請求にまつわるアクティビティの一覧を取得
     */
    public function setYear(int $year = null) {
        $this->year = $year;
    }

    /**
     * イベントの発生年を設定
     *
     * @param int $year 請求にまつわるアクティビティの一覧を取得
     * @return DescribeBillingActivitiesRequest $this
     */
    public function withYear(int $year = null): DescribeBillingActivitiesRequest {
        $this->setYear($year);
        return $this;
    }

    /** @var int イベントの発生月 */
    private $month;

    /**
     * イベントの発生月を取得
     *
     * @return int|null 請求にまつわるアクティビティの一覧を取得
     */
    public function getMonth(): ?int {
        return $this->month;
    }

    /**
     * イベントの発生月を設定
     *
     * @param int $month 請求にまつわるアクティビティの一覧を取得
     */
    public function setMonth(int $month = null) {
        $this->month = $month;
    }

    /**
     * イベントの発生月を設定
     *
     * @param int $month 請求にまつわるアクティビティの一覧を取得
     * @return DescribeBillingActivitiesRequest $this
     */
    public function withMonth(int $month = null): DescribeBillingActivitiesRequest {
        $this->setMonth($month);
        return $this;
    }

    /** @var string サービスの種類 */
    private $service;

    /**
     * サービスの種類を取得
     *
     * @return string|null 請求にまつわるアクティビティの一覧を取得
     */
    public function getService(): ?string {
        return $this->service;
    }

    /**
     * サービスの種類を設定
     *
     * @param string $service 請求にまつわるアクティビティの一覧を取得
     */
    public function setService(string $service = null) {
        $this->service = $service;
    }

    /**
     * サービスの種類を設定
     *
     * @param string $service 請求にまつわるアクティビティの一覧を取得
     * @return DescribeBillingActivitiesRequest $this
     */
    public function withService(string $service = null): DescribeBillingActivitiesRequest {
        $this->setService($service);
        return $this;
    }

    /** @var string データの取得を開始する位置を指定するトークン */
    private $pageToken;

    /**
     * データの取得を開始する位置を指定するトークンを取得
     *
     * @return string|null 請求にまつわるアクティビティの一覧を取得
     */
    public function getPageToken(): ?string {
        return $this->pageToken;
    }

    /**
     * データの取得を開始する位置を指定するトークンを設定
     *
     * @param string $pageToken 請求にまつわるアクティビティの一覧を取得
     */
    public function setPageToken(string $pageToken = null) {
        $this->pageToken = $pageToken;
    }

    /**
     * データの取得を開始する位置を指定するトークンを設定
     *
     * @param string $pageToken 請求にまつわるアクティビティの一覧を取得
     * @return DescribeBillingActivitiesRequest $this
     */
    public function withPageToken(string $pageToken = null): DescribeBillingActivitiesRequest {
        $this->setPageToken($pageToken);
        return $this;
    }

    /** @var int データの取得件数 */
    private $limit;

    /**
     * データの取得件数を取得
     *
     * @return int|null 請求にまつわるアクティビティの一覧を取得
     */
    public function getLimit(): ?int {
        return $this->limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit 請求にまつわるアクティビティの一覧を取得
     */
    public function setLimit(int $limit = null) {
        $this->limit = $limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit 請求にまつわるアクティビティの一覧を取得
     * @return DescribeBillingActivitiesRequest $this
     */
    public function withLimit(int $limit = null): DescribeBillingActivitiesRequest {
        $this->setLimit($limit);
        return $this;
    }

}