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
class DeleteDeadJobRequest extends Gs2BasicRequest {

    const FUNCTION = "DeleteDeadJob";

	/** @var string ジョブキューの名前 */
	private $queueName;

	/** @var string ユーザID */
	private $userId;

	/** @var string ジョブID */
	private $jobId;


	/**
	 * ジョブキューの名前を取得
	 *
	 * @return string ジョブキューの名前
	 */
	public function getQueueName() {
		return $this->queueName;
	}

	/**
	 * ジョブキューの名前を設定
	 *
	 * @param string $queueName ジョブキューの名前
	 */
	public function setQueueName($queueName) {
		$this->queueName = $queueName;
	}

	/**
	 * ジョブキューの名前を設定
	 *
	 * @param string $queueName ジョブキューの名前
	 * @return DeleteDeadJobRequest
	 */
	public function withQueueName($queueName): DeleteDeadJobRequest {
		$this->setQueueName($queueName);
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
	 * @return DeleteDeadJobRequest
	 */
	public function withUserId($userId): DeleteDeadJobRequest {
		$this->setUserId($userId);
		return $this;
	}

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
	 * @return DeleteDeadJobRequest
	 */
	public function withJobId($jobId): DeleteDeadJobRequest {
		$this->setJobId($jobId);
		return $this;
	}

}