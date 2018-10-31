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

namespace Gs2\JobQueue\Model;

/**
 * ジョブ
 *
 * @author Game Server Services, Inc.
 *
 */
class Job {

	/** @var string ジョブID */
	private $jobId;

	/** @var string キューGRN */
	private $queueId;

	/** @var string オーナーID */
	private $userId;

	/** @var string スクリプト名 */
	private $scriptName;

	/** @var string 引数 */
	private $args;

	/** @var int 現在のリトライ回数 */
	private $currentRetry;

	/** @var int 最大リトライ回数 */
	private $maxRetry;

	/** @var int 作成日時 */
	private $createAt;

	/**
	 * ジョブIDを取得
	 *
	 * @return string ジョブID
	 */
	public function getJobId() {
		return $this->jobId;
	}

	/**
	 * ジョブIDを設定
	 *
	 * @param string $jobId ジョブID
	 */
	public function setJobId($jobId) {
		$this->jobId = $jobId;
	}

	/**
	 * ジョブIDを設定
	 *
	 * @param string $jobId ジョブID
	 * @return self
	 */
	public function withJobId($jobId): self {
		$this->setJobId($jobId);
		return $this;
	}

	/**
	 * キューGRNを取得
	 *
	 * @return string キューGRN
	 */
	public function getQueueId() {
		return $this->queueId;
	}

	/**
	 * キューGRNを設定
	 *
	 * @param string $queueId キューGRN
	 */
	public function setQueueId($queueId) {
		$this->queueId = $queueId;
	}

	/**
	 * キューGRNを設定
	 *
	 * @param string $queueId キューGRN
	 * @return self
	 */
	public function withQueueId($queueId): self {
		$this->setQueueId($queueId);
		return $this;
	}

	/**
	 * オーナーIDを取得
	 *
	 * @return string オーナーID
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string $userId オーナーID
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string $userId オーナーID
	 * @return self
	 */
	public function withUserId($userId): self {
		$this->setUserId($userId);
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
	 * @return self
	 */
	public function withScriptName($scriptName): self {
		$this->setScriptName($scriptName);
		return $this;
	}

	/**
	 * 引数を取得
	 *
	 * @return string 引数
	 */
	public function getArgs() {
		return $this->args;
	}

	/**
	 * 引数を設定
	 *
	 * @param string $args 引数
	 */
	public function setArgs($args) {
		$this->args = $args;
	}

	/**
	 * 引数を設定
	 *
	 * @param string $args 引数
	 * @return self
	 */
	public function withArgs($args): self {
		$this->setArgs($args);
		return $this;
	}

	/**
	 * 現在のリトライ回数を取得
	 *
	 * @return int 現在のリトライ回数
	 */
	public function getCurrentRetry() {
		return $this->currentRetry;
	}

	/**
	 * 現在のリトライ回数を設定
	 *
	 * @param int $currentRetry 現在のリトライ回数
	 */
	public function setCurrentRetry($currentRetry) {
		$this->currentRetry = $currentRetry;
	}

	/**
	 * 現在のリトライ回数を設定
	 *
	 * @param int $currentRetry 現在のリトライ回数
	 * @return self
	 */
	public function withCurrentRetry($currentRetry): self {
		$this->setCurrentRetry($currentRetry);
		return $this;
	}

	/**
	 * 最大リトライ回数を取得
	 *
	 * @return int 最大リトライ回数
	 */
	public function getMaxRetry() {
		return $this->maxRetry;
	}

	/**
	 * 最大リトライ回数を設定
	 *
	 * @param int $maxRetry 最大リトライ回数
	 */
	public function setMaxRetry($maxRetry) {
		$this->maxRetry = $maxRetry;
	}

	/**
	 * 最大リトライ回数を設定
	 *
	 * @param int $maxRetry 最大リトライ回数
	 * @return self
	 */
	public function withMaxRetry($maxRetry): self {
		$this->setMaxRetry($maxRetry);
		return $this;
	}

	/**
	 * 作成日時を取得
	 *
	 * @return int 作成日時
	 */
	public function getCreateAt() {
		return $this->createAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int $createAt 作成日時
	 */
	public function setCreateAt($createAt) {
		$this->createAt = $createAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int $createAt 作成日時
	 * @return self
	 */
	public function withCreateAt($createAt): self {
		$this->setCreateAt($createAt);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return Job
	 */
    static function build(array $array)
    {
        $item = new Job();
        $item->setJobId(isset($array['jobId']) ? $array['jobId'] : null);
        $item->setQueueId(isset($array['queueId']) ? $array['queueId'] : null);
        $item->setUserId(isset($array['userId']) ? $array['userId'] : null);
        $item->setScriptName(isset($array['scriptName']) ? $array['scriptName'] : null);
        $item->setArgs(isset($array['args']) ? $array['args'] : null);
        $item->setCurrentRetry(isset($array['currentRetry']) ? $array['currentRetry'] : null);
        $item->setMaxRetry(isset($array['maxRetry']) ? $array['maxRetry'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        return $item;
    }

}