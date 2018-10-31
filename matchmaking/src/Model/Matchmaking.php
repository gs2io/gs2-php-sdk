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

namespace Gs2\Matchmaking\Model;

/**
 * マッチメイキング
 *
 * @author Game Server Services, Inc.
 *
 */
class Matchmaking {

	/** @var string マッチメイキングGRN */
	private $matchmakingId;

	/** @var string オーナーID */
	private $ownerId;

	/** @var string マッチメイキング名 */
	private $name;

	/** @var string マッチメイキング方式 */
	private $type;

	/** @var string 説明文 */
	private $description;

	/** @var string サービスクラス */
	private $serviceClass;

	/** @var int 最大プレイヤー数 */
	private $maxPlayer;

	/** @var string マッチメイキング完了時の通知先URL */
	private $callback;

	/** @var string マッチメイキング完了時に GS2-Realtime と自動的に連携する場合に指定するギャザリングプール名 */
	private $gatheringPoolName;

	/** @var string マッチメイキングの状態変化や完了通知を GS2-InGamePushNotification を使用して通知する場合に指定するゲーム名 */
	private $notificationGameName;

	/** @var string ギャザリング作成時 に実行されるGS2-Script */
	private $createGatheringTriggerScript;

	/** @var string ギャザリング作成完了時 に実行されるGS2-Script */
	private $createGatheringDoneTriggerScript;

	/** @var string ギャザリング参加時 に実行されるGS2-Script */
	private $joinGatheringTriggerScript;

	/** @var string ギャザリング参加完了時 に実行されるGS2-Script */
	private $joinGatheringDoneTriggerScript;

	/** @var string ギャザリング離脱時 に実行されるGS2-Script */
	private $leaveGatheringTriggerScript;

	/** @var string ギャザリング離脱完了時 に実行されるGS2-Script */
	private $leaveGatheringDoneTriggerScript;

	/** @var string ギャザリング解散時 に実行されるGS2-Script */
	private $breakupGatheringTriggerScript;

	/** @var string マッチメイキング成立時 に実行されるGS2-Script */
	private $matchmakingCompleteTriggerScript;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * マッチメイキングGRNを取得
	 *
	 * @return string マッチメイキングGRN
	 */
	public function getMatchmakingId() {
		return $this->matchmakingId;
	}

	/**
	 * マッチメイキングGRNを設定
	 *
	 * @param string $matchmakingId マッチメイキングGRN
	 */
	public function setMatchmakingId($matchmakingId) {
		$this->matchmakingId = $matchmakingId;
	}

