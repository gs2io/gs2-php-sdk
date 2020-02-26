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

namespace Gs2\Money\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * スタンプシートを使用してレシートを記録 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class RecordReceiptByStampTaskRequest extends Gs2BasicRequest {

    /** @var string スタンプタスク */
    private $stampTask;

    /**
     * スタンプタスクを取得
     *
     * @return string|null スタンプシートを使用してレシートを記録
     */
    public function getStampTask(): ?string {
        return $this->stampTask;
    }

    /**
     * スタンプタスクを設定
     *
     * @param string $stampTask スタンプシートを使用してレシートを記録
     */
    public function setStampTask(string $stampTask) {
        $this->stampTask = $stampTask;
    }

    /**
     * スタンプタスクを設定
     *
     * @param string $stampTask スタンプシートを使用してレシートを記録
     * @return RecordReceiptByStampTaskRequest $this
     */
    public function withStampTask(string $stampTask): RecordReceiptByStampTaskRequest {
        $this->setStampTask($stampTask);
        return $this;
    }

    /** @var string スタンプタスクの署名検証に使用する 暗号鍵 のGRN */
    private $keyId;

    /**
     * スタンプタスクの署名検証に使用する 暗号鍵 のGRNを取得
     *
     * @return string|null スタンプシートを使用してレシートを記録
     */
    public function getKeyId(): ?string {
        return $this->keyId;
    }

    /**
     * スタンプタスクの署名検証に使用する 暗号鍵 のGRNを設定
     *
     * @param string $keyId スタンプシートを使用してレシートを記録
     */
    public function setKeyId(string $keyId) {
        $this->keyId = $keyId;
    }

    /**
     * スタンプタスクの署名検証に使用する 暗号鍵 のGRNを設定
     *
     * @param string $keyId スタンプシートを使用してレシートを記録
     * @return RecordReceiptByStampTaskRequest $this
     */
    public function withKeyId(string $keyId): RecordReceiptByStampTaskRequest {
        $this->setKeyId($keyId);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null スタンプシートを使用してレシートを記録
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider スタンプシートを使用してレシートを記録
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider スタンプシートを使用してレシートを記録
     * @return RecordReceiptByStampTaskRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): RecordReceiptByStampTaskRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}