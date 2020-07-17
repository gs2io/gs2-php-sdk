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

namespace Gs2\Quest\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Quest\Model\Config;

/**
 * ユーザIDを指定してクエストを開始 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class StartByUserIdRequest extends Gs2BasicRequest {

    /** @var string カテゴリ名 */
    private $namespaceName;

    /**
     * カテゴリ名を取得
     *
     * @return string|null ユーザIDを指定してクエストを開始
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $namespaceName ユーザIDを指定してクエストを開始
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $namespaceName ユーザIDを指定してクエストを開始
     * @return StartByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): StartByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string クエストグループ名 */
    private $questGroupName;

    /**
     * クエストグループ名を取得
     *
     * @return string|null ユーザIDを指定してクエストを開始
     */
    public function getQuestGroupName(): ?string {
        return $this->questGroupName;
    }

    /**
     * クエストグループ名を設定
     *
     * @param string $questGroupName ユーザIDを指定してクエストを開始
     */
    public function setQuestGroupName(string $questGroupName = null) {
        $this->questGroupName = $questGroupName;
    }

    /**
     * クエストグループ名を設定
     *
     * @param string $questGroupName ユーザIDを指定してクエストを開始
     * @return StartByUserIdRequest $this
     */
    public function withQuestGroupName(string $questGroupName = null): StartByUserIdRequest {
        $this->setQuestGroupName($questGroupName);
        return $this;
    }

    /** @var string クエストモデル名 */
    private $questName;

    /**
     * クエストモデル名を取得
     *
     * @return string|null ユーザIDを指定してクエストを開始
     */
    public function getQuestName(): ?string {
        return $this->questName;
    }

    /**
     * クエストモデル名を設定
     *
     * @param string $questName ユーザIDを指定してクエストを開始
     */
    public function setQuestName(string $questName = null) {
        $this->questName = $questName;
    }

    /**
     * クエストモデル名を設定
     *
     * @param string $questName ユーザIDを指定してクエストを開始
     * @return StartByUserIdRequest $this
     */
    public function withQuestName(string $questName = null): StartByUserIdRequest {
        $this->setQuestName($questName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null ユーザIDを指定してクエストを開始
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定してクエストを開始
     */
    public function setUserId(string $userId = null) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定してクエストを開始
     * @return StartByUserIdRequest $this
     */
    public function withUserId(string $userId = null): StartByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var bool すでに開始しているクエストがある場合にそれを破棄して開始するか */
    private $force;

    /**
     * すでに開始しているクエストがある場合にそれを破棄して開始するかを取得
     *
     * @return bool|null ユーザIDを指定してクエストを開始
     */
    public function getForce(): ?bool {
        return $this->force;
    }

    /**
     * すでに開始しているクエストがある場合にそれを破棄して開始するかを設定
     *
     * @param bool $force ユーザIDを指定してクエストを開始
     */
    public function setForce(bool $force = null) {
        $this->force = $force;
    }

    /**
     * すでに開始しているクエストがある場合にそれを破棄して開始するかを設定
     *
     * @param bool $force ユーザIDを指定してクエストを開始
     * @return StartByUserIdRequest $this
     */
    public function withForce(bool $force = null): StartByUserIdRequest {
        $this->setForce($force);
        return $this;
    }

    /** @var Config[] スタンプシートの変数に適用する設定値 */
    private $config;

    /**
     * スタンプシートの変数に適用する設定値を取得
     *
     * @return Config[]|null ユーザIDを指定してクエストを開始
     */
    public function getConfig(): ?array {
        return $this->config;
    }

    /**
     * スタンプシートの変数に適用する設定値を設定
     *
     * @param Config[] $config ユーザIDを指定してクエストを開始
     */
    public function setConfig(array $config = null) {
        $this->config = $config;
    }

    /**
     * スタンプシートの変数に適用する設定値を設定
     *
     * @param Config[] $config ユーザIDを指定してクエストを開始
     * @return StartByUserIdRequest $this
     */
    public function withConfig(array $config = null): StartByUserIdRequest {
        $this->setConfig($config);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザIDを指定してクエストを開始
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定してクエストを開始
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定してクエストを開始
     * @return StartByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): StartByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}