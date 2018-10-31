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
 * メッセージログ
 *
 * @author Game Server Services, Inc.
 *
 */
class MessageLog {

	/** @var string メッセージID */
	private $messageId;

	/** @var string ルームID */
	private $roomId;

	/** @var string 発言者ユーザID */
	private $userId;

	/** @var string メッセージテキスト */
	private $message;

	/** @var string メッセージメタデータ */
	private $meta;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/**
	 * メッセージIDを取得
	 *
	 * @return string メッセージID
	 */
	public function getMessageId() {
		return $this->messageId;
	}

	/**
	 * メッセージIDを設定
	 *
	 * @param string $messageId メッセージID
	 */
	public function setMessageId($messageId) {
		$this->messageId = $messageId;
	}

	/**
	 * メッセージIDを設定
	 *
	 * @param string $messageId メッセージID
	 * @return self
	 */
	public function withMessageId($messageId): self {
		$this->setMessageId($messageId);
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
	 * @return self
	 */
	public function withRoomId($roomId): self {
		$this->setRoomId($roomId);
		return $this;
	}

	/**
	 * 発言者ユーザIDを取得
	 *
	 * @return string 発言者ユーザID
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 * 発言者ユーザIDを設定
	 *
	 * @param string $userId 発言者ユーザID
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
	}

	/**
	 * 発言者ユーザIDを設定
	 *
	 * @param string $userId 発言者ユーザID
	 * @return self
	 */
	public function withUserId($userId): self {
		$this->setUserId($userId);
		return $this;
	}

	/**
	 * メッセージテキストを取得
	 *
	 * @return string メッセージテキスト
	 */
	public function getMessage() {
		return $this->message;
	}

	/**
	 * メッセージテキストを設定
	 *
	 * @param string $message メッセージテキスト
	 */
	public function setMessage($message) {
		$this->message = $message;
	}

	/**
	 * メッセージテキストを設定
	 *
	 * @param string $message メッセージテキスト
	 * @return self
	 */
	public function withMessage($message): self {
		$this->setMessage($message);
		return $this;
	}

	/**
	 * メッセージメタデータを取得
	 *
	 * @return string メッセージメタデータ
	 */
	public function getMeta() {
		return $this->meta;
	}

	/**
	 * メッセージメタデータを設定
	 *
	 * @param string $meta メッセージメタデータ
	 */
	public function setMeta($meta) {
		$this->meta = $meta;
	}

	/**
	 * メッセージメタデータを設定
	 *
	 * @param string $meta メッセージメタデータ
	 * @return self
	 */
	public function withMeta($meta): self {
		$this->setMeta($meta);
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
	 * @return MessageLog
	 */
    static function build(array $array)
    {
        $item = new MessageLog();
        $item->setMessageId(isset($array['messageId']) ? $array['messageId'] : null);
        $item->setRoomId(isset($array['roomId']) ? $array['roomId'] : null);
        $item->setUserId(isset($array['userId']) ? $array['userId'] : null);
        $item->setMessage(isset($array['message']) ? $array['message'] : null);
        $item->setMeta(isset($array['meta']) ? $array['meta'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        return $item;
    }

}