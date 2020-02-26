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

namespace Gs2\Distributor\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * 配信設定マスターを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetDistributorModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 配信設定マスターを取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 配信設定マスターを取得
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 配信設定マスターを取得
     * @return GetDistributorModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName): GetDistributorModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 配信設定名 */
    private $distributorName;

    /**
     * 配信設定名を取得
     *
     * @return string|null 配信設定マスターを取得
     */
    public function getDistributorName(): ?string {
        return $this->distributorName;
    }

    /**
     * 配信設定名を設定
     *
     * @param string $distributorName 配信設定マスターを取得
     */
    public function setDistributorName(string $distributorName) {
        $this->distributorName = $distributorName;
    }

    /**
     * 配信設定名を設定
     *
     * @param string $distributorName 配信設定マスターを取得
     * @return GetDistributorModelMasterRequest $this
     */
    public function withDistributorName(string $distributorName): GetDistributorModelMasterRequest {
        $this->setDistributorName($distributorName);
        return $this;
    }

}