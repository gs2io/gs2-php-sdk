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

namespace Gs2\Inbox\Model;

/**
 * メッセージ
 *
 * @author Game Server Services, Inc.
 *
 */
class Message {

	/** @var string メッセージID */
	private $messageId;

	/** @var string 受信ボックスGRN */
	private $inboxId;

	/** @var string 発言者ユーザID */
	private $userId;

	/** @var string メッセージ本文 */
	private $message;

	/** @var bool 開封時に通知を出すか */
	private $cooperation;

	/** @var bool 既読状態 */
	private $read;

	/** @var int 受信日時(エポック秒) */
	private $date;

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
	 * 受信ボックスGRNを取得
	 *
	 * @return string 受信ボックスGRN
	 */
	public function getInboxId() {
		return $this->inboxId;
	}

	/**
	 * 受信ボックスGRNを設定
	 *
	 * @param string $inboxId 受信ボックスGRN
	 */
	public function setInboxId($inboxId) {
		$this->inboxId = $inboxId;
	}

	/**
	 * 受信ボックスGRNを設定
	 *
	 * @param string $inboxId 受信ボックスGRN
	 * @return self
	 */
	public function withInboxId($inboxId): self {
		$this->setInboxId($inboxId);
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
	 * メッセージ本文を取得
	 *
	 * @return string メッセージ本文
	 */
	public function getMessage() {
		return $this->message;
	}

	/**
	 * メッセージ本文を設定
	 *
	 * @param string $message メッセージ本文
	 */
	public function setMessage($message) {
		$this->message = $message;
	}

	/**
	 * メッセージ本文を設定
	 *
	 * @param string $message メッセージ本文
	 * @return self
	 */
	public function withMessage($message): self {
		$this->setMessage($message);
		return $this;
	}

	/**
	 * 開封時に通知を出すかを取得
	 *
	 * @return bool 開封時に通知を出すか
	 */
	public function getCooperation() {
		return $this->cooperation;
	}

	/**
	 * 開封時に通知を出すかを設定
	 *
	 * @param bool $cooperation 開封時に通知を出すか
	 */
	public function setCooperation($cooperation) {
		$this->cooperation = $cooperation;
	}

	/**
	 * 開封時に通知を出すかを設定
	 *
	 * @param bool $cooperation 開封時に通知を出すか
	 * @return self
	 */
	public function withCooperation($cooperation): self {
		$this->setCooperation($cooperation);
		return $this;
	}

	/**
	 * 既読状態を取得
	 *
	 * @return bool 既読状態
	 */
	public function getRead() {
		return $this->read;
	}

	/**
	 * 既読状態を設定
	 *
	 * @param bool $read 既読状態
	 */
	public function setRead($read) {
		$this->read = $read;
	}

	/**
	 * 既読状態を設定
	 *
	 * @param bool $read 既読状態
	 * @return self
	 */
	public function withRead($read): self {
		$this->setRead($read);
		return $this;
	}

	/**
	 * 受信日時(エポック秒)を取得
	 *
	 * @return int 受信日時(エポック秒)
	 */
	public function getDate() {
		return $this->date;
	}

	/**
	 * 受信日時(エポック秒)を設定
	 *
	 * @param int $date 受信日時(エポック秒)
	 */
	public function setDate($date) {
		$this->date = $date;
	}

	/**
	 * 受信日時(エポック秒)を設定
	 *
	 * @param int $date 受信日時(エポック秒)
	 * @return self
	 */
	public function withDate($date): self {
		$this->setDate($date);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return Message
	 */
    static function build(array $array)
    {
        $item = new Message();
        $item->setMessageId(isset($array['messageId']) ? $array['messageId'] : null);
        $item->setInboxId(isset($array['inboxId']) ? $array['inboxId'] : null);
        $item->setUserId(isset($array['userId']) ? $array['userId'] : null);
        $item->setMessage(isset($array['message']) ? $array['message'] : null);
        $item->setCooperation(isset($array['cooperation']) ? $array['cooperation'] : null);
        $item->setRead(isset($array['read']) ? $array['read'] : null);
        $item->setDate(isset($array['date']) ? $array['date'] : null);
        return $item;
    }

}