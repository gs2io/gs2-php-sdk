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
use Gs2\Matchmaking\Model\GameResult;

/**
 * レーティング値の再計算を実行 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class PutResultRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null レーティング値の再計算を実行
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName レーティング値の再計算を実行
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName レーティング値の再計算を実行
     * @return PutResultRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): PutResultRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string レーティング名 */
    private $ratingName;

    /**
     * レーティング名を取得
     *
     * @return string|null レーティング値の再計算を実行
     */
    public function getRatingName(): ?string {
        return $this->ratingName;
    }

    /**
     * レーティング名を設定
     *
     * @param string $ratingName レーティング値の再計算を実行
     */
    public function setRatingName(string $ratingName = null) {
        $this->ratingName = $ratingName;
    }

    /**
     * レーティング名を設定
     *
     * @param string $ratingName レーティング値の再計算を実行
     * @return PutResultRequest $this
     */
    public function withRatingName(string $ratingName = null): PutResultRequest {
        $this->setRatingName($ratingName);
        return $this;
    }

    /** @var GameResult[] 対戦結果 */
    private $gameResults;

    /**
     * 対戦結果を取得
     *
     * @return GameResult[]|null レーティング値の再計算を実行
     */
    public function getGameResults(): ?array {
        return $this->gameResults;
    }

    /**
     * 対戦結果を設定
     *
     * @param GameResult[] $gameResults レーティング値の再計算を実行
     */
    public function setGameResults(array $gameResults = null) {
        $this->gameResults = $gameResults;
    }

    /**
     * 対戦結果を設定
     *
     * @param GameResult[] $gameResults レーティング値の再計算を実行
     * @return PutResultRequest $this
     */
    public function withGameResults(array $gameResults = null): PutResultRequest {
        $this->setGameResults($gameResults);
        return $this;
    }

}