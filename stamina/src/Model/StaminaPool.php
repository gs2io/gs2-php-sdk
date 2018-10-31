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

namespace Gs2\Stamina\Model;

/**
 * スタミナプール
 *
 * @author Game Server Services, Inc.
 *
 */
class StaminaPool {

	/** @var string スタミナプールGRN */
	private $staminaPoolId;

	/** @var string オーナーID */
	private $ownerId;

	/** @var string スタミナプール名 */
	private $name;

	/** @var string 説明文 */
	private $description;

	/** @var string サービスクラス */
	private $serviceClass;

	/** @var int スタミナの回復速度(秒) */
	private $increaseInterval;

	/** @var string スタミナ消費時 に実行されるGS2-Script */
	private $consumeStaminaTriggerScript;

	/** @var string スタミナ消費完了時 に実行されるGS2-Script */
	private $consumeStaminaDoneTriggerScript;

	/** @var string スタミナ回復時 に実行されるGS2-Script */
	private $addStaminaTriggerScript;

	/** @var string スタミナ回復完了時 に実行されるGS2-Script */
	private $addStaminaDoneTriggerScript;

	/** @var string スタミナの最大値取得 に実行されるGS2-Script */
	private $getMaxStaminaTriggerScript;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * スタミナプールGRNを取得
	 *
	 * @return string スタミナプールGRN
	 */
	public function getStaminaPoolId() {
		return $this->staminaPoolId;
	}

	/**
	 * スタミナプールGRNを設定
	 *
	 * @param string $staminaPoolId スタミナプールGRN
	 */
	public function setStaminaPoolId($staminaPoolId) {
		$this->staminaPoolId = $staminaPoolId;
	}

