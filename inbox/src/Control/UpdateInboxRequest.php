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
class UpdateInboxRequest extends Gs2BasicRequest {

    const FUNCTION = "UpdateInbox";

	/** @var string 受信ボックスの名前を指定します。 */
	private $inboxName;

	/** @var string 説明文 */
	private $description;

	/** @var string サービスクラス */
	private $serviceClass;

	/** @var string メッセージの開封通知先URL */
	private $cooperationUrl;

	/** @var string メッセージ受信時 に実行されるGS2-Script */
	private $receiveMessageTriggerScript;

	/** @var string メッセージ受信完了時 に実行されるGS2-Script */
	private $receiveMessageDoneTriggerScript;

	/** @var string メッセージ開封時 に実行されるGS2-Script */
	private $readMessageTriggerScript;

	/** @var string メッセージ開封完了時 に実行されるGS2-Script */
	private $readMessageDoneTriggerScript;

	/** @var string メッセージ削除時 に実行されるGS2-Script */
	private $deleteMessageTriggerScript;

	/** @var string メッセージ削除完了時 に実行されるGS2-Script */
	private $deleteMessageDoneTriggerScript;


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
	 * @return UpdateInboxRequest
	 */
	public function withInboxName($inboxName): UpdateInboxRequest {
		$this->setInboxName($inboxName);
		return $this;
	}

	/**
	 * 説明文を取得
	 *
	 * @return string 説明文
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * 説明文を設定
	 *
	 * @param string $description 説明文
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * 説明文を設定
	 *
	 * @param string $description 説明文
	 * @return UpdateInboxRequest
	 */
	public function withDescription($description): UpdateInboxRequest {
		$this->setDescription($description);
		return $this;
	}

	/**
	 * サービスクラスを取得
	 *
	 * @return string サービスクラス
	 */
	public function getServiceClass() {
		return $this->serviceClass;
	}

	/**
	 * サービスクラスを設定
	 *
	 * @param string $serviceClass サービスクラス
	 */
	public function setServiceClass($serviceClass) {
		$this->serviceClass = $serviceClass;
	}

	/**
	 * サービスクラスを設定
	 *
	 * @param string $serviceClass サービスクラス
	 * @return UpdateInboxRequest
	 */
	public function withServiceClass($serviceClass): UpdateInboxRequest {
		$this->setServiceClass($serviceClass);
		return $this;
	}

	/**
	 * メッセージの開封通知先URLを取得
	 *
	 * @return string メッセージの開封通知先URL
	 */
	public function getCooperationUrl() {
		return $this->cooperationUrl;
	}

	/**
	 * メッセージの開封通知先URLを設定
	 *
	 * @param string $cooperationUrl メッセージの開封通知先URL
	 */
	public function setCooperationUrl($cooperationUrl) {
		$this->cooperationUrl = $cooperationUrl;
	}

	/**
	 * メッセージの開封通知先URLを設定
	 *
	 * @param string $cooperationUrl メッセージの開封通知先URL
	 * @return UpdateInboxRequest
	 */
	public function withCooperationUrl($cooperationUrl): UpdateInboxRequest {
		$this->setCooperationUrl($cooperationUrl);
		return $this;
	}

	/**
	 * メッセージ受信時 に実行されるGS2-Scriptを取得
	 *
	 * @return string メッセージ受信時 に実行されるGS2-Script
	 */
	public function getReceiveMessageTriggerScript() {
		return $this->receiveMessageTriggerScript;
	}

	/**
	 * メッセージ受信時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $receiveMessageTriggerScript メッセージ受信時 に実行されるGS2-Script
	 */
	public function setReceiveMessageTriggerScript($receiveMessageTriggerScript) {
		$this->receiveMessageTriggerScript = $receiveMessageTriggerScript;
	}

	/**
	 * メッセージ受信時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $receiveMessageTriggerScript メッセージ受信時 に実行されるGS2-Script
	 * @return UpdateInboxRequest
	 */
	public function withReceiveMessageTriggerScript($receiveMessageTriggerScript): UpdateInboxRequest {
		$this->setReceiveMessageTriggerScript($receiveMessageTriggerScript);
		return $this;
	}

	/**
	 * メッセージ受信完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string メッセージ受信完了時 に実行されるGS2-Script
	 */
	public function getReceiveMessageDoneTriggerScript() {
		return $this->receiveMessageDoneTriggerScript;
	}

