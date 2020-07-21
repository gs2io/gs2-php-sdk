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
use Gs2\Matchmaking\Model\SignedBallot;
use Gs2\Matchmaking\Model\GameResult;

/**
 * 対戦結果をまとめて投票します。 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class VoteMultipleRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 対戦結果をまとめて投票します。
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 対戦結果をまとめて投票します。
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 対戦結果をまとめて投票します。
     * @return VoteMultipleRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): VoteMultipleRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var SignedBallot[] 署名付の投票用紙リスト */
    private $signedBallots;

    /**
     * 署名付の投票用紙リストを取得
     *
     * @return SignedBallot[]|null 対戦結果をまとめて投票します。
     */
    public function getSignedBallots(): ?array {
        return $this->signedBallots;
    }

    /**
     * 署名付の投票用紙リストを設定
     *
     * @param SignedBallot[] $signedBallots 対戦結果をまとめて投票します。
     */
    public function setSignedBallots(array $signedBallots = null) {
        $this->signedBallots = $signedBallots;
    }

    /**
     * 署名付の投票用紙リストを設定
     *
     * @param SignedBallot[] $signedBallots 対戦結果をまとめて投票します。
     * @return VoteMultipleRequest $this
     */
    public function withSignedBallots(array $signedBallots = null): VoteMultipleRequest {
        $this->setSignedBallots($signedBallots);
        return $this;
    }

    /** @var GameResult[] 投票内容。対戦を行ったプレイヤーグループ1に所属するユーザIDのリスト */
    private $gameResults;

    /**
     * 投票内容。対戦を行ったプレイヤーグループ1に所属するユーザIDのリストを取得
     *
     * @return GameResult[]|null 対戦結果をまとめて投票します。
     */
    public function getGameResults(): ?array {
        return $this->gameResults;
    }

    /**
     * 投票内容。対戦を行ったプレイヤーグループ1に所属するユーザIDのリストを設定
     *
     * @param GameResult[] $gameResults 対戦結果をまとめて投票します。
     */
    public function setGameResults(array $gameResults = null) {
        $this->gameResults = $gameResults;
    }

    /**
     * 投票内容。対戦を行ったプレイヤーグループ1に所属するユーザIDのリストを設定
     *
     * @param GameResult[] $gameResults 対戦結果をまとめて投票します。
     * @return VoteMultipleRequest $this
     */
    public function withGameResults(array $gameResults = null): VoteMultipleRequest {
        $this->setGameResults($gameResults);
        return $this;
    }

    /** @var string 投票用紙の署名検証に使用する暗号鍵 のGRN */
    private $keyId;

    /**
     * 投票用紙の署名検証に使用する暗号鍵 のGRNを取得
     *
     * @return string|null 対戦結果をまとめて投票します。
     */
    public function getKeyId(): ?string {
        return $this->keyId;
    }

    /**
     * 投票用紙の署名検証に使用する暗号鍵 のGRNを設定
     *
     * @param string $keyId 対戦結果をまとめて投票します。
     */
    public function setKeyId(string $keyId = null) {
        $this->keyId = $keyId;
    }

    /**
     * 投票用紙の署名検証に使用する暗号鍵 のGRNを設定
     *
     * @param string $keyId 対戦結果をまとめて投票します。
     * @return VoteMultipleRequest $this
     */
    public function withKeyId(string $keyId = null): VoteMultipleRequest {
        $this->setKeyId($keyId);
        return $this;
    }

}