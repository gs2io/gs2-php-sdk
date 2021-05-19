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
 * スクリプトを実行します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class InvokeScriptRequest extends Gs2BasicRequest {

    /** @var string スクリプト */
    private $scriptId;

    /**
     * スクリプトを取得
     *
     * @return string|null スクリプトを実行します
     */
    public function getScriptId(): ?string {
        return $this->scriptId;
    }

    /**
     * スクリプトを設定
     *
     * @param string $scriptId スクリプトを実行します
     */
    public function setScriptId(string $scriptId = null) {
        $this->scriptId = $scriptId;
    }

    /**
     * スクリプトを設定
     *
     * @param string $scriptId スクリプトを実行します
     * @return InvokeScriptRequest $this
     */
    public function withScriptId(string $scriptId = null): InvokeScriptRequest {
        $this->setScriptId($scriptId);
        return $this;
    }

    /** @var string None */
    private $args;

    /**
     * Noneを取得
     *
     * @return string|null スクリプトを実行します
     */
    public function getArgs(): ?string {
        return $this->args;
    }

    /**
     * Noneを設定
     *
     * @param string $args スクリプトを実行します
     */
    public function setArgs(string $args = null) {
        $this->args = $args;
    }

    /**
     * Noneを設定
     *
     * @param string $args スクリプトを実行します
     * @return InvokeScriptRequest $this
     */
    public function withArgs(string $args = null): InvokeScriptRequest {
        $this->setArgs($args);
        return $this;
    }

}