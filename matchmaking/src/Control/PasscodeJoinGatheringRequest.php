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
class PasscodeJoinGatheringRequest extends Gs2UserRequest {

    const FUNCTION = "JoinGathering";

	/** @var string マッチメイキングの名前を指定します。 */
	private $matchmakingName;

	/** @var string ギャザリングのパスコードを指定します。 */
	private $passcode;


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
	 * @return PasscodeJoinGatheringRequest
	 */
	public function withMatchmakingName($matchmakingName): PasscodeJoinGatheringRequest {
		$this->setMatchmakingName($matchmakingName);
		return $this;
	}

	/**
	 * ギャザリングのパスコードを指定します。を取得
	 *
	 * @return string ギャザリングのパスコードを指定します。
	 */
	public function getPasscode() {
		return $this->passcode;
	}

	/**
	 * ギャザリングのパスコードを指定します。を設定
	 *
	 * @param string $passcode ギャザリングのパスコードを指定します。
	 */
	public function setPasscode($passcode) {
		$this->passcode = $passcode;
	}

	/**
	 * ギャザリングのパスコードを指定します。を設定
	 *
	 * @param string $passcode ギャザリングのパスコードを指定します。
	 * @return PasscodeJoinGatheringRequest
	 */
	public function withPasscode($passcode): PasscodeJoinGatheringRequest {
		$this->setPasscode($passcode);
		return $this;
	}

}