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
 * インベントリモデルマスターを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateInventoryModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null インベントリモデルマスターを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName インベントリモデルマスターを更新
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName インベントリモデルマスターを更新
     * @return UpdateInventoryModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName): UpdateInventoryModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string インベントリの種類名 */
    private $inventoryName;

    /**
     * インベントリの種類名を取得
     *
     * @return string|null インベントリモデルマスターを更新
     */
    public function getInventoryName(): ?string {
        return $this->inventoryName;
    }

    /**
     * インベントリの種類名を設定
     *
     * @param string $inventoryName インベントリモデルマスターを更新
     */
    public function setInventoryName(string $inventoryName) {
        $this->inventoryName = $inventoryName;
    }

    /**
     * インベントリの種類名を設定
     *
     * @param string $inventoryName インベントリモデルマスターを更新
     * @return UpdateInventoryModelMasterRequest $this
     */
    public function withInventoryName(string $inventoryName): UpdateInventoryModelMasterRequest {
        $this->setInventoryName($inventoryName);
        return $this;
    }

    /** @var string インベントリモデルマスターの説明 */
    private $description;

    /**
     * インベントリモデルマスターの説明を取得
     *
     * @return string|null インベントリモデルマスターを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * インベントリモデルマスターの説明を設定
     *
     * @param string $description インベントリモデルマスターを更新
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * インベントリモデルマスターの説明を設定
     *
     * @param string $description インベントリモデルマスターを更新
     * @return UpdateInventoryModelMasterRequest $this
     */
    public function withDescription(string $description): UpdateInventoryModelMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string インベントリの種類のメタデータ */
    private $metadata;

    /**
     * インベントリの種類のメタデータを取得
     *
     * @return string|null インベントリモデルマスターを更新
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * インベントリの種類のメタデータを設定
     *
     * @param string $metadata インベントリモデルマスターを更新
     */
    public function setMetadata(string $metadata) {
        $this->metadata = $metadata;
    }

    /**
     * インベントリの種類のメタデータを設定
     *
     * @param string $metadata インベントリモデルマスターを更新
     * @return UpdateInventoryModelMasterRequest $this
     */
    public function withMetadata(string $metadata): UpdateInventoryModelMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var int インベントリの初期サイズ */
    private $initialCapacity;

    /**
     * インベントリの初期サイズを取得
     *
     * @return int|null インベントリモデルマスターを更新
     */
    public function getInitialCapacity(): ?int {
        return $this->initialCapacity;
    }

    /**
     * インベントリの初期サイズを設定
     *
     * @param int $initialCapacity インベントリモデルマスターを更新
     */
    public function setInitialCapacity(int $initialCapacity) {
        $this->initialCapacity = $initialCapacity;
    }

    /**
     * インベントリの初期サイズを設定
     *
     * @param int $initialCapacity インベントリモデルマスターを更新
     * @return UpdateInventoryModelMasterRequest $this
     */
    public function withInitialCapacity(int $initialCapacity): UpdateInventoryModelMasterRequest {
        $this->setInitialCapacity($initialCapacity);
        return $this;
    }

    /** @var int インベントリの最大サイズ */
    private $maxCapacity;

    /**
     * インベントリの最大サイズを取得
     *
     * @return int|null インベントリモデルマスターを更新
     */
    public function getMaxCapacity(): ?int {
        return $this->maxCapacity;
    }

    /**
     * インベントリの最大サイズを設定
     *
     * @param int $maxCapacity インベントリモデルマスターを更新
     */
    public function setMaxCapacity(int $maxCapacity) {
        $this->maxCapacity = $maxCapacity;
    }

    /**
     * インベントリの最大サイズを設定
     *
     * @param int $maxCapacity インベントリモデルマスターを更新
     * @return UpdateInventoryModelMasterRequest $this
     */
    public function withMaxCapacity(int $maxCapacity): UpdateInventoryModelMasterRequest {
        $this->setMaxCapacity($maxCapacity);
        return $this;
    }

}