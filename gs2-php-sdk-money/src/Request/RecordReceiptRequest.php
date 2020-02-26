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
 * レシートを記録 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class RecordReceiptRequest extends Gs2BasicRequest {

    /** @var string ネームスペースの名前 */
    private $namespaceName;

    /**
     * ネームスペースの名前を取得
     *
     * @return string|null レシートを記録
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペースの名前を設定
     *
     * @param string $namespaceName レシートを記録
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペースの名前を設定
     *
     * @param string $namespaceName レシートを記録
     * @return RecordReceiptRequest $this
     */
    public function withNamespaceName(string $namespaceName): RecordReceiptRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null レシートを記録
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId レシートを記録
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId レシートを記録
     * @return RecordReceiptRequest $this
     */
    public function withUserId(string $userId): RecordReceiptRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string プラットフォームストアのコンテンツID */
    private $contentsId;

    /**
     * プラットフォームストアのコンテンツIDを取得
     *
     * @return string|null レシートを記録
     */
    public function getContentsId(): ?string {
        return $this->contentsId;
    }

    /**
     * プラットフォームストアのコンテンツIDを設定
     *
     * @param string $contentsId レシートを記録
     */
    public function setContentsId(string $contentsId) {
        $this->contentsId = $contentsId;
    }

    /**
     * プラットフォームストアのコンテンツIDを設定
     *
     * @param string $contentsId レシートを記録
     * @return RecordReceiptRequest $this
     */
    public function withContentsId(string $contentsId): RecordReceiptRequest {
        $this->setContentsId($contentsId);
        return $this;
    }

    /** @var string レシート */
    private $receipt;

    /**
     * レシートを取得
     *
     * @return string|null レシートを記録
     */
    public function getReceipt(): ?string {
        return $this->receipt;
    }

    /**
     * レシートを設定
     *
     * @param string $receipt レシートを記録
     */
    public function setReceipt(string $receipt) {
        $this->receipt = $receipt;
    }

    /**
     * レシートを設定
     *
     * @param string $receipt レシートを記録
     * @return RecordReceiptRequest $this
     */
    public function withReceipt(string $receipt): RecordReceiptRequest {
        $this->setReceipt($receipt);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null レシートを記録
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider レシートを記録
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider レシートを記録
     * @return RecordReceiptRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): RecordReceiptRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}