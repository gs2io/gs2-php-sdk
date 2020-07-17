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

namespace Gs2\Project\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * 利用状況の一覧を取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DescribeBillingsRequest extends Gs2BasicRequest {

    /** @var string GS2アカウントトークン */
    private $accountToken;

    /**
     * GS2アカウントトークンを取得
     *
     * @return string|null 利用状況の一覧を取得
     */
    public function getAccountToken(): ?string {
        return $this->accountToken;
    }

    /**
     * GS2アカウントトークンを設定
     *
     * @param string $accountToken 利用状況の一覧を取得
     */
    public function setAccountToken(string $accountToken = null) {
        $this->accountToken = $accountToken;
    }

    /**
     * GS2アカウントトークンを設定
     *
     * @param string $accountToken 利用状況の一覧を取得
     * @return DescribeBillingsRequest $this
     */
    public function withAccountToken(string $accountToken = null): DescribeBillingsRequest {
        $this->setAccountToken($accountToken);
        return $this;
    }

    /** @var string プロジェクト名 */
    private $projectName;

    /**
     * プロジェクト名を取得
     *
     * @return string|null 利用状況の一覧を取得
     */
    public function getProjectName(): ?string {
        return $this->projectName;
    }

    /**
     * プロジェクト名を設定
     *
     * @param string $projectName 利用状況の一覧を取得
     */
    public function setProjectName(string $projectName = null) {
        $this->projectName = $projectName;
    }

    /**
     * プロジェクト名を設定
     *
     * @param string $projectName 利用状況の一覧を取得
     * @return DescribeBillingsRequest $this
     */
    public function withProjectName(string $projectName = null): DescribeBillingsRequest {
        $this->setProjectName($projectName);
        return $this;
    }

    /** @var int イベントの発生年 */
    private $year;

    /**
     * イベントの発生年を取得
     *
     * @return int|null 利用状況の一覧を取得
     */
    public function getYear(): ?int {
        return $this->year;
    }

    /**
     * イベントの発生年を設定
     *
     * @param int $year 利用状況の一覧を取得
     */
    public function setYear(int $year = null) {
        $this->year = $year;
    }

    /**
     * イベントの発生年を設定
     *
     * @param int $year 利用状況の一覧を取得
     * @return DescribeBillingsRequest $this
     */
    public function withYear(int $year = null): DescribeBillingsRequest {
        $this->setYear($year);
        return $this;
    }

    /** @var int イベントの発生月 */
    private $month;

    /**
     * イベントの発生月を取得
     *
     * @return int|null 利用状況の一覧を取得
     */
    public function getMonth(): ?int {
        return $this->month;
    }

    /**
     * イベントの発生月を設定
     *
     * @param int $month 利用状況の一覧を取得
     */
    public function setMonth(int $month = null) {
        $this->month = $month;
    }

    /**
     * イベントの発生月を設定
     *
     * @param int $month 利用状況の一覧を取得
     * @return DescribeBillingsRequest $this
     */
    public function withMonth(int $month = null): DescribeBillingsRequest {
        $this->setMonth($month);
        return $this;
    }

    /** @var string サービスの種類 */
    private $region;

    /**
     * サービスの種類を取得
     *
     * @return string|null 利用状況の一覧を取得
     */
    public function getRegion(): ?string {
        return $this->region;
    }

    /**
     * サービスの種類を設定
     *
     * @param string $region 利用状況の一覧を取得
     */
    public function setRegion(string $region = null) {
        $this->region = $region;
    }

    /**
     * サービスの種類を設定
     *
     * @param string $region 利用状況の一覧を取得
     * @return DescribeBillingsRequest $this
     */
    public function withRegion(string $region = null): DescribeBillingsRequest {
        $this->setRegion($region);
        return $this;
    }

    /** @var string サービスの種類 */
    private $service;

    /**
     * サービスの種類を取得
     *
     * @return string|null 利用状況の一覧を取得
     */
    public function getService(): ?string {
        return $this->service;
    }

    /**
     * サービスの種類を設定
     *
     * @param string $service 利用状況の一覧を取得
     */
    public function setService(string $service = null) {
        $this->service = $service;
    }

    /**
     * サービスの種類を設定
     *
     * @param string $service 利用状況の一覧を取得
     * @return DescribeBillingsRequest $this
     */
    public function withService(string $service = null): DescribeBillingsRequest {
        $this->setService($service);
        return $this;
    }

}