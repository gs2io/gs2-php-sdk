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
class RunStampTaskWithoutNamespaceRequest extends Gs2BasicRequest {

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
    public function setStampTask(string $stampTask = null) {
        $this->stampTask = $stampTask;
    }

    /**
     * 実行するスタンプタスクを設定
     *
     * @param string $stampTask スタンプシートのタスクを実行する
     * @return RunStampTaskWithoutNamespaceRequest $this
     */
    public function withStampTask(string $stampTask = null): RunStampTaskWithoutNamespaceRequest {
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
    public function setKeyId(string $keyId = null) {
        $this->keyId = $keyId;
    }

    /**
     * スタンプシートの暗号化に使用した暗号鍵GRNを設定
     *
     * @param string $keyId スタンプシートのタスクを実行する
     * @return RunStampTaskWithoutNamespaceRequest $this
     */
    public function withKeyId(string $keyId = null): RunStampTaskWithoutNamespaceRequest {
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
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider スタンプシートのタスクを実行する
     * @return RunStampTaskWithoutNamespaceRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): RunStampTaskWithoutNamespaceRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}