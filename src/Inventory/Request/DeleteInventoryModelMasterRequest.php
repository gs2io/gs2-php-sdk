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
 * インベントリモデルマスターを削除 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteInventoryModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null インベントリモデルマスターを削除
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName インベントリモデルマスターを削除
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName インベントリモデルマスターを削除
     * @return DeleteInventoryModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): DeleteInventoryModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string インベントリの種類名 */
    private $inventoryName;

    /**
     * インベントリの種類名を取得
     *
     * @return string|null インベントリモデルマスターを削除
     */
    public function getInventoryName(): ?string {
        return $this->inventoryName;
    }

    /**
     * インベントリの種類名を設定
     *
     * @param string $inventoryName インベントリモデルマスターを削除
     */
    public function setInventoryName(string $inventoryName = null) {
        $this->inventoryName = $inventoryName;
    }

    /**
     * インベントリの種類名を設定
     *
     * @param string $inventoryName インベントリモデルマスターを削除
     * @return DeleteInventoryModelMasterRequest $this
     */
    public function withInventoryName(string $inventoryName = null): DeleteInventoryModelMasterRequest {
        $this->setInventoryName($inventoryName);
        return $this;
    }

}