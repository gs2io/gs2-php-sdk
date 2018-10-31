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

namespace Gs2\Account\Model;

/**
 * 引き継ぎ情報
 *
 * @author Game Server Services, Inc.
 *
 */
class TakeOver {

	/** @var string ユーザID */
	private $userId;

	/** @var int アカウント種別 */
	private $type;

	/** @var string ユーザ識別子 */
	private $userIdentifier;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

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
	 * アカウント種別を取得
	 *
	 * @return int アカウント種別
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * アカウント種別を設定
	 *
	 * @param int $type アカウント種別
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * アカウント種別を設定
	 *
	 * @param int $type アカウント種別
	 * @return self
	 */
	public function withType($type): self {
		$this->setType($type);
		return $this;
	}

	/**
	 * ユーザ識別子を取得
	 *
	 * @return string ユーザ識別子
	 */
	public function getUserIdentifier() {
		return $this->userIdentifier;
	}

	/**
	 * ユーザ識別子を設定
	 *
	 * @param string $userIdentifier ユーザ識別子
	 */
	public function setUserIdentifier($userIdentifier) {
		$this->userIdentifier = $userIdentifier;
	}

	/**
	 * ユーザ識別子を設定
	 *
	 * @param string $userIdentifier ユーザ識別子
	 * @return self
	 */
	public function withUserIdentifier($userIdentifier): self {
		$this->setUserIdentifier($userIdentifier);
		return $this;
	}

	/**
	 * 作成日時(エポック秒)を取得
	 *
	 * @return int 作成日時(エポック秒)
	 */
	public function getCreateAt() {
		return $this->createAt;
	}

	/**
	 * 作成日時(エポック秒)を設定
	 *
	 * @param int $createAt 作成日時(エポック秒)
	 */
	public function setCreateAt($createAt) {
		$this->createAt = $createAt;
	}

	/**
	 * 作成日時(エポック秒)を設定
	 *
	 * @param int $createAt 作成日時(エポック秒)
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
	 * @return TakeOver
	 */
    static function build(array $array)
    {
        $item = new TakeOver();
        $item->setUserId(isset($array['userId']) ? $array['userId'] : null);
        $item->setType(isset($array['type']) ? $array['type'] : null);
        $item->setUserIdentifier(isset($array['userIdentifier']) ? $array['userIdentifier'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        return $item;
    }

}