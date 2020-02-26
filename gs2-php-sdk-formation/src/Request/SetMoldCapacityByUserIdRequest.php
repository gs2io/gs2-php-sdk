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

namespace Gs2\Formation\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * ユーザIDを指定して保存したフォームのキャパシティを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class SetMoldCapacityByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ユーザIDを指定して保存したフォームのキャパシティを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定して保存したフォームのキャパシティを更新
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定して保存したフォームのキャパシティを更新
     * @return SetMoldCapacityByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName): SetMoldCapacityByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null ユーザIDを指定して保存したフォームのキャパシティを更新
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定して保存したフォームのキャパシティを更新
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定して保存したフォームのキャパシティを更新
     * @return SetMoldCapacityByUserIdRequest $this
     */
    public function withUserId(string $userId): SetMoldCapacityByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string フォームの保存領域の名前 */
    private $moldName;

    /**
     * フォームの保存領域の名前を取得
     *
     * @return string|null ユーザIDを指定して保存したフォームのキャパシティを更新
     */
    public function getMoldName(): ?string {
        return $this->moldName;
    }

    /**
     * フォームの保存領域の名前を設定
     *
     * @param string $moldName ユーザIDを指定して保存したフォームのキャパシティを更新
     */
    public function setMoldName(string $moldName) {
        $this->moldName = $moldName;
    }

    /**
     * フォームの保存領域の名前を設定
     *
     * @param string $moldName ユーザIDを指定して保存したフォームのキャパシティを更新
     * @return SetMoldCapacityByUserIdRequest $this
     */
    public function withMoldName(string $moldName): SetMoldCapacityByUserIdRequest {
        $this->setMoldName($moldName);
        return $this;
    }

    /** @var int 現在のキャパシティ */
    private $capacity;

    /**
     * 現在のキャパシティを取得
     *
     * @return int|null ユーザIDを指定して保存したフォームのキャパシティを更新
     */
    public function getCapacity(): ?int {
        return $this->capacity;
    }

    /**
     * 現在のキャパシティを設定
     *
     * @param int $capacity ユーザIDを指定して保存したフォームのキャパシティを更新
     */
    public function setCapacity(int $capacity) {
        $this->capacity = $capacity;
    }

    /**
     * 現在のキャパシティを設定
     *
     * @param int $capacity ユーザIDを指定して保存したフォームのキャパシティを更新
     * @return SetMoldCapacityByUserIdRequest $this
     */
    public function withCapacity(int $capacity): SetMoldCapacityByUserIdRequest {
        $this->setCapacity($capacity);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザIDを指定して保存したフォームのキャパシティを更新
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定して保存したフォームのキャパシティを更新
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定して保存したフォームのキャパシティを更新
     * @return SetMoldCapacityByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): SetMoldCapacityByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}