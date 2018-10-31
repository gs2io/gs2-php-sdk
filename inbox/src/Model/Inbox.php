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
 * 受信ボックス
 *
 * @author Game Server Services, Inc.
 *
 */
class Inbox {

	/** @var string 受信ボックスGRN */
	private $inboxId;

	/** @var string オーナーID */
	private $ownerId;

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

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

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
	 * オーナーIDを取得
	 *
	 * @return string オーナーID
	 */
	public function getOwnerId() {
		return $this->ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string $ownerId オーナーID
	 */
	public function setOwnerId($ownerId) {
		$this->ownerId = $ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string $ownerId オーナーID
	 * @return self
	 */
	public function withOwnerId($ownerId): self {
		$this->setOwnerId($ownerId);
		return $this;
	}

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
	 * @return self
	 */
	public function withName($name): self {
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
	 * @return self
	 */
	public function withDescription($description): self {
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
	 * @return self
	 */
	public function withServiceClass($serviceClass): self {
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
	 * @return self
	 */
	public function withAutoDelete($autoDelete): self {
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
	 * @return self
	 */
	public function withCooperationUrl($cooperationUrl): self {
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
	 * @return self
	 */
	public function withReceiveMessageTriggerScript($receiveMessageTriggerScript): self {
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
	 * @return self
	 */
	public function withReceiveMessageDoneTriggerScript($receiveMessageDoneTriggerScript): self {
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
	 * @return self
	 */
	public function withReadMessageTriggerScript($readMessageTriggerScript): self {
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
	 * @return self
	 */
	public function withReadMessageDoneTriggerScript($readMessageDoneTriggerScript): self {
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
	 * @return self
	 */
	public function withDeleteMessageTriggerScript($deleteMessageTriggerScript): self {
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
	 * @return self
	 */
	public function withDeleteMessageDoneTriggerScript($deleteMessageDoneTriggerScript): self {
		$this->setDeleteMessageDoneTriggerScript($deleteMessageDoneTriggerScript);
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
	 * 最終更新日時(エポック秒)を取得
	 *
	 * @return int 最終更新日時(エポック秒)
	 */
	public function getUpdateAt() {
		return $this->updateAt;
	}

	/**
	 * 最終更新日時(エポック秒)を設定
	 *
	 * @param int $updateAt 最終更新日時(エポック秒)
	 */
	public function setUpdateAt($updateAt) {
		$this->updateAt = $updateAt;
	}

	/**
	 * 最終更新日時(エポック秒)を設定
	 *
	 * @param int $updateAt 最終更新日時(エポック秒)
	 * @return self
	 */
	public function withUpdateAt($updateAt): self {
		$this->setUpdateAt($updateAt);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return Inbox
	 */
    static function build(array $array)
    {
        $item = new Inbox();
        $item->setInboxId(isset($array['inboxId']) ? $array['inboxId'] : null);
        $item->setOwnerId(isset($array['ownerId']) ? $array['ownerId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setDescription(isset($array['description']) ? $array['description'] : null);
        $item->setServiceClass(isset($array['serviceClass']) ? $array['serviceClass'] : null);
        $item->setAutoDelete(isset($array['autoDelete']) ? $array['autoDelete'] : null);
        $item->setCooperationUrl(isset($array['cooperationUrl']) ? $array['cooperationUrl'] : null);
        $item->setReceiveMessageTriggerScript(isset($array['receiveMessageTriggerScript']) ? $array['receiveMessageTriggerScript'] : null);
        $item->setReceiveMessageDoneTriggerScript(isset($array['receiveMessageDoneTriggerScript']) ? $array['receiveMessageDoneTriggerScript'] : null);
        $item->setReadMessageTriggerScript(isset($array['readMessageTriggerScript']) ? $array['readMessageTriggerScript'] : null);
        $item->setReadMessageDoneTriggerScript(isset($array['readMessageDoneTriggerScript']) ? $array['readMessageDoneTriggerScript'] : null);
        $item->setDeleteMessageTriggerScript(isset($array['deleteMessageTriggerScript']) ? $array['deleteMessageTriggerScript'] : null);
        $item->setDeleteMessageDoneTriggerScript(isset($array['deleteMessageDoneTriggerScript']) ? $array['deleteMessageDoneTriggerScript'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}