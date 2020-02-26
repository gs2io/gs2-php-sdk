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

namespace Gs2\Lock\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * ユーザIDを指定してミューテックスを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class LockByUserIdRequest extends Gs2BasicRequest {

    /** @var string カテゴリー名 */
    private $namespaceName;

    /**
     * カテゴリー名を取得
     *
     * @return string|null ユーザIDを指定してミューテックスを取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * カテゴリー名を設定
     *
     * @param string $namespaceName ユーザIDを指定してミューテックスを取得
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * カテゴリー名を設定
     *
     * @param string $namespaceName ユーザIDを指定してミューテックスを取得
     * @return LockByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName): LockByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string プロパティID */
    private $propertyId;

    /**
     * プロパティIDを取得
     *
     * @return string|null ユーザIDを指定してミューテックスを取得
     */
    public function getPropertyId(): ?string {
        return $this->propertyId;
    }

    /**
     * プロパティIDを設定
     *
     * @param string $propertyId ユーザIDを指定してミューテックスを取得
     */
    public function setPropertyId(string $propertyId) {
        $this->propertyId = $propertyId;
    }

    /**
     * プロパティIDを設定
     *
     * @param string $propertyId ユーザIDを指定してミューテックスを取得
     * @return LockByUserIdRequest $this
     */
    public function withPropertyId(string $propertyId): LockByUserIdRequest {
        $this->setPropertyId($propertyId);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null ユーザIDを指定してミューテックスを取得
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定してミューテックスを取得
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定してミューテックスを取得
     * @return LockByUserIdRequest $this
     */
    public function withUserId(string $userId): LockByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string ロックを取得するトランザクションID */
    private $transactionId;

    /**
     * ロックを取得するトランザクションIDを取得
     *
     * @return string|null ユーザIDを指定してミューテックスを取得
     */
    public function getTransactionId(): ?string {
        return $this->transactionId;
    }

    /**
     * ロックを取得するトランザクションIDを設定
     *
     * @param string $transactionId ユーザIDを指定してミューテックスを取得
     */
    public function setTransactionId(string $transactionId) {
        $this->transactionId = $transactionId;
    }

    /**
     * ロックを取得するトランザクションIDを設定
     *
     * @param string $transactionId ユーザIDを指定してミューテックスを取得
     * @return LockByUserIdRequest $this
     */
    public function withTransactionId(string $transactionId): LockByUserIdRequest {
        $this->setTransactionId($transactionId);
        return $this;
    }

    /** @var int ロックを取得する期限（秒） */
    private $ttl;

    /**
     * ロックを取得する期限（秒）を取得
     *
     * @return int|null ユーザIDを指定してミューテックスを取得
     */
    public function getTtl(): ?int {
        return $this->ttl;
    }

    /**
     * ロックを取得する期限（秒）を設定
     *
     * @param int $ttl ユーザIDを指定してミューテックスを取得
     */
    public function setTtl(int $ttl) {
        $this->ttl = $ttl;
    }

    /**
     * ロックを取得する期限（秒）を設定
     *
     * @param int $ttl ユーザIDを指定してミューテックスを取得
     * @return LockByUserIdRequest $this
     */
    public function withTtl(int $ttl): LockByUserIdRequest {
        $this->setTtl($ttl);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザIDを指定してミューテックスを取得
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定してミューテックスを取得
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定してミューテックスを取得
     * @return LockByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): LockByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}