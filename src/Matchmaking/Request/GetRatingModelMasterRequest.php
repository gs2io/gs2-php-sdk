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
 * レーティングモデルマスターを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetRatingModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null レーティングモデルマスターを取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName レーティングモデルマスターを取得
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName レーティングモデルマスターを取得
     * @return GetRatingModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): GetRatingModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string レーティングの種類名 */
    private $ratingName;

    /**
     * レーティングの種類名を取得
     *
     * @return string|null レーティングモデルマスターを取得
     */
    public function getRatingName(): ?string {
        return $this->ratingName;
    }

    /**
     * レーティングの種類名を設定
     *
     * @param string $ratingName レーティングモデルマスターを取得
     */
    public function setRatingName(string $ratingName = null) {
        $this->ratingName = $ratingName;
    }

    /**
     * レーティングの種類名を設定
     *
     * @param string $ratingName レーティングモデルマスターを取得
     * @return GetRatingModelMasterRequest $this
     */
    public function withRatingName(string $ratingName = null): GetRatingModelMasterRequest {
        $this->setRatingName($ratingName);
        return $this;
    }

}