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

namespace Gs2\Auth\Model;

/**
 * アカウントトークン
 *
 * @author Game Server Services, Inc.
 *
 */
class AccountToken {

	/** @var string オーナーID */
	private $ownerId;

	/** @var string GS2-Accountゲーム名 */
	private $gameName;

	/** @var string ユーザID */
	private $userId;

	/** @var int 認証日時(エポック秒) */
	private $timestamp;

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
	 * GS2-Accountゲーム名を取得
	 *
	 * @return string GS2-Accountゲーム名
	 */
	public function getGameName() {
		return $this->gameName;
	}

	/**
	 * GS2-Accountゲーム名を設定
	 *
	 * @param string $gameName GS2-Accountゲーム名
	 */
	public function setGameName($gameName) {
		$this->gameName = $gameName;
	}

	/**
	 * GS2-Accountゲーム名を設定
	 *
	 * @param string $gameName GS2-Accountゲーム名
	 * @return self
	 */
	public function withGameName($gameName): self {
		$this->setGameName($gameName);
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
	 * @return self
	 */
	public function withUserId($userId): self {
		$this->setUserId($userId);
		return $this;
	}

	/**
	 * 認証日時(エポック秒)を取得
	 *
	 * @return int 認証日時(エポック秒)
	 */
	public function getTimestamp() {
		return $this->timestamp;
	}

	/**
	 * 認証日時(エポック秒)を設定
	 *
	 * @param int $timestamp 認証日時(エポック秒)
	 */
	public function setTimestamp($timestamp) {
		$this->timestamp = $timestamp;
	}

	/**
	 * 認証日時(エポック秒)を設定
	 *
	 * @param int $timestamp 認証日時(エポック秒)
	 * @return self
	 */
	public function withTimestamp($timestamp): self {
		$this->setTimestamp($timestamp);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return AccountToken
	 */
    static function build(array $array)
    {
        $item = new AccountToken();
        $item->setOwnerId(isset($array['ownerId']) ? $array['ownerId'] : null);
        $item->setGameName(isset($array['gameName']) ? $array['gameName'] : null);
        $item->setUserId(isset($array['userId']) ? $array['userId'] : null);
        $item->setTimestamp(isset($array['timestamp']) ? $array['timestamp'] : null);
        return $item;
    }

}