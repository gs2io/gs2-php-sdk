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

namespace Gs2\Stamina\Model;

/**
 * スタミナ
 *
 * @author Game Server Services, Inc.
 *
 */
class Stamina {

	/** @var string ユーザID */
	private $userId;

	/** @var int スタミナ値 */
	private $value;

	/** @var int 最大値を超えて保持しているスタミナ値 */
	private $overflow;

	/** @var int 最終更新日時(エポック秒) */
	private $lastUpdateAt;

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
	 * スタミナ値を取得
	 *
	 * @return int スタミナ値
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * スタミナ値を設定
	 *
	 * @param int $value スタミナ値
	 */
	public function setValue($value) {
		$this->value = $value;
	}

	/**
	 * スタミナ値を設定
	 *
	 * @param int $value スタミナ値
	 * @return self
	 */
	public function withValue($value): self {
		$this->setValue($value);
		return $this;
	}

	/**
	 * 最大値を超えて保持しているスタミナ値を取得
	 *
	 * @return int 最大値を超えて保持しているスタミナ値
	 */
	public function getOverflow() {
		return $this->overflow;
	}

	/**
	 * 最大値を超えて保持しているスタミナ値を設定
	 *
	 * @param int $overflow 最大値を超えて保持しているスタミナ値
	 */
	public function setOverflow($overflow) {
		$this->overflow = $overflow;
	}

	/**
	 * 最大値を超えて保持しているスタミナ値を設定
	 *
	 * @param int $overflow 最大値を超えて保持しているスタミナ値
	 * @return self
	 */
	public function withOverflow($overflow): self {
		$this->setOverflow($overflow);
		return $this;
	}

	/**
	 * 最終更新日時(エポック秒)を取得
	 *
	 * @return int 最終更新日時(エポック秒)
	 */
	public function getLastUpdateAt() {
		return $this->lastUpdateAt;
	}

	/**
	 * 最終更新日時(エポック秒)を設定
	 *
	 * @param int $lastUpdateAt 最終更新日時(エポック秒)
	 */
	public function setLastUpdateAt($lastUpdateAt) {
		$this->lastUpdateAt = $lastUpdateAt;
	}

	/**
	 * 最終更新日時(エポック秒)を設定
	 *
	 * @param int $lastUpdateAt 最終更新日時(エポック秒)
	 * @return self
	 */
	public function withLastUpdateAt($lastUpdateAt): self {
		$this->setLastUpdateAt($lastUpdateAt);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return Stamina
	 */
    static function build(array $array)
    {
        $item = new Stamina();
        $item->setUserId(isset($array['userId']) ? $array['userId'] : null);
        $item->setValue(isset($array['value']) ? $array['value'] : null);
        $item->setOverflow(isset($array['overflow']) ? $array['overflow'] : null);
        $item->setLastUpdateAt(isset($array['lastUpdateAt']) ? $array['lastUpdateAt'] : null);
        return $item;
    }

}