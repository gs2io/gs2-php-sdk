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

namespace Gs2\Dictionary\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * エントリーモデルマスターを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetEntryModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null エントリーモデルマスターを取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName エントリーモデルマスターを取得
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName エントリーモデルマスターを取得
     * @return GetEntryModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): GetEntryModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string エントリーモデル名 */
    private $entryName;

    /**
     * エントリーモデル名を取得
     *
     * @return string|null エントリーモデルマスターを取得
     */
    public function getEntryName(): ?string {
        return $this->entryName;
    }

    /**
     * エントリーモデル名を設定
     *
     * @param string $entryName エントリーモデルマスターを取得
     */
    public function setEntryName(string $entryName = null) {
        $this->entryName = $entryName;
    }

    /**
     * エントリーモデル名を設定
     *
     * @param string $entryName エントリーモデルマスターを取得
     * @return GetEntryModelMasterRequest $this
     */
    public function withEntryName(string $entryName = null): GetEntryModelMasterRequest {
        $this->setEntryName($entryName);
        return $this;
    }

}