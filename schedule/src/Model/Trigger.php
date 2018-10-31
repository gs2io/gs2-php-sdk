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

namespace Gs2\Schedule\Model;

/**
 * トリガー
 *
 * @author Game Server Services, Inc.
 *
 */
class Trigger {

	/** @var string ユーザID */
	private $userId;

	/** @var string トリガーID */
	private $triggerName;

	/** @var int トリガーを引いた時間(エポック秒) */
	private $triggerAt;

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
	 * @return self
	 */
	public function withUserId($userId): self {
		$this->setUserId($userId);
		return $this;
	}

	/**
	 * トリガーIDを取得
	 *
	 * @return string トリガーID
	 */
	public function getTriggerName() {
		return $this->triggerName;
	}

	/**
	 * トリガーIDを設定
	 *
	 * @param string $triggerName トリガーID
	 */
	public function setTriggerName($triggerName) {
		$this->triggerName = $triggerName;
	}

	/**
	 * トリガーIDを設定
	 *
	 * @param string $triggerName トリガーID
	 * @return self
	 */
	public function withTriggerName($triggerName): self {
		$this->setTriggerName($triggerName);
		return $this;
	}

	/**
	 * トリガーを引いた時間(エポック秒)を取得
	 *
	 * @return int トリガーを引いた時間(エポック秒)
	 */
	public function getTriggerAt() {
		return $this->triggerAt;
	}

	/**
	 * トリガーを引いた時間(エポック秒)を設定
	 *
	 * @param int $triggerAt トリガーを引いた時間(エポック秒)
	 */
	public function setTriggerAt($triggerAt) {
		$this->triggerAt = $triggerAt;
	}

	/**
	 * トリガーを引いた時間(エポック秒)を設定
	 *
	 * @param int $triggerAt トリガーを引いた時間(エポック秒)
	 * @return self
	 */
	public function withTriggerAt($triggerAt): self {
		$this->setTriggerAt($triggerAt);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return Trigger
	 */
    static function build(array $array)
    {
        $item = new Trigger();
        $item->setUserId(isset($array['userId']) ? $array['userId'] : null);
        $item->setTriggerName(isset($array['triggerName']) ? $array['triggerName'] : null);
        $item->setTriggerAt(isset($array['triggerAt']) ? $array['triggerAt'] : null);
        return $item;
    }

}