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
 * ウォレットから残高を消費します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class WithdrawRequest extends Gs2BasicRequest {

    /** @var string ネームスペースの名前 */
    private $namespaceName;

    /**
     * ネームスペースの名前を取得
     *
     * @return string|null ウォレットから残高を消費します
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペースの名前を設定
     *
     * @param string $namespaceName ウォレットから残高を消費します
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペースの名前を設定
     *
     * @param string $namespaceName ウォレットから残高を消費します
     * @return WithdrawRequest $this
     */
    public function withNamespaceName(string $namespaceName): WithdrawRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var int スロット番号 */
    private $slot;

    /**
     * スロット番号を取得
     *
     * @return int|null ウォレットから残高を消費します
     */
    public function getSlot(): ?int {
        return $this->slot;
    }

    /**
     * スロット番号を設定
     *
     * @param int $slot ウォレットから残高を消費します
     */
    public function setSlot(int $slot) {
        $this->slot = $slot;
    }

    /**
     * スロット番号を設定
     *
     * @param int $slot ウォレットから残高を消費します
     * @return WithdrawRequest $this
     */
    public function withSlot(int $slot): WithdrawRequest {
        $this->setSlot($slot);
        return $this;
    }

    /** @var int 消費する課金通貨の数量 */
    private $count;

    /**
     * 消費する課金通貨の数量を取得
     *
     * @return int|null ウォレットから残高を消費します
     */
    public function getCount(): ?int {
        return $this->count;
    }

    /**
     * 消費する課金通貨の数量を設定
     *
     * @param int $count ウォレットから残高を消費します
     */
    public function setCount(int $count) {
        $this->count = $count;
    }

    /**
     * 消費する課金通貨の数量を設定
     *
     * @param int $count ウォレットから残高を消費します
     * @return WithdrawRequest $this
     */
    public function withCount(int $count): WithdrawRequest {
        $this->setCount($count);
        return $this;
    }

    /** @var bool 有償課金通貨のみを対象とするか */
    private $paidOnly;

    /**
     * 有償課金通貨のみを対象とするかを取得
     *
     * @return bool|null ウォレットから残高を消費します
     */
    public function getPaidOnly(): ?bool {
        return $this->paidOnly;
    }

    /**
     * 有償課金通貨のみを対象とするかを設定
     *
     * @param bool $paidOnly ウォレットから残高を消費します
     */
    public function setPaidOnly(bool $paidOnly) {
        $this->paidOnly = $paidOnly;
    }

    /**
     * 有償課金通貨のみを対象とするかを設定
     *
     * @param bool $paidOnly ウォレットから残高を消費します
     * @return WithdrawRequest $this
     */
    public function withPaidOnly(bool $paidOnly): WithdrawRequest {
        $this->setPaidOnly($paidOnly);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ウォレットから残高を消費します
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ウォレットから残高を消費します
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ウォレットから残高を消費します
     * @return WithdrawRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): WithdrawRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

    /** @var string アクセストークン */
    private $accessToken;

    /**
     * アクセストークンを取得
     *
     * @return string アクセストークン
     */
    public function getAccessToken(): string {
        return $this->accessToken;
    }

    /**
     * アクセストークンを設定
     *
     * @param string $accessToken アクセストークン
     */
    public function setAccessToken(string $accessToken) {
        $this->accessToken = $accessToken;
    }

    /**
     * アクセストークンを設定
     *
     * @param string $accessToken アクセストークン
     * @return WithdrawRequest this
     */
    public function withAccessToken(string $accessToken): WithdrawRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}