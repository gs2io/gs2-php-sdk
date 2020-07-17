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

namespace Gs2\Account\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * ゲームプレイヤーアカウントの現在時刻に対する補正値を更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateTimeOffsetRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ゲームプレイヤーアカウントの現在時刻に対する補正値を更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ゲームプレイヤーアカウントの現在時刻に対する補正値を更新
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ゲームプレイヤーアカウントの現在時刻に対する補正値を更新
     * @return UpdateTimeOffsetRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): UpdateTimeOffsetRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string アカウントID */
    private $userId;

    /**
     * アカウントIDを取得
     *
     * @return string|null ゲームプレイヤーアカウントの現在時刻に対する補正値を更新
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * アカウントIDを設定
     *
     * @param string $userId ゲームプレイヤーアカウントの現在時刻に対する補正値を更新
     */
    public function setUserId(string $userId = null) {
        $this->userId = $userId;
    }

    /**
     * アカウントIDを設定
     *
     * @param string $userId ゲームプレイヤーアカウントの現在時刻に対する補正値を更新
     * @return UpdateTimeOffsetRequest $this
     */
    public function withUserId(string $userId = null): UpdateTimeOffsetRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var int 現在時刻に対する補正値（現在時刻を起点とした秒数） */
    private $timeOffset;

    /**
     * 現在時刻に対する補正値（現在時刻を起点とした秒数）を取得
     *
     * @return int|null ゲームプレイヤーアカウントの現在時刻に対する補正値を更新
     */
    public function getTimeOffset(): ?int {
        return $this->timeOffset;
    }

    /**
     * 現在時刻に対する補正値（現在時刻を起点とした秒数）を設定
     *
     * @param int $timeOffset ゲームプレイヤーアカウントの現在時刻に対する補正値を更新
     */
    public function setTimeOffset(int $timeOffset = null) {
        $this->timeOffset = $timeOffset;
    }

    /**
     * 現在時刻に対する補正値（現在時刻を起点とした秒数）を設定
     *
     * @param int $timeOffset ゲームプレイヤーアカウントの現在時刻に対する補正値を更新
     * @return UpdateTimeOffsetRequest $this
     */
    public function withTimeOffset(int $timeOffset = null): UpdateTimeOffsetRequest {
        $this->setTimeOffset($timeOffset);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ゲームプレイヤーアカウントの現在時刻に対する補正値を更新
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ゲームプレイヤーアカウントの現在時刻に対する補正値を更新
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ゲームプレイヤーアカウントの現在時刻に対する補正値を更新
     * @return UpdateTimeOffsetRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): UpdateTimeOffsetRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}