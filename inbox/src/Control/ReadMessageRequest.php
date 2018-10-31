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

use Gs2\Core\Control\Gs2UserRequest;

/**
 * @author Game Server Services, Inc.
 */
class ReadMessageRequest extends Gs2UserRequest {

    const FUNCTION = "ReadMessage";

	/** @var string 受信ボックスの名前を指定します。 */
	private $inboxName;

	/** @var string 開封するメッセージIDを指定します。 */
	private $messageId;


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
	 * @return ReadMessageRequest
	 */
	public function withInboxName($inboxName): ReadMessageRequest {
		$this->setInboxName($inboxName);
		return $this;
	}

	/**
	 * 開封するメッセージIDを指定します。を取得
	 *
	 * @return string 開封するメッセージIDを指定します。
	 */
	public function getMessageId() {
		return $this->messageId;
	}

	/**
	 * 開封するメッセージIDを指定します。を設定
	 *
	 * @param string $messageId 開封するメッセージIDを指定します。
	 */
	public function setMessageId($messageId) {
		$this->messageId = $messageId;
	}

	/**
	 * 開封するメッセージIDを指定します。を設定
	 *
	 * @param string $messageId 開封するメッセージIDを指定します。
	 * @return ReadMessageRequest
	 */
	public function withMessageId($messageId): ReadMessageRequest {
		$this->setMessageId($messageId);
		return $this;
	}

}