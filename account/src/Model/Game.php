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

namespace Gs2\Account\Model;

/**
 * ゲーム
 *
 * @author Game Server Services, Inc.
 *
 */
class Game {

	/** @var string ゲームGRN */
	private $gameId;

	/** @var string オーナーID */
	private $ownerId;

	/** @var string ゲーム名 */
	private $name;

	/** @var string 説明文 */
	private $description;

	/** @var string サービスクラス */
	private $serviceClass;

	/** @var bool アカウント引き継ぎ時にパスワードを変更するか */
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

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * ゲームGRNを取得
	 *
	 * @return string ゲームGRN
	 */
	public function getGameId() {
		return $this->gameId;
	}

	/**
	 * ゲームGRNを設定
	 *
	 * @param string $gameId ゲームGRN
	 */
	public function setGameId($gameId) {
		$this->gameId = $gameId;
	}

	/**
	 * ゲームGRNを設定
	 *
	 * @param string $gameId ゲームGRN
	 * @return self
	 */
	public function withGameId($gameId): self {
		$this->setGameId($gameId);
		return $this;
	}

	/**
	 * オーナーIDを取得
	 *
	 * @return string オーナーID
	 */
	public function getOwnerId() {
		return $this->ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string $ownerId オーナーID
	 */
	public function setOwnerId($ownerId) {
		$this->ownerId = $ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string $ownerId オーナーID
	 * @return self
	 */
	public function withOwnerId($ownerId): self {
		$this->setOwnerId($ownerId);
		return $this;
	}

	/**
	 * ゲーム名を取得
	 *
	 * @return string ゲーム名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * ゲーム名を設定
	 *
	 * @param string $name ゲーム名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * ゲーム名を設定
	 *
	 * @param string $name ゲーム名
	 * @return self
	 */
	public function withName($name): self {
		$this->setName($name);
		return $this;
	}

	/**
	 * 説明文を取得
	 *
	 * @return string 説明文
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * 説明文を設定
	 *
	 * @param string $description 説明文
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * 説明文を設定
	 *
	 * @param string $description 説明文
	 * @return self
	 */
	public function withDescription($description): self {
		$this->setDescription($description);
		return $this;
	}

	/**
	 * サービスクラスを取得
	 *
	 * @return string サービスクラス
	 */
	public function getServiceClass() {
		return $this->serviceClass;
	}

	/**
	 * サービスクラスを設定
	 *
	 * @param string $serviceClass サービスクラス
	 */
	public function setServiceClass($serviceClass) {
		$this->serviceClass = $serviceClass;
	}

	/**
	 * サービスクラスを設定
	 *
	 * @param string $serviceClass サービスクラス
	 * @return self
	 */
	public function withServiceClass($serviceClass): self {
		$this->setServiceClass($serviceClass);
		return $this;
	}

	/**
	 * アカウント引き継ぎ時にパスワードを変更するかを取得
	 *
	 * @return bool アカウント引き継ぎ時にパスワードを変更するか
	 */
	public function getChangePasswordIfTakeOver() {
		return $this->changePasswordIfTakeOver;
	}

	/**
	 * アカウント引き継ぎ時にパスワードを変更するかを設定
	 *
	 * @param bool $changePasswordIfTakeOver アカウント引き継ぎ時にパスワードを変更するか
	 */
	public function setChangePasswordIfTakeOver($changePasswordIfTakeOver) {
		$this->changePasswordIfTakeOver = $changePasswordIfTakeOver;
	}

	/**
	 * アカウント引き継ぎ時にパスワードを変更するかを設定
	 *
	 * @param bool $changePasswordIfTakeOver アカウント引き継ぎ時にパスワードを変更するか
	 * @return self
	 */
	public function withChangePasswordIfTakeOver($changePasswordIfTakeOver): self {
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
	 * @return self
	 */
	public function withCreateAccountTriggerScript($createAccountTriggerScript): self {
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
	 * @return self
	 */
	public function withCreateAccountDoneTriggerScript($createAccountDoneTriggerScript): self {
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
	 * @return self
	 */
	public function withAuthenticationTriggerScript($authenticationTriggerScript): self {
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
	 * @return self
	 */
	public function withAuthenticationDoneTriggerScript($authenticationDoneTriggerScript): self {
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
	 * @return self
	 */
	public function withCreateTakeOverTriggerScript($createTakeOverTriggerScript): self {
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
	 * @return self
	 */
	public function withCreateTakeOverDoneTriggerScript($createTakeOverDoneTriggerScript): self {
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
	 * @return self
	 */
	public function withDoTakeOverTriggerScript($doTakeOverTriggerScript): self {
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
	 * @return self
	 */
	public function withDoTakeOverDoneTriggerScript($doTakeOverDoneTriggerScript): self {
		$this->setDoTakeOverDoneTriggerScript($doTakeOverDoneTriggerScript);
		return $this;
	}

	/**
	 * 作成日時(エポック秒)を取得
	 *
	 * @return int 作成日時(エポック秒)
	 */
	public function getCreateAt() {
		return $this->createAt;
	}

	/**
	 * 作成日時(エポック秒)を設定
	 *
	 * @param int $createAt 作成日時(エポック秒)
	 */
	public function setCreateAt($createAt) {
		$this->createAt = $createAt;
	}

	/**
	 * 作成日時(エポック秒)を設定
	 *
	 * @param int $createAt 作成日時(エポック秒)
	 * @return self
	 */
	public function withCreateAt($createAt): self {
		$this->setCreateAt($createAt);
		return $this;
	}

	/**
	 * 最終更新日時(エポック秒)を取得
	 *
	 * @return int 最終更新日時(エポック秒)
	 */
	public function getUpdateAt() {
		return $this->updateAt;
	}

	/**
	 * 最終更新日時(エポック秒)を設定
	 *
	 * @param int $updateAt 最終更新日時(エポック秒)
	 */
	public function setUpdateAt($updateAt) {
		$this->updateAt = $updateAt;
	}

	/**
	 * 最終更新日時(エポック秒)を設定
	 *
	 * @param int $updateAt 最終更新日時(エポック秒)
	 * @return self
	 */
	public function withUpdateAt($updateAt): self {
		$this->setUpdateAt($updateAt);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return Game
	 */
    static function build(array $array)
    {
        $item = new Game();
        $item->setGameId(isset($array['gameId']) ? $array['gameId'] : null);
        $item->setOwnerId(isset($array['ownerId']) ? $array['ownerId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setDescription(isset($array['description']) ? $array['description'] : null);
        $item->setServiceClass(isset($array['serviceClass']) ? $array['serviceClass'] : null);
        $item->setChangePasswordIfTakeOver(isset($array['changePasswordIfTakeOver']) ? $array['changePasswordIfTakeOver'] : null);
        $item->setCreateAccountTriggerScript(isset($array['createAccountTriggerScript']) ? $array['createAccountTriggerScript'] : null);
        $item->setCreateAccountDoneTriggerScript(isset($array['createAccountDoneTriggerScript']) ? $array['createAccountDoneTriggerScript'] : null);
        $item->setAuthenticationTriggerScript(isset($array['authenticationTriggerScript']) ? $array['authenticationTriggerScript'] : null);
        $item->setAuthenticationDoneTriggerScript(isset($array['authenticationDoneTriggerScript']) ? $array['authenticationDoneTriggerScript'] : null);
        $item->setCreateTakeOverTriggerScript(isset($array['createTakeOverTriggerScript']) ? $array['createTakeOverTriggerScript'] : null);
        $item->setCreateTakeOverDoneTriggerScript(isset($array['createTakeOverDoneTriggerScript']) ? $array['createTakeOverDoneTriggerScript'] : null);
        $item->setDoTakeOverTriggerScript(isset($array['doTakeOverTriggerScript']) ? $array['doTakeOverTriggerScript'] : null);
        $item->setDoTakeOverDoneTriggerScript(isset($array['doTakeOverDoneTriggerScript']) ? $array['doTakeOverDoneTriggerScript'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}