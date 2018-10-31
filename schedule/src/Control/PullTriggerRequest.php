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
class PullTriggerRequest extends Gs2BasicRequest {

    const FUNCTION = "PullTrigger";

	/** @var string スケジュールの名前を指定します。 */
	private $scheduleName;

	/** @var string ユーザIDを指定します。 */
	private $userId;

	/** @var string トリガーの名前を指定します。 */
	private $triggerName;

	/** @var string 既にトリガーが引かれていた時の振る舞い */
	private $action;

	/** @var int action に if_expired_pull_again を指定したときに使用するトリガーの有効期間(分) */
	private $ttl;


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
	 * @return PullTriggerRequest
	 */
	public function withScheduleName($scheduleName): PullTriggerRequest {
		$this->setScheduleName($scheduleName);
		return $this;
	}

	/**
	 * ユーザIDを指定します。を取得
	 *
	 * @return string ユーザIDを指定します。
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 * ユーザIDを指定します。を設定
	 *
	 * @param string $userId ユーザIDを指定します。
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
	}

	/**
	 * ユーザIDを指定します。を設定
	 *
	 * @param string $userId ユーザIDを指定します。
	 * @return PullTriggerRequest
	 */
	public function withUserId($userId): PullTriggerRequest {
		$this->setUserId($userId);
		return $this;
	}

	/**
	 * トリガーの名前を指定します。を取得
	 *
	 * @return string トリガーの名前を指定します。
	 */
	public function getTriggerName() {
		return $this->triggerName;
	}

	/**
	 * トリガーの名前を指定します。を設定
	 *
	 * @param string $triggerName トリガーの名前を指定します。
	 */
	public function setTriggerName($triggerName) {
		$this->triggerName = $triggerName;
	}

	/**
	 * トリガーの名前を指定します。を設定
	 *
	 * @param string $triggerName トリガーの名前を指定します。
	 * @return PullTriggerRequest
	 */
	public function withTriggerName($triggerName): PullTriggerRequest {
		$this->setTriggerName($triggerName);
		return $this;
	}

	/**
	 * 既にトリガーが引かれていた時の振る舞いを取得
	 *
	 * @return string 既にトリガーが引かれていた時の振る舞い
	 */
	public function getAction() {
		return $this->action;
	}

	/**
	 * 既にトリガーが引かれていた時の振る舞いを設定
	 *
	 * @param string $action 既にトリガーが引かれていた時の振る舞い
	 */
	public function setAction($action) {
		$this->action = $action;
	}

	/**
	 * 既にトリガーが引かれていた時の振る舞いを設定
	 *
	 * @param string $action 既にトリガーが引かれていた時の振る舞い
	 * @return PullTriggerRequest
	 */
	public function withAction($action): PullTriggerRequest {
		$this->setAction($action);
		return $this;
	}

	/**
	 * action に if_expired_pull_again を指定したときに使用するトリガーの有効期間(分)を取得
	 *
	 * @return int action に if_expired_pull_again を指定したときに使用するトリガーの有効期間(分)
	 */
	public function getTtl() {
		return $this->ttl;
	}

	/**
	 * action に if_expired_pull_again を指定したときに使用するトリガーの有効期間(分)を設定
	 *
	 * @param int $ttl action に if_expired_pull_again を指定したときに使用するトリガーの有効期間(分)
	 */
	public function setTtl($ttl) {
		$this->ttl = $ttl;
	}

	/**
	 * action に if_expired_pull_again を指定したときに使用するトリガーの有効期間(分)を設定
	 *
	 * @param int $ttl action に if_expired_pull_again を指定したときに使用するトリガーの有効期間(分)
	 * @return PullTriggerRequest
	 */
	public function withTtl($ttl): PullTriggerRequest {
		$this->setTtl($ttl);
		return $this;
	}

}