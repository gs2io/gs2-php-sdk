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

namespace Gs2\Money\Model;

use Gs2\Core\Model\IModel;

/**
 * ネームスペース
 *
 * @author Game Server Services, Inc.
 *
 */
class Namespace_ implements IModel {
	/**
     * @var string ネームスペース
	 */
	protected $namespaceId;

	/**
	 * ネームスペースを取得
	 *
	 * @return string|null ネームスペース
	 */
	public function getNamespaceId(): ?string {
		return $this->namespaceId;
	}

	/**
	 * ネームスペースを設定
	 *
	 * @param string|null $namespaceId ネームスペース
	 */
	public function setNamespaceId(?string $namespaceId) {
		$this->namespaceId = $namespaceId;
	}

	/**
	 * ネームスペースを設定
	 *
	 * @param string|null $namespaceId ネームスペース
	 * @return Namespace_ $this
	 */
	public function withNamespaceId(?string $namespaceId): Namespace_ {
		$this->namespaceId = $namespaceId;
		return $this;
	}
	/**
     * @var string オーナーID
	 */
	protected $ownerId;

	/**
	 * オーナーIDを取得
	 *
	 * @return string|null オーナーID
	 */
	public function getOwnerId(): ?string {
		return $this->ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string|null $ownerId オーナーID
	 */
	public function setOwnerId(?string $ownerId) {
		$this->ownerId = $ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string|null $ownerId オーナーID
	 * @return Namespace_ $this
	 */
	public function withOwnerId(?string $ownerId): Namespace_ {
		$this->ownerId = $ownerId;
		return $this;
	}
	/**
     * @var string ネームスペースの名前
	 */
	protected $name;

	/**
	 * ネームスペースの名前を取得
	 *
	 * @return string|null ネームスペースの名前
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * ネームスペースの名前を設定
	 *
	 * @param string|null $name ネームスペースの名前
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * ネームスペースの名前を設定
	 *
	 * @param string|null $name ネームスペースの名前
	 * @return Namespace_ $this
	 */
	public function withName(?string $name): Namespace_ {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string ネームスペースの説明
	 */
	protected $description;

	/**
	 * ネームスペースの説明を取得
	 *
	 * @return string|null ネームスペースの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * ネームスペースの説明を設定
	 *
	 * @param string|null $description ネームスペースの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * ネームスペースの説明を設定
	 *
	 * @param string|null $description ネームスペースの説明
	 * @return Namespace_ $this
	 */
	public function withDescription(?string $description): Namespace_ {
		$this->description = $description;
		return $this;
	}
	/**
     * @var string 消費優先度
	 */
	protected $priority;

	/**
	 * 消費優先度を取得
	 *
	 * @return string|null 消費優先度
	 */
	public function getPriority(): ?string {
		return $this->priority;
	}

	/**
	 * 消費優先度を設定
	 *
	 * @param string|null $priority 消費優先度
	 */
	public function setPriority(?string $priority) {
		$this->priority = $priority;
	}

	/**
	 * 消費優先度を設定
	 *
	 * @param string|null $priority 消費優先度
	 * @return Namespace_ $this
	 */
	public function withPriority(?string $priority): Namespace_ {
		$this->priority = $priority;
		return $this;
	}
	/**
     * @var bool 無償課金通貨を異なるスロットで共有するか
	 */
	protected $shareFree;

	/**
	 * 無償課金通貨を異なるスロットで共有するかを取得
	 *
	 * @return bool|null 無償課金通貨を異なるスロットで共有するか
	 */
	public function getShareFree(): ?bool {
		return $this->shareFree;
	}

	/**
	 * 無償課金通貨を異なるスロットで共有するかを設定
	 *
	 * @param bool|null $shareFree 無償課金通貨を異なるスロットで共有するか
	 */
	public function setShareFree(?bool $shareFree) {
		$this->shareFree = $shareFree;
	}

	/**
	 * 無償課金通貨を異なるスロットで共有するかを設定
	 *
	 * @param bool|null $shareFree 無償課金通貨を異なるスロットで共有するか
	 * @return Namespace_ $this
	 */
	public function withShareFree(?bool $shareFree): Namespace_ {
		$this->shareFree = $shareFree;
		return $this;
	}
	/**
     * @var string 通貨の種類
	 */
	protected $currency;

	/**
	 * 通貨の種類を取得
	 *
	 * @return string|null 通貨の種類
	 */
	public function getCurrency(): ?string {
		return $this->currency;
	}

	/**
	 * 通貨の種類を設定
	 *
	 * @param string|null $currency 通貨の種類
	 */
	public function setCurrency(?string $currency) {
		$this->currency = $currency;
	}

	/**
	 * 通貨の種類を設定
	 *
	 * @param string|null $currency 通貨の種類
	 * @return Namespace_ $this
	 */
	public function withCurrency(?string $currency): Namespace_ {
		$this->currency = $currency;
		return $this;
	}
	/**
     * @var string Apple AppStore のバンドルID
	 */
	protected $appleKey;

	/**
	 * Apple AppStore のバンドルIDを取得
	 *
	 * @return string|null Apple AppStore のバンドルID
	 */
	public function getAppleKey(): ?string {
		return $this->appleKey;
	}

	/**
	 * Apple AppStore のバンドルIDを設定
	 *
	 * @param string|null $appleKey Apple AppStore のバンドルID
	 */
	public function setAppleKey(?string $appleKey) {
		$this->appleKey = $appleKey;
	}

	/**
	 * Apple AppStore のバンドルIDを設定
	 *
	 * @param string|null $appleKey Apple AppStore のバンドルID
	 * @return Namespace_ $this
	 */
	public function withAppleKey(?string $appleKey): Namespace_ {
		$this->appleKey = $appleKey;
		return $this;
	}
	/**
     * @var string Google PlayStore の秘密鍵
	 */
	protected $googleKey;

	/**
	 * Google PlayStore の秘密鍵を取得
	 *
	 * @return string|null Google PlayStore の秘密鍵
	 */
	public function getGoogleKey(): ?string {
		return $this->googleKey;
	}

	/**
	 * Google PlayStore の秘密鍵を設定
	 *
	 * @param string|null $googleKey Google PlayStore の秘密鍵
	 */
	public function setGoogleKey(?string $googleKey) {
		$this->googleKey = $googleKey;
	}

	/**
	 * Google PlayStore の秘密鍵を設定
	 *
	 * @param string|null $googleKey Google PlayStore の秘密鍵
	 * @return Namespace_ $this
	 */
	public function withGoogleKey(?string $googleKey): Namespace_ {
		$this->googleKey = $googleKey;
		return $this;
	}
	/**
     * @var bool UnityEditorが出力する偽のレシートで決済できるようにするか
	 */
	protected $enableFakeReceipt;

	/**
	 * UnityEditorが出力する偽のレシートで決済できるようにするかを取得
	 *
	 * @return bool|null UnityEditorが出力する偽のレシートで決済できるようにするか
	 */
	public function getEnableFakeReceipt(): ?bool {
		return $this->enableFakeReceipt;
	}

	/**
	 * UnityEditorが出力する偽のレシートで決済できるようにするかを設定
	 *
	 * @param bool|null $enableFakeReceipt UnityEditorが出力する偽のレシートで決済できるようにするか
	 */
	public function setEnableFakeReceipt(?bool $enableFakeReceipt) {
		$this->enableFakeReceipt = $enableFakeReceipt;
	}

	/**
	 * UnityEditorが出力する偽のレシートで決済できるようにするかを設定
	 *
	 * @param bool|null $enableFakeReceipt UnityEditorが出力する偽のレシートで決済できるようにするか
	 * @return Namespace_ $this
	 */
	public function withEnableFakeReceipt(?bool $enableFakeReceipt): Namespace_ {
		$this->enableFakeReceipt = $enableFakeReceipt;
		return $this;
	}
	/**
     * @var ScriptSetting ウォレット新規作成したときに実行するスクリプト
	 */
	protected $createWalletScript;

	/**
	 * ウォレット新規作成したときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null ウォレット新規作成したときに実行するスクリプト
	 */
	public function getCreateWalletScript(): ?ScriptSetting {
		return $this->createWalletScript;
	}

	/**
	 * ウォレット新規作成したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $createWalletScript ウォレット新規作成したときに実行するスクリプト
	 */
	public function setCreateWalletScript(?ScriptSetting $createWalletScript) {
		$this->createWalletScript = $createWalletScript;
	}

	/**
	 * ウォレット新規作成したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $createWalletScript ウォレット新規作成したときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withCreateWalletScript(?ScriptSetting $createWalletScript): Namespace_ {
		$this->createWalletScript = $createWalletScript;
		return $this;
	}
	/**
     * @var ScriptSetting ウォレット残高加算したときに実行するスクリプト
	 */
	protected $depositScript;

	/**
	 * ウォレット残高加算したときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null ウォレット残高加算したときに実行するスクリプト
	 */
	public function getDepositScript(): ?ScriptSetting {
		return $this->depositScript;
	}

	/**
	 * ウォレット残高加算したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $depositScript ウォレット残高加算したときに実行するスクリプト
	 */
	public function setDepositScript(?ScriptSetting $depositScript) {
		$this->depositScript = $depositScript;
	}

	/**
	 * ウォレット残高加算したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $depositScript ウォレット残高加算したときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withDepositScript(?ScriptSetting $depositScript): Namespace_ {
		$this->depositScript = $depositScript;
		return $this;
	}
	/**
     * @var ScriptSetting ウォレット残高消費したときに実行するスクリプト
	 */
	protected $withdrawScript;

	/**
	 * ウォレット残高消費したときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null ウォレット残高消費したときに実行するスクリプト
	 */
	public function getWithdrawScript(): ?ScriptSetting {
		return $this->withdrawScript;
	}

	/**
	 * ウォレット残高消費したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $withdrawScript ウォレット残高消費したときに実行するスクリプト
	 */
	public function setWithdrawScript(?ScriptSetting $withdrawScript) {
		$this->withdrawScript = $withdrawScript;
	}

	/**
	 * ウォレット残高消費したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $withdrawScript ウォレット残高消費したときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withWithdrawScript(?ScriptSetting $withdrawScript): Namespace_ {
		$this->withdrawScript = $withdrawScript;
		return $this;
	}
	/**
     * @var float 未使用残高
	 */
	protected $balance;

	/**
	 * 未使用残高を取得
	 *
	 * @return float|null 未使用残高
	 */
	public function getBalance(): ?float {
		return $this->balance;
	}

	/**
	 * 未使用残高を設定
	 *
	 * @param float|null $balance 未使用残高
	 */
	public function setBalance(?float $balance) {
		$this->balance = $balance;
	}

	/**
	 * 未使用残高を設定
	 *
	 * @param float|null $balance 未使用残高
	 * @return Namespace_ $this
	 */
	public function withBalance(?float $balance): Namespace_ {
		$this->balance = $balance;
		return $this;
	}
	/**
     * @var LogSetting ログの出力設定
	 */
	protected $logSetting;

	/**
	 * ログの出力設定を取得
	 *
	 * @return LogSetting|null ログの出力設定
	 */
	public function getLogSetting(): ?LogSetting {
		return $this->logSetting;
	}

	/**
	 * ログの出力設定を設定
	 *
	 * @param LogSetting|null $logSetting ログの出力設定
	 */
	public function setLogSetting(?LogSetting $logSetting) {
		$this->logSetting = $logSetting;
	}

	/**
	 * ログの出力設定を設定
	 *
	 * @param LogSetting|null $logSetting ログの出力設定
	 * @return Namespace_ $this
	 */
	public function withLogSetting(?LogSetting $logSetting): Namespace_ {
		$this->logSetting = $logSetting;
		return $this;
	}
	/**
     * @var string None
	 */
	protected $status;

	/**
	 * Noneを取得
	 *
	 * @return string|null None
	 */
	public function getStatus(): ?string {
		return $this->status;
	}

	/**
	 * Noneを設定
	 *
	 * @param string|null $status None
	 */
	public function setStatus(?string $status) {
		$this->status = $status;
	}

	/**
	 * Noneを設定
	 *
	 * @param string|null $status None
	 * @return Namespace_ $this
	 */
	public function withStatus(?string $status): Namespace_ {
		$this->status = $status;
		return $this;
	}
	/**
     * @var int 作成日時
	 */
	protected $createdAt;

	/**
	 * 作成日時を取得
	 *
	 * @return int|null 作成日時
	 */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 * @return Namespace_ $this
	 */
	public function withCreatedAt(?int $createdAt): Namespace_ {
		$this->createdAt = $createdAt;
		return $this;
	}
	/**
     * @var int 最終更新日時
	 */
	protected $updatedAt;

	/**
	 * 最終更新日時を取得
	 *
	 * @return int|null 最終更新日時
	 */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 * @return Namespace_ $this
	 */
	public function withUpdatedAt(?int $updatedAt): Namespace_ {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "namespaceId" => $this->namespaceId,
            "ownerId" => $this->ownerId,
            "name" => $this->name,
            "description" => $this->description,
            "priority" => $this->priority,
            "shareFree" => $this->shareFree,
            "currency" => $this->currency,
            "appleKey" => $this->appleKey,
            "googleKey" => $this->googleKey,
            "enableFakeReceipt" => $this->enableFakeReceipt,
            "createWalletScript" => $this->createWalletScript->toJson(),
            "depositScript" => $this->depositScript->toJson(),
            "withdrawScript" => $this->withdrawScript->toJson(),
            "balance" => $this->balance,
            "logSetting" => $this->logSetting->toJson(),
            "status" => $this->status,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Namespace_ {
        $model = new Namespace_();
        $model->setNamespaceId(isset($data["namespaceId"]) ? $data["namespaceId"] : null);
        $model->setOwnerId(isset($data["ownerId"]) ? $data["ownerId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setPriority(isset($data["priority"]) ? $data["priority"] : null);
        $model->setShareFree(isset($data["shareFree"]) ? $data["shareFree"] : null);
        $model->setCurrency(isset($data["currency"]) ? $data["currency"] : null);
        $model->setAppleKey(isset($data["appleKey"]) ? $data["appleKey"] : null);
        $model->setGoogleKey(isset($data["googleKey"]) ? $data["googleKey"] : null);
        $model->setEnableFakeReceipt(isset($data["enableFakeReceipt"]) ? $data["enableFakeReceipt"] : null);
        $model->setCreateWalletScript(isset($data["createWalletScript"]) ? ScriptSetting::fromJson($data["createWalletScript"]) : null);
        $model->setDepositScript(isset($data["depositScript"]) ? ScriptSetting::fromJson($data["depositScript"]) : null);
        $model->setWithdrawScript(isset($data["withdrawScript"]) ? ScriptSetting::fromJson($data["withdrawScript"]) : null);
        $model->setBalance(isset($data["balance"]) ? $data["balance"] : null);
        $model->setLogSetting(isset($data["logSetting"]) ? LogSetting::fromJson($data["logSetting"]) : null);
        $model->setStatus(isset($data["status"]) ? $data["status"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}