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
 * 経験値の種類マスターを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetExperienceModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 経験値の種類マスターを取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 経験値の種類マスターを取得
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 経験値の種類マスターを取得
     * @return GetExperienceModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): GetExperienceModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 経験値の種類名 */
    private $experienceName;

    /**
     * 経験値の種類名を取得
     *
     * @return string|null 経験値の種類マスターを取得
     */
    public function getExperienceName(): ?string {
        return $this->experienceName;
    }

    /**
     * 経験値の種類名を設定
     *
     * @param string $experienceName 経験値の種類マスターを取得
     */
    public function setExperienceName(string $experienceName = null) {
        $this->experienceName = $experienceName;
    }

    /**
     * 経験値の種類名を設定
     *
     * @param string $experienceName 経験値の種類マスターを取得
     * @return GetExperienceModelMasterRequest $this
     */
    public function withExperienceName(string $experienceName = null): GetExperienceModelMasterRequest {
        $this->setExperienceName($experienceName);
        return $this;
    }

}