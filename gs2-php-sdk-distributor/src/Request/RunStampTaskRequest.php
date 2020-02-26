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

namespace Gs2\Distributor\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * スタンプシートのタスクを実行する のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class RunStampTaskRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null スタンプシートのタスクを実行する
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName スタンプシートのタスクを実行する
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName スタンプシートのタスクを実行する
     * @return RunStampTaskRequest $this
     */
    public function withNamespaceName(string $namespaceName): RunStampTaskRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 実行するスタンプタスク */
    private $stampTask;

    /**
     * 実行するスタンプタスクを取得
     *
     * @return string|null スタンプシートのタスクを実行する
     */
    public function getStampTask(): ?string {
        return $this->stampTask;
    }

    /**
     * 実行するスタンプタスクを設定
     *
     * @param string $stampTask スタンプシートのタスクを実行する
     */
    public function setStampTask(string $stampTask) {
        $this->stampTask = $stampTask;
    }

    /**
     * 実行するスタンプタスクを設定
     *
     * @param string $stampTask スタンプシートのタスクを実行する
     * @return RunStampTaskRequest $this
     */
    public function withStampTask(string $stampTask): RunStampTaskRequest {
        $this->setStampTask($stampTask);
        return $this;
    }

    /** @var string スタンプシートの暗号化に使用した暗号鍵GRN */
    private $keyId;

    /**
     * スタンプシートの暗号化に使用した暗号鍵GRNを取得
     *
     * @return string|null スタンプシートのタスクを実行する
     */
    public function getKeyId(): ?string {
        return $this->keyId;
    }

    /**
     * スタンプシートの暗号化に使用した暗号鍵GRNを設定
     *
     * @param string $keyId スタンプシートのタスクを実行する
     */
    public function setKeyId(string $keyId) {
        $this->keyId = $keyId;
    }

    /**
     * スタンプシートの暗号化に使用した暗号鍵GRNを設定
     *
     * @param string $keyId スタンプシートのタスクを実行する
     * @return RunStampTaskRequest $this
     */
    public function withKeyId(string $keyId): RunStampTaskRequest {
        $this->setKeyId($keyId);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null スタンプシートのタスクを実行する
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider スタンプシートのタスクを実行する
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider スタンプシートのタスクを実行する
     * @return RunStampTaskRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): RunStampTaskRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}