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

namespace Gs2\Schedule\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class DescribeEventMasterRequest extends Gs2BasicRequest {

    const FUNCTION = "DescribeEventMaster";

	/** @var string スケジュールの名前を指定します。 */
	private $scheduleName;

	/** @var string データの取得を開始する位置を指定するトークン */
	private $pageToken;

	/** @var int データの取得件数 */
	private $limit;


	/**
	 * スケジュールの名前を指定します。を取得
	 *
	 * @return string スケジュールの名前を指定します。
	 */
	public function getScheduleName() {
		return $this->scheduleName;
	}

	/**
	 * スケジュールの名前を指定します。を設定
	 *
	 * @param string $scheduleName スケジュールの名前を指定します。
	 */
	public function setScheduleName($scheduleName) {
		$this->scheduleName = $scheduleName;
	}

	/**
	 * スケジュールの名前を指定します。を設定
	 *
	 * @param string $scheduleName スケジュールの名前を指定します。
	 * @return DescribeEventMasterRequest
	 */
	public function withScheduleName($scheduleName): DescribeEventMasterRequest {
		$this->setScheduleName($scheduleName);
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
	 * @return DescribeEventMasterRequest
	 */
	public function withPageToken($pageToken): DescribeEventMasterRequest {
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
	 * @return DescribeEventMasterRequest
	 */
	public function withLimit($limit): DescribeEventMasterRequest {
		$this->setLimit($limit);
		return $this;
	}

}