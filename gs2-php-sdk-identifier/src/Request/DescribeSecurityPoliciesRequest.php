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

namespace Gs2\Identifier\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * セキュリティポリシーの一覧を取得します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DescribeSecurityPoliciesRequest extends Gs2BasicRequest {

    /** @var string データの取得を開始する位置を指定するトークン */
    private $pageToken;

    /**
     * データの取得を開始する位置を指定するトークンを取得
     *
     * @return string|null セキュリティポリシーの一覧を取得します
     */
    public function getPageToken(): ?string {
        return $this->pageToken;
    }

    /**
     * データの取得を開始する位置を指定するトークンを設定
     *
     * @param string $pageToken セキュリティポリシーの一覧を取得します
     */
    public function setPageToken(string $pageToken) {
        $this->pageToken = $pageToken;
    }

    /**
     * データの取得を開始する位置を指定するトークンを設定
     *
     * @param string $pageToken セキュリティポリシーの一覧を取得します
     * @return DescribeSecurityPoliciesRequest $this
     */
    public function withPageToken(string $pageToken): DescribeSecurityPoliciesRequest {
        $this->setPageToken($pageToken);
        return $this;
    }

    /** @var int データの取得件数 */
    private $limit;

    /**
     * データの取得件数を取得
     *
     * @return int|null セキュリティポリシーの一覧を取得します
     */
    public function getLimit(): ?int {
        return $this->limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit セキュリティポリシーの一覧を取得します
     */
    public function setLimit(int $limit) {
        $this->limit = $limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit セキュリティポリシーの一覧を取得します
     * @return DescribeSecurityPoliciesRequest $this
     */
    public function withLimit(int $limit): DescribeSecurityPoliciesRequest {
        $this->setLimit($limit);
        return $this;
    }

}