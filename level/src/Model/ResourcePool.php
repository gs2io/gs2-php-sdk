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

namespace Gs2\Level\Model;

/**
 * リソースプール
 *
 * @author Game Server Services, Inc.
 *
 */
class ResourcePool {

	/** @var string リソースプールGRN */
	private $resourcePoolId;

	/** @var string オーナーID */
	private $ownerId;

	/** @var string リソースプール名 */
	private $name;

	/** @var string 説明文 */
	private $description;

	/** @var string サービスクラス */
	private $serviceClass;

	/** @var string レベルキャップ取得時 に実行されるGS2-Script */
	private $levelCapScript;

	/** @var string 経験値変化時 に実行されるGS2-Script */
	private $changeExperienceTriggerScript;

	/** @var string 経験値変化完了時 に実行されるGS2-Script */
	private $changeExperienceDoneTriggerScript;

	/** @var string レベル変化時 に実行されるGS2-Script */
	private $changeLevelTriggerScript;

	/** @var string レベル変化完了時 に実行されるGS2-Script */
	private $changeLevelDoneTriggerScript;

	/** @var string レベルキャップ変化時 に実行されるGS2-Script */
	private $changeLevelCapTriggerScript;

	/** @var string レベルキャップ変化完了時 に実行されるGS2-Script */
	private $changeLevelCapDoneTriggerScript;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * リソースプールGRNを取得
	 *
	 * @return string リソースプールGRN
	 */
	public function getResourcePoolId() {
		return $this->resourcePoolId;
	}

	/**
	 * リソースプールGRNを設定
	 *
	 * @param string $resourcePoolId リソースプールGRN
	 */
	public function setResourcePoolId($resourcePoolId) {
		$this->resourcePoolId = $resourcePoolId;
	}

