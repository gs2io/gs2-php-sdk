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

namespace Gs2\Inventory\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * キャパシティサイズを加算 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class AddCapacityByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null キャパシティサイズを加算
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName キャパシティサイズを加算
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName キャパシティサイズを加算
     * @return AddCapacityByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName): AddCapacityByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string インベントリモデル名 */
    private $inventoryName;

    /**
     * インベントリモデル名を取得
     *
     * @return string|null キャパシティサイズを加算
     */
    public function getInventoryName(): ?string {
        return $this->inventoryName;
    }

    /**
     * インベントリモデル名を設定
     *
     * @param string $inventoryName キャパシティサイズを加算
     */
    public function setInventoryName(string $inventoryName) {
        $this->inventoryName = $inventoryName;
    }

    /**
     * インベントリモデル名を設定
     *
     * @param string $inventoryName キャパシティサイズを加算
     * @return AddCapacityByUserIdRequest $this
     */
    public function withInventoryName(string $inventoryName): AddCapacityByUserIdRequest {
        $this->setInventoryName($inventoryName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null キャパシティサイズを加算
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId キャパシティサイズを加算
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId キャパシティサイズを加算
     * @return AddCapacityByUserIdRequest $this
     */
    public function withUserId(string $userId): AddCapacityByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var int 加算するキャパシティサイズ */
    private $addCapacityValue;

    /**
     * 加算するキャパシティサイズを取得
     *
     * @return int|null キャパシティサイズを加算
     */
    public function getAddCapacityValue(): ?int {
        return $this->addCapacityValue;
    }

    /**
     * 加算するキャパシティサイズを設定
     *
     * @param int $addCapacityValue キャパシティサイズを加算
     */
    public function setAddCapacityValue(int $addCapacityValue) {
        $this->addCapacityValue = $addCapacityValue;
    }

    /**
     * 加算するキャパシティサイズを設定
     *
     * @param int $addCapacityValue キャパシティサイズを加算
     * @return AddCapacityByUserIdRequest $this
     */
    public function withAddCapacityValue(int $addCapacityValue): AddCapacityByUserIdRequest {
        $this->setAddCapacityValue($addCapacityValue);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null キャパシティサイズを加算
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider キャパシティサイズを加算
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider キャパシティサイズを加算
     * @return AddCapacityByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): AddCapacityByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}