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
 * 陳列棚マスターを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateShowcaseMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 陳列棚マスターを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 陳列棚マスターを更新
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 陳列棚マスターを更新
     * @return UpdateShowcaseMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName): UpdateShowcaseMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 陳列棚名 */
    private $showcaseName;

    /**
     * 陳列棚名を取得
     *
     * @return string|null 陳列棚マスターを更新
     */
    public function getShowcaseName(): ?string {
        return $this->showcaseName;
    }

    /**
     * 陳列棚名を設定
     *
     * @param string $showcaseName 陳列棚マスターを更新
     */
    public function setShowcaseName(string $showcaseName) {
        $this->showcaseName = $showcaseName;
    }

    /**
     * 陳列棚名を設定
     *
     * @param string $showcaseName 陳列棚マスターを更新
     * @return UpdateShowcaseMasterRequest $this
     */
    public function withShowcaseName(string $showcaseName): UpdateShowcaseMasterRequest {
        $this->setShowcaseName($showcaseName);
        return $this;
    }

    /** @var string 陳列棚マスターの説明 */
    private $description;

    /**
     * 陳列棚マスターの説明を取得
     *
     * @return string|null 陳列棚マスターを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * 陳列棚マスターの説明を設定
     *
     * @param string $description 陳列棚マスターを更新
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * 陳列棚マスターの説明を設定
     *
     * @param string $description 陳列棚マスターを更新
     * @return UpdateShowcaseMasterRequest $this
     */
    public function withDescription(string $description): UpdateShowcaseMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string 商品のメタデータ */
    private $metadata;

    /**
     * 商品のメタデータを取得
     *
     * @return string|null 陳列棚マスターを更新
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * 商品のメタデータを設定
     *
     * @param string $metadata 陳列棚マスターを更新
     */
    public function setMetadata(string $metadata) {
        $this->metadata = $metadata;
    }

    /**
     * 商品のメタデータを設定
     *
     * @param string $metadata 陳列棚マスターを更新
     * @return UpdateShowcaseMasterRequest $this
     */
    public function withMetadata(string $metadata): UpdateShowcaseMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var DisplayItemMaster[] 陳列する商品モデル一覧 */
    private $displayItems;

    /**
     * 陳列する商品モデル一覧を取得
     *
     * @return DisplayItemMaster[]|null 陳列棚マスターを更新
     */
    public function getDisplayItems(): ?array {
        return $this->displayItems;
    }

    /**
     * 陳列する商品モデル一覧を設定
     *
     * @param DisplayItemMaster[] $displayItems 陳列棚マスターを更新
     */
    public function setDisplayItems(array $displayItems) {
        $this->displayItems = $displayItems;
    }

    /**
     * 陳列する商品モデル一覧を設定
     *
     * @param DisplayItemMaster[] $displayItems 陳列棚マスターを更新
     * @return UpdateShowcaseMasterRequest $this
     */
    public function withDisplayItems(array $displayItems): UpdateShowcaseMasterRequest {
        $this->setDisplayItems($displayItems);
        return $this;
    }

    /** @var string 販売期間とするイベントマスター のGRN */
    private $salesPeriodEventId;

    /**
     * 販売期間とするイベントマスター のGRNを取得
     *
     * @return string|null 陳列棚マスターを更新
     */
    public function getSalesPeriodEventId(): ?string {
        return $this->salesPeriodEventId;
    }

    /**
     * 販売期間とするイベントマスター のGRNを設定
     *
     * @param string $salesPeriodEventId 陳列棚マスターを更新
     */
    public function setSalesPeriodEventId(string $salesPeriodEventId) {
        $this->salesPeriodEventId = $salesPeriodEventId;
    }

    /**
     * 販売期間とするイベントマスター のGRNを設定
     *
     * @param string $salesPeriodEventId 陳列棚マスターを更新
     * @return UpdateShowcaseMasterRequest $this
     */
    public function withSalesPeriodEventId(string $salesPeriodEventId): UpdateShowcaseMasterRequest {
        $this->setSalesPeriodEventId($salesPeriodEventId);
        return $this;
    }

}