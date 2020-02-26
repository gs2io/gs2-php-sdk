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
 * ルームを作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateRoomRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ルームを作成
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ルームを作成
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ルームを作成
     * @return CreateRoomRequest $this
     */
    public function withNamespaceName(string $namespaceName): CreateRoomRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ルーム名 */
    private $name;

    /**
     * ルーム名を取得
     *
     * @return string|null ルームを作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * ルーム名を設定
     *
     * @param string $name ルームを作成
     */
    public function setName(string $name) {
        $this->name = $name;
    }

    /**
     * ルーム名を設定
     *
     * @param string $name ルームを作成
     * @return CreateRoomRequest $this
     */
    public function withName(string $name): CreateRoomRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string メタデータ */
    private $metadata;

    /**
     * メタデータを取得
     *
     * @return string|null ルームを作成
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * メタデータを設定
     *
     * @param string $metadata ルームを作成
     */
    public function setMetadata(string $metadata) {
        $this->metadata = $metadata;
    }

    /**
     * メタデータを設定
     *
     * @param string $metadata ルームを作成
     * @return CreateRoomRequest $this
     */
    public function withMetadata(string $metadata): CreateRoomRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var string メッセージを投稿するために必要となるパスワード */
    private $password;

    /**
     * メッセージを投稿するために必要となるパスワードを取得
     *
     * @return string|null ルームを作成
     */
    public function getPassword(): ?string {
        return $this->password;
    }

    /**
     * メッセージを投稿するために必要となるパスワードを設定
     *
     * @param string $password ルームを作成
     */
    public function setPassword(string $password) {
        $this->password = $password;
    }

    /**
     * メッセージを投稿するために必要となるパスワードを設定
     *
     * @param string $password ルームを作成
     * @return CreateRoomRequest $this
     */
    public function withPassword(string $password): CreateRoomRequest {
        $this->setPassword($password);
        return $this;
    }

    /** @var string[] ルームに参加可能なユーザIDリスト */
    private $whiteListUserIds;

    /**
     * ルームに参加可能なユーザIDリストを取得
     *
     * @return string[]|null ルームを作成
     */
    public function getWhiteListUserIds(): ?array {
        return $this->whiteListUserIds;
    }

    /**
     * ルームに参加可能なユーザIDリストを設定
     *
     * @param string[] $whiteListUserIds ルームを作成
     */
    public function setWhiteListUserIds(array $whiteListUserIds) {
        $this->whiteListUserIds = $whiteListUserIds;
    }

    /**
     * ルームに参加可能なユーザIDリストを設定
     *
     * @param string[] $whiteListUserIds ルームを作成
     * @return CreateRoomRequest $this
     */
    public function withWhiteListUserIds(array $whiteListUserIds): CreateRoomRequest {
        $this->setWhiteListUserIds($whiteListUserIds);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ルームを作成
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ルームを作成
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ルームを作成
     * @return CreateRoomRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): CreateRoomRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

    /** @var string アクセストークン */
    private $accessToken;

    /**
     * アクセストークンを取得
     *
     * @return string アクセストークン
     */
    public function getAccessToken(): string {
        return $this->accessToken;
    }

    /**
     * アクセストークンを設定
     *
     * @param string $accessToken アクセストークン
     */
    public function setAccessToken(string $accessToken) {
        $this->accessToken = $accessToken;
    }

    /**
     * アクセストークンを設定
     *
     * @param string $accessToken アクセストークン
     * @return CreateRoomRequest this
     */
    public function withAccessToken(string $accessToken): CreateRoomRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}