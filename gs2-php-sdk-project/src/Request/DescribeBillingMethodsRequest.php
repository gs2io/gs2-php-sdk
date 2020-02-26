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
 * 支払い方法の一覧を取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DescribeBillingMethodsRequest extends Gs2BasicRequest {

    /** @var string GS2アカウントトークン */
    private $accountToken;

    /**
     * GS2アカウントトークンを取得
     *
     * @return string|null 支払い方法の一覧を取得
     */
    public function getAccountToken(): ?string {
        return $this->accountToken;
    }

    /**
     * GS2アカウントトークンを設定
     *
     * @param string $accountToken 支払い方法の一覧を取得
     */
    public function setAccountToken(string $accountToken) {
        $this->accountToken = $accountToken;
    }

    /**
     * GS2アカウントトークンを設定
     *
     * @param string $accountToken 支払い方法の一覧を取得
     * @return DescribeBillingMethodsRequest $this
     */
    public function withAccountToken(string $accountToken): DescribeBillingMethodsRequest {
        $this->setAccountToken($accountToken);
        return $this;
    }

    /** @var string データの取得を開始する位置を指定するトークン */
    private $pageToken;

    /**
     * データの取得を開始する位置を指定するトークンを取得
     *
     * @return string|null 支払い方法の一覧を取得
     */
    public function getPageToken(): ?string {
        return $this->pageToken;
    }

    /**
     * データの取得を開始する位置を指定するトークンを設定
     *
     * @param string $pageToken 支払い方法の一覧を取得
     */
    public function setPageToken(string $pageToken) {
        $this->pageToken = $pageToken;
    }

    /**
     * データの取得を開始する位置を指定するトークンを設定
     *
     * @param string $pageToken 支払い方法の一覧を取得
     * @return DescribeBillingMethodsRequest $this
     */
    public function withPageToken(string $pageToken): DescribeBillingMethodsRequest {
        $this->setPageToken($pageToken);
        return $this;
    }

    /** @var int データの取得件数 */
    private $limit;

    /**
     * データの取得件数を取得
     *
     * @return int|null 支払い方法の一覧を取得
     */
    public function getLimit(): ?int {
        return $this->limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit 支払い方法の一覧を取得
     */
    public function setLimit(int $limit) {
        $this->limit = $limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit 支払い方法の一覧を取得
     * @return DescribeBillingMethodsRequest $this
     */
    public function withLimit(int $limit): DescribeBillingMethodsRequest {
        $this->setLimit($limit);
        return $this;
    }

}