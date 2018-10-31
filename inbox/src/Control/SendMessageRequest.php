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

namespace Gs2\Inbox\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class SendMessageRequest extends Gs2BasicRequest {

    const FUNCTION = "SendMessage";

	/** @var string 受信ボックスの名前を指定します。 */
	private $inboxName;

	/** @var string メッセージを送信する相手のユーザID */
	private $userId;

	/** @var string 送信するメッセージ本文 */
	private $message;

	/** @var bool true を設定すると、メッセージ開封時に受信ボックスに指定された連携用URLにメッセージIDが通知されます */
	private $cooperation;


	/**
	 * 受信ボックスの名前を指定します。を取得
	 *
	 * @return string 受信ボックスの名前を指定します。
	 */
	public function getInboxName() {
		return $this->inboxName;
	}

	/**
	 * 受信ボックスの名前を指定します。を設定
	 *
	 * @param string $inboxName 受信ボックスの名前を指定します。
	 */
	public function setInboxName($inboxName) {
		$this->inboxName = $inboxName;
	}

	/**
	 * 受信ボックスの名前を指定します。を設定
	 *
	 * @param string $inboxName 受信ボックスの名前を指定します。
	 * @return SendMessageRequest
	 */
	public function withInboxName($inboxName): SendMessageRequest {
		$this->setInboxName($inboxName);
		return $this;
	}

	/**
	 * メッセージを送信する相手のユーザIDを取得
	 *
	 * @return string メッセージを送信する相手のユーザID
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 * メッセージを送信する相手のユーザIDを設定
	 *
	 * @param string $userId メッセージを送信する相手のユーザID
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
	}

	/**
	 * メッセージを送信する相手のユーザIDを設定
	 *
	 * @param string $userId メッセージを送信する相手のユーザID
	 * @return SendMessageRequest
	 */
	public function withUserId($userId): SendMessageRequest {
		$this->setUserId($userId);
		return $this;
	}

	/**
	 * 送信するメッセージ本文を取得
	 *
	 * @return string 送信するメッセージ本文
	 */
	public function getMessage() {
		return $this->message;
	}

	/**
	 * 送信するメッセージ本文を設定
	 *
	 * @param string $message 送信するメッセージ本文
	 */
	public function setMessage($message) {
		$this->message = $message;
	}

	/**
	 * 送信するメッセージ本文を設定
	 *
	 * @param string $message 送信するメッセージ本文
	 * @return SendMessageRequest
	 */
	public function withMessage($message): SendMessageRequest {
		$this->setMessage($message);
		return $this;
	}

	/**
	 * true を設定すると、メッセージ開封時に受信ボックスに指定された連携用URLにメッセージIDが通知されますを取得
	 *
	 * @return bool true を設定すると、メッセージ開封時に受信ボックスに指定された連携用URLにメッセージIDが通知されます
	 */
	public function getCooperation() {
		return $this->cooperation;
	}

	/**
	 * true を設定すると、メッセージ開封時に受信ボックスに指定された連携用URLにメッセージIDが通知されますを設定
	 *
	 * @param bool $cooperation true を設定すると、メッセージ開封時に受信ボックスに指定された連携用URLにメッセージIDが通知されます
	 */
	public function setCooperation($cooperation) {
		$this->cooperation = $cooperation;
	}

	/**
	 * true を設定すると、メッセージ開封時に受信ボックスに指定された連携用URLにメッセージIDが通知されますを設定
	 *
	 * @param bool $cooperation true を設定すると、メッセージ開封時に受信ボックスに指定された連携用URLにメッセージIDが通知されます
	 * @return SendMessageRequest
	 */
	public function withCooperation($cooperation): SendMessageRequest {
		$this->setCooperation($cooperation);
		return $this;
	}

}