	/**
	 * メッセージ受信完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $receiveMessageDoneTriggerScript メッセージ受信完了時 に実行されるGS2-Script
	 */
	public function setReceiveMessageDoneTriggerScript($receiveMessageDoneTriggerScript) {
		$this->receiveMessageDoneTriggerScript = $receiveMessageDoneTriggerScript;
	}

	/**
	 * メッセージ受信完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $receiveMessageDoneTriggerScript メッセージ受信完了時 に実行されるGS2-Script
	 * @return UpdateInboxRequest
	 */
	public function withReceiveMessageDoneTriggerScript($receiveMessageDoneTriggerScript): UpdateInboxRequest {
		$this->setReceiveMessageDoneTriggerScript($receiveMessageDoneTriggerScript);
		return $this;
	}

	/**
	 * メッセージ開封時 に実行されるGS2-Scriptを取得
	 *
	 * @return string メッセージ開封時 に実行されるGS2-Script
	 */
	public function getReadMessageTriggerScript() {
		return $this->readMessageTriggerScript;
	}

	/**
	 * メッセージ開封時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $readMessageTriggerScript メッセージ開封時 に実行されるGS2-Script
	 */
	public function setReadMessageTriggerScript($readMessageTriggerScript) {
		$this->readMessageTriggerScript = $readMessageTriggerScript;
	}

	/**
	 * メッセージ開封時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $readMessageTriggerScript メッセージ開封時 に実行されるGS2-Script
	 * @return UpdateInboxRequest
	 */
	public function withReadMessageTriggerScript($readMessageTriggerScript): UpdateInboxRequest {
		$this->setReadMessageTriggerScript($readMessageTriggerScript);
		return $this;
	}

	/**
	 * メッセージ開封完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string メッセージ開封完了時 に実行されるGS2-Script
	 */
	public function getReadMessageDoneTriggerScript() {
		return $this->readMessageDoneTriggerScript;
	}

	/**
	 * メッセージ開封完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $readMessageDoneTriggerScript メッセージ開封完了時 に実行されるGS2-Script
	 */
	public function setReadMessageDoneTriggerScript($readMessageDoneTriggerScript) {
		$this->readMessageDoneTriggerScript = $readMessageDoneTriggerScript;
	}

	/**
	 * メッセージ開封完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $readMessageDoneTriggerScript メッセージ開封完了時 に実行されるGS2-Script
	 * @return UpdateInboxRequest
	 */
	public function withReadMessageDoneTriggerScript($readMessageDoneTriggerScript): UpdateInboxRequest {
		$this->setReadMessageDoneTriggerScript($readMessageDoneTriggerScript);
		return $this;
	}

	/**
	 * メッセージ削除時 に実行されるGS2-Scriptを取得
	 *
	 * @return string メッセージ削除時 に実行されるGS2-Script
	 */
	public function getDeleteMessageTriggerScript() {
		return $this->deleteMessageTriggerScript;
	}

	/**
	 * メッセージ削除時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $deleteMessageTriggerScript メッセージ削除時 に実行されるGS2-Script
	 */
	public function setDeleteMessageTriggerScript($deleteMessageTriggerScript) {
		$this->deleteMessageTriggerScript = $deleteMessageTriggerScript;
	}

	/**
	 * メッセージ削除時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $deleteMessageTriggerScript メッセージ削除時 に実行されるGS2-Script
	 * @return UpdateInboxRequest
	 */
	public function withDeleteMessageTriggerScript($deleteMessageTriggerScript): UpdateInboxRequest {
		$this->setDeleteMessageTriggerScript($deleteMessageTriggerScript);
		return $this;
	}

	/**
	 * メッセージ削除完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string メッセージ削除完了時 に実行されるGS2-Script
	 */
	public function getDeleteMessageDoneTriggerScript() {
		return $this->deleteMessageDoneTriggerScript;
	}

	/**
	 * メッセージ削除完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $deleteMessageDoneTriggerScript メッセージ削除完了時 に実行されるGS2-Script
	 */
	public function setDeleteMessageDoneTriggerScript($deleteMessageDoneTriggerScript) {
		$this->deleteMessageDoneTriggerScript = $deleteMessageDoneTriggerScript;
	}

	/**
	 * メッセージ削除完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $deleteMessageDoneTriggerScript メッセージ削除完了時 に実行されるGS2-Script
	 * @return UpdateInboxRequest
	 */
	public function withDeleteMessageDoneTriggerScript($deleteMessageDoneTriggerScript): UpdateInboxRequest {
		$this->setDeleteMessageDoneTriggerScript($deleteMessageDoneTriggerScript);
		return $this;
	}

}