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

namespace Gs2\Formation\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * フォームマスターを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetFormModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null フォームマスターを取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName フォームマスターを取得
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName フォームマスターを取得
     * @return GetFormModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName): GetFormModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string フォーム名 */
    private $formModelName;

    /**
     * フォーム名を取得
     *
     * @return string|null フォームマスターを取得
     */
    public function getFormModelName(): ?string {
        return $this->formModelName;
    }

    /**
     * フォーム名を設定
     *
     * @param string $formModelName フォームマスターを取得
     */
    public function setFormModelName(string $formModelName) {
        $this->formModelName = $formModelName;
    }

    /**
     * フォーム名を設定
     *
     * @param string $formModelName フォームマスターを取得
     * @return GetFormModelMasterRequest $this
     */
    public function withFormModelName(string $formModelName): GetFormModelMasterRequest {
        $this->setFormModelName($formModelName);
        return $this;
    }

}