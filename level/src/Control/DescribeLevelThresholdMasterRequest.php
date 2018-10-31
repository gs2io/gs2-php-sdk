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
class DescribeLevelThresholdMasterRequest extends Gs2BasicRequest {

    const FUNCTION = "DescribeLevelThresholdMaster";

	/** @var string リソースプール */
	private $resourcePoolName;

	/** @var string レベルテーブル */
	private $levelTableName;

	/** @var string データの取得を開始する位置を指定するトークン */
	private $pageToken;

	/** @var int データの取得件数 */
	private $limit;


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
	 * @return DescribeLevelThresholdMasterRequest
	 */
	public function withResourcePoolName($resourcePoolName): DescribeLevelThresholdMasterRequest {
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
	 * @return DescribeLevelThresholdMasterRequest
	 */
	public function withLevelTableName($levelTableName): DescribeLevelThresholdMasterRequest {
		$this->setLevelTableName($levelTableName);
		return $this;
	}

	/**
	 * データの取得を開始する位置を指定するトークンを取得
	 *
	 * @return string データの取得を開始する位置を指定するトークン
	 */
	public function getPageToken() {
		return $this->pageToken;
	}

	/**
	 * データの取得を開始する位置を指定するトークンを設定
	 *
	 * @param string $pageToken データの取得を開始する位置を指定するトークン
	 */
	public function setPageToken($pageToken) {
		$this->pageToken = $pageToken;
	}

	/**
	 * データの取得を開始する位置を指定するトークンを設定
	 *
	 * @param string $pageToken データの取得を開始する位置を指定するトークン
	 * @return DescribeLevelThresholdMasterRequest
	 */
	public function withPageToken($pageToken): DescribeLevelThresholdMasterRequest {
		$this->setPageToken($pageToken);
		return $this;
	}

	/**
	 * データの取得件数を取得
	 *
	 * @return int データの取得件数
	 */
	public function getLimit() {
		return $this->limit;
	}

	/**
	 * データの取得件数を設定
	 *
	 * @param int $limit データの取得件数
	 */
	public function setLimit($limit) {
		$this->limit = $limit;
	}

	/**
	 * データの取得件数を設定
	 *
	 * @param int $limit データの取得件数
	 * @return DescribeLevelThresholdMasterRequest
	 */
	public function withLimit($limit): DescribeLevelThresholdMasterRequest {
		$this->setLimit($limit);
		return $this;
	}

}