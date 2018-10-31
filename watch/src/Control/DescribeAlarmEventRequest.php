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

namespace Gs2\Watch\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class DescribeAlarmEventRequest extends Gs2BasicRequest {

    const FUNCTION = "DescribeAlarmEvent";

	/** @var string アラームの名前を指定します。 */
	private $alarmName;

	/** @var string データの取得を開始する位置を指定するトークン */
	private $pageToken;

	/** @var int データの取得件数 */
	private $limit;


	/**
	 * アラームの名前を指定します。を取得
	 *
	 * @return string アラームの名前を指定します。
	 */
	public function getAlarmName() {
		return $this->alarmName;
	}

	/**
	 * アラームの名前を指定します。を設定
	 *
	 * @param string $alarmName アラームの名前を指定します。
	 */
	public function setAlarmName($alarmName) {
		$this->alarmName = $alarmName;
	}

	/**
	 * アラームの名前を指定します。を設定
	 *
	 * @param string $alarmName アラームの名前を指定します。
	 * @return DescribeAlarmEventRequest
	 */
	public function withAlarmName($alarmName): DescribeAlarmEventRequest {
		$this->setAlarmName($alarmName);
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
	 * @return DescribeAlarmEventRequest
	 */
	public function withPageToken($pageToken): DescribeAlarmEventRequest {
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
	 * @return DescribeAlarmEventRequest
	 */
	public function withLimit($limit): DescribeAlarmEventRequest {
		$this->setLimit($limit);
		return $this;
	}

}