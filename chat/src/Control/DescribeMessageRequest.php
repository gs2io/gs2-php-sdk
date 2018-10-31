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

namespace Gs2\Chat\Control;

use Gs2\Core\Control\Gs2UserRequest;

/**
 * @author Game Server Services, Inc.
 */
class DescribeMessageRequest extends Gs2UserRequest {

    const FUNCTION = "DescribeMessage";

	/** @var string ロビーの名前 */
	private $lobbyName;

	/** @var string ルームID */
	private $roomId;

	/** @var string パスワード */
	private $password;

	/** @var int メッセージの取得を開始する日時(エポック秒) */
	private $startAt;

	/** @var int データの取得件数 */
	private $limit;


	/**
	 * ロビーの名前を取得
	 *
	 * @return string ロビーの名前
	 */
	public function getLobbyName() {
		return $this->lobbyName;
	}

	/**
	 * ロビーの名前を設定
	 *
	 * @param string $lobbyName ロビーの名前
	 */
	public function setLobbyName($lobbyName) {
		$this->lobbyName = $lobbyName;
	}

	/**
	 * ロビーの名前を設定
	 *
	 * @param string $lobbyName ロビーの名前
	 * @return DescribeMessageRequest
	 */
	public function withLobbyName($lobbyName): DescribeMessageRequest {
		$this->setLobbyName($lobbyName);
		return $this;
	}

	/**
	 * ルームIDを取得
	 *
	 * @return string ルームID
	 */
	public function getRoomId() {
		return $this->roomId;
	}

	/**
	 * ルームIDを設定
	 *
	 * @param string $roomId ルームID
	 */
	public function setRoomId($roomId) {
		$this->roomId = $roomId;
	}

	/**
	 * ルームIDを設定
	 *
	 * @param string $roomId ルームID
	 * @return DescribeMessageRequest
	 */
	public function withRoomId($roomId): DescribeMessageRequest {
		$this->setRoomId($roomId);
		return $this;
	}

	/**
	 * パスワードを取得
	 *
	 * @return string パスワード
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * パスワードを設定
	 *
	 * @param string $password パスワード
	 */
	public function setPassword($password) {
		$this->password = $password;
	}

	/**
	 * パスワードを設定
	 *
	 * @param string $password パスワード
	 * @return DescribeMessageRequest
	 */
	public function withPassword($password): DescribeMessageRequest {
		$this->setPassword($password);
		return $this;
	}

	/**
	 * メッセージの取得を開始する日時(エポック秒)を取得
	 *
	 * @return int メッセージの取得を開始する日時(エポック秒)
	 */
	public function getStartAt() {
		return $this->startAt;
	}

	/**
	 * メッセージの取得を開始する日時(エポック秒)を設定
	 *
	 * @param int $startAt メッセージの取得を開始する日時(エポック秒)
	 */
	public function setStartAt($startAt) {
		$this->startAt = $startAt;
	}

	/**
	 * メッセージの取得を開始する日時(エポック秒)を設定
	 *
	 * @param int $startAt メッセージの取得を開始する日時(エポック秒)
	 * @return DescribeMessageRequest
	 */
	public function withStartAt($startAt): DescribeMessageRequest {
		$this->setStartAt($startAt);
		return $this;
	}

	/**
	 * データの取得件数を取得
	 *
	 * @return int データの取得件数
	 */
	public function getLimit() {
		return $this->limit;
	}

	/**
	 * データの取得件数を設定
	 *
	 * @param int $limit データの取得件数
	 */
	public function setLimit($limit) {
		$this->limit = $limit;
	}

	/**
	 * データの取得件数を設定
	 *
	 * @param int $limit データの取得件数
	 * @return DescribeMessageRequest
	 */
	public function withLimit($limit): DescribeMessageRequest {
		$this->setLimit($limit);
		return $this;
	}

}