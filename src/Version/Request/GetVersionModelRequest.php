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

namespace Gs2\Version\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * バージョン設定を取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetVersionModelRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null バージョン設定を取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName バージョン設定を取得
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName バージョン設定を取得
     * @return GetVersionModelRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): GetVersionModelRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string バージョン名 */
    private $versionName;

    /**
     * バージョン名を取得
     *
     * @return string|null バージョン設定を取得
     */
    public function getVersionName(): ?string {
        return $this->versionName;
    }

    /**
     * バージョン名を設定
     *
     * @param string $versionName バージョン設定を取得
     */
    public function setVersionName(string $versionName = null) {
        $this->versionName = $versionName;
    }

    /**
     * バージョン名を設定
     *
     * @param string $versionName バージョン設定を取得
     * @return GetVersionModelRequest $this
     */
    public function withVersionName(string $versionName = null): GetVersionModelRequest {
        $this->setVersionName($versionName);
        return $this;
    }

}