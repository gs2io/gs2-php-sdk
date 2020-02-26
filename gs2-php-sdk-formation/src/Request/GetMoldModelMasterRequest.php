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
 * フォームの保存領域マスターを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetMoldModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null フォームの保存領域マスターを取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName フォームの保存領域マスターを取得
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName フォームの保存領域マスターを取得
     * @return GetMoldModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName): GetMoldModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string フォームの保存領域名 */
    private $moldName;

    /**
     * フォームの保存領域名を取得
     *
     * @return string|null フォームの保存領域マスターを取得
     */
    public function getMoldName(): ?string {
        return $this->moldName;
    }

    /**
     * フォームの保存領域名を設定
     *
     * @param string $moldName フォームの保存領域マスターを取得
     */
    public function setMoldName(string $moldName) {
        $this->moldName = $moldName;
    }

    /**
     * フォームの保存領域名を設定
     *
     * @param string $moldName フォームの保存領域マスターを取得
     * @return GetMoldModelMasterRequest $this
     */
    public function withMoldName(string $moldName): GetMoldModelMasterRequest {
        $this->setMoldName($moldName);
        return $this;
    }

}