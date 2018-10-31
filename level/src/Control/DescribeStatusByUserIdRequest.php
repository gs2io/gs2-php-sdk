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
class DescribeStatusByUserIdRequest extends Gs2BasicRequest {

    const FUNCTION = "DescribeStatusByUserId";

	/** @var string リソースプール */
	private $resourcePoolName;

	/** @var string ユーザID */
	private $userId;

	/** @var string[] ステータスIDリスト */
	private $statusIds;

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
	 * @return DescribeStatusByUserIdRequest
	 */
	public function withResourcePoolName($resourcePoolName): DescribeStatusByUserIdRequest {
		$this->setResourcePoolName($resourcePoolName);
		return $this;
	}

	/**
	 * ユーザIDを取得
	 *
	 * @return string ユーザID
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 * ユーザIDを設定
	 *
	 * @param string $userId ユーザID
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
	}

	/**
	 * ユーザIDを設定
	 *
	 * @param string $userId ユーザID
	 * @return DescribeStatusByUserIdRequest
	 */
	public function withUserId($userId): DescribeStatusByUserIdRequest {
		$this->setUserId($userId);
		return $this;
	}

	/**
	 * ステータスIDリストを取得
	 *
	 * @return string[] ステータスIDリスト
	 */
	public function getStatusIds() {
		return $this->statusIds;
	}

	/**
	 * ステータスIDリストを設定
	 *
	 * @param string[] $statusIds ステータスIDリスト
	 */
	public function setStatusIds($statusIds) {
		$this->statusIds = $statusIds;
	}

	/**
	 * ステータスIDリストを設定
	 *
	 * @param string[] $statusIds ステータスIDリスト
	 * @return DescribeStatusByUserIdRequest
	 */
	public function withStatusIds($statusIds): DescribeStatusByUserIdRequest {
		$this->setStatusIds($statusIds);
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
	 * @return DescribeStatusByUserIdRequest
	 */
	public function withPageToken($pageToken): DescribeStatusByUserIdRequest {
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
	 * @return DescribeStatusByUserIdRequest
	 */
	public function withLimit($limit): DescribeStatusByUserIdRequest {
		$this->setLimit($limit);
		return $this;
	}

}