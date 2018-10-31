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
 * 消費型アイテムプール
 *
 * @author Game Server Services, Inc.
 *
 */
class ItemPool {

	/** @var string 消費型アイテムプールID */
	private $itemPoolId;

	/** @var string オーナーID */
	private $ownerId;

	/** @var string 消費型アイテムプール名 */
	private $name;

	/** @var string 説明文 */
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

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * 消費型アイテムプールIDを取得
	 *
	 * @return string 消費型アイテムプールID
	 */
	public function getItemPoolId() {
		return $this->itemPoolId;
	}

	/**
	 * 消費型アイテムプールIDを設定
	 *
	 * @param string $itemPoolId 消費型アイテムプールID
	 */
	public function setItemPoolId($itemPoolId) {
		$this->itemPoolId = $itemPoolId;
	}

	/**
	 * 消費型アイテムプールIDを設定
	 *
	 * @param string $itemPoolId 消費型アイテムプールID
	 * @return self
	 */
	public function withItemPoolId($itemPoolId): self {
		$this->setItemPoolId($itemPoolId);
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
	 * 消費型アイテムプール名を取得
	 *
	 * @return string 消費型アイテムプール名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * 消費型アイテムプール名を設定
	 *
	 * @param string $name 消費型アイテムプール名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * 消費型アイテムプール名を設定
	 *
	 * @param string $name 消費型アイテムプール名
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
	 * @return ItemPool
	 */
    static function build(array $array)
    {
        $item = new ItemPool();
        $item->setItemPoolId(isset($array['itemPoolId']) ? $array['itemPoolId'] : null);
        $item->setOwnerId(isset($array['ownerId']) ? $array['ownerId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setDescription(isset($array['description']) ? $array['description'] : null);
        $item->setServiceClass(isset($array['serviceClass']) ? $array['serviceClass'] : null);
        $item->setAcquisitionItemTriggerScript(isset($array['acquisitionItemTriggerScript']) ? $array['acquisitionItemTriggerScript'] : null);
        $item->setAcquisitionItemDoneTriggerScript(isset($array['acquisitionItemDoneTriggerScript']) ? $array['acquisitionItemDoneTriggerScript'] : null);
        $item->setConsumeItemTriggerScript(isset($array['consumeItemTriggerScript']) ? $array['consumeItemTriggerScript'] : null);
        $item->setConsumeItemDoneTriggerScript(isset($array['consumeItemDoneTriggerScript']) ? $array['consumeItemDoneTriggerScript'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}