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
class UpdateCurrentLevelMasterRequest extends Gs2BasicRequest {

    const FUNCTION = "UpdateCurrentLevelMaster";

	/** @var string リソースプール */
	private $resourcePoolName;

	/** @var string レベルマスターデータ */
	private $settings;


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
	 * @return UpdateCurrentLevelMasterRequest
	 */
	public function withResourcePoolName($resourcePoolName): UpdateCurrentLevelMasterRequest {
		$this->setResourcePoolName($resourcePoolName);
		return $this;
	}

	/**
	 * レベルマスターデータを取得
	 *
	 * @return string レベルマスターデータ
	 */
	public function getSettings() {
		return $this->settings;
	}

	/**
	 * レベルマスターデータを設定
	 *
	 * @param string $settings レベルマスターデータ
	 */
	public function setSettings($settings) {
		$this->settings = $settings;
	}

	/**
	 * レベルマスターデータを設定
	 *
	 * @param string $settings レベルマスターデータ
	 * @return UpdateCurrentLevelMasterRequest
	 */
	public function withSettings($settings): UpdateCurrentLevelMasterRequest {
		$this->setSettings($settings);
		return $this;
	}

}