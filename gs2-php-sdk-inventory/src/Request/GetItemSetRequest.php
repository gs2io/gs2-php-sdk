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
 * 有効期限ごとのアイテム所持数量を取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetItemSetRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 有効期限ごとのアイテム所持数量を取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 有効期限ごとのアイテム所持数量を取得
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 有効期限ごとのアイテム所持数量を取得
     * @return GetItemSetRequest $this
     */
    public function withNamespaceName(string $namespaceName): GetItemSetRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string インベントリの名前 */
    private $inventoryName;

    /**
     * インベントリの名前を取得
     *
     * @return string|null 有効期限ごとのアイテム所持数量を取得
     */
    public function getInventoryName(): ?string {
        return $this->inventoryName;
    }

    /**
     * インベントリの名前を設定
     *
     * @param string $inventoryName 有効期限ごとのアイテム所持数量を取得
     */
    public function setInventoryName(string $inventoryName) {
        $this->inventoryName = $inventoryName;
    }

    /**
     * インベントリの名前を設定
     *
     * @param string $inventoryName 有効期限ごとのアイテム所持数量を取得
     * @return GetItemSetRequest $this
     */
    public function withInventoryName(string $inventoryName): GetItemSetRequest {
        $this->setInventoryName($inventoryName);
        return $this;
    }

    /** @var string アイテムマスターの名前 */
    private $itemName;

    /**
     * アイテムマスターの名前を取得
     *
     * @return string|null 有効期限ごとのアイテム所持数量を取得
     */
    public function getItemName(): ?string {
        return $this->itemName;
    }

    /**
     * アイテムマスターの名前を設定
     *
     * @param string $itemName 有効期限ごとのアイテム所持数量を取得
     */
    public function setItemName(string $itemName) {
        $this->itemName = $itemName;
    }

    /**
     * アイテムマスターの名前を設定
     *
     * @param string $itemName 有効期限ごとのアイテム所持数量を取得
     * @return GetItemSetRequest $this
     */
    public function withItemName(string $itemName): GetItemSetRequest {
        $this->setItemName($itemName);
        return $this;
    }

    /** @var string アイテムセットを識別する名前 */
    private $itemSetName;

    /**
     * アイテムセットを識別する名前を取得
     *
     * @return string|null 有効期限ごとのアイテム所持数量を取得
     */
    public function getItemSetName(): ?string {
        return $this->itemSetName;
    }

    /**
     * アイテムセットを識別する名前を設定
     *
     * @param string $itemSetName 有効期限ごとのアイテム所持数量を取得
     */
    public function setItemSetName(string $itemSetName) {
        $this->itemSetName = $itemSetName;
    }

    /**
     * アイテムセットを識別する名前を設定
     *
     * @param string $itemSetName 有効期限ごとのアイテム所持数量を取得
     * @return GetItemSetRequest $this
     */
    public function withItemSetName(string $itemSetName): GetItemSetRequest {
        $this->setItemSetName($itemSetName);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null 有効期限ごとのアイテム所持数量を取得
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 有効期限ごとのアイテム所持数量を取得
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 有効期限ごとのアイテム所持数量を取得
     * @return GetItemSetRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): GetItemSetRequest {
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
     * @return GetItemSetRequest this
     */
    public function withAccessToken(string $accessToken): GetItemSetRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}