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
class ReadMessagesRequest extends Gs2UserRequest {

    const FUNCTION = "ReadMessages";

	/** @var string 受信ボックスの名前を指定します。 */
	private $inboxName;

	/** @var string カンマ区切りの開封するメッセージのメッセージIDリスト */
	private $messageIds;


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
	 * @return ReadMessagesRequest
	 */
	public function withInboxName($inboxName): ReadMessagesRequest {
		$this->setInboxName($inboxName);
		return $this;
	}

	/**
	 * カンマ区切りの開封するメッセージのメッセージIDリストを取得
	 *
	 * @return string カンマ区切りの開封するメッセージのメッセージIDリスト
	 */
	public function getMessageIds() {
		return $this->messageIds;
	}

	/**
	 * カンマ区切りの開封するメッセージのメッセージIDリストを設定
	 *
	 * @param string $messageIds カンマ区切りの開封するメッセージのメッセージIDリスト
	 */
	public function setMessageIds($messageIds) {
		$this->messageIds = $messageIds;
	}

	/**
	 * カンマ区切りの開封するメッセージのメッセージIDリストを設定
	 *
	 * @param string $messageIds カンマ区切りの開封するメッセージのメッセージIDリスト
	 * @return ReadMessagesRequest
	 */
	public function withMessageIds($messageIds): ReadMessagesRequest {
		$this->setMessageIds($messageIds);
		return $this;
	}

}