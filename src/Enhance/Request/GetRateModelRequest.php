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

namespace Gs2\Enhance\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * 強化レートモデルを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetRateModelRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 強化レートモデルを取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 強化レートモデルを取得
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 強化レートモデルを取得
     * @return GetRateModelRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): GetRateModelRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 強化レート名 */
    private $rateName;

    /**
     * 強化レート名を取得
     *
     * @return string|null 強化レートモデルを取得
     */
    public function getRateName(): ?string {
        return $this->rateName;
    }

    /**
     * 強化レート名を設定
     *
     * @param string $rateName 強化レートモデルを取得
     */
    public function setRateName(string $rateName = null) {
        $this->rateName = $rateName;
    }

    /**
     * 強化レート名を設定
     *
     * @param string $rateName 強化レートモデルを取得
     * @return GetRateModelRequest $this
     */
    public function withRateName(string $rateName = null): GetRateModelRequest {
        $this->setRateName($rateName);
        return $this;
    }

}