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
use Gs2\Version\Model\Version;

/**
 * スタンプシートのタスクを実行する のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CalculateSignatureRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null スタンプシートのタスクを実行する
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName スタンプシートのタスクを実行する
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName スタンプシートのタスクを実行する
     * @return CalculateSignatureRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): CalculateSignatureRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string バージョンの種類名 */
    private $versionName;

    /**
     * バージョンの種類名を取得
     *
     * @return string|null スタンプシートのタスクを実行する
     */
    public function getVersionName(): ?string {
        return $this->versionName;
    }

    /**
     * バージョンの種類名を設定
     *
     * @param string $versionName スタンプシートのタスクを実行する
     */
    public function setVersionName(string $versionName = null) {
        $this->versionName = $versionName;
    }

    /**
     * バージョンの種類名を設定
     *
     * @param string $versionName スタンプシートのタスクを実行する
     * @return CalculateSignatureRequest $this
     */
    public function withVersionName(string $versionName = null): CalculateSignatureRequest {
        $this->setVersionName($versionName);
        return $this;
    }

    /** @var Version バージョン */
    private $version;

    /**
     * バージョンを取得
     *
     * @return Version|null スタンプシートのタスクを実行する
     */
    public function getVersion(): ?Version {
        return $this->version;
    }

    /**
     * バージョンを設定
     *
     * @param Version $version スタンプシートのタスクを実行する
     */
    public function setVersion(Version $version = null) {
        $this->version = $version;
    }

    /**
     * バージョンを設定
     *
     * @param Version $version スタンプシートのタスクを実行する
     * @return CalculateSignatureRequest $this
     */
    public function withVersion(Version $version = null): CalculateSignatureRequest {
        $this->setVersion($version);
        return $this;
    }

}