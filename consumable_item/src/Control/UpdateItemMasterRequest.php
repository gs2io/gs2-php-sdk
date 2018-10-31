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
class UpdateItemMasterRequest extends Gs2BasicRequest {

    const FUNCTION = "UpdateItemMaster";

	/** @var string 消費型アイテムプールの名前 */
	private $itemPoolName;

	/** @var string 消費型アイテムの名前 */
	private $itemName;

	/** @var int 最大所持数。 */
	private $max;

	/** @var string アイテム入手時 に実行されるGS2-Script */
	private $acquisitionItemTriggerScript;

	/** @var string アイテム入手完了時 に実行されるGS2-Script */
	private $acquisitionItemDoneTriggerScript;

	/** @var string アイテム消費時 に実行されるGS2-Script */
	private $consumeItemTriggerScript;

	/** @var string アイテム消費完了時 に実行されるGS2-Script */
	private $consumeItemDoneTriggerScript;


	/**
	 * 消費型アイテムプールの名前を取得
	 *
	 * @return string 消費型アイテムプールの名前
	 */
	public function getItemPoolName() {
		return $this->itemPoolName;
	}

	/**
	 * 消費型アイテムプールの名前を設定
	 *
	 * @param string $itemPoolName 消費型アイテムプールの名前
	 */
	public function setItemPoolName($itemPoolName) {
		$this->itemPoolName = $itemPoolName;
	}

	/**
	 * 消費型アイテムプールの名前を設定
	 *
	 * @param string $itemPoolName 消費型アイテムプールの名前
	 * @return UpdateItemMasterRequest
	 */
	public function withItemPoolName($itemPoolName): UpdateItemMasterRequest {
		$this->setItemPoolName($itemPoolName);
		return $this;
	}

	/**
	 * 消費型アイテムの名前を取得
	 *
	 * @return string 消費型アイテムの名前
	 */
	public function getItemName() {
		return $this->itemName;
	}

	/**
	 * 消費型アイテムの名前を設定
	 *
	 * @param string $itemName 消費型アイテムの名前
	 */
	public function setItemName($itemName) {
		$this->itemName = $itemName;
	}

	/**
	 * 消費型アイテムの名前を設定
	 *
	 * @param string $itemName 消費型アイテムの名前
	 * @return UpdateItemMasterRequest
	 */
	public function withItemName($itemName): UpdateItemMasterRequest {
		$this->setItemName($itemName);
		return $this;
	}

	/**
	 * 最大所持数。を取得
	 *
	 * @return int 最大所持数。
	 */
	public function getMax() {
		return $this->max;
	}

	/**
	 * 最大所持数。を設定
	 *
	 * @param int $max 最大所持数。
	 */
	public function setMax($max) {
		$this->max = $max;
	}

	/**
	 * 最大所持数。を設定
	 *
	 * @param int $max 最大所持数。
	 * @return UpdateItemMasterRequest
	 */
	public function withMax($max): UpdateItemMasterRequest {
		$this->setMax($max);
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
	 * @return UpdateItemMasterRequest
	 */
	public function withAcquisitionItemTriggerScript($acquisitionItemTriggerScript): UpdateItemMasterRequest {
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
	 * @return UpdateItemMasterRequest
	 */
	public function withAcquisitionItemDoneTriggerScript($acquisitionItemDoneTriggerScript): UpdateItemMasterRequest {
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
	 * @return UpdateItemMasterRequest
	 */
	public function withConsumeItemTriggerScript($consumeItemTriggerScript): UpdateItemMasterRequest {
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
	 * @return UpdateItemMasterRequest
	 */
	public function withConsumeItemDoneTriggerScript($consumeItemDoneTriggerScript): UpdateItemMasterRequest {
		$this->setConsumeItemDoneTriggerScript($consumeItemDoneTriggerScript);
		return $this;
	}

}