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

namespace Gs2\Log\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * スタンプタスク実行ログの一覧を取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class QueryExecuteStampTaskLogRequest extends Gs2BasicRequest {

    /** @var string カテゴリー名 */
    private $namespaceName;

    /**
     * カテゴリー名を取得
     *
     * @return string|null スタンプタスク実行ログの一覧を取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * カテゴリー名を設定
     *
     * @param string $namespaceName スタンプタスク実行ログの一覧を取得
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * カテゴリー名を設定
     *
     * @param string $namespaceName スタンプタスク実行ログの一覧を取得
     * @return QueryExecuteStampTaskLogRequest $this
     */
    public function withNamespaceName(string $namespaceName): QueryExecuteStampTaskLogRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string マイクロサービスの種類 */
    private $service;

    /**
     * マイクロサービスの種類を取得
     *
     * @return string|null スタンプタスク実行ログの一覧を取得
     */
    public function getService(): ?string {
        return $this->service;
    }

    /**
     * マイクロサービスの種類を設定
     *
     * @param string $service スタンプタスク実行ログの一覧を取得
     */
    public function setService(string $service) {
        $this->service = $service;
    }

    /**
     * マイクロサービスの種類を設定
     *
     * @param string $service スタンプタスク実行ログの一覧を取得
     * @return QueryExecuteStampTaskLogRequest $this
     */
    public function withService(string $service): QueryExecuteStampTaskLogRequest {
        $this->setService($service);
        return $this;
    }

    /** @var string マイクロサービスのメソッド */
    private $method;

    /**
     * マイクロサービスのメソッドを取得
     *
     * @return string|null スタンプタスク実行ログの一覧を取得
     */
    public function getMethod(): ?string {
        return $this->method;
    }

    /**
     * マイクロサービスのメソッドを設定
     *
     * @param string $method スタンプタスク実行ログの一覧を取得
     */
    public function setMethod(string $method) {
        $this->method = $method;
    }

    /**
     * マイクロサービスのメソッドを設定
     *
     * @param string $method スタンプタスク実行ログの一覧を取得
     * @return QueryExecuteStampTaskLogRequest $this
     */
    public function withMethod(string $method): QueryExecuteStampTaskLogRequest {
        $this->setMethod($method);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null スタンプタスク実行ログの一覧を取得
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId スタンプタスク実行ログの一覧を取得
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId スタンプタスク実行ログの一覧を取得
     * @return QueryExecuteStampTaskLogRequest $this
     */
    public function withUserId(string $userId): QueryExecuteStampTaskLogRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string 報酬アクション */
    private $action;

    /**
     * 報酬アクションを取得
     *
     * @return string|null スタンプタスク実行ログの一覧を取得
     */
    public function getAction(): ?string {
        return $this->action;
    }

    /**
     * 報酬アクションを設定
     *
     * @param string $action スタンプタスク実行ログの一覧を取得
     */
    public function setAction(string $action) {
        $this->action = $action;
    }

    /**
     * 報酬アクションを設定
     *
     * @param string $action スタンプタスク実行ログの一覧を取得
     * @return QueryExecuteStampTaskLogRequest $this
     */
    public function withAction(string $action): QueryExecuteStampTaskLogRequest {
        $this->setAction($action);
        return $this;
    }

    /** @var string データの取得を開始する位置を指定するトークン */
    private $pageToken;

    /**
     * データの取得を開始する位置を指定するトークンを取得
     *
     * @return string|null スタンプタスク実行ログの一覧を取得
     */
    public function getPageToken(): ?string {
        return $this->pageToken;
    }

    /**
     * データの取得を開始する位置を指定するトークンを設定
     *
     * @param string $pageToken スタンプタスク実行ログの一覧を取得
     */
    public function setPageToken(string $pageToken) {
        $this->pageToken = $pageToken;
    }

    /**
     * データの取得を開始する位置を指定するトークンを設定
     *
     * @param string $pageToken スタンプタスク実行ログの一覧を取得
     * @return QueryExecuteStampTaskLogRequest $this
     */
    public function withPageToken(string $pageToken): QueryExecuteStampTaskLogRequest {
        $this->setPageToken($pageToken);
        return $this;
    }

    /** @var int データの取得件数 */
    private $limit;

    /**
     * データの取得件数を取得
     *
     * @return int|null スタンプタスク実行ログの一覧を取得
     */
    public function getLimit(): ?int {
        return $this->limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit スタンプタスク実行ログの一覧を取得
     */
    public function setLimit(int $limit) {
        $this->limit = $limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit スタンプタスク実行ログの一覧を取得
     * @return QueryExecuteStampTaskLogRequest $this
     */
    public function withLimit(int $limit): QueryExecuteStampTaskLogRequest {
        $this->setLimit($limit);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null スタンプタスク実行ログの一覧を取得
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider スタンプタスク実行ログの一覧を取得
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider スタンプタスク実行ログの一覧を取得
     * @return QueryExecuteStampTaskLogRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): QueryExecuteStampTaskLogRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}