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

namespace Gs2\Account\Model;

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
     * @var string ネームスペース名
	 */
	protected $name;

	/**
	 * ネームスペース名を取得
	 *
	 * @return string|null ネームスペース名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * ネームスペース名を設定
	 *
	 * @param string|null $name ネームスペース名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * ネームスペース名を設定
	 *
	 * @param string|null $name ネームスペース名
	 * @return Namespace_ $this
	 */
	public function withName(?string $name): Namespace_ {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string 説明文
	 */
	protected $description;

	/**
	 * 説明文を取得
	 *
	 * @return string|null 説明文
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * 説明文を設定
	 *
	 * @param string|null $description 説明文
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * 説明文を設定
	 *
	 * @param string|null $description 説明文
	 * @return Namespace_ $this
	 */
	public function withDescription(?string $description): Namespace_ {
		$this->description = $description;
		return $this;
	}
	/**
     * @var bool アカウント引き継ぎ時にパスワードを変更するか
	 */
	protected $changePasswordIfTakeOver;

	/**
	 * アカウント引き継ぎ時にパスワードを変更するかを取得
	 *
	 * @return bool|null アカウント引き継ぎ時にパスワードを変更するか
	 */
	public function getChangePasswordIfTakeOver(): ?bool {
		return $this->changePasswordIfTakeOver;
	}

	/**
	 * アカウント引き継ぎ時にパスワードを変更するかを設定
	 *
	 * @param bool|null $changePasswordIfTakeOver アカウント引き継ぎ時にパスワードを変更するか
	 */
	public function setChangePasswordIfTakeOver(?bool $changePasswordIfTakeOver) {
		$this->changePasswordIfTakeOver = $changePasswordIfTakeOver;
	}

	/**
	 * アカウント引き継ぎ時にパスワードを変更するかを設定
	 *
	 * @param bool|null $changePasswordIfTakeOver アカウント引き継ぎ時にパスワードを変更するか
	 * @return Namespace_ $this
	 */
	public function withChangePasswordIfTakeOver(?bool $changePasswordIfTakeOver): Namespace_ {
		$this->changePasswordIfTakeOver = $changePasswordIfTakeOver;
		return $this;
	}
	/**
     * @var ScriptSetting アカウント新規作成したときに実行するスクリプト
	 */
	protected $createAccountScript;

	/**
	 * アカウント新規作成したときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null アカウント新規作成したときに実行するスクリプト
	 */
	public function getCreateAccountScript(): ?ScriptSetting {
		return $this->createAccountScript;
	}

	/**
	 * アカウント新規作成したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $createAccountScript アカウント新規作成したときに実行するスクリプト
	 */
	public function setCreateAccountScript(?ScriptSetting $createAccountScript) {
		$this->createAccountScript = $createAccountScript;
	}

	/**
	 * アカウント新規作成したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $createAccountScript アカウント新規作成したときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withCreateAccountScript(?ScriptSetting $createAccountScript): Namespace_ {
		$this->createAccountScript = $createAccountScript;
		return $this;
	}
	/**
     * @var ScriptSetting 認証したときに実行するスクリプト
	 */
	protected $authenticationScript;

	/**
	 * 認証したときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null 認証したときに実行するスクリプト
	 */
	public function getAuthenticationScript(): ?ScriptSetting {
		return $this->authenticationScript;
	}

	/**
	 * 認証したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $authenticationScript 認証したときに実行するスクリプト
	 */
	public function setAuthenticationScript(?ScriptSetting $authenticationScript) {
		$this->authenticationScript = $authenticationScript;
	}

	/**
	 * 認証したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $authenticationScript 認証したときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withAuthenticationScript(?ScriptSetting $authenticationScript): Namespace_ {
		$this->authenticationScript = $authenticationScript;
		return $this;
	}
	/**
     * @var ScriptSetting 引き継ぎ情報登録したときに実行するスクリプト
	 */
	protected $createTakeOverScript;

	/**
	 * 引き継ぎ情報登録したときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null 引き継ぎ情報登録したときに実行するスクリプト
	 */
	public function getCreateTakeOverScript(): ?ScriptSetting {
		return $this->createTakeOverScript;
	}

	/**
	 * 引き継ぎ情報登録したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $createTakeOverScript 引き継ぎ情報登録したときに実行するスクリプト
	 */
	public function setCreateTakeOverScript(?ScriptSetting $createTakeOverScript) {
		$this->createTakeOverScript = $createTakeOverScript;
	}

	/**
	 * 引き継ぎ情報登録したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $createTakeOverScript 引き継ぎ情報登録したときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withCreateTakeOverScript(?ScriptSetting $createTakeOverScript): Namespace_ {
		$this->createTakeOverScript = $createTakeOverScript;
		return $this;
	}
	/**
     * @var ScriptSetting 引き継ぎ実行したときに実行するスクリプト
	 */
	protected $doTakeOverScript;

	/**
	 * 引き継ぎ実行したときに実行するスクリプトを取得
	 *
	 * @return ScriptSetting|null 引き継ぎ実行したときに実行するスクリプト
	 */
	public function getDoTakeOverScript(): ?ScriptSetting {
		return $this->doTakeOverScript;
	}

	/**
	 * 引き継ぎ実行したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $doTakeOverScript 引き継ぎ実行したときに実行するスクリプト
	 */
	public function setDoTakeOverScript(?ScriptSetting $doTakeOverScript) {
		$this->doTakeOverScript = $doTakeOverScript;
	}

	/**
	 * 引き継ぎ実行したときに実行するスクリプトを設定
	 *
	 * @param ScriptSetting|null $doTakeOverScript 引き継ぎ実行したときに実行するスクリプト
	 * @return Namespace_ $this
	 */
	public function withDoTakeOverScript(?ScriptSetting $doTakeOverScript): Namespace_ {
		$this->doTakeOverScript = $doTakeOverScript;
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
            "changePasswordIfTakeOver" => $this->changePasswordIfTakeOver,
            "createAccountScript" => $this->createAccountScript->toJson(),
            "authenticationScript" => $this->authenticationScript->toJson(),
            "createTakeOverScript" => $this->createTakeOverScript->toJson(),
            "doTakeOverScript" => $this->doTakeOverScript->toJson(),
            "logSetting" => $this->logSetting->toJson(),
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
        $model->setChangePasswordIfTakeOver(isset($data["changePasswordIfTakeOver"]) ? $data["changePasswordIfTakeOver"] : null);
        $model->setCreateAccountScript(isset($data["createAccountScript"]) ? ScriptSetting::fromJson($data["createAccountScript"]) : null);
        $model->setAuthenticationScript(isset($data["authenticationScript"]) ? ScriptSetting::fromJson($data["authenticationScript"]) : null);
        $model->setCreateTakeOverScript(isset($data["createTakeOverScript"]) ? ScriptSetting::fromJson($data["createTakeOverScript"]) : null);
        $model->setDoTakeOverScript(isset($data["doTakeOverScript"]) ? ScriptSetting::fromJson($data["doTakeOverScript"]) : null);
        $model->setLogSetting(isset($data["logSetting"]) ? LogSetting::fromJson($data["logSetting"]) : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}