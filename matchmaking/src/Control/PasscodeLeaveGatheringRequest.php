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

use Gs2\Core\Control\Gs2UserRequest;

/**
 * @author Game Server Services, Inc.
 */
class PasscodeLeaveGatheringRequest extends Gs2UserRequest {

    const FUNCTION = "LeaveGathering";

	/** @var string マッチメイキングの名前を指定します。 */
	private $matchmakingName;

	/** @var string ギャザリングのIDを指定します。 */
	private $gatheringId;


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
	 * @return PasscodeLeaveGatheringRequest
	 */
	public function withMatchmakingName($matchmakingName): PasscodeLeaveGatheringRequest {
		$this->setMatchmakingName($matchmakingName);
		return $this;
	}

	/**
	 * ギャザリングのIDを指定します。を取得
	 *
	 * @return string ギャザリングのIDを指定します。
	 */
	public function getGatheringId() {
		return $this->gatheringId;
	}

	/**
	 * ギャザリングのIDを指定します。を設定
	 *
	 * @param string $gatheringId ギャザリングのIDを指定します。
	 */
	public function setGatheringId($gatheringId) {
		$this->gatheringId = $gatheringId;
	}

	/**
	 * ギャザリングのIDを指定します。を設定
	 *
	 * @param string $gatheringId ギャザリングのIDを指定します。
	 * @return PasscodeLeaveGatheringRequest
	 */
	public function withGatheringId($gatheringId): PasscodeLeaveGatheringRequest {
		$this->setGatheringId($gatheringId);
		return $this;
	}

}