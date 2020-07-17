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
 * スクリプトを削除します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteScriptRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null スクリプトを削除します
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName スクリプトを削除します
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName スクリプトを削除します
     * @return DeleteScriptRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): DeleteScriptRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string スクリプト名 */
    private $scriptName;

    /**
     * スクリプト名を取得
     *
     * @return string|null スクリプトを削除します
     */
    public function getScriptName(): ?string {
        return $this->scriptName;
    }

    /**
     * スクリプト名を設定
     *
     * @param string $scriptName スクリプトを削除します
     */
    public function setScriptName(string $scriptName = null) {
        $this->scriptName = $scriptName;
    }

    /**
     * スクリプト名を設定
     *
     * @param string $scriptName スクリプトを削除します
     * @return DeleteScriptRequest $this
     */
    public function withScriptName(string $scriptName = null): DeleteScriptRequest {
        $this->setScriptName($scriptName);
        return $this;
    }

}