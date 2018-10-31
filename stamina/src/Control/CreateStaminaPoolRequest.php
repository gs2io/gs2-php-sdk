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

namespace Gs2\Stamina\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class CreateStaminaPoolRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateStaminaPool";

	/** @var string スタミナプールの名前 */
	private $name;

	/** @var string スタミナプールの説明 */
	private $description;

	/** @var string スタミナプールのサービスクラス */
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


	/**
	 * スタミナプールの名前を取得
	 *
	 * @return string スタミナプールの名前
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * スタミナプールの名前を設定
	 *
	 * @param string $name スタミナプールの名前
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * スタミナプールの名前を設定
	 *
	 * @param string $name スタミナプールの名前
	 * @return CreateStaminaPoolRequest
	 */
	public function withName($name): CreateStaminaPoolRequest {
		$this->setName($name);
		return $this;
	}

	/**
	 * スタミナプールの説明を取得
	 *
	 * @return string スタミナプールの説明
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * スタミナプールの説明を設定
	 *
	 * @param string $description スタミナプールの説明
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * スタミナプールの説明を設定
	 *
	 * @param string $description スタミナプールの説明
	 * @return CreateStaminaPoolRequest
	 */
	public function withDescription($description): CreateStaminaPoolRequest {
		$this->setDescription($description);
		return $this;
	}

	/**
	 * スタミナプールのサービスクラスを取得
	 *
	 * @return string スタミナプールのサービスクラス
	 */
	public function getServiceClass() {
		return $this->serviceClass;
	}

	/**
	 * スタミナプールのサービスクラスを設定
	 *
	 * @param string $serviceClass スタミナプールのサービスクラス
	 */
	public function setServiceClass($serviceClass) {
		$this->serviceClass = $serviceClass;
	}

	/**
	 * スタミナプールのサービスクラスを設定
	 *
	 * @param string $serviceClass スタミナプールのサービスクラス
	 * @return CreateStaminaPoolRequest
	 */
	public function withServiceClass($serviceClass): CreateStaminaPoolRequest {
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
	 * @return CreateStaminaPoolRequest
	 */
	public function withIncreaseInterval($increaseInterval): CreateStaminaPoolRequest {
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
	 * @return CreateStaminaPoolRequest
	 */
	public function withConsumeStaminaTriggerScript($consumeStaminaTriggerScript): CreateStaminaPoolRequest {
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
	 * @return CreateStaminaPoolRequest
	 */
	public function withConsumeStaminaDoneTriggerScript($consumeStaminaDoneTriggerScript): CreateStaminaPoolRequest {
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
	 * @return CreateStaminaPoolRequest
	 */
	public function withAddStaminaTriggerScript($addStaminaTriggerScript): CreateStaminaPoolRequest {
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
	 * @return CreateStaminaPoolRequest
	 */
	public function withAddStaminaDoneTriggerScript($addStaminaDoneTriggerScript): CreateStaminaPoolRequest {
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
	 * @return CreateStaminaPoolRequest
	 */
	public function withGetMaxStaminaTriggerScript($getMaxStaminaTriggerScript): CreateStaminaPoolRequest {
		$this->setGetMaxStaminaTriggerScript($getMaxStaminaTriggerScript);
		return $this;
	}

}