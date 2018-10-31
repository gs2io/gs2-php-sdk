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
class UpdateMatchmakingRequest extends Gs2BasicRequest {

    const FUNCTION = "UpdateMatchmaking";

	/** @var string マッチメイキングの名前を指定します。 */
	private $matchmakingName;

	/** @var string マッチメイキングの説明 */
	private $description;

	/** @var string マッチメイキングのサービスクラス */
	private $serviceClass;

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
	 * マッチメイキングの名前を指定します。を取得
	 *
	 * @return string マッチメイキングの名前を指定します。
	 */
	public function getMatchmakingName() {
		return $this->matchmakingName;
	}

	/**
	 * マッチメイキングの名前を指定します。を設定
	 *
	 * @param string $matchmakingName マッチメイキングの名前を指定します。
	 */
	public function setMatchmakingName($matchmakingName) {
		$this->matchmakingName = $matchmakingName;
	}

	/**
	 * マッチメイキングの名前を指定します。を設定
	 *
	 * @param string $matchmakingName マッチメイキングの名前を指定します。
	 * @return UpdateMatchmakingRequest
	 */
	public function withMatchmakingName($matchmakingName): UpdateMatchmakingRequest {
		$this->setMatchmakingName($matchmakingName);
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
	 * @return UpdateMatchmakingRequest
	 */
	public function withDescription($description): UpdateMatchmakingRequest {
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
	 * @return UpdateMatchmakingRequest
	 */
	public function withServiceClass($serviceClass): UpdateMatchmakingRequest {
		$this->setServiceClass($serviceClass);
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
	 * @return UpdateMatchmakingRequest
	 */
	public function withGatheringPoolName($gatheringPoolName): UpdateMatchmakingRequest {
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
	 * @return UpdateMatchmakingRequest
	 */
	public function withCallback($callback): UpdateMatchmakingRequest {
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
	 * @return UpdateMatchmakingRequest
	 */
	public function withNotificationGameName($notificationGameName): UpdateMatchmakingRequest {
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
	 * @return UpdateMatchmakingRequest
	 */
	public function withCreateGatheringTriggerScript($createGatheringTriggerScript): UpdateMatchmakingRequest {
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
	 * @return UpdateMatchmakingRequest
	 */
	public function withCreateGatheringDoneTriggerScript($createGatheringDoneTriggerScript): UpdateMatchmakingRequest {
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
	 * @return UpdateMatchmakingRequest
	 */
	public function withJoinGatheringTriggerScript($joinGatheringTriggerScript): UpdateMatchmakingRequest {
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
	 * @return UpdateMatchmakingRequest
	 */
	public function withJoinGatheringDoneTriggerScript($joinGatheringDoneTriggerScript): UpdateMatchmakingRequest {
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
	 * @return UpdateMatchmakingRequest
	 */
	public function withLeaveGatheringTriggerScript($leaveGatheringTriggerScript): UpdateMatchmakingRequest {
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
	 * @return UpdateMatchmakingRequest
	 */
	public function withLeaveGatheringDoneTriggerScript($leaveGatheringDoneTriggerScript): UpdateMatchmakingRequest {
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
	 * @return UpdateMatchmakingRequest
	 */
	public function withBreakupGatheringTriggerScript($breakupGatheringTriggerScript): UpdateMatchmakingRequest {
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
	 * @return UpdateMatchmakingRequest
	 */
	public function withMatchmakingCompleteTriggerScript($matchmakingCompleteTriggerScript): UpdateMatchmakingRequest {
		$this->setMatchmakingCompleteTriggerScript($matchmakingCompleteTriggerScript);
		return $this;
	}

}