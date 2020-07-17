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
 * ミッション達成報酬を受領するためのスタンプシートを発行 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CompleteRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ミッション達成報酬を受領するためのスタンプシートを発行
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ミッション達成報酬を受領するためのスタンプシートを発行
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ミッション達成報酬を受領するためのスタンプシートを発行
     * @return CompleteRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): CompleteRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ミッショングループ名 */
    private $missionGroupName;

    /**
     * ミッショングループ名を取得
     *
     * @return string|null ミッション達成報酬を受領するためのスタンプシートを発行
     */
    public function getMissionGroupName(): ?string {
        return $this->missionGroupName;
    }

    /**
     * ミッショングループ名を設定
     *
     * @param string $missionGroupName ミッション達成報酬を受領するためのスタンプシートを発行
     */
    public function setMissionGroupName(string $missionGroupName = null) {
        $this->missionGroupName = $missionGroupName;
    }

    /**
     * ミッショングループ名を設定
     *
     * @param string $missionGroupName ミッション達成報酬を受領するためのスタンプシートを発行
     * @return CompleteRequest $this
     */
    public function withMissionGroupName(string $missionGroupName = null): CompleteRequest {
        $this->setMissionGroupName($missionGroupName);
        return $this;
    }

    /** @var string タスク名 */
    private $missionTaskName;

    /**
     * タスク名を取得
     *
     * @return string|null ミッション達成報酬を受領するためのスタンプシートを発行
     */
    public function getMissionTaskName(): ?string {
        return $this->missionTaskName;
    }

    /**
     * タスク名を設定
     *
     * @param string $missionTaskName ミッション達成報酬を受領するためのスタンプシートを発行
     */
    public function setMissionTaskName(string $missionTaskName = null) {
        $this->missionTaskName = $missionTaskName;
    }

    /**
     * タスク名を設定
     *
     * @param string $missionTaskName ミッション達成報酬を受領するためのスタンプシートを発行
     * @return CompleteRequest $this
     */
    public function withMissionTaskName(string $missionTaskName = null): CompleteRequest {
        $this->setMissionTaskName($missionTaskName);
        return $this;
    }

    /** @var Config[] スタンプシートの変数に適用する設定値 */
    private $config;

    /**
     * スタンプシートの変数に適用する設定値を取得
     *
     * @return Config[]|null ミッション達成報酬を受領するためのスタンプシートを発行
     */
    public function getConfig(): ?array {
        return $this->config;
    }

    /**
     * スタンプシートの変数に適用する設定値を設定
     *
     * @param Config[] $config ミッション達成報酬を受領するためのスタンプシートを発行
     */
    public function setConfig(array $config = null) {
        $this->config = $config;
    }

    /**
     * スタンプシートの変数に適用する設定値を設定
     *
     * @param Config[] $config ミッション達成報酬を受領するためのスタンプシートを発行
     * @return CompleteRequest $this
     */
    public function withConfig(array $config = null): CompleteRequest {
        $this->setConfig($config);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ミッション達成報酬を受領するためのスタンプシートを発行
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ミッション達成報酬を受領するためのスタンプシートを発行
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ミッション達成報酬を受領するためのスタンプシートを発行
     * @return CompleteRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): CompleteRequest {
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
     * @return CompleteRequest this
     */
    public function withAccessToken(string $accessToken): CompleteRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}