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
 * ユーザーIDを指定してウォレットから残高を消費します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class WithdrawByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペースの名前 */
    private $namespaceName;

    /**
     * ネームスペースの名前を取得
     *
     * @return string|null ユーザーIDを指定してウォレットから残高を消費します
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペースの名前を設定
     *
     * @param string $namespaceName ユーザーIDを指定してウォレットから残高を消費します
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペースの名前を設定
     *
     * @param string $namespaceName ユーザーIDを指定してウォレットから残高を消費します
     * @return WithdrawByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName): WithdrawByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null ユーザーIDを指定してウォレットから残高を消費します
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザーIDを指定してウォレットから残高を消費します
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザーIDを指定してウォレットから残高を消費します
     * @return WithdrawByUserIdRequest $this
     */
    public function withUserId(string $userId): WithdrawByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var int スロット番号 */
    private $slot;

    /**
     * スロット番号を取得
     *
     * @return int|null ユーザーIDを指定してウォレットから残高を消費します
     */
    public function getSlot(): ?int {
        return $this->slot;
    }

    /**
     * スロット番号を設定
     *
     * @param int $slot ユーザーIDを指定してウォレットから残高を消費します
     */
    public function setSlot(int $slot) {
        $this->slot = $slot;
    }

    /**
     * スロット番号を設定
     *
     * @param int $slot ユーザーIDを指定してウォレットから残高を消費します
     * @return WithdrawByUserIdRequest $this
     */
    public function withSlot(int $slot): WithdrawByUserIdRequest {
        $this->setSlot($slot);
        return $this;
    }

    /** @var int 消費する課金通貨の数量 */
    private $count;

    /**
     * 消費する課金通貨の数量を取得
     *
     * @return int|null ユーザーIDを指定してウォレットから残高を消費します
     */
    public function getCount(): ?int {
        return $this->count;
    }

    /**
     * 消費する課金通貨の数量を設定
     *
     * @param int $count ユーザーIDを指定してウォレットから残高を消費します
     */
    public function setCount(int $count) {
        $this->count = $count;
    }

    /**
     * 消費する課金通貨の数量を設定
     *
     * @param int $count ユーザーIDを指定してウォレットから残高を消費します
     * @return WithdrawByUserIdRequest $this
     */
    public function withCount(int $count): WithdrawByUserIdRequest {
        $this->setCount($count);
        return $this;
    }

    /** @var bool 有償課金通貨のみを対象とするか */
    private $paidOnly;

    /**
     * 有償課金通貨のみを対象とするかを取得
     *
     * @return bool|null ユーザーIDを指定してウォレットから残高を消費します
     */
    public function getPaidOnly(): ?bool {
        return $this->paidOnly;
    }

    /**
     * 有償課金通貨のみを対象とするかを設定
     *
     * @param bool $paidOnly ユーザーIDを指定してウォレットから残高を消費します
     */
    public function setPaidOnly(bool $paidOnly) {
        $this->paidOnly = $paidOnly;
    }

    /**
     * 有償課金通貨のみを対象とするかを設定
     *
     * @param bool $paidOnly ユーザーIDを指定してウォレットから残高を消費します
     * @return WithdrawByUserIdRequest $this
     */
    public function withPaidOnly(bool $paidOnly): WithdrawByUserIdRequest {
        $this->setPaidOnly($paidOnly);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザーIDを指定してウォレットから残高を消費します
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザーIDを指定してウォレットから残高を消費します
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザーIDを指定してウォレットから残高を消費します
     * @return WithdrawByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): WithdrawByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}