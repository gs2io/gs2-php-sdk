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

namespace Gs2\Deploy\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * 作成されたのリソースの一覧を取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DescribeResourcesRequest extends Gs2BasicRequest {

    /** @var string スタック名 */
    private $stackName;

    /**
     * スタック名を取得
     *
     * @return string|null 作成されたのリソースの一覧を取得
     */
    public function getStackName(): ?string {
        return $this->stackName;
    }

    /**
     * スタック名を設定
     *
     * @param string $stackName 作成されたのリソースの一覧を取得
     */
    public function setStackName(string $stackName) {
        $this->stackName = $stackName;
    }

    /**
     * スタック名を設定
     *
     * @param string $stackName 作成されたのリソースの一覧を取得
     * @return DescribeResourcesRequest $this
     */
    public function withStackName(string $stackName): DescribeResourcesRequest {
        $this->setStackName($stackName);
        return $this;
    }

    /** @var string データの取得を開始する位置を指定するトークン */
    private $pageToken;

    /**
     * データの取得を開始する位置を指定するトークンを取得
     *
     * @return string|null 作成されたのリソースの一覧を取得
     */
    public function getPageToken(): ?string {
        return $this->pageToken;
    }

    /**
     * データの取得を開始する位置を指定するトークンを設定
     *
     * @param string $pageToken 作成されたのリソースの一覧を取得
     */
    public function setPageToken(string $pageToken) {
        $this->pageToken = $pageToken;
    }

    /**
     * データの取得を開始する位置を指定するトークンを設定
     *
     * @param string $pageToken 作成されたのリソースの一覧を取得
     * @return DescribeResourcesRequest $this
     */
    public function withPageToken(string $pageToken): DescribeResourcesRequest {
        $this->setPageToken($pageToken);
        return $this;
    }

    /** @var int データの取得件数 */
    private $limit;

    /**
     * データの取得件数を取得
     *
     * @return int|null 作成されたのリソースの一覧を取得
     */
    public function getLimit(): ?int {
        return $this->limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit 作成されたのリソースの一覧を取得
     */
    public function setLimit(int $limit) {
        $this->limit = $limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit 作成されたのリソースの一覧を取得
     * @return DescribeResourcesRequest $this
     */
    public function withLimit(int $limit): DescribeResourcesRequest {
        $this->setLimit($limit);
        return $this;
    }

}