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

namespace Gs2\Gold\Model;

/**
 * ゴールドプール
 *
 * @author Game Server Services, Inc.
 *
 */
class GoldPool {

	/** @var string ゴールドプールGRN */
	private $goldPoolId;

	/** @var string オーナーID */
	private $ownerId;

	/** @var string ゴールドプール名 */
	private $name;

	/** @var string 説明文 */
	private $description;

	/** @var string サービスクラス */
	private $serviceClass;

	/** @var string ウォレットの生成時 に実行されるGS2-Script */
	private $createWalletTriggerScript;

	/** @var string ウォレットの生成完了時 に実行されるGS2-Script */
	private $createWalletDoneTriggerScript;

	/** @var string ウォレットへの加算時 に実行されるGS2-Script */
	private $depositIntoWalletTriggerScript;

	/** @var string ウォレットへの加算完了時 に実行されるGS2-Script */
	private $depositIntoWalletDoneTriggerScript;

	/** @var string ウォレットからの減算時 に実行されるGS2-Script */
	private $withdrawFromWalletTriggerScript;

	/** @var string ウォレットからの減算完了時 に実行されるGS2-Script */
	private $withdrawFromWalletDoneTriggerScript;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * ゴールドプールGRNを取得
	 *
	 * @return string ゴールドプールGRN
	 */
	public function getGoldPoolId() {
		return $this->goldPoolId;
	}

	/**
	 * ゴールドプールGRNを設定
	 *
	 * @param string $goldPoolId ゴールドプールGRN
	 */
	public function setGoldPoolId($goldPoolId) {
		$this->goldPoolId = $goldPoolId;
	}

