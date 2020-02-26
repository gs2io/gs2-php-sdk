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

namespace Gs2\Datastore\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * ユーザIDを指定してデータオブジェクト履歴の一覧を取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DescribeDataObjectHistoriesByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ユーザIDを指定してデータオブジェクト履歴の一覧を取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定してデータオブジェクト履歴の一覧を取得
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定してデータオブジェクト履歴の一覧を取得
     * @return DescribeDataObjectHistoriesByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName): DescribeDataObjectHistoriesByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null ユーザIDを指定してデータオブジェクト履歴の一覧を取得
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定してデータオブジェクト履歴の一覧を取得
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定してデータオブジェクト履歴の一覧を取得
     * @return DescribeDataObjectHistoriesByUserIdRequest $this
     */
    public function withUserId(string $userId): DescribeDataObjectHistoriesByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string データの名前 */
    private $dataObjectName;

    /**
     * データの名前を取得
     *
     * @return string|null ユーザIDを指定してデータオブジェクト履歴の一覧を取得
     */
    public function getDataObjectName(): ?string {
        return $this->dataObjectName;
    }

    /**
     * データの名前を設定
     *
     * @param string $dataObjectName ユーザIDを指定してデータオブジェクト履歴の一覧を取得
     */
    public function setDataObjectName(string $dataObjectName) {
        $this->dataObjectName = $dataObjectName;
    }

    /**
     * データの名前を設定
     *
     * @param string $dataObjectName ユーザIDを指定してデータオブジェクト履歴の一覧を取得
     * @return DescribeDataObjectHistoriesByUserIdRequest $this
     */
    public function withDataObjectName(string $dataObjectName): DescribeDataObjectHistoriesByUserIdRequest {
        $this->setDataObjectName($dataObjectName);
        return $this;
    }

    /** @var string データの取得を開始する位置を指定するトークン */
    private $pageToken;

    /**
     * データの取得を開始する位置を指定するトークンを取得
     *
     * @return string|null ユーザIDを指定してデータオブジェクト履歴の一覧を取得
     */
    public function getPageToken(): ?string {
        return $this->pageToken;
    }

    /**
     * データの取得を開始する位置を指定するトークンを設定
     *
     * @param string $pageToken ユーザIDを指定してデータオブジェクト履歴の一覧を取得
     */
    public function setPageToken(string $pageToken) {
        $this->pageToken = $pageToken;
    }

    /**
     * データの取得を開始する位置を指定するトークンを設定
     *
     * @param string $pageToken ユーザIDを指定してデータオブジェクト履歴の一覧を取得
     * @return DescribeDataObjectHistoriesByUserIdRequest $this
     */
    public function withPageToken(string $pageToken): DescribeDataObjectHistoriesByUserIdRequest {
        $this->setPageToken($pageToken);
        return $this;
    }

    /** @var int データの取得件数 */
    private $limit;

    /**
     * データの取得件数を取得
     *
     * @return int|null ユーザIDを指定してデータオブジェクト履歴の一覧を取得
     */
    public function getLimit(): ?int {
        return $this->limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit ユーザIDを指定してデータオブジェクト履歴の一覧を取得
     */
    public function setLimit(int $limit) {
        $this->limit = $limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit ユーザIDを指定してデータオブジェクト履歴の一覧を取得
     * @return DescribeDataObjectHistoriesByUserIdRequest $this
     */
    public function withLimit(int $limit): DescribeDataObjectHistoriesByUserIdRequest {
        $this->setLimit($limit);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザIDを指定してデータオブジェクト履歴の一覧を取得
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定してデータオブジェクト履歴の一覧を取得
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定してデータオブジェクト履歴の一覧を取得
     * @return DescribeDataObjectHistoriesByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): DescribeDataObjectHistoriesByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}