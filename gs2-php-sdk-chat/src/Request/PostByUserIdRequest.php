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

namespace Gs2\Chat\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * ユーザIDを指定してメッセージを投稿 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class PostByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ユーザIDを指定してメッセージを投稿
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定してメッセージを投稿
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定してメッセージを投稿
     * @return PostByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName): PostByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ルーム名 */
    private $roomName;

    /**
     * ルーム名を取得
     *
     * @return string|null ユーザIDを指定してメッセージを投稿
     */
    public function getRoomName(): ?string {
        return $this->roomName;
    }

    /**
     * ルーム名を設定
     *
     * @param string $roomName ユーザIDを指定してメッセージを投稿
     */
    public function setRoomName(string $roomName) {
        $this->roomName = $roomName;
    }

    /**
     * ルーム名を設定
     *
     * @param string $roomName ユーザIDを指定してメッセージを投稿
     * @return PostByUserIdRequest $this
     */
    public function withRoomName(string $roomName): PostByUserIdRequest {
        $this->setRoomName($roomName);
        return $this;
    }

    /** @var string 発言したユーザID */
    private $userId;

    /**
     * 発言したユーザIDを取得
     *
     * @return string|null ユーザIDを指定してメッセージを投稿
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * 発言したユーザIDを設定
     *
     * @param string $userId ユーザIDを指定してメッセージを投稿
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * 発言したユーザIDを設定
     *
     * @param string $userId ユーザIDを指定してメッセージを投稿
     * @return PostByUserIdRequest $this
     */
    public function withUserId(string $userId): PostByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var int メッセージの種類を分類したい時の種類番号 */
    private $category;

    /**
     * メッセージの種類を分類したい時の種類番号を取得
     *
     * @return int|null ユーザIDを指定してメッセージを投稿
     */
    public function getCategory(): ?int {
        return $this->category;
    }

    /**
     * メッセージの種類を分類したい時の種類番号を設定
     *
     * @param int $category ユーザIDを指定してメッセージを投稿
     */
    public function setCategory(int $category) {
        $this->category = $category;
    }

    /**
     * メッセージの種類を分類したい時の種類番号を設定
     *
     * @param int $category ユーザIDを指定してメッセージを投稿
     * @return PostByUserIdRequest $this
     */
    public function withCategory(int $category): PostByUserIdRequest {
        $this->setCategory($category);
        return $this;
    }

    /** @var string メタデータ */
    private $metadata;

    /**
     * メタデータを取得
     *
     * @return string|null ユーザIDを指定してメッセージを投稿
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * メタデータを設定
     *
     * @param string $metadata ユーザIDを指定してメッセージを投稿
     */
    public function setMetadata(string $metadata) {
        $this->metadata = $metadata;
    }

    /**
     * メタデータを設定
     *
     * @param string $metadata ユーザIDを指定してメッセージを投稿
     * @return PostByUserIdRequest $this
     */
    public function withMetadata(string $metadata): PostByUserIdRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var string メッセージを投稿するために必要となるパスワード */
    private $password;

    /**
     * メッセージを投稿するために必要となるパスワードを取得
     *
     * @return string|null ユーザIDを指定してメッセージを投稿
     */
    public function getPassword(): ?string {
        return $this->password;
    }

    /**
     * メッセージを投稿するために必要となるパスワードを設定
     *
     * @param string $password ユーザIDを指定してメッセージを投稿
     */
    public function setPassword(string $password) {
        $this->password = $password;
    }

    /**
     * メッセージを投稿するために必要となるパスワードを設定
     *
     * @param string $password ユーザIDを指定してメッセージを投稿
     * @return PostByUserIdRequest $this
     */
    public function withPassword(string $password): PostByUserIdRequest {
        $this->setPassword($password);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザIDを指定してメッセージを投稿
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定してメッセージを投稿
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定してメッセージを投稿
     * @return PostByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): PostByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}