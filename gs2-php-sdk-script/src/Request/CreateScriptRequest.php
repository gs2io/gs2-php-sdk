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
 * スクリプトを新規作成します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateScriptRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null スクリプトを新規作成します
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName スクリプトを新規作成します
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName スクリプトを新規作成します
     * @return CreateScriptRequest $this
     */
    public function withNamespaceName(string $namespaceName): CreateScriptRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string スクリプト名 */
    private $name;

    /**
     * スクリプト名を取得
     *
     * @return string|null スクリプトを新規作成します
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * スクリプト名を設定
     *
     * @param string $name スクリプトを新規作成します
     */
    public function setName(string $name) {
        $this->name = $name;
    }

    /**
     * スクリプト名を設定
     *
     * @param string $name スクリプトを新規作成します
     * @return CreateScriptRequest $this
     */
    public function withName(string $name): CreateScriptRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string 説明文 */
    private $description;

    /**
     * 説明文を取得
     *
     * @return string|null スクリプトを新規作成します
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * 説明文を設定
     *
     * @param string $description スクリプトを新規作成します
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * 説明文を設定
     *
     * @param string $description スクリプトを新規作成します
     * @return CreateScriptRequest $this
     */
    public function withDescription(string $description): CreateScriptRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string Luaスクリプト */
    private $script;

    /**
     * Luaスクリプトを取得
     *
     * @return string|null スクリプトを新規作成します
     */
    public function getScript(): ?string {
        return $this->script;
    }

    /**
     * Luaスクリプトを設定
     *
     * @param string $script スクリプトを新規作成します
     */
    public function setScript(string $script) {
        $this->script = $script;
    }

    /**
     * Luaスクリプトを設定
     *
     * @param string $script スクリプトを新規作成します
     * @return CreateScriptRequest $this
     */
    public function withScript(string $script): CreateScriptRequest {
        $this->setScript($script);
        return $this;
    }

}