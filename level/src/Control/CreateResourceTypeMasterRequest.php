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
class CreateResourceTypeMasterRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateResourceTypeMaster";

	/** @var string リソースプール */
	private $resourcePoolName;

	/** @var string リソースタイプ名 */
	private $name;

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
	 * @return CreateResourceTypeMasterRequest
	 */
	public function withResourcePoolName($resourcePoolName): CreateResourceTypeMasterRequest {
		$this->setResourcePoolName($resourcePoolName);
		return $this;
	}

	/**
	 * リソースタイプ名を取得
	 *
	 * @return string リソースタイプ名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * リソースタイプ名を設定
	 *
	 * @param string $name リソースタイプ名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * リソースタイプ名を設定
	 *
	 * @param string $name リソースタイプ名
	 * @return CreateResourceTypeMasterRequest
	 */
	public function withName($name): CreateResourceTypeMasterRequest {
		$this->setName($name);
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
	 * @return CreateResourceTypeMasterRequest
	 */
	public function withMeta($meta): CreateResourceTypeMasterRequest {
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
	 * @return CreateResourceTypeMasterRequest
	 */
	public function withLevelTableName($levelTableName): CreateResourceTypeMasterRequest {
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
	 * @return CreateResourceTypeMasterRequest
	 */
	public function withDefaultExperience($defaultExperience): CreateResourceTypeMasterRequest {
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
	 * @return CreateResourceTypeMasterRequest
	 */
	public function withDefaultLevelCap($defaultLevelCap): CreateResourceTypeMasterRequest {
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
	 * @return CreateResourceTypeMasterRequest
	 */
	public function withMaxLevelCap($maxLevelCap): CreateResourceTypeMasterRequest {
		$this->setMaxLevelCap($maxLevelCap);
		return $this;
	}

}