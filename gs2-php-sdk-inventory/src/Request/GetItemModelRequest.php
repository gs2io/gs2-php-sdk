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
 * Noneを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetItemModelRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null Noneを取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName Noneを取得
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName Noneを取得
     * @return GetItemModelRequest $this
     */
    public function withNamespaceName(string $namespaceName): GetItemModelRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string インベントリの種類名 */
    private $inventoryName;

    /**
     * インベントリの種類名を取得
     *
     * @return string|null Noneを取得
     */
    public function getInventoryName(): ?string {
        return $this->inventoryName;
    }

    /**
     * インベントリの種類名を設定
     *
     * @param string $inventoryName Noneを取得
     */
    public function setInventoryName(string $inventoryName) {
        $this->inventoryName = $inventoryName;
    }

    /**
     * インベントリの種類名を設定
     *
     * @param string $inventoryName Noneを取得
     * @return GetItemModelRequest $this
     */
    public function withInventoryName(string $inventoryName): GetItemModelRequest {
        $this->setInventoryName($inventoryName);
        return $this;
    }

    /** @var string アイテムモデルの種類名 */
    private $itemName;

    /**
     * アイテムモデルの種類名を取得
     *
     * @return string|null Noneを取得
     */
    public function getItemName(): ?string {
        return $this->itemName;
    }

    /**
     * アイテムモデルの種類名を設定
     *
     * @param string $itemName Noneを取得
     */
    public function setItemName(string $itemName) {
        $this->itemName = $itemName;
    }

    /**
     * アイテムモデルの種類名を設定
     *
     * @param string $itemName Noneを取得
     * @return GetItemModelRequest $this
     */
    public function withItemName(string $itemName): GetItemModelRequest {
        $this->setItemName($itemName);
        return $this;
    }

}