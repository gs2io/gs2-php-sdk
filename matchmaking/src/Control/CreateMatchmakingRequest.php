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

namespace Gs2\Matchmaking\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class CreateMatchmakingRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateMatchmaking";

	/** @var string マッチメイキングの名前 */
	private $name;

	/** @var string マッチメイキングの説明 */
	private $description;

	/** @var string マッチメイキングのサービスクラス */
	private $serviceClass;

	/** @var string マッチメイキングの種類 */
	private $type;

	/** @var int 最大プレイヤー数 */
	private $maxPlayer;

	/** @var string GS2-Realtime のギャザリングプール名 */
	private $gatheringPoolName;

	/** @var string マッチメイキング完了コールバックURL */
	private $callback;

	/** @var string GS2-InGamePushNotification のゲーム名 */
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


	/**
	 * マッチメイキングの名前を取得
	 *
	 * @return string マッチメイキングの名前
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * マッチメイキングの名前を設定
	 *
	 * @param string $name マッチメイキングの名前
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * マッチメイキングの名前を設定
	 *
	 * @param string $name マッチメイキングの名前
	 * @return CreateMatchmakingRequest
	 */
	public function withName($name): CreateMatchmakingRequest {
		$this->setName($name);
		return $this;
	}

	/**
	 * マッチメイキングの説明を取得
	 *
	 * @return string マッチメイキングの説明
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * マッチメイキングの説明を設定
	 *
	 * @param string $description マッチメイキングの説明
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * マッチメイキングの説明を設定
	 *
	 * @param string $description マッチメイキングの説明
	 * @return CreateMatchmakingRequest
	 */
	public function withDescription($description): CreateMatchmakingRequest {
		$this->setDescription($description);
		return $this;
	}

	/**
	 * マッチメイキングのサービスクラスを取得
	 *
	 * @return string マッチメイキングのサービスクラス
	 */
	public function getServiceClass() {
		return $this->serviceClass;
	}

	/**
	 * マッチメイキングのサービスクラスを設定
	 *
	 * @param string $serviceClass マッチメイキングのサービスクラス
	 */
	public function setServiceClass($serviceClass) {
		$this->serviceClass = $serviceClass;
	}

	/**
	 * マッチメイキングのサービスクラスを設定
	 *
	 * @param string $serviceClass マッチメイキングのサービスクラス
	 * @return CreateMatchmakingRequest
	 */
	public function withServiceClass($serviceClass): CreateMatchmakingRequest {
		$this->setServiceClass($serviceClass);
		return $this;
	}

	/**
	 * マッチメイキングの種類を取得
	 *
	 * @return string マッチメイキングの種類
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * マッチメイキングの種類を設定
	 *
	 * @param string $type マッチメイキングの種類
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * マッチメイキングの種類を設定
	 *
	 * @param string $type マッチメイキングの種類
	 * @return CreateMatchmakingRequest
	 */
	public function withType($type): CreateMatchmakingRequest {
		$this->setType($type);
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
	 * @return CreateMatchmakingRequest
	 */
	public function withMaxPlayer($maxPlayer): CreateMatchmakingRequest {
		$this->setMaxPlayer($maxPlayer);
		return $this;
	}

	/**
	 * GS2-Realtime のギャザリングプール名を取得
	 *
	 * @return string GS2-Realtime のギャザリングプール名
	 */
	public function getGatheringPoolName() {
		return $this->gatheringPoolName;
	}

	/**
	 * GS2-Realtime のギャザリングプール名を設定
	 *
	 * @param string $gatheringPoolName GS2-Realtime のギャザリングプール名
	 */
	public function setGatheringPoolName($gatheringPoolName) {
		$this->gatheringPoolName = $gatheringPoolName;
	}

	/**
	 * GS2-Realtime のギャザリングプール名を設定
	 *
	 * @param string $gatheringPoolName GS2-Realtime のギャザリングプール名
	 * @return CreateMatchmakingRequest
	 */
	public function withGatheringPoolName($gatheringPoolName): CreateMatchmakingRequest {
		$this->setGatheringPoolName($gatheringPoolName);
		return $this;
	}

	/**
	 * マッチメイキング完了コールバックURLを取得
	 *
	 * @return string マッチメイキング完了コールバックURL
	 */
	public function getCallback() {
		return $this->callback;
	}

	/**
	 * マッチメイキング完了コールバックURLを設定
	 *
	 * @param string $callback マッチメイキング完了コールバックURL
	 */
	public function setCallback($callback) {
		$this->callback = $callback;
	}

	/**
	 * マッチメイキング完了コールバックURLを設定
	 *
	 * @param string $callback マッチメイキング完了コールバックURL
	 * @return CreateMatchmakingRequest
	 */
	public function withCallback($callback): CreateMatchmakingRequest {
		$this->setCallback($callback);
		return $this;
	}

	/**
	 * GS2-InGamePushNotification のゲーム名を取得
	 *
	 * @return string GS2-InGamePushNotification のゲーム名
	 */
	public function getNotificationGameName() {
		return $this->notificationGameName;
	}

	/**
	 * GS2-InGamePushNotification のゲーム名を設定
	 *
	 * @param string $notificationGameName GS2-InGamePushNotification のゲーム名
	 */
	public function setNotificationGameName($notificationGameName) {
		$this->notificationGameName = $notificationGameName;
	}

	/**
	 * GS2-InGamePushNotification のゲーム名を設定
	 *
	 * @param string $notificationGameName GS2-InGamePushNotification のゲーム名
	 * @return CreateMatchmakingRequest
	 */
	public function withNotificationGameName($notificationGameName): CreateMatchmakingRequest {
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
	 * @return CreateMatchmakingRequest
	 */
	public function withCreateGatheringTriggerScript($createGatheringTriggerScript): CreateMatchmakingRequest {
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
	 * @return CreateMatchmakingRequest
	 */
	public function withCreateGatheringDoneTriggerScript($createGatheringDoneTriggerScript): CreateMatchmakingRequest {
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
	 * @return CreateMatchmakingRequest
	 */
	public function withJoinGatheringTriggerScript($joinGatheringTriggerScript): CreateMatchmakingRequest {
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
	 * @return CreateMatchmakingRequest
	 */
	public function withJoinGatheringDoneTriggerScript($joinGatheringDoneTriggerScript): CreateMatchmakingRequest {
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
	 * @return CreateMatchmakingRequest
	 */
	public function withLeaveGatheringTriggerScript($leaveGatheringTriggerScript): CreateMatchmakingRequest {
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
	 * @return CreateMatchmakingRequest
	 */
	public function withLeaveGatheringDoneTriggerScript($leaveGatheringDoneTriggerScript): CreateMatchmakingRequest {
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
	 * @return CreateMatchmakingRequest
	 */
	public function withBreakupGatheringTriggerScript($breakupGatheringTriggerScript): CreateMatchmakingRequest {
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
	 * @return CreateMatchmakingRequest
	 */
	public function withMatchmakingCompleteTriggerScript($matchmakingCompleteTriggerScript): CreateMatchmakingRequest {
		$this->setMatchmakingCompleteTriggerScript($matchmakingCompleteTriggerScript);
		return $this;
	}

}