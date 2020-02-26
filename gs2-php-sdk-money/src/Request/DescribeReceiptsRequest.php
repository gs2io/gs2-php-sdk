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

namespace Gs2\Money\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * レシートの一覧を取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DescribeReceiptsRequest extends Gs2BasicRequest {

    /** @var string ネームスペースの名前 */
    private $namespaceName;

    /**
     * ネームスペースの名前を取得
     *
     * @return string|null レシートの一覧を取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペースの名前を設定
     *
     * @param string $namespaceName レシートの一覧を取得
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペースの名前を設定
     *
     * @param string $namespaceName レシートの一覧を取得
     * @return DescribeReceiptsRequest $this
     */
    public function withNamespaceName(string $namespaceName): DescribeReceiptsRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null レシートの一覧を取得
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId レシートの一覧を取得
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId レシートの一覧を取得
     * @return DescribeReceiptsRequest $this
     */
    public function withUserId(string $userId): DescribeReceiptsRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var int None */
    private $slot;

    /**
     * Noneを取得
     *
     * @return int|null レシートの一覧を取得
     */
    public function getSlot(): ?int {
        return $this->slot;
    }

    /**
     * Noneを設定
     *
     * @param int $slot レシートの一覧を取得
     */
    public function setSlot(int $slot) {
        $this->slot = $slot;
    }

    /**
     * Noneを設定
     *
     * @param int $slot レシートの一覧を取得
     * @return DescribeReceiptsRequest $this
     */
    public function withSlot(int $slot): DescribeReceiptsRequest {
        $this->setSlot($slot);
        return $this;
    }

    /** @var int None */
    private $begin;

    /**
     * Noneを取得
     *
     * @return int|null レシートの一覧を取得
     */
    public function getBegin(): ?int {
        return $this->begin;
    }

    /**
     * Noneを設定
     *
     * @param int $begin レシートの一覧を取得
     */
    public function setBegin(int $begin) {
        $this->begin = $begin;
    }

    /**
     * Noneを設定
     *
     * @param int $begin レシートの一覧を取得
     * @return DescribeReceiptsRequest $this
     */
    public function withBegin(int $begin): DescribeReceiptsRequest {
        $this->setBegin($begin);
        return $this;
    }

    /** @var int None */
    private $end;

    /**
     * Noneを取得
     *
     * @return int|null レシートの一覧を取得
     */
    public function getEnd(): ?int {
        return $this->end;
    }

    /**
     * Noneを設定
     *
     * @param int $end レシートの一覧を取得
     */
    public function setEnd(int $end) {
        $this->end = $end;
    }

    /**
     * Noneを設定
     *
     * @param int $end レシートの一覧を取得
     * @return DescribeReceiptsRequest $this
     */
    public function withEnd(int $end): DescribeReceiptsRequest {
        $this->setEnd($end);
        return $this;
    }

    /** @var string データの取得を開始する位置を指定するトークン */
    private $pageToken;

    /**
     * データの取得を開始する位置を指定するトークンを取得
     *
     * @return string|null レシートの一覧を取得
     */
    public function getPageToken(): ?string {
        return $this->pageToken;
    }

    /**
     * データの取得を開始する位置を指定するトークンを設定
     *
     * @param string $pageToken レシートの一覧を取得
     */
    public function setPageToken(string $pageToken) {
        $this->pageToken = $pageToken;
    }

    /**
     * データの取得を開始する位置を指定するトークンを設定
     *
     * @param string $pageToken レシートの一覧を取得
     * @return DescribeReceiptsRequest $this
     */
    public function withPageToken(string $pageToken): DescribeReceiptsRequest {
        $this->setPageToken($pageToken);
        return $this;
    }

    /** @var int データの取得件数 */
    private $limit;

    /**
     * データの取得件数を取得
     *
     * @return int|null レシートの一覧を取得
     */
    public function getLimit(): ?int {
        return $this->limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit レシートの一覧を取得
     */
    public function setLimit(int $limit) {
        $this->limit = $limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit レシートの一覧を取得
     * @return DescribeReceiptsRequest $this
     */
    public function withLimit(int $limit): DescribeReceiptsRequest {
        $this->setLimit($limit);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null レシートの一覧を取得
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider レシートの一覧を取得
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider レシートの一覧を取得
     * @return DescribeReceiptsRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): DescribeReceiptsRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}