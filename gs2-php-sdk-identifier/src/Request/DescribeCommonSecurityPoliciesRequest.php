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
 * オーナーIDを指定してセキュリティポリシーの一覧を取得します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DescribeCommonSecurityPoliciesRequest extends Gs2BasicRequest {

    /** @var string オーナーID */
    private $ownerId;

    /**
     * オーナーIDを取得
     *
     * @return string|null オーナーIDを指定してセキュリティポリシーの一覧を取得します
     */
    public function getOwnerId(): ?string {
        return $this->ownerId;
    }

    /**
     * オーナーIDを設定
     *
     * @param string $ownerId オーナーIDを指定してセキュリティポリシーの一覧を取得します
     */
    public function setOwnerId(string $ownerId) {
        $this->ownerId = $ownerId;
    }

    /**
     * オーナーIDを設定
     *
     * @param string $ownerId オーナーIDを指定してセキュリティポリシーの一覧を取得します
     * @return DescribeCommonSecurityPoliciesRequest $this
     */
    public function withOwnerId(string $ownerId): DescribeCommonSecurityPoliciesRequest {
        $this->setOwnerId($ownerId);
        return $this;
    }

    /** @var string データの取得を開始する位置を指定するトークン */
    private $pageToken;

    /**
     * データの取得を開始する位置を指定するトークンを取得
     *
     * @return string|null オーナーIDを指定してセキュリティポリシーの一覧を取得します
     */
    public function getPageToken(): ?string {
        return $this->pageToken;
    }

    /**
     * データの取得を開始する位置を指定するトークンを設定
     *
     * @param string $pageToken オーナーIDを指定してセキュリティポリシーの一覧を取得します
     */
    public function setPageToken(string $pageToken) {
        $this->pageToken = $pageToken;
    }

    /**
     * データの取得を開始する位置を指定するトークンを設定
     *
     * @param string $pageToken オーナーIDを指定してセキュリティポリシーの一覧を取得します
     * @return DescribeCommonSecurityPoliciesRequest $this
     */
    public function withPageToken(string $pageToken): DescribeCommonSecurityPoliciesRequest {
        $this->setPageToken($pageToken);
        return $this;
    }

    /** @var int データの取得件数 */
    private $limit;

    /**
     * データの取得件数を取得
     *
     * @return int|null オーナーIDを指定してセキュリティポリシーの一覧を取得します
     */
    public function getLimit(): ?int {
        return $this->limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit オーナーIDを指定してセキュリティポリシーの一覧を取得します
     */
    public function setLimit(int $limit) {
        $this->limit = $limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit オーナーIDを指定してセキュリティポリシーの一覧を取得します
     * @return DescribeCommonSecurityPoliciesRequest $this
     */
    public function withLimit(int $limit): DescribeCommonSecurityPoliciesRequest {
        $this->setLimit($limit);
        return $this;
    }

}