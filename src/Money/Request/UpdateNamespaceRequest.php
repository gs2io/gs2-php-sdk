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

namespace Gs2\Money\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Money\Model\ScriptSetting;
use Gs2\Money\Model\LogSetting;

/**
 * ネームスペースを更新します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateNamespaceRequest extends Gs2BasicRequest {

    /** @var string ネームスペースの名前 */
    private $namespaceName;

    /**
     * ネームスペースの名前を取得
     *
     * @return string|null ネームスペースを更新します
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペースの名前を設定
     *
     * @param string $namespaceName ネームスペースを更新します
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペースの名前を設定
     *
     * @param string $namespaceName ネームスペースを更新します
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
     * @return string|null ネームスペースを更新します
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを更新します
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを更新します
     * @return UpdateNamespaceRequest $this
     */
    public function withDescription(string $description = null): UpdateNamespaceRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string 消費優先度 */
    private $priority;

    /**
     * 消費優先度を取得
     *
     * @return string|null ネームスペースを更新します
     */
    public function getPriority(): ?string {
        return $this->priority;
    }

    /**
     * 消費優先度を設定
     *
     * @param string $priority ネームスペースを更新します
     */
    public function setPriority(string $priority = null) {
        $this->priority = $priority;
    }

    /**
     * 消費優先度を設定
     *
     * @param string $priority ネームスペースを更新します
     * @return UpdateNamespaceRequest $this
     */
    public function withPriority(string $priority = null): UpdateNamespaceRequest {
        $this->setPriority($priority);
        return $this;
    }

    /** @var string Apple AppStore のバンドルID */
    private $appleKey;

    /**
     * Apple AppStore のバンドルIDを取得
     *
     * @return string|null ネームスペースを更新します
     */
    public function getAppleKey(): ?string {
        return $this->appleKey;
    }

    /**
     * Apple AppStore のバンドルIDを設定
     *
     * @param string $appleKey ネームスペースを更新します
     */
    public function setAppleKey(string $appleKey = null) {
        $this->appleKey = $appleKey;
    }

    /**
     * Apple AppStore のバンドルIDを設定
     *
     * @param string $appleKey ネームスペースを更新します
     * @return UpdateNamespaceRequest $this
     */
    public function withAppleKey(string $appleKey = null): UpdateNamespaceRequest {
        $this->setAppleKey($appleKey);
        return $this;
    }

    /** @var string Google PlayStore の秘密鍵 */
    private $googleKey;

    /**
     * Google PlayStore の秘密鍵を取得
     *
     * @return string|null ネームスペースを更新します
     */
    public function getGoogleKey(): ?string {
        return $this->googleKey;
    }

    /**
     * Google PlayStore の秘密鍵を設定
     *
     * @param string $googleKey ネームスペースを更新します
     */
    public function setGoogleKey(string $googleKey = null) {
        $this->googleKey = $googleKey;
    }

    /**
     * Google PlayStore の秘密鍵を設定
     *
     * @param string $googleKey ネームスペースを更新します
     * @return UpdateNamespaceRequest $this
     */
    public function withGoogleKey(string $googleKey = null): UpdateNamespaceRequest {
        $this->setGoogleKey($googleKey);
        return $this;
    }

    /** @var bool UnityEditorが出力する偽のレシートで決済できるようにするか */
    private $enableFakeReceipt;

    /**
     * UnityEditorが出力する偽のレシートで決済できるようにするかを取得
     *
     * @return bool|null ネームスペースを更新します
     */
    public function getEnableFakeReceipt(): ?bool {
        return $this->enableFakeReceipt;
    }

    /**
     * UnityEditorが出力する偽のレシートで決済できるようにするかを設定
     *
     * @param bool $enableFakeReceipt ネームスペースを更新します
     */
    public function setEnableFakeReceipt(bool $enableFakeReceipt = null) {
        $this->enableFakeReceipt = $enableFakeReceipt;
    }

    /**
     * UnityEditorが出力する偽のレシートで決済できるようにするかを設定
     *
     * @param bool $enableFakeReceipt ネームスペースを更新します
     * @return UpdateNamespaceRequest $this
     */
    public function withEnableFakeReceipt(bool $enableFakeReceipt = null): UpdateNamespaceRequest {
        $this->setEnableFakeReceipt($enableFakeReceipt);
        return $this;
    }

    /** @var ScriptSetting ウォレット新規作成したときに実行するスクリプト */
    private $createWalletScript;

    /**
     * ウォレット新規作成したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを更新します
     */
    public function getCreateWalletScript(): ?ScriptSetting {
        return $this->createWalletScript;
    }

    /**
     * ウォレット新規作成したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $createWalletScript ネームスペースを更新します
     */
    public function setCreateWalletScript(ScriptSetting $createWalletScript = null) {
        $this->createWalletScript = $createWalletScript;
    }

    /**
     * ウォレット新規作成したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $createWalletScript ネームスペースを更新します
     * @return UpdateNamespaceRequest $this
     */
    public function withCreateWalletScript(ScriptSetting $createWalletScript = null): UpdateNamespaceRequest {
        $this->setCreateWalletScript($createWalletScript);
        return $this;
    }

    /** @var ScriptSetting ウォレット残高加算したときに実行するスクリプト */
    private $depositScript;

    /**
     * ウォレット残高加算したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを更新します
     */
    public function getDepositScript(): ?ScriptSetting {
        return $this->depositScript;
    }

    /**
     * ウォレット残高加算したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $depositScript ネームスペースを更新します
     */
    public function setDepositScript(ScriptSetting $depositScript = null) {
        $this->depositScript = $depositScript;
    }

    /**
     * ウォレット残高加算したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $depositScript ネームスペースを更新します
     * @return UpdateNamespaceRequest $this
     */
    public function withDepositScript(ScriptSetting $depositScript = null): UpdateNamespaceRequest {
        $this->setDepositScript($depositScript);
        return $this;
    }

    /** @var ScriptSetting ウォレット残高消費したときに実行するスクリプト */
    private $withdrawScript;

    /**
     * ウォレット残高消費したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを更新します
     */
    public function getWithdrawScript(): ?ScriptSetting {
        return $this->withdrawScript;
    }

    /**
     * ウォレット残高消費したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $withdrawScript ネームスペースを更新します
     */
    public function setWithdrawScript(ScriptSetting $withdrawScript = null) {
        $this->withdrawScript = $withdrawScript;
    }

    /**
     * ウォレット残高消費したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $withdrawScript ネームスペースを更新します
     * @return UpdateNamespaceRequest $this
     */
    public function withWithdrawScript(ScriptSetting $withdrawScript = null): UpdateNamespaceRequest {
        $this->setWithdrawScript($withdrawScript);
        return $this;
    }

    /** @var LogSetting ログの出力設定 */
    private $logSetting;

    /**
     * ログの出力設定を取得
     *
     * @return LogSetting|null ネームスペースを更新します
     */
    public function getLogSetting(): ?LogSetting {
        return $this->logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを更新します
     */
    public function setLogSetting(LogSetting $logSetting = null) {
        $this->logSetting = $logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを更新します
     * @return UpdateNamespaceRequest $this
     */
    public function withLogSetting(LogSetting $logSetting = null): UpdateNamespaceRequest {
        $this->setLogSetting($logSetting);
        return $this;
    }

}