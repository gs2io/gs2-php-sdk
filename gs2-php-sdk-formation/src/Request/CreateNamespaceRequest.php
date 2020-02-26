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

namespace Gs2\Formation\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Formation\Model\ScriptSetting;
use Gs2\Formation\Model\LogSetting;

/**
 * ネームスペースを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateNamespaceRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $name;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $name ネームスペースを新規作成
     */
    public function setName(string $name) {
        $this->name = $name;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $name ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withName(string $name): CreateNamespaceRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string ネームスペースの説明 */
    private $description;

    /**
     * ネームスペースの説明を取得
     *
     * @return string|null ネームスペースを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを新規作成
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withDescription(string $description): CreateNamespaceRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var ScriptSetting キャパシティを更新するときに実行するスクリプト */
    private $updateMoldScript;

    /**
     * キャパシティを更新するときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを新規作成
     */
    public function getUpdateMoldScript(): ?ScriptSetting {
        return $this->updateMoldScript;
    }

    /**
     * キャパシティを更新するときに実行するスクリプトを設定
     *
     * @param ScriptSetting $updateMoldScript ネームスペースを新規作成
     */
    public function setUpdateMoldScript(ScriptSetting $updateMoldScript) {
        $this->updateMoldScript = $updateMoldScript;
    }

    /**
     * キャパシティを更新するときに実行するスクリプトを設定
     *
     * @param ScriptSetting $updateMoldScript ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withUpdateMoldScript(ScriptSetting $updateMoldScript): CreateNamespaceRequest {
        $this->setUpdateMoldScript($updateMoldScript);
        return $this;
    }

    /** @var ScriptSetting フォームを更新するときに実行するスクリプト */
    private $updateFormScript;

    /**
     * フォームを更新するときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを新規作成
     */
    public function getUpdateFormScript(): ?ScriptSetting {
        return $this->updateFormScript;
    }

    /**
     * フォームを更新するときに実行するスクリプトを設定
     *
     * @param ScriptSetting $updateFormScript ネームスペースを新規作成
     */
    public function setUpdateFormScript(ScriptSetting $updateFormScript) {
        $this->updateFormScript = $updateFormScript;
    }

    /**
     * フォームを更新するときに実行するスクリプトを設定
     *
     * @param ScriptSetting $updateFormScript ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withUpdateFormScript(ScriptSetting $updateFormScript): CreateNamespaceRequest {
        $this->setUpdateFormScript($updateFormScript);
        return $this;
    }

    /** @var LogSetting ログの出力設定 */
    private $logSetting;

    /**
     * ログの出力設定を取得
     *
     * @return LogSetting|null ネームスペースを新規作成
     */
    public function getLogSetting(): ?LogSetting {
        return $this->logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを新規作成
     */
    public function setLogSetting(LogSetting $logSetting) {
        $this->logSetting = $logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを新規作成
     * @return CreateNamespaceRequest $this
     */
    public function withLogSetting(LogSetting $logSetting): CreateNamespaceRequest {
        $this->setLogSetting($logSetting);
        return $this;
    }

}