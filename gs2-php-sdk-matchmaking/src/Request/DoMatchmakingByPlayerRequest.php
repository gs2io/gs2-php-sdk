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

namespace Gs2\Matchmaking\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Matchmaking\Model\Player;

/**
 * Player が参加できるギャザリングを探して参加する のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DoMatchmakingByPlayerRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null Player が参加できるギャザリングを探して参加する
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName Player が参加できるギャザリングを探して参加する
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName Player が参加できるギャザリングを探して参加する
     * @return DoMatchmakingByPlayerRequest $this
     */
    public function withNamespaceName(string $namespaceName): DoMatchmakingByPlayerRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var Player プレイヤー情報 */
    private $player;

    /**
     * プレイヤー情報を取得
     *
     * @return Player|null Player が参加できるギャザリングを探して参加する
     */
    public function getPlayer(): ?Player {
        return $this->player;
    }

    /**
     * プレイヤー情報を設定
     *
     * @param Player $player Player が参加できるギャザリングを探して参加する
     */
    public function setPlayer(Player $player) {
        $this->player = $player;
    }

    /**
     * プレイヤー情報を設定
     *
     * @param Player $player Player が参加できるギャザリングを探して参加する
     * @return DoMatchmakingByPlayerRequest $this
     */
    public function withPlayer(Player $player): DoMatchmakingByPlayerRequest {
        $this->setPlayer($player);
        return $this;
    }

    /** @var string 検索の再開に使用する マッチメイキングの状態を保持するトークン */
    private $matchmakingContextToken;

    /**
     * 検索の再開に使用する マッチメイキングの状態を保持するトークンを取得
     *
     * @return string|null Player が参加できるギャザリングを探して参加する
     */
    public function getMatchmakingContextToken(): ?string {
        return $this->matchmakingContextToken;
    }

    /**
     * 検索の再開に使用する マッチメイキングの状態を保持するトークンを設定
     *
     * @param string $matchmakingContextToken Player が参加できるギャザリングを探して参加する
     */
    public function setMatchmakingContextToken(string $matchmakingContextToken) {
        $this->matchmakingContextToken = $matchmakingContextToken;
    }

    /**
     * 検索の再開に使用する マッチメイキングの状態を保持するトークンを設定
     *
     * @param string $matchmakingContextToken Player が参加できるギャザリングを探して参加する
     * @return DoMatchmakingByPlayerRequest $this
     */
    public function withMatchmakingContextToken(string $matchmakingContextToken): DoMatchmakingByPlayerRequest {
        $this->setMatchmakingContextToken($matchmakingContextToken);
        return $this;
    }

}