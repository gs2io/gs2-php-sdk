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
use Gs2\Dictionary\Model\ScriptSetting;
use Gs2\Dictionary\Model\LogSetting;

/**
 * ネームスペースを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateNamespaceRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ネームスペースを更新
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): UpdateNamespaceRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ネームスペースの説明 */
    private $description;

    /**
     * ネームスペースの説明を取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを更新
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withDescription(string $description = null): UpdateNamespaceRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var ScriptSetting エントリー登録時に実行するスクリプト */
    private $entryScript;

    /**
     * エントリー登録時に実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを更新
     */
    public function getEntryScript(): ?ScriptSetting {
        return $this->entryScript;
    }

    /**
     * エントリー登録時に実行するスクリプトを設定
     *
     * @param ScriptSetting $entryScript ネームスペースを更新
     */
    public function setEntryScript(ScriptSetting $entryScript = null) {
        $this->entryScript = $entryScript;
    }

    /**
     * エントリー登録時に実行するスクリプトを設定
     *
     * @param ScriptSetting $entryScript ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withEntryScript(ScriptSetting $entryScript = null): UpdateNamespaceRequest {
        $this->setEntryScript($entryScript);
        return $this;
    }

    /** @var ScriptSetting 登録済みのエントリーを再度登録しようとした時に実行するスクリプト */
    private $duplicateEntryScript;

    /**
     * 登録済みのエントリーを再度登録しようとした時に実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを更新
     */
    public function getDuplicateEntryScript(): ?ScriptSetting {
        return $this->duplicateEntryScript;
    }

    /**
     * 登録済みのエントリーを再度登録しようとした時に実行するスクリプトを設定
     *
     * @param ScriptSetting $duplicateEntryScript ネームスペースを更新
     */
    public function setDuplicateEntryScript(ScriptSetting $duplicateEntryScript = null) {
        $this->duplicateEntryScript = $duplicateEntryScript;
    }

    /**
     * 登録済みのエントリーを再度登録しようとした時に実行するスクリプトを設定
     *
     * @param ScriptSetting $duplicateEntryScript ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withDuplicateEntryScript(ScriptSetting $duplicateEntryScript = null): UpdateNamespaceRequest {
        $this->setDuplicateEntryScript($duplicateEntryScript);
        return $this;
    }

    /** @var LogSetting ログの出力設定 */
    private $logSetting;

    /**
     * ログの出力設定を取得
     *
     * @return LogSetting|null ネームスペースを更新
     */
    public function getLogSetting(): ?LogSetting {
        return $this->logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを更新
     */
    public function setLogSetting(LogSetting $logSetting = null) {
        $this->logSetting = $logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withLogSetting(LogSetting $logSetting = null): UpdateNamespaceRequest {
        $this->setLogSetting($logSetting);
        return $this;
    }

}