	/**
	 * マッチメイキングGRNを設定
	 *
	 * @param string $matchmakingId マッチメイキングGRN
	 * @return self
	 */
	public function withMatchmakingId($matchmakingId): self {
		$this->setMatchmakingId($matchmakingId);
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
	 * マッチメイキング名を取得
	 *
	 * @return string マッチメイキング名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * マッチメイキング名を設定
	 *
	 * @param string $name マッチメイキング名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * マッチメイキング名を設定
	 *
	 * @param string $name マッチメイキング名
	 * @return self
	 */
	public function withName($name): self {
		$this->setName($name);
		return $this;
	}

	/**
	 * マッチメイキング方式を取得
	 *
	 * @return string マッチメイキング方式
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * マッチメイキング方式を設定
	 *
	 * @param string $type マッチメイキング方式
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * マッチメイキング方式を設定
	 *
	 * @param string $type マッチメイキング方式
	 * @return self
	 */
	public function withType($type): self {
		$this->setType($type);
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
	 * 最大プレイヤー数を取得
	 *
	 * @return int 最大プレイヤー数
	 */
	public function getMaxPlayer() {
		return $this->maxPlayer;
	}

	/**
	 * 最大プレイヤー数を設定
	 *
	 * @param int $maxPlayer 最大プレイヤー数
	 */
	public function setMaxPlayer($maxPlayer) {
		$this->maxPlayer = $maxPlayer;
	}

	/**
	 * 最大プレイヤー数を設定
	 *
	 * @param int $maxPlayer 最大プレイヤー数
	 * @return self
	 */
	public function withMaxPlayer($maxPlayer): self {
		$this->setMaxPlayer($maxPlayer);
		return $this;
	}

	/**
	 * マッチメイキング完了時の通知先URLを取得
	 *
	 * @return string マッチメイキング完了時の通知先URL
	 */
	public function getCallback() {
		return $this->callback;
	}

	/**
	 * マッチメイキング完了時の通知先URLを設定
	 *
	 * @param string $callback マッチメイキング完了時の通知先URL
	 */
	public function setCallback($callback) {
		$this->callback = $callback;
	}

	/**
	 * マッチメイキング完了時の通知先URLを設定
	 *
	 * @param string $callback マッチメイキング完了時の通知先URL
	 * @return self
	 */
	public function withCallback($callback): self {
		$this->setCallback($callback);
		return $this;
	}

	/**
	 * マッチメイキング完了時に GS2-Realtime と自動的に連携する場合に指定するギャザリングプール名を取得
	 *
	 * @return string マッチメイキング完了時に GS2-Realtime と自動的に連携する場合に指定するギャザリングプール名
	 */
	public function getGatheringPoolName() {
		return $this->gatheringPoolName;
	}

	/**
	 * マッチメイキング完了時に GS2-Realtime と自動的に連携する場合に指定するギャザリングプール名を設定
	 *
	 * @param string $gatheringPoolName マッチメイキング完了時に GS2-Realtime と自動的に連携する場合に指定するギャザリングプール名
	 */
	public function setGatheringPoolName($gatheringPoolName) {
		$this->gatheringPoolName = $gatheringPoolName;
	}

	/**
	 * マッチメイキング完了時に GS2-Realtime と自動的に連携する場合に指定するギャザリングプール名を設定
	 *
	 * @param string $gatheringPoolName マッチメイキング完了時に GS2-Realtime と自動的に連携する場合に指定するギャザリングプール名
	 * @return self
	 */
	public function withGatheringPoolName($gatheringPoolName): self {
		$this->setGatheringPoolName($gatheringPoolName);
		return $this;
	}

	/**
	 * マッチメイキングの状態変化や完了通知を GS2-InGamePushNotification を使用して通知する場合に指定するゲーム名を取得
	 *
	 * @return string マッチメイキングの状態変化や完了通知を GS2-InGamePushNotification を使用して通知する場合に指定するゲーム名
	 */
	public function getNotificationGameName() {
		return $this->notificationGameName;
	}

	/**
	 * マッチメイキングの状態変化や完了通知を GS2-InGamePushNotification を使用して通知する場合に指定するゲーム名を設定
	 *
	 * @param string $notificationGameName マッチメイキングの状態変化や完了通知を GS2-InGamePushNotification を使用して通知する場合に指定するゲーム名
	 */
	public function setNotificationGameName($notificationGameName) {
		$this->notificationGameName = $notificationGameName;
	}

	/**
	 * マッチメイキングの状態変化や完了通知を GS2-InGamePushNotification を使用して通知する場合に指定するゲーム名を設定
	 *
	 * @param string $notificationGameName マッチメイキングの状態変化や完了通知を GS2-InGamePushNotification を使用して通知する場合に指定するゲーム名
	 * @return self
	 */
	public function withNotificationGameName($notificationGameName): self {
		$this->setNotificationGameName($notificationGameName);
		return $this;
	}

	/**
	 * ギャザリング作成時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ギャザリング作成時 に実行されるGS2-Script
	 */
	public function getCreateGatheringTriggerScript() {
		return $this->createGatheringTriggerScript;
	}

	/**
	 * ギャザリング作成時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createGatheringTriggerScript ギャザリング作成時 に実行されるGS2-Script
	 */
	public function setCreateGatheringTriggerScript($createGatheringTriggerScript) {
		$this->createGatheringTriggerScript = $createGatheringTriggerScript;
	}

	/**
	 * ギャザリング作成時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createGatheringTriggerScript ギャザリング作成時 に実行されるGS2-Script
	 * @return self
	 */
	public function withCreateGatheringTriggerScript($createGatheringTriggerScript): self {
		$this->setCreateGatheringTriggerScript($createGatheringTriggerScript);
		return $this;
	}

	/**
	 * ギャザリング作成完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ギャザリング作成完了時 に実行されるGS2-Script
	 */
	public function getCreateGatheringDoneTriggerScript() {
		return $this->createGatheringDoneTriggerScript;
	}

	/**
	 * ギャザリング作成完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createGatheringDoneTriggerScript ギャザリング作成完了時 に実行されるGS2-Script
	 */
	public function setCreateGatheringDoneTriggerScript($createGatheringDoneTriggerScript) {
		$this->createGatheringDoneTriggerScript = $createGatheringDoneTriggerScript;
	}

	/**
	 * ギャザリング作成完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createGatheringDoneTriggerScript ギャザリング作成完了時 に実行されるGS2-Script
	 * @return self
	 */
	public function withCreateGatheringDoneTriggerScript($createGatheringDoneTriggerScript): self {
		$this->setCreateGatheringDoneTriggerScript($createGatheringDoneTriggerScript);
		return $this;
	}

	/**
	 * ギャザリング参加時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ギャザリング参加時 に実行されるGS2-Script
	 */
	public function getJoinGatheringTriggerScript() {
		return $this->joinGatheringTriggerScript;
	}

	/**
	 * ギャザリング参加時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $joinGatheringTriggerScript ギャザリング参加時 に実行されるGS2-Script
	 */
	public function setJoinGatheringTriggerScript($joinGatheringTriggerScript) {
		$this->joinGatheringTriggerScript = $joinGatheringTriggerScript;
	}

	/**
	 * ギャザリング参加時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $joinGatheringTriggerScript ギャザリング参加時 に実行されるGS2-Script
	 * @return self
	 */
	public function withJoinGatheringTriggerScript($joinGatheringTriggerScript): self {
		$this->setJoinGatheringTriggerScript($joinGatheringTriggerScript);
		return $this;
	}

	/**
	 * ギャザリング参加完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ギャザリング参加完了時 に実行されるGS2-Script
	 */
	public function getJoinGatheringDoneTriggerScript() {
		return $this->joinGatheringDoneTriggerScript;
	}

	/**
	 * ギャザリング参加完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $joinGatheringDoneTriggerScript ギャザリング参加完了時 に実行されるGS2-Script
	 */
	public function setJoinGatheringDoneTriggerScript($joinGatheringDoneTriggerScript) {
		$this->joinGatheringDoneTriggerScript = $joinGatheringDoneTriggerScript;
	}

	/**
	 * ギャザリング参加完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $joinGatheringDoneTriggerScript ギャザリング参加完了時 に実行されるGS2-Script
	 * @return self
	 */
	public function withJoinGatheringDoneTriggerScript($joinGatheringDoneTriggerScript): self {
		$this->setJoinGatheringDoneTriggerScript($joinGatheringDoneTriggerScript);
		return $this;
	}

	/**
	 * ギャザリング離脱時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ギャザリング離脱時 に実行されるGS2-Script
	 */
	public function getLeaveGatheringTriggerScript() {
		return $this->leaveGatheringTriggerScript;
	}

	/**
	 * ギャザリング離脱時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $leaveGatheringTriggerScript ギャザリング離脱時 に実行されるGS2-Script
	 */
	public function setLeaveGatheringTriggerScript($leaveGatheringTriggerScript) {
		$this->leaveGatheringTriggerScript = $leaveGatheringTriggerScript;
	}

	/**
	 * ギャザリング離脱時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $leaveGatheringTriggerScript ギャザリング離脱時 に実行されるGS2-Script
	 * @return self
	 */
	public function withLeaveGatheringTriggerScript($leaveGatheringTriggerScript): self {
		$this->setLeaveGatheringTriggerScript($leaveGatheringTriggerScript);
		return $this;
	}

	/**
	 * ギャザリング離脱完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ギャザリング離脱完了時 に実行されるGS2-Script
	 */
	public function getLeaveGatheringDoneTriggerScript() {
		return $this->leaveGatheringDoneTriggerScript;
	}

	/**
	 * ギャザリング離脱完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $leaveGatheringDoneTriggerScript ギャザリング離脱完了時 に実行されるGS2-Script
	 */
	public function setLeaveGatheringDoneTriggerScript($leaveGatheringDoneTriggerScript) {
		$this->leaveGatheringDoneTriggerScript = $leaveGatheringDoneTriggerScript;
	}

	/**
	 * ギャザリング離脱完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $leaveGatheringDoneTriggerScript ギャザリング離脱完了時 に実行されるGS2-Script
	 * @return self
	 */
	public function withLeaveGatheringDoneTriggerScript($leaveGatheringDoneTriggerScript): self {
		$this->setLeaveGatheringDoneTriggerScript($leaveGatheringDoneTriggerScript);
		return $this;
	}

	/**
	 * ギャザリング解散時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ギャザリング解散時 に実行されるGS2-Script
	 */
	public function getBreakupGatheringTriggerScript() {
		return $this->breakupGatheringTriggerScript;
	}

	/**
	 * ギャザリング解散時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $breakupGatheringTriggerScript ギャザリング解散時 に実行されるGS2-Script
	 */
	public function setBreakupGatheringTriggerScript($breakupGatheringTriggerScript) {
		$this->breakupGatheringTriggerScript = $breakupGatheringTriggerScript;
	}

	/**
	 * ギャザリング解散時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $breakupGatheringTriggerScript ギャザリング解散時 に実行されるGS2-Script
	 * @return self
	 */
	public function withBreakupGatheringTriggerScript($breakupGatheringTriggerScript): self {
		$this->setBreakupGatheringTriggerScript($breakupGatheringTriggerScript);
		return $this;
	}

	/**
	 * マッチメイキング成立時 に実行されるGS2-Scriptを取得
	 *
	 * @return string マッチメイキング成立時 に実行されるGS2-Script
	 */
	public function getMatchmakingCompleteTriggerScript() {
		return $this->matchmakingCompleteTriggerScript;
	}

	/**
	 * マッチメイキング成立時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $matchmakingCompleteTriggerScript マッチメイキング成立時 に実行されるGS2-Script
	 */
	public function setMatchmakingCompleteTriggerScript($matchmakingCompleteTriggerScript) {
		$this->matchmakingCompleteTriggerScript = $matchmakingCompleteTriggerScript;
	}

	/**
	 * マッチメイキング成立時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $matchmakingCompleteTriggerScript マッチメイキング成立時 に実行されるGS2-Script
	 * @return self
	 */
	public function withMatchmakingCompleteTriggerScript($matchmakingCompleteTriggerScript): self {
		$this->setMatchmakingCompleteTriggerScript($matchmakingCompleteTriggerScript);
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
	 * @return Matchmaking
	 */
    static function build(array $array)
    {
        $item = new Matchmaking();
        $item->setMatchmakingId(isset($array['matchmakingId']) ? $array['matchmakingId'] : null);
        $item->setOwnerId(isset($array['ownerId']) ? $array['ownerId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setType(isset($array['type']) ? $array['type'] : null);
        $item->setDescription(isset($array['description']) ? $array['description'] : null);
        $item->setServiceClass(isset($array['serviceClass']) ? $array['serviceClass'] : null);
        $item->setMaxPlayer(isset($array['maxPlayer']) ? $array['maxPlayer'] : null);
        $item->setCallback(isset($array['callback']) ? $array['callback'] : null);
        $item->setGatheringPoolName(isset($array['gatheringPoolName']) ? $array['gatheringPoolName'] : null);
        $item->setNotificationGameName(isset($array['notificationGameName']) ? $array['notificationGameName'] : null);
        $item->setCreateGatheringTriggerScript(isset($array['createGatheringTriggerScript']) ? $array['createGatheringTriggerScript'] : null);
        $item->setCreateGatheringDoneTriggerScript(isset($array['createGatheringDoneTriggerScript']) ? $array['createGatheringDoneTriggerScript'] : null);
        $item->setJoinGatheringTriggerScript(isset($array['joinGatheringTriggerScript']) ? $array['joinGatheringTriggerScript'] : null);
        $item->setJoinGatheringDoneTriggerScript(isset($array['joinGatheringDoneTriggerScript']) ? $array['joinGatheringDoneTriggerScript'] : null);
        $item->setLeaveGatheringTriggerScript(isset($array['leaveGatheringTriggerScript']) ? $array['leaveGatheringTriggerScript'] : null);
        $item->setLeaveGatheringDoneTriggerScript(isset($array['leaveGatheringDoneTriggerScript']) ? $array['leaveGatheringDoneTriggerScript'] : null);
        $item->setBreakupGatheringTriggerScript(isset($array['breakupGatheringTriggerScript']) ? $array['breakupGatheringTriggerScript'] : null);
        $item->setMatchmakingCompleteTriggerScript(isset($array['matchmakingCompleteTriggerScript']) ? $array['matchmakingCompleteTriggerScript'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}