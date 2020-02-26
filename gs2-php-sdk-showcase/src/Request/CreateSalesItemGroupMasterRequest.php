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

namespace Gs2\Showcase\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * 商品グループマスターを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateSalesItemGroupMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 商品グループマスターを新規作成
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 商品グループマスターを新規作成
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 商品グループマスターを新規作成
     * @return CreateSalesItemGroupMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName): CreateSalesItemGroupMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 商品名 */
    private $name;

    /**
     * 商品名を取得
     *
     * @return string|null 商品グループマスターを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * 商品名を設定
     *
     * @param string $name 商品グループマスターを新規作成
     */
    public function setName(string $name) {
        $this->name = $name;
    }

    /**
     * 商品名を設定
     *
     * @param string $name 商品グループマスターを新規作成
     * @return CreateSalesItemGroupMasterRequest $this
     */
    public function withName(string $name): CreateSalesItemGroupMasterRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string 商品グループマスターの説明 */
    private $description;

    /**
     * 商品グループマスターの説明を取得
     *
     * @return string|null 商品グループマスターを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * 商品グループマスターの説明を設定
     *
     * @param string $description 商品グループマスターを新規作成
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * 商品グループマスターの説明を設定
     *
     * @param string $description 商品グループマスターを新規作成
     * @return CreateSalesItemGroupMasterRequest $this
     */
    public function withDescription(string $description): CreateSalesItemGroupMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string 商品のメタデータ */
    private $metadata;

    /**
     * 商品のメタデータを取得
     *
     * @return string|null 商品グループマスターを新規作成
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * 商品のメタデータを設定
     *
     * @param string $metadata 商品グループマスターを新規作成
     */
    public function setMetadata(string $metadata) {
        $this->metadata = $metadata;
    }

    /**
     * 商品のメタデータを設定
     *
     * @param string $metadata 商品グループマスターを新規作成
     * @return CreateSalesItemGroupMasterRequest $this
     */
    public function withMetadata(string $metadata): CreateSalesItemGroupMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var string[] 商品グループに含める商品リスト */
    private $salesItemNames;

    /**
     * 商品グループに含める商品リストを取得
     *
     * @return string[]|null 商品グループマスターを新規作成
     */
    public function getSalesItemNames(): ?array {
        return $this->salesItemNames;
    }

    /**
     * 商品グループに含める商品リストを設定
     *
     * @param string[] $salesItemNames 商品グループマスターを新規作成
     */
    public function setSalesItemNames(array $salesItemNames) {
        $this->salesItemNames = $salesItemNames;
    }

    /**
     * 商品グループに含める商品リストを設定
     *
     * @param string[] $salesItemNames 商品グループマスターを新規作成
     * @return CreateSalesItemGroupMasterRequest $this
     */
    public function withSalesItemNames(array $salesItemNames): CreateSalesItemGroupMasterRequest {
        $this->setSalesItemNames($salesItemNames);
        return $this;
    }

}