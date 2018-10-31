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
class CreateInboxRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateInbox";

	/** @var string 受信ボックス名 */
	private $name;

	/** @var string 説明文 */
	private $description;

	/** @var string サービスクラス */
	private $serviceClass;

	/** @var bool 開封時自動削除 */
	private $autoDelete;

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
	 * 受信ボックス名を取得
	 *
	 * @return string 受信ボックス名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * 受信ボックス名を設定
	 *
	 * @param string $name 受信ボックス名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * 受信ボックス名を設定
	 *
	 * @param string $name 受信ボックス名
	 * @return CreateInboxRequest
	 */
	public function withName($name): CreateInboxRequest {
		$this->setName($name);
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
	 * @return CreateInboxRequest
	 */
	public function withDescription($description): CreateInboxRequest {
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
	 * @return CreateInboxRequest
	 */
	public function withServiceClass($serviceClass): CreateInboxRequest {
		$this->setServiceClass($serviceClass);
		return $this;
	}

	/**
	 * 開封時自動削除を取得
	 *
	 * @return bool 開封時自動削除
	 */
	public function getAutoDelete() {
		return $this->autoDelete;
	}

	/**
	 * 開封時自動削除を設定
	 *
	 * @param bool $autoDelete 開封時自動削除
	 */
	public function setAutoDelete($autoDelete) {
		$this->autoDelete = $autoDelete;
	}

	/**
	 * 開封時自動削除を設定
	 *
	 * @param bool $autoDelete 開封時自動削除
	 * @return CreateInboxRequest
	 */
	public function withAutoDelete($autoDelete): CreateInboxRequest {
		$this->setAutoDelete($autoDelete);
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
	 * @return CreateInboxRequest
	 */
	public function withCooperationUrl($cooperationUrl): CreateInboxRequest {
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
	 * @return CreateInboxRequest
	 */
	public function withReceiveMessageTriggerScript($receiveMessageTriggerScript): CreateInboxRequest {
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
	 * @return CreateInboxRequest
	 */
	public function withReceiveMessageDoneTriggerScript($receiveMessageDoneTriggerScript): CreateInboxRequest {
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
	 * @return CreateInboxRequest
	 */
	public function withReadMessageTriggerScript($readMessageTriggerScript): CreateInboxRequest {
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
	 * @return CreateInboxRequest
	 */
	public function withReadMessageDoneTriggerScript($readMessageDoneTriggerScript): CreateInboxRequest {
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
	 * @return CreateInboxRequest
	 */
	public function withDeleteMessageTriggerScript($deleteMessageTriggerScript): CreateInboxRequest {
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
	 * @return CreateInboxRequest
	 */
	public function withDeleteMessageDoneTriggerScript($deleteMessageDoneTriggerScript): CreateInboxRequest {
		$this->setDeleteMessageDoneTriggerScript($deleteMessageDoneTriggerScript);
		return $this;
	}

}