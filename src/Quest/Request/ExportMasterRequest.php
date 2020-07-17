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

namespace Gs2\Quest\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * 現在有効なクエストマスターのマスターデータをエクスポートします のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class ExportMasterRequest extends Gs2BasicRequest {

    /** @var string カテゴリ名 */
    private $namespaceName;

    /**
     * カテゴリ名を取得
     *
     * @return string|null 現在有効なクエストマスターのマスターデータをエクスポートします
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $namespaceName 現在有効なクエストマスターのマスターデータをエクスポートします
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $namespaceName 現在有効なクエストマスターのマスターデータをエクスポートします
     * @return ExportMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): ExportMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

}