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

namespace Gs2\Account\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Account\Model\ScriptSetting;
use Gs2\Account\Model\LogSetting;

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

    /** @var bool アカウント引き継ぎ時にパスワードを変更するか */
    private $changePasswordIfTakeOver;

    /**
     * アカウント引き継ぎ時にパスワードを変更するかを取得
     *
     * @return bool|null ネームスペースを更新
     */
    public function getChangePasswordIfTakeOver(): ?bool {
        return $this->changePasswordIfTakeOver;
    }

    /**
     * アカウント引き継ぎ時にパスワードを変更するかを設定
     *
     * @param bool $changePasswordIfTakeOver ネームスペースを更新
     */
    public function setChangePasswordIfTakeOver(bool $changePasswordIfTakeOver = null) {
        $this->changePasswordIfTakeOver = $changePasswordIfTakeOver;
    }

    /**
     * アカウント引き継ぎ時にパスワードを変更するかを設定
     *
     * @param bool $changePasswordIfTakeOver ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withChangePasswordIfTakeOver(bool $changePasswordIfTakeOver = null): UpdateNamespaceRequest {
        $this->setChangePasswordIfTakeOver($changePasswordIfTakeOver);
        return $this;
    }

    /** @var ScriptSetting アカウント新規作成したときに実行するスクリプト */
    private $createAccountScript;

    /**
     * アカウント新規作成したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを更新
     */
    public function getCreateAccountScript(): ?ScriptSetting {
        return $this->createAccountScript;
    }

    /**
     * アカウント新規作成したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $createAccountScript ネームスペースを更新
     */
    public function setCreateAccountScript(ScriptSetting $createAccountScript = null) {
        $this->createAccountScript = $createAccountScript;
    }

    /**
     * アカウント新規作成したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $createAccountScript ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withCreateAccountScript(ScriptSetting $createAccountScript = null): UpdateNamespaceRequest {
        $this->setCreateAccountScript($createAccountScript);
        return $this;
    }

    /** @var ScriptSetting 認証したときに実行するスクリプト */
    private $authenticationScript;

    /**
     * 認証したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを更新
     */
    public function getAuthenticationScript(): ?ScriptSetting {
        return $this->authenticationScript;
    }

    /**
     * 認証したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $authenticationScript ネームスペースを更新
     */
    public function setAuthenticationScript(ScriptSetting $authenticationScript = null) {
        $this->authenticationScript = $authenticationScript;
    }

    /**
     * 認証したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $authenticationScript ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withAuthenticationScript(ScriptSetting $authenticationScript = null): UpdateNamespaceRequest {
        $this->setAuthenticationScript($authenticationScript);
        return $this;
    }

    /** @var ScriptSetting 引き継ぎ情報登録したときに実行するスクリプト */
    private $createTakeOverScript;

    /**
     * 引き継ぎ情報登録したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを更新
     */
    public function getCreateTakeOverScript(): ?ScriptSetting {
        return $this->createTakeOverScript;
    }

    /**
     * 引き継ぎ情報登録したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $createTakeOverScript ネームスペースを更新
     */
    public function setCreateTakeOverScript(ScriptSetting $createTakeOverScript = null) {
        $this->createTakeOverScript = $createTakeOverScript;
    }

    /**
     * 引き継ぎ情報登録したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $createTakeOverScript ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withCreateTakeOverScript(ScriptSetting $createTakeOverScript = null): UpdateNamespaceRequest {
        $this->setCreateTakeOverScript($createTakeOverScript);
        return $this;
    }

    /** @var ScriptSetting 引き継ぎ実行したときに実行するスクリプト */
    private $doTakeOverScript;

    /**
     * 引き継ぎ実行したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを更新
     */
    public function getDoTakeOverScript(): ?ScriptSetting {
        return $this->doTakeOverScript;
    }

    /**
     * 引き継ぎ実行したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $doTakeOverScript ネームスペースを更新
     */
    public function setDoTakeOverScript(ScriptSetting $doTakeOverScript = null) {
        $this->doTakeOverScript = $doTakeOverScript;
    }

    /**
     * 引き継ぎ実行したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $doTakeOverScript ネームスペースを更新
     * @return UpdateNamespaceRequest $this
     */
    public function withDoTakeOverScript(ScriptSetting $doTakeOverScript = null): UpdateNamespaceRequest {
        $this->setDoTakeOverScript($doTakeOverScript);
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