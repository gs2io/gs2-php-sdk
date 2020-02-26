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
 * ユーザーIDを指定してウォレットに残高を加算します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DepositByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペースの名前 */
    private $namespaceName;

    /**
     * ネームスペースの名前を取得
     *
     * @return string|null ユーザーIDを指定してウォレットに残高を加算します
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペースの名前を設定
     *
     * @param string $namespaceName ユーザーIDを指定してウォレットに残高を加算します
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペースの名前を設定
     *
     * @param string $namespaceName ユーザーIDを指定してウォレットに残高を加算します
     * @return DepositByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName): DepositByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null ユーザーIDを指定してウォレットに残高を加算します
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザーIDを指定してウォレットに残高を加算します
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザーIDを指定してウォレットに残高を加算します
     * @return DepositByUserIdRequest $this
     */
    public function withUserId(string $userId): DepositByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var int スロット番号 */
    private $slot;

    /**
     * スロット番号を取得
     *
     * @return int|null ユーザーIDを指定してウォレットに残高を加算します
     */
    public function getSlot(): ?int {
        return $this->slot;
    }

    /**
     * スロット番号を設定
     *
     * @param int $slot ユーザーIDを指定してウォレットに残高を加算します
     */
    public function setSlot(int $slot) {
        $this->slot = $slot;
    }

    /**
     * スロット番号を設定
     *
     * @param int $slot ユーザーIDを指定してウォレットに残高を加算します
     * @return DepositByUserIdRequest $this
     */
    public function withSlot(int $slot): DepositByUserIdRequest {
        $this->setSlot($slot);
        return $this;
    }

    /** @var float 購入価格 */
    private $price;

    /**
     * 購入価格を取得
     *
     * @return float|null ユーザーIDを指定してウォレットに残高を加算します
     */
    public function getPrice(): ?float {
        return $this->price;
    }

    /**
     * 購入価格を設定
     *
     * @param float $price ユーザーIDを指定してウォレットに残高を加算します
     */
    public function setPrice(float $price) {
        $this->price = $price;
    }

    /**
     * 購入価格を設定
     *
     * @param float $price ユーザーIDを指定してウォレットに残高を加算します
     * @return DepositByUserIdRequest $this
     */
    public function withPrice(float $price): DepositByUserIdRequest {
        $this->setPrice($price);
        return $this;
    }

    /** @var int 付与する課金通貨の数量 */
    private $count;

    /**
     * 付与する課金通貨の数量を取得
     *
     * @return int|null ユーザーIDを指定してウォレットに残高を加算します
     */
    public function getCount(): ?int {
        return $this->count;
    }

    /**
     * 付与する課金通貨の数量を設定
     *
     * @param int $count ユーザーIDを指定してウォレットに残高を加算します
     */
    public function setCount(int $count) {
        $this->count = $count;
    }

    /**
     * 付与する課金通貨の数量を設定
     *
     * @param int $count ユーザーIDを指定してウォレットに残高を加算します
     * @return DepositByUserIdRequest $this
     */
    public function withCount(int $count): DepositByUserIdRequest {
        $this->setCount($count);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザーIDを指定してウォレットに残高を加算します
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザーIDを指定してウォレットに残高を加算します
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザーIDを指定してウォレットに残高を加算します
     * @return DepositByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): DepositByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}