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

namespace Gs2\Matchmaking\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * レーティングモデルマスターを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateRatingModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null レーティングモデルマスターを新規作成
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName レーティングモデルマスターを新規作成
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName レーティングモデルマスターを新規作成
     * @return CreateRatingModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): CreateRatingModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string レーティングの種類名 */
    private $name;

    /**
     * レーティングの種類名を取得
     *
     * @return string|null レーティングモデルマスターを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * レーティングの種類名を設定
     *
     * @param string $name レーティングモデルマスターを新規作成
     */
    public function setName(string $name = null) {
        $this->name = $name;
    }

    /**
     * レーティングの種類名を設定
     *
     * @param string $name レーティングモデルマスターを新規作成
     * @return CreateRatingModelMasterRequest $this
     */
    public function withName(string $name = null): CreateRatingModelMasterRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string レーティングモデルマスターの説明 */
    private $description;

    /**
     * レーティングモデルマスターの説明を取得
     *
     * @return string|null レーティングモデルマスターを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * レーティングモデルマスターの説明を設定
     *
     * @param string $description レーティングモデルマスターを新規作成
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * レーティングモデルマスターの説明を設定
     *
     * @param string $description レーティングモデルマスターを新規作成
     * @return CreateRatingModelMasterRequest $this
     */
    public function withDescription(string $description = null): CreateRatingModelMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string レーティングの種類のメタデータ */
    private $metadata;

    /**
     * レーティングの種類のメタデータを取得
     *
     * @return string|null レーティングモデルマスターを新規作成
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * レーティングの種類のメタデータを設定
     *
     * @param string $metadata レーティングモデルマスターを新規作成
     */
    public function setMetadata(string $metadata = null) {
        $this->metadata = $metadata;
    }

    /**
     * レーティングの種類のメタデータを設定
     *
     * @param string $metadata レーティングモデルマスターを新規作成
     * @return CreateRatingModelMasterRequest $this
     */
    public function withMetadata(string $metadata = null): CreateRatingModelMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var int レート値の変動の大きさ */
    private $volatility;

    /**
     * レート値の変動の大きさを取得
     *
     * @return int|null レーティングモデルマスターを新規作成
     */
    public function getVolatility(): ?int {
        return $this->volatility;
    }

    /**
     * レート値の変動の大きさを設定
     *
     * @param int $volatility レーティングモデルマスターを新規作成
     */
    public function setVolatility(int $volatility = null) {
        $this->volatility = $volatility;
    }

    /**
     * レート値の変動の大きさを設定
     *
     * @param int $volatility レーティングモデルマスターを新規作成
     * @return CreateRatingModelMasterRequest $this
     */
    public function withVolatility(int $volatility = null): CreateRatingModelMasterRequest {
        $this->setVolatility($volatility);
        return $this;
    }

}