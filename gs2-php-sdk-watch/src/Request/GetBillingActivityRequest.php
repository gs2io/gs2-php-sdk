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
 * 請求にまつわるアクティビティを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetBillingActivityRequest extends Gs2BasicRequest {

    /** @var int イベントの発生年 */
    private $year;

    /**
     * イベントの発生年を取得
     *
     * @return int|null 請求にまつわるアクティビティを取得
     */
    public function getYear(): ?int {
        return $this->year;
    }

    /**
     * イベントの発生年を設定
     *
     * @param int $year 請求にまつわるアクティビティを取得
     */
    public function setYear(int $year) {
        $this->year = $year;
    }

    /**
     * イベントの発生年を設定
     *
     * @param int $year 請求にまつわるアクティビティを取得
     * @return GetBillingActivityRequest $this
     */
    public function withYear(int $year): GetBillingActivityRequest {
        $this->setYear($year);
        return $this;
    }

    /** @var int イベントの発生月 */
    private $month;

    /**
     * イベントの発生月を取得
     *
     * @return int|null 請求にまつわるアクティビティを取得
     */
    public function getMonth(): ?int {
        return $this->month;
    }

    /**
     * イベントの発生月を設定
     *
     * @param int $month 請求にまつわるアクティビティを取得
     */
    public function setMonth(int $month) {
        $this->month = $month;
    }

    /**
     * イベントの発生月を設定
     *
     * @param int $month 請求にまつわるアクティビティを取得
     * @return GetBillingActivityRequest $this
     */
    public function withMonth(int $month): GetBillingActivityRequest {
        $this->setMonth($month);
        return $this;
    }

    /** @var string サービスの種類 */
    private $service;

    /**
     * サービスの種類を取得
     *
     * @return string|null 請求にまつわるアクティビティを取得
     */
    public function getService(): ?string {
        return $this->service;
    }

    /**
     * サービスの種類を設定
     *
     * @param string $service 請求にまつわるアクティビティを取得
     */
    public function setService(string $service) {
        $this->service = $service;
    }

    /**
     * サービスの種類を設定
     *
     * @param string $service 請求にまつわるアクティビティを取得
     * @return GetBillingActivityRequest $this
     */
    public function withService(string $service): GetBillingActivityRequest {
        $this->setService($service);
        return $this;
    }

    /** @var string イベントの種類 */
    private $activityType;

    /**
     * イベントの種類を取得
     *
     * @return string|null 請求にまつわるアクティビティを取得
     */
    public function getActivityType(): ?string {
        return $this->activityType;
    }

    /**
     * イベントの種類を設定
     *
     * @param string $activityType 請求にまつわるアクティビティを取得
     */
    public function setActivityType(string $activityType) {
        $this->activityType = $activityType;
    }

    /**
     * イベントの種類を設定
     *
     * @param string $activityType 請求にまつわるアクティビティを取得
     * @return GetBillingActivityRequest $this
     */
    public function withActivityType(string $activityType): GetBillingActivityRequest {
        $this->setActivityType($activityType);
        return $this;
    }

}