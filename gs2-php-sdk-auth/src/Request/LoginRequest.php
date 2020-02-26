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

namespace Gs2\Auth\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * 指定したユーザIDでGS2にログインし、アクセストークンを取得します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class LoginRequest extends Gs2BasicRequest {

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null 指定したユーザIDでGS2にログインし、アクセストークンを取得します
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId 指定したユーザIDでGS2にログインし、アクセストークンを取得します
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId 指定したユーザIDでGS2にログインし、アクセストークンを取得します
     * @return LoginRequest $this
     */
    public function withUserId(string $userId): LoginRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var int 現在時刻に対する補正値（現在時刻を起点とした秒数） */
    private $timeOffset;

    /**
     * 現在時刻に対する補正値（現在時刻を起点とした秒数）を取得
     *
     * @return int|null 指定したユーザIDでGS2にログインし、アクセストークンを取得します
     */
    public function getTimeOffset(): ?int {
        return $this->timeOffset;
    }

    /**
     * 現在時刻に対する補正値（現在時刻を起点とした秒数）を設定
     *
     * @param int $timeOffset 指定したユーザIDでGS2にログインし、アクセストークンを取得します
     */
    public function setTimeOffset(int $timeOffset) {
        $this->timeOffset = $timeOffset;
    }

    /**
     * 現在時刻に対する補正値（現在時刻を起点とした秒数）を設定
     *
     * @param int $timeOffset 指定したユーザIDでGS2にログインし、アクセストークンを取得します
     * @return LoginRequest $this
     */
    public function withTimeOffset(int $timeOffset): LoginRequest {
        $this->setTimeOffset($timeOffset);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null 指定したユーザIDでGS2にログインし、アクセストークンを取得します
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 指定したユーザIDでGS2にログインし、アクセストークンを取得します
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 指定したユーザIDでGS2にログインし、アクセストークンを取得します
     * @return LoginRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): LoginRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}