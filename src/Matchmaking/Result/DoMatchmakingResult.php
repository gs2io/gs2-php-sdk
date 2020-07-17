<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2\Matchmaking\Result;

use Gs2\Core\Model\IResult;
use Gs2\Matchmaking\Model\Gathering;

/**
 * 自分が参加できるギャザリングを探して参加する のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DoMatchmakingResult implements IResult {
	/** @var Gathering ギャザリング */
	private $item;
	/** @var string マッチメイキングの状態を保持するトークン */
	private $matchmakingContextToken;

	/**
	 * ギャザリングを取得
	 *
	 * @return Gathering|null 自分が参加できるギャザリングを探して参加する
	 */
	public function getItem(): ?Gathering {
		return $this->item;
	}

	/**
	 * ギャザリングを設定
	 *
	 * @param Gathering|null $item 自分が参加できるギャザリングを探して参加する
	 */
	public function setItem(?Gathering $item) {
		$this->item = $item;
	}

	/**
	 * マッチメイキングの状態を保持するトークンを取得
	 *
	 * @return string|null 自分が参加できるギャザリングを探して参加する
	 */
	public function getMatchmakingContextToken(): ?string {
		return $this->matchmakingContextToken;
	}

	/**
	 * マッチメイキングの状態を保持するトークンを設定
	 *
	 * @param string|null $matchmakingContextToken 自分が参加できるギャザリングを探して参加する
	 */
	public function setMatchmakingContextToken(?string $matchmakingContextToken) {
		$this->matchmakingContextToken = $matchmakingContextToken;
	}

    public static function fromJson(array $data): DoMatchmakingResult {
        $result = new DoMatchmakingResult();
        $result->setItem(isset($data["item"]) ? Gathering::fromJson($data["item"]) : null);
        $result->setMatchmakingContextToken(isset($data["matchmakingContextToken"]) ? $data["matchmakingContextToken"] : null);
        return $result;
    }
}