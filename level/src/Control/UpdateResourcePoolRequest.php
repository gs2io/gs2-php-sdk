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

namespace Gs2\Level\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class UpdateResourcePoolRequest extends Gs2BasicRequest {

    const FUNCTION = "UpdateResourcePool";

	/** @var string リソースプール */
	private $resourcePoolName;

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


	/**
	 * リソースプールを取得
	 *
	 * @return string リソースプール
	 */
	public function getResourcePoolName() {
		return $this->resourcePoolName;
	}

	/**
	 * リソースプールを設定
	 *
	 * @param string $resourcePoolName リソースプール
	 */
	public function setResourcePoolName($resourcePoolName) {
		$this->resourcePoolName = $resourcePoolName;
	}

	/**
	 * リソースプールを設定
	 *
	 * @param string $resourcePoolName リソースプール
	 * @return UpdateResourcePoolRequest
	 */
	public function withResourcePoolName($resourcePoolName): UpdateResourcePoolRequest {
		$this->setResourcePoolName($resourcePoolName);
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
	 * @return UpdateResourcePoolRequest
	 */
	public function withDescription($description): UpdateResourcePoolRequest {
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
	 * @return UpdateResourcePoolRequest
	 */
	public function withServiceClass($serviceClass): UpdateResourcePoolRequest {
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
	 * @return UpdateResourcePoolRequest
	 */
	public function withLevelCapScript($levelCapScript): UpdateResourcePoolRequest {
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
	 * @return UpdateResourcePoolRequest
	 */
	public function withChangeExperienceTriggerScript($changeExperienceTriggerScript): UpdateResourcePoolRequest {
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
	 * @return UpdateResourcePoolRequest
	 */
	public function withChangeExperienceDoneTriggerScript($changeExperienceDoneTriggerScript): UpdateResourcePoolRequest {
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
	 * @return UpdateResourcePoolRequest
	 */
	public function withChangeLevelTriggerScript($changeLevelTriggerScript): UpdateResourcePoolRequest {
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
	 * @return UpdateResourcePoolRequest
	 */
	public function withChangeLevelDoneTriggerScript($changeLevelDoneTriggerScript): UpdateResourcePoolRequest {
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
	 * @return UpdateResourcePoolRequest
	 */
	public function withChangeLevelCapTriggerScript($changeLevelCapTriggerScript): UpdateResourcePoolRequest {
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
	 * @return UpdateResourcePoolRequest
	 */
	public function withChangeLevelCapDoneTriggerScript($changeLevelCapDoneTriggerScript): UpdateResourcePoolRequest {
		$this->setChangeLevelCapDoneTriggerScript($changeLevelCapDoneTriggerScript);
		return $this;
	}

}