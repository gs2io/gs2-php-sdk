<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2\Account\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class CreateGameRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateGame";

	/** @var string ゲームの名前 */
	private $name;

	/** @var string ゲームの説明 */
	private $description;

	/** @var string ゲームのサービスクラス */
	private $serviceClass;

	/** @var bool 引き継ぎ時にアカウントのパスワードを変更するか */
	private $changePasswordIfTakeOver;

	/** @var string アカウント新規作成時 に実行されるGS2-Script */
	private $createAccountTriggerScript;

	/** @var string アカウント新規作成完了時 に実行されるGS2-Script */
	private $createAccountDoneTriggerScript;

	/** @var string 認証時 に実行されるGS2-Script */
	private $authenticationTriggerScript;

	/** @var string 認証完了時 に実行されるGS2-Script */
	private $authenticationDoneTriggerScript;

	/** @var string 引き継ぎ情報登録時 に実行されるGS2-Script */
	private $createTakeOverTriggerScript;

	/** @var string 引き継ぎ情報登録完了時 に実行されるGS2-Script */
	private $createTakeOverDoneTriggerScript;

	/** @var string 引き継ぎ実行時 に実行されるGS2-Script */
	private $doTakeOverTriggerScript;

	/** @var string 引き継ぎ実行完了時 に実行されるGS2-Script */
	private $doTakeOverDoneTriggerScript;


	/**
	 * ゲームの名前を取得
	 *
	 * @return string ゲームの名前
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * ゲームの名前を設定
	 *
	 * @param string $name ゲームの名前
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * ゲームの名前を設定
	 *
	 * @param string $name ゲームの名前
	 * @return CreateGameRequest
	 */
	public function withName($name): CreateGameRequest {
		$this->setName($name);
		return $this;
	}

	/**
	 * ゲームの説明を取得
	 *
	 * @return string ゲームの説明
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * ゲームの説明を設定
	 *
	 * @param string $description ゲームの説明
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * ゲームの説明を設定
	 *
	 * @param string $description ゲームの説明
	 * @return CreateGameRequest
	 */
	public function withDescription($description): CreateGameRequest {
		$this->setDescription($description);
		return $this;
	}

	/**
	 * ゲームのサービスクラスを取得
	 *
	 * @return string ゲームのサービスクラス
	 */
	public function getServiceClass() {
		return $this->serviceClass;
	}

	/**
	 * ゲームのサービスクラスを設定
	 *
	 * @param string $serviceClass ゲームのサービスクラス
	 */
	public function setServiceClass($serviceClass) {
		$this->serviceClass = $serviceClass;
	}

	/**
	 * ゲームのサービスクラスを設定
	 *
	 * @param string $serviceClass ゲームのサービスクラス
	 * @return CreateGameRequest
	 */
	public function withServiceClass($serviceClass): CreateGameRequest {
		$this->setServiceClass($serviceClass);
		return $this;
	}

	/**
	 * 引き継ぎ時にアカウントのパスワードを変更するかを取得
	 *
	 * @return bool 引き継ぎ時にアカウントのパスワードを変更するか
	 */
	public function getChangePasswordIfTakeOver() {
		return $this->changePasswordIfTakeOver;
	}

	/**
	 * 引き継ぎ時にアカウントのパスワードを変更するかを設定
	 *
	 * @param bool $changePasswordIfTakeOver 引き継ぎ時にアカウントのパスワードを変更するか
	 */
	public function setChangePasswordIfTakeOver($changePasswordIfTakeOver) {
		$this->changePasswordIfTakeOver = $changePasswordIfTakeOver;
	}

	/**
	 * 引き継ぎ時にアカウントのパスワードを変更するかを設定
	 *
	 * @param bool $changePasswordIfTakeOver 引き継ぎ時にアカウントのパスワードを変更するか
	 * @return CreateGameRequest
	 */
	public function withChangePasswordIfTakeOver($changePasswordIfTakeOver): CreateGameRequest {
		$this->setChangePasswordIfTakeOver($changePasswordIfTakeOver);
		return $this;
	}

	/**
	 * アカウント新規作成時 に実行されるGS2-Scriptを取得
	 *
	 * @return string アカウント新規作成時 に実行されるGS2-Script
	 */
	public function getCreateAccountTriggerScript() {
		return $this->createAccountTriggerScript;
	}

	/**
	 * アカウント新規作成時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createAccountTriggerScript アカウント新規作成時 に実行されるGS2-Script
	 */
	public function setCreateAccountTriggerScript($createAccountTriggerScript) {
		$this->createAccountTriggerScript = $createAccountTriggerScript;
	}

	/**
	 * アカウント新規作成時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createAccountTriggerScript アカウント新規作成時 に実行されるGS2-Script
	 * @return CreateGameRequest
	 */
	public function withCreateAccountTriggerScript($createAccountTriggerScript): CreateGameRequest {
		$this->setCreateAccountTriggerScript($createAccountTriggerScript);
		return $this;
	}

	/**
	 * アカウント新規作成完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string アカウント新規作成完了時 に実行されるGS2-Script
	 */
	public function getCreateAccountDoneTriggerScript() {
		return $this->createAccountDoneTriggerScript;
	}

	/**
	 * アカウント新規作成完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createAccountDoneTriggerScript アカウント新規作成完了時 に実行されるGS2-Script
	 */
	public function setCreateAccountDoneTriggerScript($createAccountDoneTriggerScript) {
		$this->createAccountDoneTriggerScript = $createAccountDoneTriggerScript;
	}

	/**
	 * アカウント新規作成完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createAccountDoneTriggerScript アカウント新規作成完了時 に実行されるGS2-Script
	 * @return CreateGameRequest
	 */
	public function withCreateAccountDoneTriggerScript($createAccountDoneTriggerScript): CreateGameRequest {
		$this->setCreateAccountDoneTriggerScript($createAccountDoneTriggerScript);
		return $this;
	}

	/**
	 * 認証時 に実行されるGS2-Scriptを取得
	 *
	 * @return string 認証時 に実行されるGS2-Script
	 */
	public function getAuthenticationTriggerScript() {
		return $this->authenticationTriggerScript;
	}

	/**
	 * 認証時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $authenticationTriggerScript 認証時 に実行されるGS2-Script
	 */
	public function setAuthenticationTriggerScript($authenticationTriggerScript) {
		$this->authenticationTriggerScript = $authenticationTriggerScript;
	}

	/**
	 * 認証時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $authenticationTriggerScript 認証時 に実行されるGS2-Script
	 * @return CreateGameRequest
	 */
	public function withAuthenticationTriggerScript($authenticationTriggerScript): CreateGameRequest {
		$this->setAuthenticationTriggerScript($authenticationTriggerScript);
		return $this;
	}

	/**
	 * 認証完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string 認証完了時 に実行されるGS2-Script
	 */
	public function getAuthenticationDoneTriggerScript() {
		return $this->authenticationDoneTriggerScript;
	}

	/**
	 * 認証完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $authenticationDoneTriggerScript 認証完了時 に実行されるGS2-Script
	 */
	public function setAuthenticationDoneTriggerScript($authenticationDoneTriggerScript) {
		$this->authenticationDoneTriggerScript = $authenticationDoneTriggerScript;
	}

	/**
	 * 認証完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $authenticationDoneTriggerScript 認証完了時 に実行されるGS2-Script
	 * @return CreateGameRequest
	 */
	public function withAuthenticationDoneTriggerScript($authenticationDoneTriggerScript): CreateGameRequest {
		$this->setAuthenticationDoneTriggerScript($authenticationDoneTriggerScript);
		return $this;
	}

	/**
	 * 引き継ぎ情報登録時 に実行されるGS2-Scriptを取得
	 *
	 * @return string 引き継ぎ情報登録時 に実行されるGS2-Script
	 */
	public function getCreateTakeOverTriggerScript() {
		return $this->createTakeOverTriggerScript;
	}

	/**
	 * 引き継ぎ情報登録時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createTakeOverTriggerScript 引き継ぎ情報登録時 に実行されるGS2-Script
	 */
	public function setCreateTakeOverTriggerScript($createTakeOverTriggerScript) {
		$this->createTakeOverTriggerScript = $createTakeOverTriggerScript;
	}

	/**
	 * 引き継ぎ情報登録時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createTakeOverTriggerScript 引き継ぎ情報登録時 に実行されるGS2-Script
	 * @return CreateGameRequest
	 */
	public function withCreateTakeOverTriggerScript($createTakeOverTriggerScript): CreateGameRequest {
		$this->setCreateTakeOverTriggerScript($createTakeOverTriggerScript);
		return $this;
	}

	/**
	 * 引き継ぎ情報登録完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string 引き継ぎ情報登録完了時 に実行されるGS2-Script
	 */
	public function getCreateTakeOverDoneTriggerScript() {
		return $this->createTakeOverDoneTriggerScript;
	}

	/**
	 * 引き継ぎ情報登録完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createTakeOverDoneTriggerScript 引き継ぎ情報登録完了時 に実行されるGS2-Script
	 */
	public function setCreateTakeOverDoneTriggerScript($createTakeOverDoneTriggerScript) {
		$this->createTakeOverDoneTriggerScript = $createTakeOverDoneTriggerScript;
	}

	/**
	 * 引き継ぎ情報登録完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createTakeOverDoneTriggerScript 引き継ぎ情報登録完了時 に実行されるGS2-Script
	 * @return CreateGameRequest
	 */
	public function withCreateTakeOverDoneTriggerScript($createTakeOverDoneTriggerScript): CreateGameRequest {
		$this->setCreateTakeOverDoneTriggerScript($createTakeOverDoneTriggerScript);
		return $this;
	}

	/**
	 * 引き継ぎ実行時 に実行されるGS2-Scriptを取得
	 *
	 * @return string 引き継ぎ実行時 に実行されるGS2-Script
	 */
	public function getDoTakeOverTriggerScript() {
		return $this->doTakeOverTriggerScript;
	}

	/**
	 * 引き継ぎ実行時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $doTakeOverTriggerScript 引き継ぎ実行時 に実行されるGS2-Script
	 */
	public function setDoTakeOverTriggerScript($doTakeOverTriggerScript) {
		$this->doTakeOverTriggerScript = $doTakeOverTriggerScript;
	}

	/**
	 * 引き継ぎ実行時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $doTakeOverTriggerScript 引き継ぎ実行時 に実行されるGS2-Script
	 * @return CreateGameRequest
	 */
	public function withDoTakeOverTriggerScript($doTakeOverTriggerScript): CreateGameRequest {
		$this->setDoTakeOverTriggerScript($doTakeOverTriggerScript);
		return $this;
	}

	/**
	 * 引き継ぎ実行完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string 引き継ぎ実行完了時 に実行されるGS2-Script
	 */
	public function getDoTakeOverDoneTriggerScript() {
		return $this->doTakeOverDoneTriggerScript;
	}

	/**
	 * 引き継ぎ実行完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $doTakeOverDoneTriggerScript 引き継ぎ実行完了時 に実行されるGS2-Script
	 */
	public function setDoTakeOverDoneTriggerScript($doTakeOverDoneTriggerScript) {
		$this->doTakeOverDoneTriggerScript = $doTakeOverDoneTriggerScript;
	}

	/**
	 * 引き継ぎ実行完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $doTakeOverDoneTriggerScript 引き継ぎ実行完了時 に実行されるGS2-Script
	 * @return CreateGameRequest
	 */
	public function withDoTakeOverDoneTriggerScript($doTakeOverDoneTriggerScript): CreateGameRequest {
		$this->setDoTakeOverDoneTriggerScript($doTakeOverDoneTriggerScript);
		return $this;
	}

}