	/**
	 * ゴールドプールGRNを設定
	 *
	 * @param string $goldPoolId ゴールドプールGRN
	 * @return self
	 */
	public function withGoldPoolId($goldPoolId): self {
		$this->setGoldPoolId($goldPoolId);
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
	 * ゴールドプール名を取得
	 *
	 * @return string ゴールドプール名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * ゴールドプール名を設定
	 *
	 * @param string $name ゴールドプール名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * ゴールドプール名を設定
	 *
	 * @param string $name ゴールドプール名
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
	 * ウォレットの生成時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ウォレットの生成時 に実行されるGS2-Script
	 */
	public function getCreateWalletTriggerScript() {
		return $this->createWalletTriggerScript;
	}

	/**
	 * ウォレットの生成時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createWalletTriggerScript ウォレットの生成時 に実行されるGS2-Script
	 */
	public function setCreateWalletTriggerScript($createWalletTriggerScript) {
		$this->createWalletTriggerScript = $createWalletTriggerScript;
	}

	/**
	 * ウォレットの生成時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createWalletTriggerScript ウォレットの生成時 に実行されるGS2-Script
	 * @return self
	 */
	public function withCreateWalletTriggerScript($createWalletTriggerScript): self {
		$this->setCreateWalletTriggerScript($createWalletTriggerScript);
		return $this;
	}

	/**
	 * ウォレットの生成完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ウォレットの生成完了時 に実行されるGS2-Script
	 */
	public function getCreateWalletDoneTriggerScript() {
		return $this->createWalletDoneTriggerScript;
	}

	/**
	 * ウォレットの生成完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createWalletDoneTriggerScript ウォレットの生成完了時 に実行されるGS2-Script
	 */
	public function setCreateWalletDoneTriggerScript($createWalletDoneTriggerScript) {
		$this->createWalletDoneTriggerScript = $createWalletDoneTriggerScript;
	}

	/**
	 * ウォレットの生成完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createWalletDoneTriggerScript ウォレットの生成完了時 に実行されるGS2-Script
	 * @return self
	 */
	public function withCreateWalletDoneTriggerScript($createWalletDoneTriggerScript): self {
		$this->setCreateWalletDoneTriggerScript($createWalletDoneTriggerScript);
		return $this;
	}

	/**
	 * ウォレットへの加算時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ウォレットへの加算時 に実行されるGS2-Script
	 */
	public function getDepositIntoWalletTriggerScript() {
		return $this->depositIntoWalletTriggerScript;
	}

	/**
	 * ウォレットへの加算時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $depositIntoWalletTriggerScript ウォレットへの加算時 に実行されるGS2-Script
	 */
	public function setDepositIntoWalletTriggerScript($depositIntoWalletTriggerScript) {
		$this->depositIntoWalletTriggerScript = $depositIntoWalletTriggerScript;
	}

	/**
	 * ウォレットへの加算時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $depositIntoWalletTriggerScript ウォレットへの加算時 に実行されるGS2-Script
	 * @return self
	 */
	public function withDepositIntoWalletTriggerScript($depositIntoWalletTriggerScript): self {
		$this->setDepositIntoWalletTriggerScript($depositIntoWalletTriggerScript);
		return $this;
	}

	/**
	 * ウォレットへの加算完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ウォレットへの加算完了時 に実行されるGS2-Script
	 */
	public function getDepositIntoWalletDoneTriggerScript() {
		return $this->depositIntoWalletDoneTriggerScript;
	}

	/**
	 * ウォレットへの加算完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $depositIntoWalletDoneTriggerScript ウォレットへの加算完了時 に実行されるGS2-Script
	 */
	public function setDepositIntoWalletDoneTriggerScript($depositIntoWalletDoneTriggerScript) {
		$this->depositIntoWalletDoneTriggerScript = $depositIntoWalletDoneTriggerScript;
	}

	/**
	 * ウォレットへの加算完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $depositIntoWalletDoneTriggerScript ウォレットへの加算完了時 に実行されるGS2-Script
	 * @return self
	 */
	public function withDepositIntoWalletDoneTriggerScript($depositIntoWalletDoneTriggerScript): self {
		$this->setDepositIntoWalletDoneTriggerScript($depositIntoWalletDoneTriggerScript);
		return $this;
	}

	/**
	 * ウォレットからの減算時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ウォレットからの減算時 に実行されるGS2-Script
	 */
	public function getWithdrawFromWalletTriggerScript() {
		return $this->withdrawFromWalletTriggerScript;
	}

	/**
	 * ウォレットからの減算時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $withdrawFromWalletTriggerScript ウォレットからの減算時 に実行されるGS2-Script
	 */
	public function setWithdrawFromWalletTriggerScript($withdrawFromWalletTriggerScript) {
		$this->withdrawFromWalletTriggerScript = $withdrawFromWalletTriggerScript;
	}

	/**
	 * ウォレットからの減算時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $withdrawFromWalletTriggerScript ウォレットからの減算時 に実行されるGS2-Script
	 * @return self
	 */
	public function withWithdrawFromWalletTriggerScript($withdrawFromWalletTriggerScript): self {
		$this->setWithdrawFromWalletTriggerScript($withdrawFromWalletTriggerScript);
		return $this;
	}

	/**
	 * ウォレットからの減算完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ウォレットからの減算完了時 に実行されるGS2-Script
	 */
	public function getWithdrawFromWalletDoneTriggerScript() {
		return $this->withdrawFromWalletDoneTriggerScript;
	}

	/**
	 * ウォレットからの減算完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $withdrawFromWalletDoneTriggerScript ウォレットからの減算完了時 に実行されるGS2-Script
	 */
	public function setWithdrawFromWalletDoneTriggerScript($withdrawFromWalletDoneTriggerScript) {
		$this->withdrawFromWalletDoneTriggerScript = $withdrawFromWalletDoneTriggerScript;
	}

	/**
	 * ウォレットからの減算完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $withdrawFromWalletDoneTriggerScript ウォレットからの減算完了時 に実行されるGS2-Script
	 * @return self
	 */
	public function withWithdrawFromWalletDoneTriggerScript($withdrawFromWalletDoneTriggerScript): self {
		$this->setWithdrawFromWalletDoneTriggerScript($withdrawFromWalletDoneTriggerScript);
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
	 * @return GoldPool
	 */
    static function build(array $array)
    {
        $item = new GoldPool();
        $item->setGoldPoolId(isset($array['goldPoolId']) ? $array['goldPoolId'] : null);
        $item->setOwnerId(isset($array['ownerId']) ? $array['ownerId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setDescription(isset($array['description']) ? $array['description'] : null);
        $item->setServiceClass(isset($array['serviceClass']) ? $array['serviceClass'] : null);
        $item->setCreateWalletTriggerScript(isset($array['createWalletTriggerScript']) ? $array['createWalletTriggerScript'] : null);
        $item->setCreateWalletDoneTriggerScript(isset($array['createWalletDoneTriggerScript']) ? $array['createWalletDoneTriggerScript'] : null);
        $item->setDepositIntoWalletTriggerScript(isset($array['depositIntoWalletTriggerScript']) ? $array['depositIntoWalletTriggerScript'] : null);
        $item->setDepositIntoWalletDoneTriggerScript(isset($array['depositIntoWalletDoneTriggerScript']) ? $array['depositIntoWalletDoneTriggerScript'] : null);
        $item->setWithdrawFromWalletTriggerScript(isset($array['withdrawFromWalletTriggerScript']) ? $array['withdrawFromWalletTriggerScript'] : null);
        $item->setWithdrawFromWalletDoneTriggerScript(isset($array['withdrawFromWalletDoneTriggerScript']) ? $array['withdrawFromWalletDoneTriggerScript'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}