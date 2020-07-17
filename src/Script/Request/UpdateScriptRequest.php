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

namespace Gs2\Script\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * スクリプトを更新します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateScriptRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null スクリプトを更新します
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName スクリプトを更新します
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName スクリプトを更新します
     * @return UpdateScriptRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): UpdateScriptRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string スクリプト名 */
    private $scriptName;

    /**
     * スクリプト名を取得
     *
     * @return string|null スクリプトを更新します
     */
    public function getScriptName(): ?string {
        return $this->scriptName;
    }

    /**
     * スクリプト名を設定
     *
     * @param string $scriptName スクリプトを更新します
     */
    public function setScriptName(string $scriptName = null) {
        $this->scriptName = $scriptName;
    }

    /**
     * スクリプト名を設定
     *
     * @param string $scriptName スクリプトを更新します
     * @return UpdateScriptRequest $this
     */
    public function withScriptName(string $scriptName = null): UpdateScriptRequest {
        $this->setScriptName($scriptName);
        return $this;
    }

    /** @var string 説明文 */
    private $description;

    /**
     * 説明文を取得
     *
     * @return string|null スクリプトを更新します
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * 説明文を設定
     *
     * @param string $description スクリプトを更新します
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * 説明文を設定
     *
     * @param string $description スクリプトを更新します
     * @return UpdateScriptRequest $this
     */
    public function withDescription(string $description = null): UpdateScriptRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string Luaスクリプト */
    private $script;

    /**
     * Luaスクリプトを取得
     *
     * @return string|null スクリプトを更新します
     */
    public function getScript(): ?string {
        return $this->script;
    }

    /**
     * Luaスクリプトを設定
     *
     * @param string $script スクリプトを更新します
     */
    public function setScript(string $script = null) {
        $this->script = $script;
    }

    /**
     * Luaスクリプトを設定
     *
     * @param string $script スクリプトを更新します
     * @return UpdateScriptRequest $this
     */
    public function withScript(string $script = null): UpdateScriptRequest {
        $this->setScript($script);
        return $this;
    }

}