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

namespace Gs2\Timer\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class DescribeTimerRequest extends Gs2BasicRequest {

    const FUNCTION = "DescribeTimer";

	/** @var string タイマープールの名前を指定します。 */
	private $timerPoolName;

	/** @var string データの取得を開始する位置を指定するトークン */
	private $pageToken;

	/** @var int データの取得件数 */
	private $limit;


	/**
	 * タイマープールの名前を指定します。を取得
	 *
	 * @return string タイマープールの名前を指定します。
	 */
	public function getTimerPoolName() {
		return $this->timerPoolName;
	}

	/**
	 * タイマープールの名前を指定します。を設定
	 *
	 * @param string $timerPoolName タイマープールの名前を指定します。
	 */
	public function setTimerPoolName($timerPoolName) {
		$this->timerPoolName = $timerPoolName;
	}

	/**
	 * タイマープールの名前を指定します。を設定
	 *
	 * @param string $timerPoolName タイマープールの名前を指定します。
	 * @return DescribeTimerRequest
	 */
	public function withTimerPoolName($timerPoolName): DescribeTimerRequest {
		$this->setTimerPoolName($timerPoolName);
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
	 * @return DescribeTimerRequest
	 */
	public function withPageToken($pageToken): DescribeTimerRequest {
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
	 * @return DescribeTimerRequest
	 */
	public function withLimit($limit): DescribeTimerRequest {
		$this->setLimit($limit);
		return $this;
	}

}