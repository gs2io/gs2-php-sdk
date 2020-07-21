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

namespace Gs2\Inventory\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * スタンプシートでインベントリのアイテムを検証 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class VerifyReferenceOfByStampTaskRequest extends Gs2BasicRequest {

    /** @var string スタンプタスク */
    private $stampTask;

    /**
     * スタンプタスクを取得
     *
     * @return string|null スタンプシートでインベントリのアイテムを検証
     */
    public function getStampTask(): ?string {
        return $this->stampTask;
    }

    /**
     * スタンプタスクを設定
     *
     * @param string $stampTask スタンプシートでインベントリのアイテムを検証
     */
    public function setStampTask(string $stampTask = null) {
        $this->stampTask = $stampTask;
    }

    /**
     * スタンプタスクを設定
     *
     * @param string $stampTask スタンプシートでインベントリのアイテムを検証
     * @return VerifyReferenceOfByStampTaskRequest $this
     */
    public function withStampTask(string $stampTask = null): VerifyReferenceOfByStampTaskRequest {
        $this->setStampTask($stampTask);
        return $this;
    }

    /** @var string スタンプタスクの署名検証に使用する 暗号鍵 のGRN */
    private $keyId;

    /**
     * スタンプタスクの署名検証に使用する 暗号鍵 のGRNを取得
     *
     * @return string|null スタンプシートでインベントリのアイテムを検証
     */
    public function getKeyId(): ?string {
        return $this->keyId;
    }

    /**
     * スタンプタスクの署名検証に使用する 暗号鍵 のGRNを設定
     *
     * @param string $keyId スタンプシートでインベントリのアイテムを検証
     */
    public function setKeyId(string $keyId = null) {
        $this->keyId = $keyId;
    }

    /**
     * スタンプタスクの署名検証に使用する 暗号鍵 のGRNを設定
     *
     * @param string $keyId スタンプシートでインベントリのアイテムを検証
     * @return VerifyReferenceOfByStampTaskRequest $this
     */
    public function withKeyId(string $keyId = null): VerifyReferenceOfByStampTaskRequest {
        $this->setKeyId($keyId);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null スタンプシートでインベントリのアイテムを検証
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider スタンプシートでインベントリのアイテムを検証
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider スタンプシートでインベントリのアイテムを検証
     * @return VerifyReferenceOfByStampTaskRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): VerifyReferenceOfByStampTaskRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}