	/**
	 * スタミナプールGRNを設定
	 *
	 * @param string $staminaPoolId スタミナプールGRN
	 * @return self
	 */
	public function withStaminaPoolId($staminaPoolId): self {
		$this->setStaminaPoolId($staminaPoolId);
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
	 * スタミナプール名を取得
	 *
	 * @return string スタミナプール名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * スタミナプール名を設定
	 *
	 * @param string $name スタミナプール名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * スタミナプール名を設定
	 *
	 * @param string $name スタミナプール名
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
	 * スタミナの回復速度(秒)を取得
	 *
	 * @return int スタミナの回復速度(秒)
	 */
	public function getIncreaseInterval() {
		return $this->increaseInterval;
	}

	/**
	 * スタミナの回復速度(秒)を設定
	 *
	 * @param int $increaseInterval スタミナの回復速度(秒)
	 */
	public function setIncreaseInterval($increaseInterval) {
		$this->increaseInterval = $increaseInterval;
	}

	/**
	 * スタミナの回復速度(秒)を設定
	 *
	 * @param int $increaseInterval スタミナの回復速度(秒)
	 * @return self
	 */
	public function withIncreaseInterval($increaseInterval): self {
		$this->setIncreaseInterval($increaseInterval);
		return $this;
	}

	/**
	 * スタミナ消費時 に実行されるGS2-Scriptを取得
	 *
	 * @return string スタミナ消費時 に実行されるGS2-Script
	 */
	public function getConsumeStaminaTriggerScript() {
		return $this->consumeStaminaTriggerScript;
	}

	/**
	 * スタミナ消費時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $consumeStaminaTriggerScript スタミナ消費時 に実行されるGS2-Script
	 */
	public function setConsumeStaminaTriggerScript($consumeStaminaTriggerScript) {
		$this->consumeStaminaTriggerScript = $consumeStaminaTriggerScript;
	}

	/**
	 * スタミナ消費時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $consumeStaminaTriggerScript スタミナ消費時 に実行されるGS2-Script
	 * @return self
	 */
	public function withConsumeStaminaTriggerScript($consumeStaminaTriggerScript): self {
		$this->setConsumeStaminaTriggerScript($consumeStaminaTriggerScript);
		return $this;
	}

	/**
	 * スタミナ消費完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string スタミナ消費完了時 に実行されるGS2-Script
	 */
	public function getConsumeStaminaDoneTriggerScript() {
		return $this->consumeStaminaDoneTriggerScript;
	}

	/**
	 * スタミナ消費完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $consumeStaminaDoneTriggerScript スタミナ消費完了時 に実行されるGS2-Script
	 */
	public function setConsumeStaminaDoneTriggerScript($consumeStaminaDoneTriggerScript) {
		$this->consumeStaminaDoneTriggerScript = $consumeStaminaDoneTriggerScript;
	}

	/**
	 * スタミナ消費完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $consumeStaminaDoneTriggerScript スタミナ消費完了時 に実行されるGS2-Script
	 * @return self
	 */
	public function withConsumeStaminaDoneTriggerScript($consumeStaminaDoneTriggerScript): self {
		$this->setConsumeStaminaDoneTriggerScript($consumeStaminaDoneTriggerScript);
		return $this;
	}

	/**
	 * スタミナ回復時 に実行されるGS2-Scriptを取得
	 *
	 * @return string スタミナ回復時 に実行されるGS2-Script
	 */
	public function getAddStaminaTriggerScript() {
		return $this->addStaminaTriggerScript;
	}

	/**
	 * スタミナ回復時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $addStaminaTriggerScript スタミナ回復時 に実行されるGS2-Script
	 */
	public function setAddStaminaTriggerScript($addStaminaTriggerScript) {
		$this->addStaminaTriggerScript = $addStaminaTriggerScript;
	}

	/**
	 * スタミナ回復時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $addStaminaTriggerScript スタミナ回復時 に実行されるGS2-Script
	 * @return self
	 */
	public function withAddStaminaTriggerScript($addStaminaTriggerScript): self {
		$this->setAddStaminaTriggerScript($addStaminaTriggerScript);
		return $this;
	}

	/**
	 * スタミナ回復完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string スタミナ回復完了時 に実行されるGS2-Script
	 */
	public function getAddStaminaDoneTriggerScript() {
		return $this->addStaminaDoneTriggerScript;
	}

	/**
	 * スタミナ回復完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $addStaminaDoneTriggerScript スタミナ回復完了時 に実行されるGS2-Script
	 */
	public function setAddStaminaDoneTriggerScript($addStaminaDoneTriggerScript) {
		$this->addStaminaDoneTriggerScript = $addStaminaDoneTriggerScript;
	}

	/**
	 * スタミナ回復完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $addStaminaDoneTriggerScript スタミナ回復完了時 に実行されるGS2-Script
	 * @return self
	 */
	public function withAddStaminaDoneTriggerScript($addStaminaDoneTriggerScript): self {
		$this->setAddStaminaDoneTriggerScript($addStaminaDoneTriggerScript);
		return $this;
	}

	/**
	 * スタミナの最大値取得 に実行されるGS2-Scriptを取得
	 *
	 * @return string スタミナの最大値取得 に実行されるGS2-Script
	 */
	public function getGetMaxStaminaTriggerScript() {
		return $this->getMaxStaminaTriggerScript;
	}

	/**
	 * スタミナの最大値取得 に実行されるGS2-Scriptを設定
	 *
	 * @param string $getMaxStaminaTriggerScript スタミナの最大値取得 に実行されるGS2-Script
	 */
	public function setGetMaxStaminaTriggerScript($getMaxStaminaTriggerScript) {
		$this->getMaxStaminaTriggerScript = $getMaxStaminaTriggerScript;
	}

	/**
	 * スタミナの最大値取得 に実行されるGS2-Scriptを設定
	 *
	 * @param string $getMaxStaminaTriggerScript スタミナの最大値取得 に実行されるGS2-Script
	 * @return self
	 */
	public function withGetMaxStaminaTriggerScript($getMaxStaminaTriggerScript): self {
		$this->setGetMaxStaminaTriggerScript($getMaxStaminaTriggerScript);
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
	 * @return StaminaPool
	 */
    static function build(array $array)
    {
        $item = new StaminaPool();
        $item->setStaminaPoolId(isset($array['staminaPoolId']) ? $array['staminaPoolId'] : null);
        $item->setOwnerId(isset($array['ownerId']) ? $array['ownerId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setDescription(isset($array['description']) ? $array['description'] : null);
        $item->setServiceClass(isset($array['serviceClass']) ? $array['serviceClass'] : null);
        $item->setIncreaseInterval(isset($array['increaseInterval']) ? $array['increaseInterval'] : null);
        $item->setConsumeStaminaTriggerScript(isset($array['consumeStaminaTriggerScript']) ? $array['consumeStaminaTriggerScript'] : null);
        $item->setConsumeStaminaDoneTriggerScript(isset($array['consumeStaminaDoneTriggerScript']) ? $array['consumeStaminaDoneTriggerScript'] : null);
        $item->setAddStaminaTriggerScript(isset($array['addStaminaTriggerScript']) ? $array['addStaminaTriggerScript'] : null);
        $item->setAddStaminaDoneTriggerScript(isset($array['addStaminaDoneTriggerScript']) ? $array['addStaminaDoneTriggerScript'] : null);
        $item->setGetMaxStaminaTriggerScript(isset($array['getMaxStaminaTriggerScript']) ? $array['getMaxStaminaTriggerScript'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}