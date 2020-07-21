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
 * レーティングモデルマスターを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateRatingModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null レーティングモデルマスターを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName レーティングモデルマスターを更新
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName レーティングモデルマスターを更新
     * @return UpdateRatingModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): UpdateRatingModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string レーティングの種類名 */
    private $ratingName;

    /**
     * レーティングの種類名を取得
     *
     * @return string|null レーティングモデルマスターを更新
     */
    public function getRatingName(): ?string {
        return $this->ratingName;
    }

    /**
     * レーティングの種類名を設定
     *
     * @param string $ratingName レーティングモデルマスターを更新
     */
    public function setRatingName(string $ratingName = null) {
        $this->ratingName = $ratingName;
    }

    /**
     * レーティングの種類名を設定
     *
     * @param string $ratingName レーティングモデルマスターを更新
     * @return UpdateRatingModelMasterRequest $this
     */
    public function withRatingName(string $ratingName = null): UpdateRatingModelMasterRequest {
        $this->setRatingName($ratingName);
        return $this;
    }

    /** @var string レーティングモデルマスターの説明 */
    private $description;

    /**
     * レーティングモデルマスターの説明を取得
     *
     * @return string|null レーティングモデルマスターを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * レーティングモデルマスターの説明を設定
     *
     * @param string $description レーティングモデルマスターを更新
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * レーティングモデルマスターの説明を設定
     *
     * @param string $description レーティングモデルマスターを更新
     * @return UpdateRatingModelMasterRequest $this
     */
    public function withDescription(string $description = null): UpdateRatingModelMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string レーティングの種類のメタデータ */
    private $metadata;

    /**
     * レーティングの種類のメタデータを取得
     *
     * @return string|null レーティングモデルマスターを更新
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * レーティングの種類のメタデータを設定
     *
     * @param string $metadata レーティングモデルマスターを更新
     */
    public function setMetadata(string $metadata = null) {
        $this->metadata = $metadata;
    }

    /**
     * レーティングの種類のメタデータを設定
     *
     * @param string $metadata レーティングモデルマスターを更新
     * @return UpdateRatingModelMasterRequest $this
     */
    public function withMetadata(string $metadata = null): UpdateRatingModelMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var int レート値の変動の大きさ */
    private $volatility;

    /**
     * レート値の変動の大きさを取得
     *
     * @return int|null レーティングモデルマスターを更新
     */
    public function getVolatility(): ?int {
        return $this->volatility;
    }

    /**
     * レート値の変動の大きさを設定
     *
     * @param int $volatility レーティングモデルマスターを更新
     */
    public function setVolatility(int $volatility = null) {
        $this->volatility = $volatility;
    }

    /**
     * レート値の変動の大きさを設定
     *
     * @param int $volatility レーティングモデルマスターを更新
     * @return UpdateRatingModelMasterRequest $this
     */
    public function withVolatility(int $volatility = null): UpdateRatingModelMasterRequest {
        $this->setVolatility($volatility);
        return $this;
    }

}