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
class DeleteMessagesRequest extends Gs2UserRequest {

    const FUNCTION = "DeleteMessages";

	/** @var string 受信ボックスの名前を指定します。 */
	private $inboxName;

	/** @var string 削除するメッセージのメッセージIDのリストを指定します。 */
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
	 * @return DeleteMessagesRequest
	 */
	public function withInboxName($inboxName): DeleteMessagesRequest {
		$this->setInboxName($inboxName);
		return $this;
	}

	/**
	 * 削除するメッセージのメッセージIDのリストを指定します。を取得
	 *
	 * @return string 削除するメッセージのメッセージIDのリストを指定します。
	 */
	public function getMessageIds() {
		return $this->messageIds;
	}

	/**
	 * 削除するメッセージのメッセージIDのリストを指定します。を設定
	 *
	 * @param string $messageIds 削除するメッセージのメッセージIDのリストを指定します。
	 */
	public function setMessageIds($messageIds) {
		$this->messageIds = $messageIds;
	}

	/**
	 * 削除するメッセージのメッセージIDのリストを指定します。を設定
	 *
	 * @param string $messageIds 削除するメッセージのメッセージIDのリストを指定します。
	 * @return DeleteMessagesRequest
	 */
	public function withMessageIds($messageIds): DeleteMessagesRequest {
		$this->setMessageIds($messageIds);
		return $this;
	}

}