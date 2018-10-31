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
class UpdateResourceTypeMasterRequest extends Gs2BasicRequest {

    const FUNCTION = "UpdateResourceTypeMaster";

	/** @var string リソースプール */
	private $resourcePoolName;

	/** @var string リソースタイプ */
	private $resourceTypeName;

	/** @var string メタデータ */
	private $meta;

	/** @var string レベルテーブル名 */
	private $levelTableName;

	/** @var long デフォルト取得済み経験値 */
	private $defaultExperience;

	/** @var int デフォルトレベルキャップ */
	private $defaultLevelCap;

	/** @var int 最大レベルキャップ */
	private $maxLevelCap;


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
	 * @return UpdateResourceTypeMasterRequest
	 */
	public function withResourcePoolName($resourcePoolName): UpdateResourceTypeMasterRequest {
		$this->setResourcePoolName($resourcePoolName);
		return $this;
	}

	/**
	 * リソースタイプを取得
	 *
	 * @return string リソースタイプ
	 */
	public function getResourceTypeName() {
		return $this->resourceTypeName;
	}

	/**
	 * リソースタイプを設定
	 *
	 * @param string $resourceTypeName リソースタイプ
	 */
	public function setResourceTypeName($resourceTypeName) {
		$this->resourceTypeName = $resourceTypeName;
	}

	/**
	 * リソースタイプを設定
	 *
	 * @param string $resourceTypeName リソースタイプ
	 * @return UpdateResourceTypeMasterRequest
	 */
	public function withResourceTypeName($resourceTypeName): UpdateResourceTypeMasterRequest {
		$this->setResourceTypeName($resourceTypeName);
		return $this;
	}

	/**
	 * メタデータを取得
	 *
	 * @return string メタデータ
	 */
	public function getMeta() {
		return $this->meta;
	}

	/**
	 * メタデータを設定
	 *
	 * @param string $meta メタデータ
	 */
	public function setMeta($meta) {
		$this->meta = $meta;
	}

	/**
	 * メタデータを設定
	 *
	 * @param string $meta メタデータ
	 * @return UpdateResourceTypeMasterRequest
	 */
	public function withMeta($meta): UpdateResourceTypeMasterRequest {
		$this->setMeta($meta);
		return $this;
	}

	/**
	 * レベルテーブル名を取得
	 *
	 * @return string レベルテーブル名
	 */
	public function getLevelTableName() {
		return $this->levelTableName;
	}

	/**
	 * レベルテーブル名を設定
	 *
	 * @param string $levelTableName レベルテーブル名
	 */
	public function setLevelTableName($levelTableName) {
		$this->levelTableName = $levelTableName;
	}

	/**
	 * レベルテーブル名を設定
	 *
	 * @param string $levelTableName レベルテーブル名
	 * @return UpdateResourceTypeMasterRequest
	 */
	public function withLevelTableName($levelTableName): UpdateResourceTypeMasterRequest {
		$this->setLevelTableName($levelTableName);
		return $this;
	}

	/**
	 * デフォルト取得済み経験値を取得
	 *
	 * @return long デフォルト取得済み経験値
	 */
	public function getDefaultExperience() {
		return $this->defaultExperience;
	}

	/**
	 * デフォルト取得済み経験値を設定
	 *
	 * @param long $defaultExperience デフォルト取得済み経験値
	 */
	public function setDefaultExperience($defaultExperience) {
		$this->defaultExperience = $defaultExperience;
	}

	/**
	 * デフォルト取得済み経験値を設定
	 *
	 * @param long $defaultExperience デフォルト取得済み経験値
	 * @return UpdateResourceTypeMasterRequest
	 */
	public function withDefaultExperience($defaultExperience): UpdateResourceTypeMasterRequest {
		$this->setDefaultExperience($defaultExperience);
		return $this;
	}

	/**
	 * デフォルトレベルキャップを取得
	 *
	 * @return int デフォルトレベルキャップ
	 */
	public function getDefaultLevelCap() {
		return $this->defaultLevelCap;
	}

	/**
	 * デフォルトレベルキャップを設定
	 *
	 * @param int $defaultLevelCap デフォルトレベルキャップ
	 */
	public function setDefaultLevelCap($defaultLevelCap) {
		$this->defaultLevelCap = $defaultLevelCap;
	}

	/**
	 * デフォルトレベルキャップを設定
	 *
	 * @param int $defaultLevelCap デフォルトレベルキャップ
	 * @return UpdateResourceTypeMasterRequest
	 */
	public function withDefaultLevelCap($defaultLevelCap): UpdateResourceTypeMasterRequest {
		$this->setDefaultLevelCap($defaultLevelCap);
		return $this;
	}

	/**
	 * 最大レベルキャップを取得
	 *
	 * @return int 最大レベルキャップ
	 */
	public function getMaxLevelCap() {
		return $this->maxLevelCap;
	}

	/**
	 * 最大レベルキャップを設定
	 *
	 * @param int $maxLevelCap 最大レベルキャップ
	 */
	public function setMaxLevelCap($maxLevelCap) {
		$this->maxLevelCap = $maxLevelCap;
	}

	/**
	 * 最大レベルキャップを設定
	 *
	 * @param int $maxLevelCap 最大レベルキャップ
	 * @return UpdateResourceTypeMasterRequest
	 */
	public function withMaxLevelCap($maxLevelCap): UpdateResourceTypeMasterRequest {
		$this->setMaxLevelCap($maxLevelCap);
		return $this;
	}

}