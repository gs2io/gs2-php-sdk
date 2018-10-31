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

namespace Gs2\Identifier\Model;

/**
 * ユーザ
 *
 * @author Game Server Services, Inc.
 *
 */
class User {

	/** @var string ユーザGRN */
	private $userId;

	/** @var string オーナーID */
	private $ownerId;

	/** @var string ユーザ名 */
	private $name;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/**
	 * ユーザGRNを取得
	 *
	 * @return string ユーザGRN
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 * ユーザGRNを設定
	 *
	 * @param string $userId ユーザGRN
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
	}

	/**
	 * ユーザGRNを設定
	 *
	 * @param string $userId ユーザGRN
	 * @return self
	 */
	public function withUserId($userId): self {
		$this->setUserId($userId);
		return $this;
	}

	/**
	 * オーナーIDを取得
	 *
	 * @return string オーナーID
	 */
	public function getOwnerId() {
		return $this->ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string $ownerId オーナーID
	 */
	public function setOwnerId($ownerId) {
		$this->ownerId = $ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string $ownerId オーナーID
	 * @return self
	 */
	public function withOwnerId($ownerId): self {
		$this->setOwnerId($ownerId);
		return $this;
	}

	/**
	 * ユーザ名を取得
	 *
	 * @return string ユーザ名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * ユーザ名を設定
	 *
	 * @param string $name ユーザ名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * ユーザ名を設定
	 *
	 * @param string $name ユーザ名
	 * @return self
	 */
	public function withName($name): self {
		$this->setName($name);
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
	 * @return User
	 */
    static function build(array $array)
    {
        $item = new User();
        $item->setUserId(isset($array['userId']) ? $array['userId'] : null);
        $item->setOwnerId(isset($array['ownerId']) ? $array['ownerId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        return $item;
    }

}