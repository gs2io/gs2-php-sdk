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
use Gs2\Showcase\Model\ConsumeAction;
use Gs2\Showcase\Model\AcquireAction;

/**
 * 商品マスターを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateSalesItemMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 商品マスターを新規作成
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 商品マスターを新規作成
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 商品マスターを新規作成
     * @return CreateSalesItemMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName): CreateSalesItemMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 商品名 */
    private $name;

    /**
     * 商品名を取得
     *
     * @return string|null 商品マスターを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * 商品名を設定
     *
     * @param string $name 商品マスターを新規作成
     */
    public function setName(string $name) {
        $this->name = $name;
    }

    /**
     * 商品名を設定
     *
     * @param string $name 商品マスターを新規作成
     * @return CreateSalesItemMasterRequest $this
     */
    public function withName(string $name): CreateSalesItemMasterRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string 商品マスターの説明 */
    private $description;

    /**
     * 商品マスターの説明を取得
     *
     * @return string|null 商品マスターを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * 商品マスターの説明を設定
     *
     * @param string $description 商品マスターを新規作成
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * 商品マスターの説明を設定
     *
     * @param string $description 商品マスターを新規作成
     * @return CreateSalesItemMasterRequest $this
     */
    public function withDescription(string $description): CreateSalesItemMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string 商品のメタデータ */
    private $metadata;

    /**
     * 商品のメタデータを取得
     *
     * @return string|null 商品マスターを新規作成
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * 商品のメタデータを設定
     *
     * @param string $metadata 商品マスターを新規作成
     */
    public function setMetadata(string $metadata) {
        $this->metadata = $metadata;
    }

    /**
     * 商品のメタデータを設定
     *
     * @param string $metadata 商品マスターを新規作成
     * @return CreateSalesItemMasterRequest $this
     */
    public function withMetadata(string $metadata): CreateSalesItemMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var ConsumeAction[] 消費アクションリスト */
    private $consumeActions;

    /**
     * 消費アクションリストを取得
     *
     * @return ConsumeAction[]|null 商品マスターを新規作成
     */
    public function getConsumeActions(): ?array {
        return $this->consumeActions;
    }

    /**
     * 消費アクションリストを設定
     *
     * @param ConsumeAction[] $consumeActions 商品マスターを新規作成
     */
    public function setConsumeActions(array $consumeActions) {
        $this->consumeActions = $consumeActions;
    }

    /**
     * 消費アクションリストを設定
     *
     * @param ConsumeAction[] $consumeActions 商品マスターを新規作成
     * @return CreateSalesItemMasterRequest $this
     */
    public function withConsumeActions(array $consumeActions): CreateSalesItemMasterRequest {
        $this->setConsumeActions($consumeActions);
        return $this;
    }

    /** @var AcquireAction[] 入手アクションリスト */
    private $acquireActions;

    /**
     * 入手アクションリストを取得
     *
     * @return AcquireAction[]|null 商品マスターを新規作成
     */
    public function getAcquireActions(): ?array {
        return $this->acquireActions;
    }

    /**
     * 入手アクションリストを設定
     *
     * @param AcquireAction[] $acquireActions 商品マスターを新規作成
     */
    public function setAcquireActions(array $acquireActions) {
        $this->acquireActions = $acquireActions;
    }

    /**
     * 入手アクションリストを設定
     *
     * @param AcquireAction[] $acquireActions 商品マスターを新規作成
     * @return CreateSalesItemMasterRequest $this
     */
    public function withAcquireActions(array $acquireActions): CreateSalesItemMasterRequest {
        $this->setAcquireActions($acquireActions);
        return $this;
    }

}