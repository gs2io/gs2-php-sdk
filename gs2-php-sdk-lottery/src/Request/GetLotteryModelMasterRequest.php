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

namespace Gs2\Lottery\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * 抽選の種類マスターを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetLotteryModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 抽選の種類マスターを取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 抽選の種類マスターを取得
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 抽選の種類マスターを取得
     * @return GetLotteryModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName): GetLotteryModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 抽選モデルの種類名 */
    private $lotteryName;

    /**
     * 抽選モデルの種類名を取得
     *
     * @return string|null 抽選の種類マスターを取得
     */
    public function getLotteryName(): ?string {
        return $this->lotteryName;
    }

    /**
     * 抽選モデルの種類名を設定
     *
     * @param string $lotteryName 抽選の種類マスターを取得
     */
    public function setLotteryName(string $lotteryName) {
        $this->lotteryName = $lotteryName;
    }

    /**
     * 抽選モデルの種類名を設定
     *
     * @param string $lotteryName 抽選の種類マスターを取得
     * @return GetLotteryModelMasterRequest $this
     */
    public function withLotteryName(string $lotteryName): GetLotteryModelMasterRequest {
        $this->setLotteryName($lotteryName);
        return $this;
    }

}