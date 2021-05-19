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
 * 投票用紙を取得します。 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetBallotByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 投票用紙を取得します。
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 投票用紙を取得します。
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 投票用紙を取得します。
     * @return GetBallotByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): GetBallotByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string レーティング名 */
    private $ratingName;

    /**
     * レーティング名を取得
     *
     * @return string|null 投票用紙を取得します。
     */
    public function getRatingName(): ?string {
        return $this->ratingName;
    }

    /**
     * レーティング名を設定
     *
     * @param string $ratingName 投票用紙を取得します。
     */
    public function setRatingName(string $ratingName = null) {
        $this->ratingName = $ratingName;
    }

    /**
     * レーティング名を設定
     *
     * @param string $ratingName 投票用紙を取得します。
     * @return GetBallotByUserIdRequest $this
     */
    public function withRatingName(string $ratingName = null): GetBallotByUserIdRequest {
        $this->setRatingName($ratingName);
        return $this;
    }

    /** @var string 投票対象のギャザリング名 */
    private $gatheringName;

    /**
     * 投票対象のギャザリング名を取得
     *
     * @return string|null 投票用紙を取得します。
     */
    public function getGatheringName(): ?string {
        return $this->gatheringName;
    }

    /**
     * 投票対象のギャザリング名を設定
     *
     * @param string $gatheringName 投票用紙を取得します。
     */
    public function setGatheringName(string $gatheringName = null) {
        $this->gatheringName = $gatheringName;
    }

    /**
     * 投票対象のギャザリング名を設定
     *
     * @param string $gatheringName 投票用紙を取得します。
     * @return GetBallotByUserIdRequest $this
     */
    public function withGatheringName(string $gatheringName = null): GetBallotByUserIdRequest {
        $this->setGatheringName($gatheringName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null 投票用紙を取得します。
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId 投票用紙を取得します。
     */
    public function setUserId(string $userId = null) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId 投票用紙を取得します。
     * @return GetBallotByUserIdRequest $this
     */
    public function withUserId(string $userId = null): GetBallotByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var int 参加人数 */
    private $numberOfPlayer;

    /**
     * 参加人数を取得
     *
     * @return int|null 投票用紙を取得します。
     */
    public function getNumberOfPlayer(): ?int {
        return $this->numberOfPlayer;
    }

    /**
     * 参加人数を設定
     *
     * @param int $numberOfPlayer 投票用紙を取得します。
     */
    public function setNumberOfPlayer(int $numberOfPlayer = null) {
        $this->numberOfPlayer = $numberOfPlayer;
    }

    /**
     * 参加人数を設定
     *
     * @param int $numberOfPlayer 投票用紙を取得します。
     * @return GetBallotByUserIdRequest $this
     */
    public function withNumberOfPlayer(int $numberOfPlayer = null): GetBallotByUserIdRequest {
        $this->setNumberOfPlayer($numberOfPlayer);
        return $this;
    }

    /** @var string 投票用紙の署名計算に使用する暗号鍵 のGRN */
    private $keyId;

    /**
     * 投票用紙の署名計算に使用する暗号鍵 のGRNを取得
     *
     * @return string|null 投票用紙を取得します。
     */
    public function getKeyId(): ?string {
        return $this->keyId;
    }

    /**
     * 投票用紙の署名計算に使用する暗号鍵 のGRNを設定
     *
     * @param string $keyId 投票用紙を取得します。
     */
    public function setKeyId(string $keyId = null) {
        $this->keyId = $keyId;
    }

    /**
     * 投票用紙の署名計算に使用する暗号鍵 のGRNを設定
     *
     * @param string $keyId 投票用紙を取得します。
     * @return GetBallotByUserIdRequest $this
     */
    public function withKeyId(string $keyId = null): GetBallotByUserIdRequest {
        $this->setKeyId($keyId);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null 投票用紙を取得します。
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 投票用紙を取得します。
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 投票用紙を取得します。
     * @return GetBallotByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): GetBallotByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}