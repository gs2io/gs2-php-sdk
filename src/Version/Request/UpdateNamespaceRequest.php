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
use Gs2\Version\Model\ScriptSetting;
use Gs2\Version\Model\LogSetting;

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

    /** @var string 説明文 */
    private $description;

    /**
     * 説明文を取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * 説明文を設定
     *
     * @param string $description ネームスペースを更新
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * 説明文を設定
     *
     * @param string $description ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withDescription(string $description = null): UpdateNamespaceRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string バージョンチェック通過後に改めて発行するプロジェクトトークンの権限判定に使用する ユーザ のGRN */
    private $assumeUserId;

    /**
     * バージョンチェック通過後に改めて発行するプロジェクトトークンの権限判定に使用する ユーザ のGRNを取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getAssumeUserId(): ?string {
        return $this->assumeUserId;
    }

    /**
     * バージョンチェック通過後に改めて発行するプロジェクトトークンの権限判定に使用する ユーザ のGRNを設定
     *
     * @param string $assumeUserId ネームスペースを更新
     */
    public function setAssumeUserId(string $assumeUserId = null) {
        $this->assumeUserId = $assumeUserId;
    }

    /**
     * バージョンチェック通過後に改めて発行するプロジェクトトークンの権限判定に使用する ユーザ のGRNを設定
     *
     * @param string $assumeUserId ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withAssumeUserId(string $assumeUserId = null): UpdateNamespaceRequest {
        $this->setAssumeUserId($assumeUserId);
        return $this;
    }

    /** @var ScriptSetting バージョンを承認したときに実行するスクリプト */
    private $acceptVersionScript;

    /**
     * バージョンを承認したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを更新
     */
    public function getAcceptVersionScript(): ?ScriptSetting {
        return $this->acceptVersionScript;
    }

    /**
     * バージョンを承認したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $acceptVersionScript ネームスペースを更新
     */
    public function setAcceptVersionScript(ScriptSetting $acceptVersionScript = null) {
        $this->acceptVersionScript = $acceptVersionScript;
    }

    /**
     * バージョンを承認したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $acceptVersionScript ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withAcceptVersionScript(ScriptSetting $acceptVersionScript = null): UpdateNamespaceRequest {
        $this->setAcceptVersionScript($acceptVersionScript);
        return $this;
    }

    /** @var string バージョンチェック時 に実行されるスクリプト のGRN */
    private $checkVersionTriggerScriptId;

    /**
     * バージョンチェック時 に実行されるスクリプト のGRNを取得
     *
     * @return string|null ネームスペースを更新
     */
    public function getCheckVersionTriggerScriptId(): ?string {
        return $this->checkVersionTriggerScriptId;
    }

    /**
     * バージョンチェック時 に実行されるスクリプト のGRNを設定
     *
     * @param string $checkVersionTriggerScriptId ネームスペースを更新
     */
    public function setCheckVersionTriggerScriptId(string $checkVersionTriggerScriptId = null) {
        $this->checkVersionTriggerScriptId = $checkVersionTriggerScriptId;
    }

    /**
     * バージョンチェック時 に実行されるスクリプト のGRNを設定
     *
     * @param string $checkVersionTriggerScriptId ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withCheckVersionTriggerScriptId(string $checkVersionTriggerScriptId = null): UpdateNamespaceRequest {
        $this->setCheckVersionTriggerScriptId($checkVersionTriggerScriptId);
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