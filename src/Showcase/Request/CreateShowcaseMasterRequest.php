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
use Gs2\Showcase\Model\DisplayItemMaster;

/**
 * 陳列棚マスターを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateShowcaseMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 陳列棚マスターを新規作成
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 陳列棚マスターを新規作成
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 陳列棚マスターを新規作成
     * @return CreateShowcaseMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): CreateShowcaseMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 陳列棚名 */
    private $name;

    /**
     * 陳列棚名を取得
     *
     * @return string|null 陳列棚マスターを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * 陳列棚名を設定
     *
     * @param string $name 陳列棚マスターを新規作成
     */
    public function setName(string $name = null) {
        $this->name = $name;
    }

    /**
     * 陳列棚名を設定
     *
     * @param string $name 陳列棚マスターを新規作成
     * @return CreateShowcaseMasterRequest $this
     */
    public function withName(string $name = null): CreateShowcaseMasterRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string 陳列棚マスターの説明 */
    private $description;

    /**
     * 陳列棚マスターの説明を取得
     *
     * @return string|null 陳列棚マスターを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * 陳列棚マスターの説明を設定
     *
     * @param string $description 陳列棚マスターを新規作成
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * 陳列棚マスターの説明を設定
     *
     * @param string $description 陳列棚マスターを新規作成
     * @return CreateShowcaseMasterRequest $this
     */
    public function withDescription(string $description = null): CreateShowcaseMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string 商品のメタデータ */
    private $metadata;

    /**
     * 商品のメタデータを取得
     *
     * @return string|null 陳列棚マスターを新規作成
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * 商品のメタデータを設定
     *
     * @param string $metadata 陳列棚マスターを新規作成
     */
    public function setMetadata(string $metadata = null) {
        $this->metadata = $metadata;
    }

    /**
     * 商品のメタデータを設定
     *
     * @param string $metadata 陳列棚マスターを新規作成
     * @return CreateShowcaseMasterRequest $this
     */
    public function withMetadata(string $metadata = null): CreateShowcaseMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var DisplayItemMaster[] 陳列する商品モデル一覧 */
    private $displayItems;

    /**
     * 陳列する商品モデル一覧を取得
     *
     * @return DisplayItemMaster[]|null 陳列棚マスターを新規作成
     */
    public function getDisplayItems(): ?array {
        return $this->displayItems;
    }

    /**
     * 陳列する商品モデル一覧を設定
     *
     * @param DisplayItemMaster[] $displayItems 陳列棚マスターを新規作成
     */
    public function setDisplayItems(array $displayItems = null) {
        $this->displayItems = $displayItems;
    }

    /**
     * 陳列する商品モデル一覧を設定
     *
     * @param DisplayItemMaster[] $displayItems 陳列棚マスターを新規作成
     * @return CreateShowcaseMasterRequest $this
     */
    public function withDisplayItems(array $displayItems = null): CreateShowcaseMasterRequest {
        $this->setDisplayItems($displayItems);
        return $this;
    }

    /** @var string 販売期間とするイベントマスター のGRN */
    private $salesPeriodEventId;

    /**
     * 販売期間とするイベントマスター のGRNを取得
     *
     * @return string|null 陳列棚マスターを新規作成
     */
    public function getSalesPeriodEventId(): ?string {
        return $this->salesPeriodEventId;
    }

    /**
     * 販売期間とするイベントマスター のGRNを設定
     *
     * @param string $salesPeriodEventId 陳列棚マスターを新規作成
     */
    public function setSalesPeriodEventId(string $salesPeriodEventId = null) {
        $this->salesPeriodEventId = $salesPeriodEventId;
    }

    /**
     * 販売期間とするイベントマスター のGRNを設定
     *
     * @param string $salesPeriodEventId 陳列棚マスターを新規作成
     * @return CreateShowcaseMasterRequest $this
     */
    public function withSalesPeriodEventId(string $salesPeriodEventId = null): CreateShowcaseMasterRequest {
        $this->setSalesPeriodEventId($salesPeriodEventId);
        return $this;
    }

}