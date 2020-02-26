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
 * アイテムモデルマスターを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateItemModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null アイテムモデルマスターを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName アイテムモデルマスターを更新
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName アイテムモデルマスターを更新
     * @return UpdateItemModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName): UpdateItemModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string インベントリの種類名 */
    private $inventoryName;

    /**
     * インベントリの種類名を取得
     *
     * @return string|null アイテムモデルマスターを更新
     */
    public function getInventoryName(): ?string {
        return $this->inventoryName;
    }

    /**
     * インベントリの種類名を設定
     *
     * @param string $inventoryName アイテムモデルマスターを更新
     */
    public function setInventoryName(string $inventoryName) {
        $this->inventoryName = $inventoryName;
    }

    /**
     * インベントリの種類名を設定
     *
     * @param string $inventoryName アイテムモデルマスターを更新
     * @return UpdateItemModelMasterRequest $this
     */
    public function withInventoryName(string $inventoryName): UpdateItemModelMasterRequest {
        $this->setInventoryName($inventoryName);
        return $this;
    }

    /** @var string アイテムモデルの種類名 */
    private $itemName;

    /**
     * アイテムモデルの種類名を取得
     *
     * @return string|null アイテムモデルマスターを更新
     */
    public function getItemName(): ?string {
        return $this->itemName;
    }

    /**
     * アイテムモデルの種類名を設定
     *
     * @param string $itemName アイテムモデルマスターを更新
     */
    public function setItemName(string $itemName) {
        $this->itemName = $itemName;
    }

    /**
     * アイテムモデルの種類名を設定
     *
     * @param string $itemName アイテムモデルマスターを更新
     * @return UpdateItemModelMasterRequest $this
     */
    public function withItemName(string $itemName): UpdateItemModelMasterRequest {
        $this->setItemName($itemName);
        return $this;
    }

    /** @var string アイテムモデルマスターの説明 */
    private $description;

    /**
     * アイテムモデルマスターの説明を取得
     *
     * @return string|null アイテムモデルマスターを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * アイテムモデルマスターの説明を設定
     *
     * @param string $description アイテムモデルマスターを更新
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * アイテムモデルマスターの説明を設定
     *
     * @param string $description アイテムモデルマスターを更新
     * @return UpdateItemModelMasterRequest $this
     */
    public function withDescription(string $description): UpdateItemModelMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string アイテムモデルの種類のメタデータ */
    private $metadata;

    /**
     * アイテムモデルの種類のメタデータを取得
     *
     * @return string|null アイテムモデルマスターを更新
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * アイテムモデルの種類のメタデータを設定
     *
     * @param string $metadata アイテムモデルマスターを更新
     */
    public function setMetadata(string $metadata) {
        $this->metadata = $metadata;
    }

    /**
     * アイテムモデルの種類のメタデータを設定
     *
     * @param string $metadata アイテムモデルマスターを更新
     * @return UpdateItemModelMasterRequest $this
     */
    public function withMetadata(string $metadata): UpdateItemModelMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var int スタック可能な最大数量 */
    private $stackingLimit;

    /**
     * スタック可能な最大数量を取得
     *
     * @return int|null アイテムモデルマスターを更新
     */
    public function getStackingLimit(): ?int {
        return $this->stackingLimit;
    }

    /**
     * スタック可能な最大数量を設定
     *
     * @param int $stackingLimit アイテムモデルマスターを更新
     */
    public function setStackingLimit(int $stackingLimit) {
        $this->stackingLimit = $stackingLimit;
    }

    /**
     * スタック可能な最大数量を設定
     *
     * @param int $stackingLimit アイテムモデルマスターを更新
     * @return UpdateItemModelMasterRequest $this
     */
    public function withStackingLimit(int $stackingLimit): UpdateItemModelMasterRequest {
        $this->setStackingLimit($stackingLimit);
        return $this;
    }

    /** @var bool スタック可能な最大数量を超えた時複数枠にアイテムを保管することを許すか */
    private $allowMultipleStacks;

    /**
     * スタック可能な最大数量を超えた時複数枠にアイテムを保管することを許すかを取得
     *
     * @return bool|null アイテムモデルマスターを更新
     */
    public function getAllowMultipleStacks(): ?bool {
        return $this->allowMultipleStacks;
    }

    /**
     * スタック可能な最大数量を超えた時複数枠にアイテムを保管することを許すかを設定
     *
     * @param bool $allowMultipleStacks アイテムモデルマスターを更新
     */
    public function setAllowMultipleStacks(bool $allowMultipleStacks) {
        $this->allowMultipleStacks = $allowMultipleStacks;
    }

    /**
     * スタック可能な最大数量を超えた時複数枠にアイテムを保管することを許すかを設定
     *
     * @param bool $allowMultipleStacks アイテムモデルマスターを更新
     * @return UpdateItemModelMasterRequest $this
     */
    public function withAllowMultipleStacks(bool $allowMultipleStacks): UpdateItemModelMasterRequest {
        $this->setAllowMultipleStacks($allowMultipleStacks);
        return $this;
    }

    /** @var int 表示順番 */
    private $sortValue;

    /**
     * 表示順番を取得
     *
     * @return int|null アイテムモデルマスターを更新
     */
    public function getSortValue(): ?int {
        return $this->sortValue;
    }

    /**
     * 表示順番を設定
     *
     * @param int $sortValue アイテムモデルマスターを更新
     */
    public function setSortValue(int $sortValue) {
        $this->sortValue = $sortValue;
    }

    /**
     * 表示順番を設定
     *
     * @param int $sortValue アイテムモデルマスターを更新
     * @return UpdateItemModelMasterRequest $this
     */
    public function withSortValue(int $sortValue): UpdateItemModelMasterRequest {
        $this->setSortValue($sortValue);
        return $this;
    }

}