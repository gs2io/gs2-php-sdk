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

namespace Gs2\Chat\Model;

/**
 * ルーム
 *
 * @author Game Server Services, Inc.
 *
 */
class Room {

	/** @var string ルームID */
	private $roomId;

	/** @var array 参加可能なユーザIDリスト */
	private $allowUserIds;

	/** @var bool メッセージの送受信にパスワードが必要か */
	private $needPassword;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

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
	 * @return self
	 */
	public function withRoomId($roomId): self {
		$this->setRoomId($roomId);
		return $this;
	}

	/**
	 * 参加可能なユーザIDリストを取得
	 *
	 * @return array 参加可能なユーザIDリスト
	 */
	public function getAllowUserIds() {
		return $this->allowUserIds;
	}

	/**
	 * 参加可能なユーザIDリストを設定
	 *
	 * @param array $allowUserIds 参加可能なユーザIDリスト
	 */
	public function setAllowUserIds($allowUserIds) {
		$this->allowUserIds = $allowUserIds;
	}

	/**
	 * 参加可能なユーザIDリストを設定
	 *
	 * @param array $allowUserIds 参加可能なユーザIDリスト
	 * @return self
	 */
	public function withAllowUserIds($allowUserIds): self {
		$this->setAllowUserIds($allowUserIds);
		return $this;
	}

	/**
	 * メッセージの送受信にパスワードが必要かを取得
	 *
	 * @return bool メッセージの送受信にパスワードが必要か
	 */
	public function getNeedPassword() {
		return $this->needPassword;
	}

	/**
	 * メッセージの送受信にパスワードが必要かを設定
	 *
	 * @param bool $needPassword メッセージの送受信にパスワードが必要か
	 */
	public function setNeedPassword($needPassword) {
		$this->needPassword = $needPassword;
	}

	/**
	 * メッセージの送受信にパスワードが必要かを設定
	 *
	 * @param bool $needPassword メッセージの送受信にパスワードが必要か
	 * @return self
	 */
	public function withNeedPassword($needPassword): self {
		$this->setNeedPassword($needPassword);
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
	 * @return Room
	 */
    static function build(array $array)
    {
        $item = new Room();
        $item->setRoomId(isset($array['roomId']) ? $array['roomId'] : null);
        $item->setAllowUserIds(isset($array['allowUserIds']) ? $array['allowUserIds'] : null);
        $item->setNeedPassword(isset($array['needPassword']) ? $array['needPassword'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        return $item;
    }

}