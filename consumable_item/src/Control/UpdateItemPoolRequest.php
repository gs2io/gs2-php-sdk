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

namespace Gs2\ConsumableItem\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class UpdateItemPoolRequest extends Gs2BasicRequest {

    const FUNCTION = "UpdateItemPool";

	/** @var string 更新する消費型アイテムプールの名前 */
	private $itemPoolName;

	/** @var string 説明文(1024文字以内) */
	private $description;

	/** @var string サービスクラス */
	private $serviceClass;

	/** @var string アイテム入手時 に実行されるGS2-Script */
	private $acquisitionItemTriggerScript;

	/** @var string アイテム入手完了時 に実行されるGS2-Script */
	private $acquisitionItemDoneTriggerScript;

	/** @var string アイテム消費時 に実行されるGS2-Script */
	private $consumeItemTriggerScript;

	/** @var string アイテム消費完了時 に実行されるGS2-Script */
	private $consumeItemDoneTriggerScript;


	/**
	 * 更新する消費型アイテムプールの名前を取得
	 *
	 * @return string 更新する消費型アイテムプールの名前
	 */
	public function getItemPoolName() {
		return $this->itemPoolName;
	}

	/**
	 * 更新する消費型アイテムプールの名前を設定
	 *
	 * @param string $itemPoolName 更新する消費型アイテムプールの名前
	 */
	public function setItemPoolName($itemPoolName) {
		$this->itemPoolName = $itemPoolName;
	}

	/**
	 * 更新する消費型アイテムプールの名前を設定
	 *
	 * @param string $itemPoolName 更新する消費型アイテムプールの名前
	 * @return UpdateItemPoolRequest
	 */
	public function withItemPoolName($itemPoolName): UpdateItemPoolRequest {
		$this->setItemPoolName($itemPoolName);
		return $this;
	}

	/**
	 * 説明文(1024文字以内)を取得
	 *
	 * @return string 説明文(1024文字以内)
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * 説明文(1024文字以内)を設定
	 *
	 * @param string $description 説明文(1024文字以内)
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * 説明文(1024文字以内)を設定
	 *
	 * @param string $description 説明文(1024文字以内)
	 * @return UpdateItemPoolRequest
	 */
	public function withDescription($description): UpdateItemPoolRequest {
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
	 * @return UpdateItemPoolRequest
	 */
	public function withServiceClass($serviceClass): UpdateItemPoolRequest {
		$this->setServiceClass($serviceClass);
		return $this;
	}

	/**
	 * アイテム入手時 に実行されるGS2-Scriptを取得
	 *
	 * @return string アイテム入手時 に実行されるGS2-Script
	 */
	public function getAcquisitionItemTriggerScript() {
		return $this->acquisitionItemTriggerScript;
	}

	/**
	 * アイテム入手時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $acquisitionItemTriggerScript アイテム入手時 に実行されるGS2-Script
	 */
	public function setAcquisitionItemTriggerScript($acquisitionItemTriggerScript) {
		$this->acquisitionItemTriggerScript = $acquisitionItemTriggerScript;
	}

	/**
	 * アイテム入手時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $acquisitionItemTriggerScript アイテム入手時 に実行されるGS2-Script
	 * @return UpdateItemPoolRequest
	 */
	public function withAcquisitionItemTriggerScript($acquisitionItemTriggerScript): UpdateItemPoolRequest {
		$this->setAcquisitionItemTriggerScript($acquisitionItemTriggerScript);
		return $this;
	}

	/**
	 * アイテム入手完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string アイテム入手完了時 に実行されるGS2-Script
	 */
	public function getAcquisitionItemDoneTriggerScript() {
		return $this->acquisitionItemDoneTriggerScript;
	}

	/**
	 * アイテム入手完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $acquisitionItemDoneTriggerScript アイテム入手完了時 に実行されるGS2-Script
	 */
	public function setAcquisitionItemDoneTriggerScript($acquisitionItemDoneTriggerScript) {
		$this->acquisitionItemDoneTriggerScript = $acquisitionItemDoneTriggerScript;
	}

	/**
	 * アイテム入手完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $acquisitionItemDoneTriggerScript アイテム入手完了時 に実行されるGS2-Script
	 * @return UpdateItemPoolRequest
	 */
	public function withAcquisitionItemDoneTriggerScript($acquisitionItemDoneTriggerScript): UpdateItemPoolRequest {
		$this->setAcquisitionItemDoneTriggerScript($acquisitionItemDoneTriggerScript);
		return $this;
	}

	/**
	 * アイテム消費時 に実行されるGS2-Scriptを取得
	 *
	 * @return string アイテム消費時 に実行されるGS2-Script
	 */
	public function getConsumeItemTriggerScript() {
		return $this->consumeItemTriggerScript;
	}

	/**
	 * アイテム消費時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $consumeItemTriggerScript アイテム消費時 に実行されるGS2-Script
	 */
	public function setConsumeItemTriggerScript($consumeItemTriggerScript) {
		$this->consumeItemTriggerScript = $consumeItemTriggerScript;
	}

	/**
	 * アイテム消費時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $consumeItemTriggerScript アイテム消費時 に実行されるGS2-Script
	 * @return UpdateItemPoolRequest
	 */
	public function withConsumeItemTriggerScript($consumeItemTriggerScript): UpdateItemPoolRequest {
		$this->setConsumeItemTriggerScript($consumeItemTriggerScript);
		return $this;
	}

	/**
	 * アイテム消費完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string アイテム消費完了時 に実行されるGS2-Script
	 */
	public function getConsumeItemDoneTriggerScript() {
		return $this->consumeItemDoneTriggerScript;
	}

	/**
	 * アイテム消費完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $consumeItemDoneTriggerScript アイテム消費完了時 に実行されるGS2-Script
	 */
	public function setConsumeItemDoneTriggerScript($consumeItemDoneTriggerScript) {
		$this->consumeItemDoneTriggerScript = $consumeItemDoneTriggerScript;
	}

	/**
	 * アイテム消費完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $consumeItemDoneTriggerScript アイテム消費完了時 に実行されるGS2-Script
	 * @return UpdateItemPoolRequest
	 */
	public function withConsumeItemDoneTriggerScript($consumeItemDoneTriggerScript): UpdateItemPoolRequest {
		$this->setConsumeItemDoneTriggerScript($consumeItemDoneTriggerScript);
		return $this;
	}

}