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

namespace Gs2\ConsumableItem\Model;

/**
 * 消費型アイテム
 *
 * @author Game Server Services, Inc.
 *
 */
class ItemMaster {

	/** @var string 消費型アイテムID */
	private $itemId;

	/** @var string 消費型アイテム名 */
	private $name;

	/** @var int 所持数の上限 */
	private $max;

	/** @var string アイテム入手時 に実行されるGS2-Script */
	private $acquisitionItemTriggerScript;

	/** @var string アイテム入手完了時 に実行されるGS2-Script */
	private $acquisitionItemDoneTriggerScript;

	/** @var string アイテム消費時 に実行されるGS2-Script */
	private $consumeItemTriggerScript;

	/** @var string アイテム消費完了時 に実行されるGS2-Script */
	private $consumeItemDoneTriggerScript;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * 消費型アイテムIDを取得
	 *
	 * @return string 消費型アイテムID
	 */
	public function getItemId() {
		return $this->itemId;
	}

	/**
	 * 消費型アイテムIDを設定
	 *
	 * @param string $itemId 消費型アイテムID
	 */
	public function setItemId($itemId) {
		$this->itemId = $itemId;
	}

	/**
	 * 消費型アイテムIDを設定
	 *
	 * @param string $itemId 消費型アイテムID
	 * @return self
	 */
	public function withItemId($itemId): self {
		$this->setItemId($itemId);
		return $this;
	}

	/**
	 * 消費型アイテム名を取得
	 *
	 * @return string 消費型アイテム名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * 消費型アイテム名を設定
	 *
	 * @param string $name 消費型アイテム名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * 消費型アイテム名を設定
	 *
	 * @param string $name 消費型アイテム名
	 * @return self
	 */
	public function withName($name): self {
		$this->setName($name);
		return $this;
	}

	/**
	 * 所持数の上限を取得
	 *
	 * @return int 所持数の上限
	 */
	public function getMax() {
		return $this->max;
	}

	/**
	 * 所持数の上限を設定
	 *
	 * @param int $max 所持数の上限
	 */
	public function setMax($max) {
		$this->max = $max;
	}

	/**
	 * 所持数の上限を設定
	 *
	 * @param int $max 所持数の上限
	 * @return self
	 */
	public function withMax($max): self {
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
	 * @return self
	 */
	public function withAcquisitionItemTriggerScript($acquisitionItemTriggerScript): self {
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
	 * @return self
	 */
	public function withAcquisitionItemDoneTriggerScript($acquisitionItemDoneTriggerScript): self {
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
	 * @return self
	 */
	public function withConsumeItemTriggerScript($consumeItemTriggerScript): self {
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
	 * @return self
	 */
	public function withConsumeItemDoneTriggerScript($consumeItemDoneTriggerScript): self {
		$this->setConsumeItemDoneTriggerScript($consumeItemDoneTriggerScript);
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
	 * @return ItemMaster
	 */
    static function build(array $array)
    {
        $item = new ItemMaster();
        $item->setItemId(isset($array['itemId']) ? $array['itemId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setMax(isset($array['max']) ? $array['max'] : null);
        $item->setAcquisitionItemTriggerScript(isset($array['acquisitionItemTriggerScript']) ? $array['acquisitionItemTriggerScript'] : null);
        $item->setAcquisitionItemDoneTriggerScript(isset($array['acquisitionItemDoneTriggerScript']) ? $array['acquisitionItemDoneTriggerScript'] : null);
        $item->setConsumeItemTriggerScript(isset($array['consumeItemTriggerScript']) ? $array['consumeItemTriggerScript'] : null);
        $item->setConsumeItemDoneTriggerScript(isset($array['consumeItemDoneTriggerScript']) ? $array['consumeItemDoneTriggerScript'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}