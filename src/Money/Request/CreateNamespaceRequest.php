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
 * ネームスペースを新規作成します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateNamespaceRequest extends Gs2BasicRequest {

    /** @var string ネームスペースの名前 */
    private $name;

    /**
     * ネームスペースの名前を取得
     *
     * @return string|null ネームスペースを新規作成します
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * ネームスペースの名前を設定
     *
     * @param string $name ネームスペースを新規作成します
     */
    public function setName(string $name = null) {
        $this->name = $name;
    }

    /**
     * ネームスペースの名前を設定
     *
     * @param string $name ネームスペースを新規作成します
     * @return CreateNamespaceRequest $this
     */
    public function withName(string $name = null): CreateNamespaceRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string ネームスペースの説明 */
    private $description;

    /**
     * ネームスペースの説明を取得
     *
     * @return string|null ネームスペースを新規作成します
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを新規作成します
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * ネームスペースの説明を設定
     *
     * @param string $description ネームスペースを新規作成します
     * @return CreateNamespaceRequest $this
     */
    public function withDescription(string $description = null): CreateNamespaceRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string 消費優先度 */
    private $priority;

    /**
     * 消費優先度を取得
     *
     * @return string|null ネームスペースを新規作成します
     */
    public function getPriority(): ?string {
        return $this->priority;
    }

    /**
     * 消費優先度を設定
     *
     * @param string $priority ネームスペースを新規作成します
     */
    public function setPriority(string $priority = null) {
        $this->priority = $priority;
    }

    /**
     * 消費優先度を設定
     *
     * @param string $priority ネームスペースを新規作成します
     * @return CreateNamespaceRequest $this
     */
    public function withPriority(string $priority = null): CreateNamespaceRequest {
        $this->setPriority($priority);
        return $this;
    }

    /** @var bool 無償課金通貨を異なるスロットで共有するか */
    private $shareFree;

    /**
     * 無償課金通貨を異なるスロットで共有するかを取得
     *
     * @return bool|null ネームスペースを新規作成します
     */
    public function getShareFree(): ?bool {
        return $this->shareFree;
    }

    /**
     * 無償課金通貨を異なるスロットで共有するかを設定
     *
     * @param bool $shareFree ネームスペースを新規作成します
     */
    public function setShareFree(bool $shareFree = null) {
        $this->shareFree = $shareFree;
    }

    /**
     * 無償課金通貨を異なるスロットで共有するかを設定
     *
     * @param bool $shareFree ネームスペースを新規作成します
     * @return CreateNamespaceRequest $this
     */
    public function withShareFree(bool $shareFree = null): CreateNamespaceRequest {
        $this->setShareFree($shareFree);
        return $this;
    }

    /** @var string 通貨の種類 */
    private $currency;

    /**
     * 通貨の種類を取得
     *
     * @return string|null ネームスペースを新規作成します
     */
    public function getCurrency(): ?string {
        return $this->currency;
    }

    /**
     * 通貨の種類を設定
     *
     * @param string $currency ネームスペースを新規作成します
     */
    public function setCurrency(string $currency = null) {
        $this->currency = $currency;
    }

    /**
     * 通貨の種類を設定
     *
     * @param string $currency ネームスペースを新規作成します
     * @return CreateNamespaceRequest $this
     */
    public function withCurrency(string $currency = null): CreateNamespaceRequest {
        $this->setCurrency($currency);
        return $this;
    }

    /** @var string Apple AppStore のバンドルID */
    private $appleKey;

    /**
     * Apple AppStore のバンドルIDを取得
     *
     * @return string|null ネームスペースを新規作成します
     */
    public function getAppleKey(): ?string {
        return $this->appleKey;
    }

    /**
     * Apple AppStore のバンドルIDを設定
     *
     * @param string $appleKey ネームスペースを新規作成します
     */
    public function setAppleKey(string $appleKey = null) {
        $this->appleKey = $appleKey;
    }

    /**
     * Apple AppStore のバンドルIDを設定
     *
     * @param string $appleKey ネームスペースを新規作成します
     * @return CreateNamespaceRequest $this
     */
    public function withAppleKey(string $appleKey = null): CreateNamespaceRequest {
        $this->setAppleKey($appleKey);
        return $this;
    }

    /** @var string Google PlayStore の秘密鍵 */
    private $googleKey;

    /**
     * Google PlayStore の秘密鍵を取得
     *
     * @return string|null ネームスペースを新規作成します
     */
    public function getGoogleKey(): ?string {
        return $this->googleKey;
    }

    /**
     * Google PlayStore の秘密鍵を設定
     *
     * @param string $googleKey ネームスペースを新規作成します
     */
    public function setGoogleKey(string $googleKey = null) {
        $this->googleKey = $googleKey;
    }

    /**
     * Google PlayStore の秘密鍵を設定
     *
     * @param string $googleKey ネームスペースを新規作成します
     * @return CreateNamespaceRequest $this
     */
    public function withGoogleKey(string $googleKey = null): CreateNamespaceRequest {
        $this->setGoogleKey($googleKey);
        return $this;
    }

    /** @var bool UnityEditorが出力する偽のレシートで決済できるようにするか */
    private $enableFakeReceipt;

    /**
     * UnityEditorが出力する偽のレシートで決済できるようにするかを取得
     *
     * @return bool|null ネームスペースを新規作成します
     */
    public function getEnableFakeReceipt(): ?bool {
        return $this->enableFakeReceipt;
    }

    /**
     * UnityEditorが出力する偽のレシートで決済できるようにするかを設定
     *
     * @param bool $enableFakeReceipt ネームスペースを新規作成します
     */
    public function setEnableFakeReceipt(bool $enableFakeReceipt = null) {
        $this->enableFakeReceipt = $enableFakeReceipt;
    }

    /**
     * UnityEditorが出力する偽のレシートで決済できるようにするかを設定
     *
     * @param bool $enableFakeReceipt ネームスペースを新規作成します
     * @return CreateNamespaceRequest $this
     */
    public function withEnableFakeReceipt(bool $enableFakeReceipt = null): CreateNamespaceRequest {
        $this->setEnableFakeReceipt($enableFakeReceipt);
        return $this;
    }

    /** @var ScriptSetting ウォレット新規作成したときに実行するスクリプト */
    private $createWalletScript;

    /**
     * ウォレット新規作成したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを新規作成します
     */
    public function getCreateWalletScript(): ?ScriptSetting {
        return $this->createWalletScript;
    }

    /**
     * ウォレット新規作成したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $createWalletScript ネームスペースを新規作成します
     */
    public function setCreateWalletScript(ScriptSetting $createWalletScript = null) {
        $this->createWalletScript = $createWalletScript;
    }

    /**
     * ウォレット新規作成したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $createWalletScript ネームスペースを新規作成します
     * @return CreateNamespaceRequest $this
     */
    public function withCreateWalletScript(ScriptSetting $createWalletScript = null): CreateNamespaceRequest {
        $this->setCreateWalletScript($createWalletScript);
        return $this;
    }

    /** @var ScriptSetting ウォレット残高加算したときに実行するスクリプト */
    private $depositScript;

    /**
     * ウォレット残高加算したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを新規作成します
     */
    public function getDepositScript(): ?ScriptSetting {
        return $this->depositScript;
    }

    /**
     * ウォレット残高加算したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $depositScript ネームスペースを新規作成します
     */
    public function setDepositScript(ScriptSetting $depositScript = null) {
        $this->depositScript = $depositScript;
    }

    /**
     * ウォレット残高加算したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $depositScript ネームスペースを新規作成します
     * @return CreateNamespaceRequest $this
     */
    public function withDepositScript(ScriptSetting $depositScript = null): CreateNamespaceRequest {
        $this->setDepositScript($depositScript);
        return $this;
    }

    /** @var ScriptSetting ウォレット残高消費したときに実行するスクリプト */
    private $withdrawScript;

    /**
     * ウォレット残高消費したときに実行するスクリプトを取得
     *
     * @return ScriptSetting|null ネームスペースを新規作成します
     */
    public function getWithdrawScript(): ?ScriptSetting {
        return $this->withdrawScript;
    }

    /**
     * ウォレット残高消費したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $withdrawScript ネームスペースを新規作成します
     */
    public function setWithdrawScript(ScriptSetting $withdrawScript = null) {
        $this->withdrawScript = $withdrawScript;
    }

    /**
     * ウォレット残高消費したときに実行するスクリプトを設定
     *
     * @param ScriptSetting $withdrawScript ネームスペースを新規作成します
     * @return CreateNamespaceRequest $this
     */
    public function withWithdrawScript(ScriptSetting $withdrawScript = null): CreateNamespaceRequest {
        $this->setWithdrawScript($withdrawScript);
        return $this;
    }

    /** @var LogSetting ログの出力設定 */
    private $logSetting;

    /**
     * ログの出力設定を取得
     *
     * @return LogSetting|null ネームスペースを新規作成します
     */
    public function getLogSetting(): ?LogSetting {
        return $this->logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを新規作成します
     */
    public function setLogSetting(LogSetting $logSetting = null) {
        $this->logSetting = $logSetting;
    }

    /**
     * ログの出力設定を設定
     *
     * @param LogSetting $logSetting ネームスペースを新規作成します
     * @return CreateNamespaceRequest $this
     */
    public function withLogSetting(LogSetting $logSetting = null): CreateNamespaceRequest {
        $this->setLogSetting($logSetting);
        return $this;
    }

}