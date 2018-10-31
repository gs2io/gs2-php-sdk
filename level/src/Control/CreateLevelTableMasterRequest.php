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
class CreateLevelTableMasterRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateLevelTableMaster";

	/** @var string リソースプール */
	private $resourcePoolName;

	/** @var string レベルテーブル名 */
	private $name;


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
	 * @return CreateLevelTableMasterRequest
	 */
	public function withResourcePoolName($resourcePoolName): CreateLevelTableMasterRequest {
		$this->setResourcePoolName($resourcePoolName);
		return $this;
	}

	/**
	 * レベルテーブル名を取得
	 *
	 * @return string レベルテーブル名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * レベルテーブル名を設定
	 *
	 * @param string $name レベルテーブル名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * レベルテーブル名を設定
	 *
	 * @param string $name レベルテーブル名
	 * @return CreateLevelTableMasterRequest
	 */
	public function withName($name): CreateLevelTableMasterRequest {
		$this->setName($name);
		return $this;
	}

}