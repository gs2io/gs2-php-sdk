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
 * ルームを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateRoomRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ルームを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ルームを更新
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ルームを更新
     * @return UpdateRoomRequest $this
     */
    public function withNamespaceName(string $namespaceName): UpdateRoomRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ルーム名 */
    private $roomName;

    /**
     * ルーム名を取得
     *
     * @return string|null ルームを更新
     */
    public function getRoomName(): ?string {
        return $this->roomName;
    }

    /**
     * ルーム名を設定
     *
     * @param string $roomName ルームを更新
     */
    public function setRoomName(string $roomName) {
        $this->roomName = $roomName;
    }

    /**
     * ルーム名を設定
     *
     * @param string $roomName ルームを更新
     * @return UpdateRoomRequest $this
     */
    public function withRoomName(string $roomName): UpdateRoomRequest {
        $this->setRoomName($roomName);
        return $this;
    }

    /** @var string メタデータ */
    private $metadata;

    /**
     * メタデータを取得
     *
     * @return string|null ルームを更新
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * メタデータを設定
     *
     * @param string $metadata ルームを更新
     */
    public function setMetadata(string $metadata) {
        $this->metadata = $metadata;
    }

    /**
     * メタデータを設定
     *
     * @param string $metadata ルームを更新
     * @return UpdateRoomRequest $this
     */
    public function withMetadata(string $metadata): UpdateRoomRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var string メッセージを投稿するために必要となるパスワード */
    private $password;

    /**
     * メッセージを投稿するために必要となるパスワードを取得
     *
     * @return string|null ルームを更新
     */
    public function getPassword(): ?string {
        return $this->password;
    }

    /**
     * メッセージを投稿するために必要となるパスワードを設定
     *
     * @param string $password ルームを更新
     */
    public function setPassword(string $password) {
        $this->password = $password;
    }

    /**
     * メッセージを投稿するために必要となるパスワードを設定
     *
     * @param string $password ルームを更新
     * @return UpdateRoomRequest $this
     */
    public function withPassword(string $password): UpdateRoomRequest {
        $this->setPassword($password);
        return $this;
    }

    /** @var string[] ルームに参加可能なユーザIDリスト */
    private $whiteListUserIds;

    /**
     * ルームに参加可能なユーザIDリストを取得
     *
     * @return string[]|null ルームを更新
     */
    public function getWhiteListUserIds(): ?array {
        return $this->whiteListUserIds;
    }

    /**
     * ルームに参加可能なユーザIDリストを設定
     *
     * @param string[] $whiteListUserIds ルームを更新
     */
    public function setWhiteListUserIds(array $whiteListUserIds) {
        $this->whiteListUserIds = $whiteListUserIds;
    }

    /**
     * ルームに参加可能なユーザIDリストを設定
     *
     * @param string[] $whiteListUserIds ルームを更新
     * @return UpdateRoomRequest $this
     */
    public function withWhiteListUserIds(array $whiteListUserIds): UpdateRoomRequest {
        $this->setWhiteListUserIds($whiteListUserIds);
        return $this;
    }

}