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
class RunByUserIdRequest extends Gs2BasicRequest {

    const FUNCTION = "RunByUserId";

	/** @var string ジョブキューの名前 */
	private $queueName;

	/** @var string ユーザID */
	private $userId;


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
	 * @return RunByUserIdRequest
	 */
	public function withQueueName($queueName): RunByUserIdRequest {
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
	 * @return RunByUserIdRequest
	 */
	public function withUserId($userId): RunByUserIdRequest {
		$this->setUserId($userId);
		return $this;
	}

}