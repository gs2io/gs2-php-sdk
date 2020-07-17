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
 * アイテムモデルマスターを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateItemModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null アイテムモデルマスターを新規作成
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName アイテムモデルマスターを新規作成
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName アイテムモデルマスターを新規作成
     * @return CreateItemModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): CreateItemModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string アイテムの種類名 */
    private $inventoryName;

    /**
     * アイテムの種類名を取得
     *
     * @return string|null アイテムモデルマスターを新規作成
     */
    public function getInventoryName(): ?string {
        return $this->inventoryName;
    }

    /**
     * アイテムの種類名を設定
     *
     * @param string $inventoryName アイテムモデルマスターを新規作成
     */
    public function setInventoryName(string $inventoryName = null) {
        $this->inventoryName = $inventoryName;
    }

    /**
     * アイテムの種類名を設定
     *
     * @param string $inventoryName アイテムモデルマスターを新規作成
     * @return CreateItemModelMasterRequest $this
     */
    public function withInventoryName(string $inventoryName = null): CreateItemModelMasterRequest {
        $this->setInventoryName($inventoryName);
        return $this;
    }

    /** @var string アイテムモデルの種類名 */
    private $name;

    /**
     * アイテムモデルの種類名を取得
     *
     * @return string|null アイテムモデルマスターを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * アイテムモデルの種類名を設定
     *
     * @param string $name アイテムモデルマスターを新規作成
     */
    public function setName(string $name = null) {
        $this->name = $name;
    }

    /**
     * アイテムモデルの種類名を設定
     *
     * @param string $name アイテムモデルマスターを新規作成
     * @return CreateItemModelMasterRequest $this
     */
    public function withName(string $name = null): CreateItemModelMasterRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string アイテムモデルマスターの説明 */
    private $description;

    /**
     * アイテムモデルマスターの説明を取得
     *
     * @return string|null アイテムモデルマスターを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * アイテムモデルマスターの説明を設定
     *
     * @param string $description アイテムモデルマスターを新規作成
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * アイテムモデルマスターの説明を設定
     *
     * @param string $description アイテムモデルマスターを新規作成
     * @return CreateItemModelMasterRequest $this
     */
    public function withDescription(string $description = null): CreateItemModelMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string アイテムモデルの種類のメタデータ */
    private $metadata;

    /**
     * アイテムモデルの種類のメタデータを取得
     *
     * @return string|null アイテムモデルマスターを新規作成
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * アイテムモデルの種類のメタデータを設定
     *
     * @param string $metadata アイテムモデルマスターを新規作成
     */
    public function setMetadata(string $metadata = null) {
        $this->metadata = $metadata;
    }

    /**
     * アイテムモデルの種類のメタデータを設定
     *
     * @param string $metadata アイテムモデルマスターを新規作成
     * @return CreateItemModelMasterRequest $this
     */
    public function withMetadata(string $metadata = null): CreateItemModelMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var int スタック可能な最大数量 */
    private $stackingLimit;

    /**
     * スタック可能な最大数量を取得
     *
     * @return int|null アイテムモデルマスターを新規作成
     */
    public function getStackingLimit(): ?int {
        return $this->stackingLimit;
    }

    /**
     * スタック可能な最大数量を設定
     *
     * @param int $stackingLimit アイテムモデルマスターを新規作成
     */
    public function setStackingLimit(int $stackingLimit = null) {
        $this->stackingLimit = $stackingLimit;
    }

    /**
     * スタック可能な最大数量を設定
     *
     * @param int $stackingLimit アイテムモデルマスターを新規作成
     * @return CreateItemModelMasterRequest $this
     */
    public function withStackingLimit(int $stackingLimit = null): CreateItemModelMasterRequest {
        $this->setStackingLimit($stackingLimit);
        return $this;
    }

    /** @var bool スタック可能な最大数量を超えた時複数枠にアイテムを保管することを許すか */
    private $allowMultipleStacks;

    /**
     * スタック可能な最大数量を超えた時複数枠にアイテムを保管することを許すかを取得
     *
     * @return bool|null アイテムモデルマスターを新規作成
     */
    public function getAllowMultipleStacks(): ?bool {
        return $this->allowMultipleStacks;
    }

    /**
     * スタック可能な最大数量を超えた時複数枠にアイテムを保管することを許すかを設定
     *
     * @param bool $allowMultipleStacks アイテムモデルマスターを新規作成
     */
    public function setAllowMultipleStacks(bool $allowMultipleStacks = null) {
        $this->allowMultipleStacks = $allowMultipleStacks;
    }

    /**
     * スタック可能な最大数量を超えた時複数枠にアイテムを保管することを許すかを設定
     *
     * @param bool $allowMultipleStacks アイテムモデルマスターを新規作成
     * @return CreateItemModelMasterRequest $this
     */
    public function withAllowMultipleStacks(bool $allowMultipleStacks = null): CreateItemModelMasterRequest {
        $this->setAllowMultipleStacks($allowMultipleStacks);
        return $this;
    }

    /** @var int 表示順番 */
    private $sortValue;

    /**
     * 表示順番を取得
     *
     * @return int|null アイテムモデルマスターを新規作成
     */
    public function getSortValue(): ?int {
        return $this->sortValue;
    }

    /**
     * 表示順番を設定
     *
     * @param int $sortValue アイテムモデルマスターを新規作成
     */
    public function setSortValue(int $sortValue = null) {
        $this->sortValue = $sortValue;
    }

    /**
     * 表示順番を設定
     *
     * @param int $sortValue アイテムモデルマスターを新規作成
     * @return CreateItemModelMasterRequest $this
     */
    public function withSortValue(int $sortValue = null): CreateItemModelMasterRequest {
        $this->setSortValue($sortValue);
        return $this;
    }

}