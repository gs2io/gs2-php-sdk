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
 * アクセスログの一覧を取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CountAccessLogRequest extends Gs2BasicRequest {

    /** @var string カテゴリー名 */
    private $namespaceName;

    /**
     * カテゴリー名を取得
     *
     * @return string|null アクセスログの一覧を取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * カテゴリー名を設定
     *
     * @param string $namespaceName アクセスログの一覧を取得
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * カテゴリー名を設定
     *
     * @param string $namespaceName アクセスログの一覧を取得
     * @return CountAccessLogRequest $this
     */
    public function withNamespaceName(string $namespaceName): CountAccessLogRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var bool マイクロサービスの種類を集計軸に使用するか */
    private $service;

    /**
     * マイクロサービスの種類を集計軸に使用するかを取得
     *
     * @return bool|null アクセスログの一覧を取得
     */
    public function getService(): ?bool {
        return $this->service;
    }

    /**
     * マイクロサービスの種類を集計軸に使用するかを設定
     *
     * @param bool $service アクセスログの一覧を取得
     */
    public function setService(bool $service) {
        $this->service = $service;
    }

    /**
     * マイクロサービスの種類を集計軸に使用するかを設定
     *
     * @param bool $service アクセスログの一覧を取得
     * @return CountAccessLogRequest $this
     */
    public function withService(bool $service): CountAccessLogRequest {
        $this->setService($service);
        return $this;
    }

    /** @var bool マイクロサービスのメソッドを集計軸に使用するか */
    private $method;

    /**
     * マイクロサービスのメソッドを集計軸に使用するかを取得
     *
     * @return bool|null アクセスログの一覧を取得
     */
    public function getMethod(): ?bool {
        return $this->method;
    }

    /**
     * マイクロサービスのメソッドを集計軸に使用するかを設定
     *
     * @param bool $method アクセスログの一覧を取得
     */
    public function setMethod(bool $method) {
        $this->method = $method;
    }

    /**
     * マイクロサービスのメソッドを集計軸に使用するかを設定
     *
     * @param bool $method アクセスログの一覧を取得
     * @return CountAccessLogRequest $this
     */
    public function withMethod(bool $method): CountAccessLogRequest {
        $this->setMethod($method);
        return $this;
    }

    /** @var bool ユーザIDを集計軸に使用するか */
    private $userId;

    /**
     * ユーザIDを集計軸に使用するかを取得
     *
     * @return bool|null アクセスログの一覧を取得
     */
    public function getUserId(): ?bool {
        return $this->userId;
    }

    /**
     * ユーザIDを集計軸に使用するかを設定
     *
     * @param bool $userId アクセスログの一覧を取得
     */
    public function setUserId(bool $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザIDを集計軸に使用するかを設定
     *
     * @param bool $userId アクセスログの一覧を取得
     * @return CountAccessLogRequest $this
     */
    public function withUserId(bool $userId): CountAccessLogRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string データの取得を開始する位置を指定するトークン */
    private $pageToken;

    /**
     * データの取得を開始する位置を指定するトークンを取得
     *
     * @return string|null アクセスログの一覧を取得
     */
    public function getPageToken(): ?string {
        return $this->pageToken;
    }

    /**
     * データの取得を開始する位置を指定するトークンを設定
     *
     * @param string $pageToken アクセスログの一覧を取得
     */
    public function setPageToken(string $pageToken) {
        $this->pageToken = $pageToken;
    }

    /**
     * データの取得を開始する位置を指定するトークンを設定
     *
     * @param string $pageToken アクセスログの一覧を取得
     * @return CountAccessLogRequest $this
     */
    public function withPageToken(string $pageToken): CountAccessLogRequest {
        $this->setPageToken($pageToken);
        return $this;
    }

    /** @var int データの取得件数 */
    private $limit;

    /**
     * データの取得件数を取得
     *
     * @return int|null アクセスログの一覧を取得
     */
    public function getLimit(): ?int {
        return $this->limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit アクセスログの一覧を取得
     */
    public function setLimit(int $limit) {
        $this->limit = $limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit アクセスログの一覧を取得
     * @return CountAccessLogRequest $this
     */
    public function withLimit(int $limit): CountAccessLogRequest {
        $this->setLimit($limit);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null アクセスログの一覧を取得
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider アクセスログの一覧を取得
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider アクセスログの一覧を取得
     * @return CountAccessLogRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): CountAccessLogRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}