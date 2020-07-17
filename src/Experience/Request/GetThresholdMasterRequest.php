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

namespace Gs2\Experience\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * ランクアップ閾値マスターを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetThresholdMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ランクアップ閾値マスターを取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ランクアップ閾値マスターを取得
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ランクアップ閾値マスターを取得
     * @return GetThresholdMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): GetThresholdMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ランクアップ閾値名 */
    private $thresholdName;

    /**
     * ランクアップ閾値名を取得
     *
     * @return string|null ランクアップ閾値マスターを取得
     */
    public function getThresholdName(): ?string {
        return $this->thresholdName;
    }

    /**
     * ランクアップ閾値名を設定
     *
     * @param string $thresholdName ランクアップ閾値マスターを取得
     */
    public function setThresholdName(string $thresholdName = null) {
        $this->thresholdName = $thresholdName;
    }

    /**
     * ランクアップ閾値名を設定
     *
     * @param string $thresholdName ランクアップ閾値マスターを取得
     * @return GetThresholdMasterRequest $this
     */
    public function withThresholdName(string $thresholdName = null): GetThresholdMasterRequest {
        $this->setThresholdName($thresholdName);
        return $this;
    }

}