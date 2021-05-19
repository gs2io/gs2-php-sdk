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

/**
 * 投票状況を強制確定 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CommitVoteRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 投票状況を強制確定
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 投票状況を強制確定
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 投票状況を強制確定
     * @return CommitVoteRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): CommitVoteRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string レーティング名 */
    private $ratingName;

    /**
     * レーティング名を取得
     *
     * @return string|null 投票状況を強制確定
     */
    public function getRatingName(): ?string {
        return $this->ratingName;
    }

    /**
     * レーティング名を設定
     *
     * @param string $ratingName 投票状況を強制確定
     */
    public function setRatingName(string $ratingName = null) {
        $this->ratingName = $ratingName;
    }

    /**
     * レーティング名を設定
     *
     * @param string $ratingName 投票状況を強制確定
     * @return CommitVoteRequest $this
     */
    public function withRatingName(string $ratingName = null): CommitVoteRequest {
        $this->setRatingName($ratingName);
        return $this;
    }

    /** @var string 投票対象のギャザリング名 */
    private $gatheringName;

    /**
     * 投票対象のギャザリング名を取得
     *
     * @return string|null 投票状況を強制確定
     */
    public function getGatheringName(): ?string {
        return $this->gatheringName;
    }

    /**
     * 投票対象のギャザリング名を設定
     *
     * @param string $gatheringName 投票状況を強制確定
     */
    public function setGatheringName(string $gatheringName = null) {
        $this->gatheringName = $gatheringName;
    }

    /**
     * 投票対象のギャザリング名を設定
     *
     * @param string $gatheringName 投票状況を強制確定
     * @return CommitVoteRequest $this
     */
    public function withGatheringName(string $gatheringName = null): CommitVoteRequest {
        $this->setGatheringName($gatheringName);
        return $this;
    }

}