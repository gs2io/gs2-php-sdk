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
class DeleteLevelThresholdMasterRequest extends Gs2BasicRequest {

    const FUNCTION = "DeleteLevelThresholdMaster";

	/** @var string リソースプール */
	private $resourcePoolName;

	/** @var string レベルテーブル */
	private $levelTableName;

	/** @var long レベルアップ経験値閾値 */
	private $threshold;


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
	 * @return DeleteLevelThresholdMasterRequest
	 */
	public function withResourcePoolName($resourcePoolName): DeleteLevelThresholdMasterRequest {
		$this->setResourcePoolName($resourcePoolName);
		return $this;
	}

	/**
	 * レベルテーブルを取得
	 *
	 * @return string レベルテーブル
	 */
	public function getLevelTableName() {
		return $this->levelTableName;
	}

	/**
	 * レベルテーブルを設定
	 *
	 * @param string $levelTableName レベルテーブル
	 */
	public function setLevelTableName($levelTableName) {
		$this->levelTableName = $levelTableName;
	}

	/**
	 * レベルテーブルを設定
	 *
	 * @param string $levelTableName レベルテーブル
	 * @return DeleteLevelThresholdMasterRequest
	 */
	public function withLevelTableName($levelTableName): DeleteLevelThresholdMasterRequest {
		$this->setLevelTableName($levelTableName);
		return $this;
	}

	/**
	 * レベルアップ経験値閾値を取得
	 *
	 * @return long レベルアップ経験値閾値
	 */
	public function getThreshold() {
		return $this->threshold;
	}

	/**
	 * レベルアップ経験値閾値を設定
	 *
	 * @param long $threshold レベルアップ経験値閾値
	 */
	public function setThreshold($threshold) {
		$this->threshold = $threshold;
	}

	/**
	 * レベルアップ経験値閾値を設定
	 *
	 * @param long $threshold レベルアップ経験値閾値
	 * @return DeleteLevelThresholdMasterRequest
	 */
	public function withThreshold($threshold): DeleteLevelThresholdMasterRequest {
		$this->setThreshold($threshold);
		return $this;
	}

}