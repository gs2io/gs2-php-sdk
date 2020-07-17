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
 * 商品マスターを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetSalesItemMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 商品マスターを取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 商品マスターを取得
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 商品マスターを取得
     * @return GetSalesItemMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): GetSalesItemMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 商品名 */
    private $salesItemName;

    /**
     * 商品名を取得
     *
     * @return string|null 商品マスターを取得
     */
    public function getSalesItemName(): ?string {
        return $this->salesItemName;
    }

    /**
     * 商品名を設定
     *
     * @param string $salesItemName 商品マスターを取得
     */
    public function setSalesItemName(string $salesItemName = null) {
        $this->salesItemName = $salesItemName;
    }

    /**
     * 商品名を設定
     *
     * @param string $salesItemName 商品マスターを取得
     * @return GetSalesItemMasterRequest $this
     */
    public function withSalesItemName(string $salesItemName = null): GetSalesItemMasterRequest {
        $this->setSalesItemName($salesItemName);
        return $this;
    }

}