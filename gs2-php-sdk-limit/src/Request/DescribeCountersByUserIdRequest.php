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

namespace Gs2\Limit\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * カウンターの一覧を取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DescribeCountersByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null カウンターの一覧を取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName カウンターの一覧を取得
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName カウンターの一覧を取得
     * @return DescribeCountersByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName): DescribeCountersByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 回数制限の種類の名前 */
    private $limitName;

    /**
     * 回数制限の種類の名前を取得
     *
     * @return string|null カウンターの一覧を取得
     */
    public function getLimitName(): ?string {
        return $this->limitName;
    }

    /**
     * 回数制限の種類の名前を設定
     *
     * @param string $limitName カウンターの一覧を取得
     */
    public function setLimitName(string $limitName) {
        $this->limitName = $limitName;
    }

    /**
     * 回数制限の種類の名前を設定
     *
     * @param string $limitName カウンターの一覧を取得
     * @return DescribeCountersByUserIdRequest $this
     */
    public function withLimitName(string $limitName): DescribeCountersByUserIdRequest {
        $this->setLimitName($limitName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null カウンターの一覧を取得
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId カウンターの一覧を取得
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId カウンターの一覧を取得
     * @return DescribeCountersByUserIdRequest $this
     */
    public function withUserId(string $userId): DescribeCountersByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string データの取得を開始する位置を指定するトークン */
    private $pageToken;

    /**
     * データの取得を開始する位置を指定するトークンを取得
     *
     * @return string|null カウンターの一覧を取得
     */
    public function getPageToken(): ?string {
        return $this->pageToken;
    }

    /**
     * データの取得を開始する位置を指定するトークンを設定
     *
     * @param string $pageToken カウンターの一覧を取得
     */
    public function setPageToken(string $pageToken) {
        $this->pageToken = $pageToken;
    }

    /**
     * データの取得を開始する位置を指定するトークンを設定
     *
     * @param string $pageToken カウンターの一覧を取得
     * @return DescribeCountersByUserIdRequest $this
     */
    public function withPageToken(string $pageToken): DescribeCountersByUserIdRequest {
        $this->setPageToken($pageToken);
        return $this;
    }

    /** @var int データの取得件数 */
    private $limit;

    /**
     * データの取得件数を取得
     *
     * @return int|null カウンターの一覧を取得
     */
    public function getLimit(): ?int {
        return $this->limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit カウンターの一覧を取得
     */
    public function setLimit(int $limit) {
        $this->limit = $limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit カウンターの一覧を取得
     * @return DescribeCountersByUserIdRequest $this
     */
    public function withLimit(int $limit): DescribeCountersByUserIdRequest {
        $this->setLimit($limit);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null カウンターの一覧を取得
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider カウンターの一覧を取得
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider カウンターの一覧を取得
     * @return DescribeCountersByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): DescribeCountersByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}