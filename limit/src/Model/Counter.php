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

namespace Gs2\Limit\Model;

/**
 * カウンター
 *
 * @author Game Server Services, Inc.
 *
 */
class Counter {

	/** @var string ユーザID */
	private $userId;

	/** @var string カウンター名 */
	private $counterName;

	/** @var int 現在のカウント値 */
	private $count;

	/** @var int カウントのリミット値 */
	private $limit;

	/** @var int 次回リセット日時(エポック秒) */
	private $nextResetAt;

	/** @var int 最後にカウンターを進めた時間(エポック秒) */
	private $countAt;

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
	 * カウンター名を取得
	 *
	 * @return string カウンター名
	 */
	public function getCounterName() {
		return $this->counterName;
	}

	/**
	 * カウンター名を設定
	 *
	 * @param string $counterName カウンター名
	 */
	public function setCounterName($counterName) {
		$this->counterName = $counterName;
	}

	/**
	 * カウンター名を設定
	 *
	 * @param string $counterName カウンター名
	 * @return self
	 */
	public function withCounterName($counterName): self {
		$this->setCounterName($counterName);
		return $this;
	}

	/**
	 * 現在のカウント値を取得
	 *
	 * @return int 現在のカウント値
	 */
	public function getCount() {
		return $this->count;
	}

	/**
	 * 現在のカウント値を設定
	 *
	 * @param int $count 現在のカウント値
	 */
	public function setCount($count) {
		$this->count = $count;
	}

	/**
	 * 現在のカウント値を設定
	 *
	 * @param int $count 現在のカウント値
	 * @return self
	 */
	public function withCount($count): self {
		$this->setCount($count);
		return $this;
	}

	/**
	 * カウントのリミット値を取得
	 *
	 * @return int カウントのリミット値
	 */
	public function getLimit() {
		return $this->limit;
	}

	/**
	 * カウントのリミット値を設定
	 *
	 * @param int $limit カウントのリミット値
	 */
	public function setLimit($limit) {
		$this->limit = $limit;
	}

	/**
	 * カウントのリミット値を設定
	 *
	 * @param int $limit カウントのリミット値
	 * @return self
	 */
	public function withLimit($limit): self {
		$this->setLimit($limit);
		return $this;
	}

	/**
	 * 次回リセット日時(エポック秒)を取得
	 *
	 * @return int 次回リセット日時(エポック秒)
	 */
	public function getNextResetAt() {
		return $this->nextResetAt;
	}

	/**
	 * 次回リセット日時(エポック秒)を設定
	 *
	 * @param int $nextResetAt 次回リセット日時(エポック秒)
	 */
	public function setNextResetAt($nextResetAt) {
		$this->nextResetAt = $nextResetAt;
	}

	/**
	 * 次回リセット日時(エポック秒)を設定
	 *
	 * @param int $nextResetAt 次回リセット日時(エポック秒)
	 * @return self
	 */
	public function withNextResetAt($nextResetAt): self {
		$this->setNextResetAt($nextResetAt);
		return $this;
	}

	/**
	 * 最後にカウンターを進めた時間(エポック秒)を取得
	 *
	 * @return int 最後にカウンターを進めた時間(エポック秒)
	 */
	public function getCountAt() {
		return $this->countAt;
	}

	/**
	 * 最後にカウンターを進めた時間(エポック秒)を設定
	 *
	 * @param int $countAt 最後にカウンターを進めた時間(エポック秒)
	 */
	public function setCountAt($countAt) {
		$this->countAt = $countAt;
	}

	/**
	 * 最後にカウンターを進めた時間(エポック秒)を設定
	 *
	 * @param int $countAt 最後にカウンターを進めた時間(エポック秒)
	 * @return self
	 */
	public function withCountAt($countAt): self {
		$this->setCountAt($countAt);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return Counter
	 */
    static function build(array $array)
    {
        $item = new Counter();
        $item->setUserId(isset($array['userId']) ? $array['userId'] : null);
        $item->setCounterName(isset($array['counterName']) ? $array['counterName'] : null);
        $item->setCount(isset($array['count']) ? $array['count'] : null);
        $item->setLimit(isset($array['limit']) ? $array['limit'] : null);
        $item->setNextResetAt(isset($array['nextResetAt']) ? $array['nextResetAt'] : null);
        $item->setCountAt(isset($array['countAt']) ? $array['countAt'] : null);
        return $item;
    }

}