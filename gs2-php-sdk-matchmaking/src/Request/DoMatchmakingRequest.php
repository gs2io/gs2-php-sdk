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
 * 自分が参加できるギャザリングを探して参加する のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DoMatchmakingRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 自分が参加できるギャザリングを探して参加する
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 自分が参加できるギャザリングを探して参加する
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 自分が参加できるギャザリングを探して参加する
     * @return DoMatchmakingRequest $this
     */
    public function withNamespaceName(string $namespaceName): DoMatchmakingRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var Player 自身のプレイヤー情報 */
    private $player;

    /**
     * 自身のプレイヤー情報を取得
     *
     * @return Player|null 自分が参加できるギャザリングを探して参加する
     */
    public function getPlayer(): ?Player {
        return $this->player;
    }

    /**
     * 自身のプレイヤー情報を設定
     *
     * @param Player $player 自分が参加できるギャザリングを探して参加する
     */
    public function setPlayer(Player $player) {
        $this->player = $player;
    }

    /**
     * 自身のプレイヤー情報を設定
     *
     * @param Player $player 自分が参加できるギャザリングを探して参加する
     * @return DoMatchmakingRequest $this
     */
    public function withPlayer(Player $player): DoMatchmakingRequest {
        $this->setPlayer($player);
        return $this;
    }

    /** @var string 検索の再開に使用する マッチメイキングの状態を保持するトークン */
    private $matchmakingContextToken;

    /**
     * 検索の再開に使用する マッチメイキングの状態を保持するトークンを取得
     *
     * @return string|null 自分が参加できるギャザリングを探して参加する
     */
    public function getMatchmakingContextToken(): ?string {
        return $this->matchmakingContextToken;
    }

    /**
     * 検索の再開に使用する マッチメイキングの状態を保持するトークンを設定
     *
     * @param string $matchmakingContextToken 自分が参加できるギャザリングを探して参加する
     */
    public function setMatchmakingContextToken(string $matchmakingContextToken) {
        $this->matchmakingContextToken = $matchmakingContextToken;
    }

    /**
     * 検索の再開に使用する マッチメイキングの状態を保持するトークンを設定
     *
     * @param string $matchmakingContextToken 自分が参加できるギャザリングを探して参加する
     * @return DoMatchmakingRequest $this
     */
    public function withMatchmakingContextToken(string $matchmakingContextToken): DoMatchmakingRequest {
        $this->setMatchmakingContextToken($matchmakingContextToken);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null 自分が参加できるギャザリングを探して参加する
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 自分が参加できるギャザリングを探して参加する
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 自分が参加できるギャザリングを探して参加する
     * @return DoMatchmakingRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): DoMatchmakingRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

    /** @var string アクセストークン */
    private $accessToken;

    /**
     * アクセストークンを取得
     *
     * @return string アクセストークン
     */
    public function getAccessToken(): string {
        return $this->accessToken;
    }

    /**
     * アクセストークンを設定
     *
     * @param string $accessToken アクセストークン
     */
    public function setAccessToken(string $accessToken) {
        $this->accessToken = $accessToken;
    }

    /**
     * アクセストークンを設定
     *
     * @param string $accessToken アクセストークン
     * @return DoMatchmakingRequest this
     */
    public function withAccessToken(string $accessToken): DoMatchmakingRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}