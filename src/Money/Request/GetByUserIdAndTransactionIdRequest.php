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
 * レシートの一覧を取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetByUserIdAndTransactionIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペースの名前 */
    private $namespaceName;

    /**
     * ネームスペースの名前を取得
     *
     * @return string|null レシートの一覧を取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペースの名前を設定
     *
     * @param string $namespaceName レシートの一覧を取得
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペースの名前を設定
     *
     * @param string $namespaceName レシートの一覧を取得
     * @return GetByUserIdAndTransactionIdRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): GetByUserIdAndTransactionIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null レシートの一覧を取得
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId レシートの一覧を取得
     */
    public function setUserId(string $userId = null) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId レシートの一覧を取得
     * @return GetByUserIdAndTransactionIdRequest $this
     */
    public function withUserId(string $userId = null): GetByUserIdAndTransactionIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string トランザクションID */
    private $transactionId;

    /**
     * トランザクションIDを取得
     *
     * @return string|null レシートの一覧を取得
     */
    public function getTransactionId(): ?string {
        return $this->transactionId;
    }

    /**
     * トランザクションIDを設定
     *
     * @param string $transactionId レシートの一覧を取得
     */
    public function setTransactionId(string $transactionId = null) {
        $this->transactionId = $transactionId;
    }

    /**
     * トランザクションIDを設定
     *
     * @param string $transactionId レシートの一覧を取得
     * @return GetByUserIdAndTransactionIdRequest $this
     */
    public function withTransactionId(string $transactionId = null): GetByUserIdAndTransactionIdRequest {
        $this->setTransactionId($transactionId);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null レシートの一覧を取得
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider レシートの一覧を取得
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider レシートの一覧を取得
     * @return GetByUserIdAndTransactionIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): GetByUserIdAndTransactionIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}