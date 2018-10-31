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

namespace Gs2\JobQueue\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class DescribeDeadJobByScriptNameRequest extends Gs2BasicRequest {

    const FUNCTION = "DescribeDeadJobByScriptName";

	/** @var string ジョブキューの名前を指定します。 */
	private $queueName;

	/** @var string スクリプト名 */
	private $scriptName;

	/** @var string データの取得を開始する位置を指定するトークン */
	private $pageToken;

	/** @var int データの取得件数 */
	private $limit;


	/**
	 * ジョブキューの名前を指定します。を取得
	 *
	 * @return string ジョブキューの名前を指定します。
	 */
	public function getQueueName() {
		return $this->queueName;
	}

	/**
	 * ジョブキューの名前を指定します。を設定
	 *
	 * @param string $queueName ジョブキューの名前を指定します。
	 */
	public function setQueueName($queueName) {
		$this->queueName = $queueName;
	}

	/**
	 * ジョブキューの名前を指定します。を設定
	 *
	 * @param string $queueName ジョブキューの名前を指定します。
	 * @return DescribeDeadJobByScriptNameRequest
	 */
	public function withQueueName($queueName): DescribeDeadJobByScriptNameRequest {
		$this->setQueueName($queueName);
		return $this;
	}

	/**
	 * スクリプト名を取得
	 *
	 * @return string スクリプト名
	 */
	public function getScriptName() {
		return $this->scriptName;
	}

	/**
	 * スクリプト名を設定
	 *
	 * @param string $scriptName スクリプト名
	 */
	public function setScriptName($scriptName) {
		$this->scriptName = $scriptName;
	}

	/**
	 * スクリプト名を設定
	 *
	 * @param string $scriptName スクリプト名
	 * @return DescribeDeadJobByScriptNameRequest
	 */
	public function withScriptName($scriptName): DescribeDeadJobByScriptNameRequest {
		$this->setScriptName($scriptName);
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
	 * @return DescribeDeadJobByScriptNameRequest
	 */
	public function withPageToken($pageToken): DescribeDeadJobByScriptNameRequest {
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
	 * @return DescribeDeadJobByScriptNameRequest
	 */
	public function withLimit($limit): DescribeDeadJobByScriptNameRequest {
		$this->setLimit($limit);
		return $this;
	}

}