	/**
	 * リソースプールGRNを設定
	 *
	 * @param string $resourcePoolId リソースプールGRN
	 * @return self
	 */
	public function withResourcePoolId($resourcePoolId): self {
		$this->setResourcePoolId($resourcePoolId);
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
	 * リソースプール名を取得
	 *
	 * @return string リソースプール名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * リソースプール名を設定
	 *
	 * @param string $name リソースプール名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * リソースプール名を設定
	 *
	 * @param string $name リソースプール名
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
	 * レベルキャップ取得時 に実行されるGS2-Scriptを取得
	 *
	 * @return string レベルキャップ取得時 に実行されるGS2-Script
	 */
	public function getLevelCapScript() {
		return $this->levelCapScript;
	}

	/**
	 * レベルキャップ取得時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $levelCapScript レベルキャップ取得時 に実行されるGS2-Script
	 */
	public function setLevelCapScript($levelCapScript) {
		$this->levelCapScript = $levelCapScript;
	}

	/**
	 * レベルキャップ取得時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $levelCapScript レベルキャップ取得時 に実行されるGS2-Script
	 * @return self
	 */
	public function withLevelCapScript($levelCapScript): self {
		$this->setLevelCapScript($levelCapScript);
		return $this;
	}

	/**
	 * 経験値変化時 に実行されるGS2-Scriptを取得
	 *
	 * @return string 経験値変化時 に実行されるGS2-Script
	 */
	public function getChangeExperienceTriggerScript() {
		return $this->changeExperienceTriggerScript;
	}

	/**
	 * 経験値変化時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $changeExperienceTriggerScript 経験値変化時 に実行されるGS2-Script
	 */
	public function setChangeExperienceTriggerScript($changeExperienceTriggerScript) {
		$this->changeExperienceTriggerScript = $changeExperienceTriggerScript;
	}

	/**
	 * 経験値変化時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $changeExperienceTriggerScript 経験値変化時 に実行されるGS2-Script
	 * @return self
	 */
	public function withChangeExperienceTriggerScript($changeExperienceTriggerScript): self {
		$this->setChangeExperienceTriggerScript($changeExperienceTriggerScript);
		return $this;
	}

	/**
	 * 経験値変化完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string 経験値変化完了時 に実行されるGS2-Script
	 */
	public function getChangeExperienceDoneTriggerScript() {
		return $this->changeExperienceDoneTriggerScript;
	}

	/**
	 * 経験値変化完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $changeExperienceDoneTriggerScript 経験値変化完了時 に実行されるGS2-Script
	 */
	public function setChangeExperienceDoneTriggerScript($changeExperienceDoneTriggerScript) {
		$this->changeExperienceDoneTriggerScript = $changeExperienceDoneTriggerScript;
	}

	/**
	 * 経験値変化完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $changeExperienceDoneTriggerScript 経験値変化完了時 に実行されるGS2-Script
	 * @return self
	 */
	public function withChangeExperienceDoneTriggerScript($changeExperienceDoneTriggerScript): self {
		$this->setChangeExperienceDoneTriggerScript($changeExperienceDoneTriggerScript);
		return $this;
	}

	/**
	 * レベル変化時 に実行されるGS2-Scriptを取得
	 *
	 * @return string レベル変化時 に実行されるGS2-Script
	 */
	public function getChangeLevelTriggerScript() {
		return $this->changeLevelTriggerScript;
	}

	/**
	 * レベル変化時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $changeLevelTriggerScript レベル変化時 に実行されるGS2-Script
	 */
	public function setChangeLevelTriggerScript($changeLevelTriggerScript) {
		$this->changeLevelTriggerScript = $changeLevelTriggerScript;
	}

	/**
	 * レベル変化時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $changeLevelTriggerScript レベル変化時 に実行されるGS2-Script
	 * @return self
	 */
	public function withChangeLevelTriggerScript($changeLevelTriggerScript): self {
		$this->setChangeLevelTriggerScript($changeLevelTriggerScript);
		return $this;
	}

	/**
	 * レベル変化完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string レベル変化完了時 に実行されるGS2-Script
	 */
	public function getChangeLevelDoneTriggerScript() {
		return $this->changeLevelDoneTriggerScript;
	}

	/**
	 * レベル変化完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $changeLevelDoneTriggerScript レベル変化完了時 に実行されるGS2-Script
	 */
	public function setChangeLevelDoneTriggerScript($changeLevelDoneTriggerScript) {
		$this->changeLevelDoneTriggerScript = $changeLevelDoneTriggerScript;
	}

	/**
	 * レベル変化完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $changeLevelDoneTriggerScript レベル変化完了時 に実行されるGS2-Script
	 * @return self
	 */
	public function withChangeLevelDoneTriggerScript($changeLevelDoneTriggerScript): self {
		$this->setChangeLevelDoneTriggerScript($changeLevelDoneTriggerScript);
		return $this;
	}

	/**
	 * レベルキャップ変化時 に実行されるGS2-Scriptを取得
	 *
	 * @return string レベルキャップ変化時 に実行されるGS2-Script
	 */
	public function getChangeLevelCapTriggerScript() {
		return $this->changeLevelCapTriggerScript;
	}

	/**
	 * レベルキャップ変化時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $changeLevelCapTriggerScript レベルキャップ変化時 に実行されるGS2-Script
	 */
	public function setChangeLevelCapTriggerScript($changeLevelCapTriggerScript) {
		$this->changeLevelCapTriggerScript = $changeLevelCapTriggerScript;
	}

	/**
	 * レベルキャップ変化時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $changeLevelCapTriggerScript レベルキャップ変化時 に実行されるGS2-Script
	 * @return self
	 */
	public function withChangeLevelCapTriggerScript($changeLevelCapTriggerScript): self {
		$this->setChangeLevelCapTriggerScript($changeLevelCapTriggerScript);
		return $this;
	}

	/**
	 * レベルキャップ変化完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string レベルキャップ変化完了時 に実行されるGS2-Script
	 */
	public function getChangeLevelCapDoneTriggerScript() {
		return $this->changeLevelCapDoneTriggerScript;
	}

	/**
	 * レベルキャップ変化完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $changeLevelCapDoneTriggerScript レベルキャップ変化完了時 に実行されるGS2-Script
	 */
	public function setChangeLevelCapDoneTriggerScript($changeLevelCapDoneTriggerScript) {
		$this->changeLevelCapDoneTriggerScript = $changeLevelCapDoneTriggerScript;
	}

	/**
	 * レベルキャップ変化完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $changeLevelCapDoneTriggerScript レベルキャップ変化完了時 に実行されるGS2-Script
	 * @return self
	 */
	public function withChangeLevelCapDoneTriggerScript($changeLevelCapDoneTriggerScript): self {
		$this->setChangeLevelCapDoneTriggerScript($changeLevelCapDoneTriggerScript);
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
	 * @return ResourcePool
	 */
    static function build(array $array)
    {
        $item = new ResourcePool();
        $item->setResourcePoolId(isset($array['resourcePoolId']) ? $array['resourcePoolId'] : null);
        $item->setOwnerId(isset($array['ownerId']) ? $array['ownerId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setDescription(isset($array['description']) ? $array['description'] : null);
        $item->setServiceClass(isset($array['serviceClass']) ? $array['serviceClass'] : null);
        $item->setLevelCapScript(isset($array['levelCapScript']) ? $array['levelCapScript'] : null);
        $item->setChangeExperienceTriggerScript(isset($array['changeExperienceTriggerScript']) ? $array['changeExperienceTriggerScript'] : null);
        $item->setChangeExperienceDoneTriggerScript(isset($array['changeExperienceDoneTriggerScript']) ? $array['changeExperienceDoneTriggerScript'] : null);
        $item->setChangeLevelTriggerScript(isset($array['changeLevelTriggerScript']) ? $array['changeLevelTriggerScript'] : null);
        $item->setChangeLevelDoneTriggerScript(isset($array['changeLevelDoneTriggerScript']) ? $array['changeLevelDoneTriggerScript'] : null);
        $item->setChangeLevelCapTriggerScript(isset($array['changeLevelCapTriggerScript']) ? $array['changeLevelCapTriggerScript'] : null);
        $item->setChangeLevelCapDoneTriggerScript(isset($array['changeLevelCapDoneTriggerScript']) ? $array['changeLevelCapDoneTriggerScript'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}