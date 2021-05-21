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

namespace Gs2\Enhance\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * スタンプタスクで 強化実行 を削除 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteProgressByStampTaskRequest extends Gs2BasicRequest {

    /** @var string スタンプタスク */
    private $stampTask;

    /**
     * スタンプタスクを取得
     *
     * @return string|null スタンプタスクで 強化実行 を削除
     */
    public function getStampTask(): ?string {
        return $this->stampTask;
    }

    /**
     * スタンプタスクを設定
     *
     * @param string $stampTask スタンプタスクで 強化実行 を削除
     */
    public function setStampTask(string $stampTask = null) {
        $this->stampTask = $stampTask;
    }

    /**
     * スタンプタスクを設定
     *
     * @param string $stampTask スタンプタスクで 強化実行 を削除
     * @return DeleteProgressByStampTaskRequest $this
     */
    public function withStampTask(string $stampTask = null): DeleteProgressByStampTaskRequest {
        $this->setStampTask($stampTask);
        return $this;
    }

    /** @var string スタンプタスクの署名検証に使用する 暗号鍵 のGRN */
    private $keyId;

    /**
     * スタンプタスクの署名検証に使用する 暗号鍵 のGRNを取得
     *
     * @return string|null スタンプタスクで 強化実行 を削除
     */
    public function getKeyId(): ?string {
        return $this->keyId;
    }

    /**
     * スタンプタスクの署名検証に使用する 暗号鍵 のGRNを設定
     *
     * @param string $keyId スタンプタスクで 強化実行 を削除
     */
    public function setKeyId(string $keyId = null) {
        $this->keyId = $keyId;
    }

    /**
     * スタンプタスクの署名検証に使用する 暗号鍵 のGRNを設定
     *
     * @param string $keyId スタンプタスクで 強化実行 を削除
     * @return DeleteProgressByStampTaskRequest $this
     */
    public function withKeyId(string $keyId = null): DeleteProgressByStampTaskRequest {
        $this->setKeyId($keyId);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null スタンプタスクで 強化実行 を削除
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider スタンプタスクで 強化実行 を削除
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider スタンプタスクで 強化実行 を削除
     * @return DeleteProgressByStampTaskRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): DeleteProgressByStampTaskRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}