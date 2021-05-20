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
 * スタンプシート実行ログの一覧を取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class QueryExecuteStampSheetLogRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null スタンプシート実行ログの一覧を取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName スタンプシート実行ログの一覧を取得
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName スタンプシート実行ログの一覧を取得
     * @return QueryExecuteStampSheetLogRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): QueryExecuteStampSheetLogRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string マイクロサービスの種類 */
    private $service;

    /**
     * マイクロサービスの種類を取得
     *
     * @return string|null スタンプシート実行ログの一覧を取得
     */
    public function getService(): ?string {
        return $this->service;
    }

    /**
     * マイクロサービスの種類を設定
     *
     * @param string $service スタンプシート実行ログの一覧を取得
     */
    public function setService(string $service = null) {
        $this->service = $service;
    }

    /**
     * マイクロサービスの種類を設定
     *
     * @param string $service スタンプシート実行ログの一覧を取得
     * @return QueryExecuteStampSheetLogRequest $this
     */
    public function withService(string $service = null): QueryExecuteStampSheetLogRequest {
        $this->setService($service);
        return $this;
    }

    /** @var string マイクロサービスのメソッド */
    private $method;

    /**
     * マイクロサービスのメソッドを取得
     *
     * @return string|null スタンプシート実行ログの一覧を取得
     */
    public function getMethod(): ?string {
        return $this->method;
    }

    /**
     * マイクロサービスのメソッドを設定
     *
     * @param string $method スタンプシート実行ログの一覧を取得
     */
    public function setMethod(string $method = null) {
        $this->method = $method;
    }

    /**
     * マイクロサービスのメソッドを設定
     *
     * @param string $method スタンプシート実行ログの一覧を取得
     * @return QueryExecuteStampSheetLogRequest $this
     */
    public function withMethod(string $method = null): QueryExecuteStampSheetLogRequest {
        $this->setMethod($method);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null スタンプシート実行ログの一覧を取得
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId スタンプシート実行ログの一覧を取得
     */
    public function setUserId(string $userId = null) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId スタンプシート実行ログの一覧を取得
     * @return QueryExecuteStampSheetLogRequest $this
     */
    public function withUserId(string $userId = null): QueryExecuteStampSheetLogRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string 報酬アクション */
    private $action;

    /**
     * 報酬アクションを取得
     *
     * @return string|null スタンプシート実行ログの一覧を取得
     */
    public function getAction(): ?string {
        return $this->action;
    }

    /**
     * 報酬アクションを設定
     *
     * @param string $action スタンプシート実行ログの一覧を取得
     */
    public function setAction(string $action = null) {
        $this->action = $action;
    }

    /**
     * 報酬アクションを設定
     *
     * @param string $action スタンプシート実行ログの一覧を取得
     * @return QueryExecuteStampSheetLogRequest $this
     */
    public function withAction(string $action = null): QueryExecuteStampSheetLogRequest {
        $this->setAction($action);
        return $this;
    }

    /** @var int 検索範囲開始日時 */
    private $begin;

    /**
     * 検索範囲開始日時を取得
     *
     * @return int|null スタンプシート実行ログの一覧を取得
     */
    public function getBegin(): ?int {
        return $this->begin;
    }

    /**
     * 検索範囲開始日時を設定
     *
     * @param int $begin スタンプシート実行ログの一覧を取得
     */
    public function setBegin(int $begin = null) {
        $this->begin = $begin;
    }

    /**
     * 検索範囲開始日時を設定
     *
     * @param int $begin スタンプシート実行ログの一覧を取得
     * @return QueryExecuteStampSheetLogRequest $this
     */
    public function withBegin(int $begin = null): QueryExecuteStampSheetLogRequest {
        $this->setBegin($begin);
        return $this;
    }

    /** @var int 検索範囲終了日時 */
    private $end;

    /**
     * 検索範囲終了日時を取得
     *
     * @return int|null スタンプシート実行ログの一覧を取得
     */
    public function getEnd(): ?int {
        return $this->end;
    }

    /**
     * 検索範囲終了日時を設定
     *
     * @param int $end スタンプシート実行ログの一覧を取得
     */
    public function setEnd(int $end = null) {
        $this->end = $end;
    }

    /**
     * 検索範囲終了日時を設定
     *
     * @param int $end スタンプシート実行ログの一覧を取得
     * @return QueryExecuteStampSheetLogRequest $this
     */
    public function withEnd(int $end = null): QueryExecuteStampSheetLogRequest {
        $this->setEnd($end);
        return $this;
    }

    /** @var bool 7日より長い期間のログを検索対象とするか */
    private $longTerm;

    /**
     * 7日より長い期間のログを検索対象とするかを取得
     *
     * @return bool|null スタンプシート実行ログの一覧を取得
     */
    public function getLongTerm(): ?bool {
        return $this->longTerm;
    }

    /**
     * 7日より長い期間のログを検索対象とするかを設定
     *
     * @param bool $longTerm スタンプシート実行ログの一覧を取得
     */
    public function setLongTerm(bool $longTerm = null) {
        $this->longTerm = $longTerm;
    }

    /**
     * 7日より長い期間のログを検索対象とするかを設定
     *
     * @param bool $longTerm スタンプシート実行ログの一覧を取得
     * @return QueryExecuteStampSheetLogRequest $this
     */
    public function withLongTerm(bool $longTerm = null): QueryExecuteStampSheetLogRequest {
        $this->setLongTerm($longTerm);
        return $this;
    }

    /** @var string データの取得を開始する位置を指定するトークン */
    private $pageToken;

    /**
     * データの取得を開始する位置を指定するトークンを取得
     *
     * @return string|null スタンプシート実行ログの一覧を取得
     */
    public function getPageToken(): ?string {
        return $this->pageToken;
    }

    /**
     * データの取得を開始する位置を指定するトークンを設定
     *
     * @param string $pageToken スタンプシート実行ログの一覧を取得
     */
    public function setPageToken(string $pageToken = null) {
        $this->pageToken = $pageToken;
    }

    /**
     * データの取得を開始する位置を指定するトークンを設定
     *
     * @param string $pageToken スタンプシート実行ログの一覧を取得
     * @return QueryExecuteStampSheetLogRequest $this
     */
    public function withPageToken(string $pageToken = null): QueryExecuteStampSheetLogRequest {
        $this->setPageToken($pageToken);
        return $this;
    }

    /** @var int データの取得件数 */
    private $limit;

    /**
     * データの取得件数を取得
     *
     * @return int|null スタンプシート実行ログの一覧を取得
     */
    public function getLimit(): ?int {
        return $this->limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit スタンプシート実行ログの一覧を取得
     */
    public function setLimit(int $limit = null) {
        $this->limit = $limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit スタンプシート実行ログの一覧を取得
     * @return QueryExecuteStampSheetLogRequest $this
     */
    public function withLimit(int $limit = null): QueryExecuteStampSheetLogRequest {
        $this->setLimit($limit);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null スタンプシート実行ログの一覧を取得
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider スタンプシート実行ログの一覧を取得
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider スタンプシート実行ログの一覧を取得
     * @return QueryExecuteStampSheetLogRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): QueryExecuteStampSheetLogRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}