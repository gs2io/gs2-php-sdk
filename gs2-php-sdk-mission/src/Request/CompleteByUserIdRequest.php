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

namespace Gs2\Mission\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Mission\Model\Config;

/**
 * 達成状況を新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CompleteByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 達成状況を新規作成
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 達成状況を新規作成
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 達成状況を新規作成
     * @return CompleteByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName): CompleteByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ミッショングループ名 */
    private $missionGroupName;

    /**
     * ミッショングループ名を取得
     *
     * @return string|null 達成状況を新規作成
     */
    public function getMissionGroupName(): ?string {
        return $this->missionGroupName;
    }

    /**
     * ミッショングループ名を設定
     *
     * @param string $missionGroupName 達成状況を新規作成
     */
    public function setMissionGroupName(string $missionGroupName) {
        $this->missionGroupName = $missionGroupName;
    }

    /**
     * ミッショングループ名を設定
     *
     * @param string $missionGroupName 達成状況を新規作成
     * @return CompleteByUserIdRequest $this
     */
    public function withMissionGroupName(string $missionGroupName): CompleteByUserIdRequest {
        $this->setMissionGroupName($missionGroupName);
        return $this;
    }

    /** @var string タスク名 */
    private $missionTaskName;

    /**
     * タスク名を取得
     *
     * @return string|null 達成状況を新規作成
     */
    public function getMissionTaskName(): ?string {
        return $this->missionTaskName;
    }

    /**
     * タスク名を設定
     *
     * @param string $missionTaskName 達成状況を新規作成
     */
    public function setMissionTaskName(string $missionTaskName) {
        $this->missionTaskName = $missionTaskName;
    }

    /**
     * タスク名を設定
     *
     * @param string $missionTaskName 達成状況を新規作成
     * @return CompleteByUserIdRequest $this
     */
    public function withMissionTaskName(string $missionTaskName): CompleteByUserIdRequest {
        $this->setMissionTaskName($missionTaskName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null 達成状況を新規作成
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId 達成状況を新規作成
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId 達成状況を新規作成
     * @return CompleteByUserIdRequest $this
     */
    public function withUserId(string $userId): CompleteByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var Config[] スタンプシートの変数に適用する設定値 */
    private $config;

    /**
     * スタンプシートの変数に適用する設定値を取得
     *
     * @return Config[]|null 達成状況を新規作成
     */
    public function getConfig(): ?array {
        return $this->config;
    }

    /**
     * スタンプシートの変数に適用する設定値を設定
     *
     * @param Config[] $config 達成状況を新規作成
     */
    public function setConfig(array $config) {
        $this->config = $config;
    }

    /**
     * スタンプシートの変数に適用する設定値を設定
     *
     * @param Config[] $config 達成状況を新規作成
     * @return CompleteByUserIdRequest $this
     */
    public function withConfig(array $config): CompleteByUserIdRequest {
        $this->setConfig($config);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null 達成状況を新規作成
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 達成状況を新規作成
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 達成状況を新規作成
     * @return CompleteByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): CompleteByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}