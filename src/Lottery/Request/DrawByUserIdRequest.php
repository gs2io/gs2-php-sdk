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

namespace Gs2\Lottery\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Lottery\Model\Config;

/**
 * ユーザIDを指定して抽選を実行 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DrawByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ユーザIDを指定して抽選を実行
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定して抽選を実行
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定して抽選を実行
     * @return DrawByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): DrawByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 抽選モデルの種類名 */
    private $lotteryName;

    /**
     * 抽選モデルの種類名を取得
     *
     * @return string|null ユーザIDを指定して抽選を実行
     */
    public function getLotteryName(): ?string {
        return $this->lotteryName;
    }

    /**
     * 抽選モデルの種類名を設定
     *
     * @param string $lotteryName ユーザIDを指定して抽選を実行
     */
    public function setLotteryName(string $lotteryName = null) {
        $this->lotteryName = $lotteryName;
    }

    /**
     * 抽選モデルの種類名を設定
     *
     * @param string $lotteryName ユーザIDを指定して抽選を実行
     * @return DrawByUserIdRequest $this
     */
    public function withLotteryName(string $lotteryName = null): DrawByUserIdRequest {
        $this->setLotteryName($lotteryName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null ユーザIDを指定して抽選を実行
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定して抽選を実行
     */
    public function setUserId(string $userId = null) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定して抽選を実行
     * @return DrawByUserIdRequest $this
     */
    public function withUserId(string $userId = null): DrawByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var int 抽選回数 */
    private $count;

    /**
     * 抽選回数を取得
     *
     * @return int|null ユーザIDを指定して抽選を実行
     */
    public function getCount(): ?int {
        return $this->count;
    }

    /**
     * 抽選回数を設定
     *
     * @param int $count ユーザIDを指定して抽選を実行
     */
    public function setCount(int $count = null) {
        $this->count = $count;
    }

    /**
     * 抽選回数を設定
     *
     * @param int $count ユーザIDを指定して抽選を実行
     * @return DrawByUserIdRequest $this
     */
    public function withCount(int $count = null): DrawByUserIdRequest {
        $this->setCount($count);
        return $this;
    }

    /** @var Config[] スタンプシートのプレースホルダの適用する設定値 */
    private $config;

    /**
     * スタンプシートのプレースホルダの適用する設定値を取得
     *
     * @return Config[]|null ユーザIDを指定して抽選を実行
     */
    public function getConfig(): ?array {
        return $this->config;
    }

    /**
     * スタンプシートのプレースホルダの適用する設定値を設定
     *
     * @param Config[] $config ユーザIDを指定して抽選を実行
     */
    public function setConfig(array $config = null) {
        $this->config = $config;
    }

    /**
     * スタンプシートのプレースホルダの適用する設定値を設定
     *
     * @param Config[] $config ユーザIDを指定して抽選を実行
     * @return DrawByUserIdRequest $this
     */
    public function withConfig(array $config = null): DrawByUserIdRequest {
        $this->setConfig($config);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザIDを指定して抽選を実行
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定して抽選を実行
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定して抽選を実行
     * @return DrawByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): DrawByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}