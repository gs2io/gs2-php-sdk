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
 * ジョブ結果
 *
 * @author Game Server Services, Inc.
 *
 */
class JobResult {

	/** @var string ジョブID */
	private $jobId;

	/** @var string キューGRN */
	private $queueId;

	/** @var int ステータスコード */
	private $statusCode;

	/** @var string 実行結果 */
	private $result;

	/** @var bool キューの中で最後のジョブだったか */
	private $endOfJob;

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
	 * ステータスコードを取得
	 *
	 * @return int ステータスコード
	 */
	public function getStatusCode() {
		return $this->statusCode;
	}

	/**
	 * ステータスコードを設定
	 *
	 * @param int $statusCode ステータスコード
	 */
	public function setStatusCode($statusCode) {
		$this->statusCode = $statusCode;
	}

	/**
	 * ステータスコードを設定
	 *
	 * @param int $statusCode ステータスコード
	 * @return self
	 */
	public function withStatusCode($statusCode): self {
		$this->setStatusCode($statusCode);
		return $this;
	}

	/**
	 * 実行結果を取得
	 *
	 * @return string 実行結果
	 */
	public function getResult() {
		return $this->result;
	}

	/**
	 * 実行結果を設定
	 *
	 * @param string $result 実行結果
	 */
	public function setResult($result) {
		$this->result = $result;
	}

	/**
	 * 実行結果を設定
	 *
	 * @param string $result 実行結果
	 * @return self
	 */
	public function withResult($result): self {
		$this->setResult($result);
		return $this;
	}

	/**
	 * キューの中で最後のジョブだったかを取得
	 *
	 * @return bool キューの中で最後のジョブだったか
	 */
	public function getEndOfJob() {
		return $this->endOfJob;
	}

	/**
	 * キューの中で最後のジョブだったかを設定
	 *
	 * @param bool $endOfJob キューの中で最後のジョブだったか
	 */
	public function setEndOfJob($endOfJob) {
		$this->endOfJob = $endOfJob;
	}

	/**
	 * キューの中で最後のジョブだったかを設定
	 *
	 * @param bool $endOfJob キューの中で最後のジョブだったか
	 * @return self
	 */
	public function withEndOfJob($endOfJob): self {
		$this->setEndOfJob($endOfJob);
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
	 * @return JobResult
	 */
    static function build(array $array)
    {
        $item = new JobResult();
        $item->setJobId(isset($array['jobId']) ? $array['jobId'] : null);
        $item->setQueueId(isset($array['queueId']) ? $array['queueId'] : null);
        $item->setStatusCode(isset($array['statusCode']) ? $array['statusCode'] : null);
        $item->setResult(isset($array['result']) ? $array['result'] : null);
        $item->setEndOfJob(isset($array['endOfJob']) ? $array['endOfJob'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        return $item;
    }

}