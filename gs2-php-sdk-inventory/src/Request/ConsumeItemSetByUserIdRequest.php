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
 * インベントリのアイテムを消費 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class ConsumeItemSetByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null インベントリのアイテムを消費
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName インベントリのアイテムを消費
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName インベントリのアイテムを消費
     * @return ConsumeItemSetByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName): ConsumeItemSetByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string インベントリの名前 */
    private $inventoryName;

    /**
     * インベントリの名前を取得
     *
     * @return string|null インベントリのアイテムを消費
     */
    public function getInventoryName(): ?string {
        return $this->inventoryName;
    }

    /**
     * インベントリの名前を設定
     *
     * @param string $inventoryName インベントリのアイテムを消費
     */
    public function setInventoryName(string $inventoryName) {
        $this->inventoryName = $inventoryName;
    }

    /**
     * インベントリの名前を設定
     *
     * @param string $inventoryName インベントリのアイテムを消費
     * @return ConsumeItemSetByUserIdRequest $this
     */
    public function withInventoryName(string $inventoryName): ConsumeItemSetByUserIdRequest {
        $this->setInventoryName($inventoryName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null インベントリのアイテムを消費
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId インベントリのアイテムを消費
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId インベントリのアイテムを消費
     * @return ConsumeItemSetByUserIdRequest $this
     */
    public function withUserId(string $userId): ConsumeItemSetByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string アイテムマスターの名前 */
    private $itemName;

    /**
     * アイテムマスターの名前を取得
     *
     * @return string|null インベントリのアイテムを消費
     */
    public function getItemName(): ?string {
        return $this->itemName;
    }

    /**
     * アイテムマスターの名前を設定
     *
     * @param string $itemName インベントリのアイテムを消費
     */
    public function setItemName(string $itemName) {
        $this->itemName = $itemName;
    }

    /**
     * アイテムマスターの名前を設定
     *
     * @param string $itemName インベントリのアイテムを消費
     * @return ConsumeItemSetByUserIdRequest $this
     */
    public function withItemName(string $itemName): ConsumeItemSetByUserIdRequest {
        $this->setItemName($itemName);
        return $this;
    }

    /** @var int 消費する量 */
    private $consumeCount;

    /**
     * 消費する量を取得
     *
     * @return int|null インベントリのアイテムを消費
     */
    public function getConsumeCount(): ?int {
        return $this->consumeCount;
    }

    /**
     * 消費する量を設定
     *
     * @param int $consumeCount インベントリのアイテムを消費
     */
    public function setConsumeCount(int $consumeCount) {
        $this->consumeCount = $consumeCount;
    }

    /**
     * 消費する量を設定
     *
     * @param int $consumeCount インベントリのアイテムを消費
     * @return ConsumeItemSetByUserIdRequest $this
     */
    public function withConsumeCount(int $consumeCount): ConsumeItemSetByUserIdRequest {
        $this->setConsumeCount($consumeCount);
        return $this;
    }

    /** @var string アイテムセットを識別する名前 */
    private $itemSetName;

    /**
     * アイテムセットを識別する名前を取得
     *
     * @return string|null インベントリのアイテムを消費
     */
    public function getItemSetName(): ?string {
        return $this->itemSetName;
    }

    /**
     * アイテムセットを識別する名前を設定
     *
     * @param string $itemSetName インベントリのアイテムを消費
     */
    public function setItemSetName(string $itemSetName) {
        $this->itemSetName = $itemSetName;
    }

    /**
     * アイテムセットを識別する名前を設定
     *
     * @param string $itemSetName インベントリのアイテムを消費
     * @return ConsumeItemSetByUserIdRequest $this
     */
    public function withItemSetName(string $itemSetName): ConsumeItemSetByUserIdRequest {
        $this->setItemSetName($itemSetName);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null インベントリのアイテムを消費
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider インベントリのアイテムを消費
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider インベントリのアイテムを消費
     * @return ConsumeItemSetByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): ConsumeItemSetByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}