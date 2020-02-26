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
 * スタンプシートの完了を報告する のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class RunStampSheetWithoutNamespaceRequest extends Gs2BasicRequest {

    /** @var string 実行するスタンプタスク */
    private $stampSheet;

    /**
     * 実行するスタンプタスクを取得
     *
     * @return string|null スタンプシートの完了を報告する
     */
    public function getStampSheet(): ?string {
        return $this->stampSheet;
    }

    /**
     * 実行するスタンプタスクを設定
     *
     * @param string $stampSheet スタンプシートの完了を報告する
     */
    public function setStampSheet(string $stampSheet) {
        $this->stampSheet = $stampSheet;
    }

    /**
     * 実行するスタンプタスクを設定
     *
     * @param string $stampSheet スタンプシートの完了を報告する
     * @return RunStampSheetWithoutNamespaceRequest $this
     */
    public function withStampSheet(string $stampSheet): RunStampSheetWithoutNamespaceRequest {
        $this->setStampSheet($stampSheet);
        return $this;
    }

    /** @var string スタンプシートの暗号化に使用した暗号鍵GRN */
    private $keyId;

    /**
     * スタンプシートの暗号化に使用した暗号鍵GRNを取得
     *
     * @return string|null スタンプシートの完了を報告する
     */
    public function getKeyId(): ?string {
        return $this->keyId;
    }

    /**
     * スタンプシートの暗号化に使用した暗号鍵GRNを設定
     *
     * @param string $keyId スタンプシートの完了を報告する
     */
    public function setKeyId(string $keyId) {
        $this->keyId = $keyId;
    }

    /**
     * スタンプシートの暗号化に使用した暗号鍵GRNを設定
     *
     * @param string $keyId スタンプシートの完了を報告する
     * @return RunStampSheetWithoutNamespaceRequest $this
     */
    public function withKeyId(string $keyId): RunStampSheetWithoutNamespaceRequest {
        $this->setKeyId($keyId);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null スタンプシートの完了を報告する
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider スタンプシートの完了を報告する
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider スタンプシートの完了を報告する
     * @return RunStampSheetWithoutNamespaceRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): RunStampSheetWithoutNamespaceRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}