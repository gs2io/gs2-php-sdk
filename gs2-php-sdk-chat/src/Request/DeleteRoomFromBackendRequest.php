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
 * ルームを削除 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteRoomFromBackendRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ルームを削除
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ルームを削除
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ルームを削除
     * @return DeleteRoomFromBackendRequest $this
     */
    public function withNamespaceName(string $namespaceName): DeleteRoomFromBackendRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ルーム名 */
    private $roomName;

    /**
     * ルーム名を取得
     *
     * @return string|null ルームを削除
     */
    public function getRoomName(): ?string {
        return $this->roomName;
    }

    /**
     * ルーム名を設定
     *
     * @param string $roomName ルームを削除
     */
    public function setRoomName(string $roomName) {
        $this->roomName = $roomName;
    }

    /**
     * ルーム名を設定
     *
     * @param string $roomName ルームを削除
     * @return DeleteRoomFromBackendRequest $this
     */
    public function withRoomName(string $roomName): DeleteRoomFromBackendRequest {
        $this->setRoomName($roomName);
        return $this;
    }

    /** @var string ユーザID */
    private $userId;

    /**
     * ユーザIDを取得
     *
     * @return string|null ルームを削除
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザIDを設定
     *
     * @param string $userId ルームを削除
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザIDを設定
     *
     * @param string $userId ルームを削除
     * @return DeleteRoomFromBackendRequest $this
     */
    public function withUserId(string $userId): DeleteRoomFromBackendRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ルームを削除
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ルームを削除
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ルームを削除
     * @return DeleteRoomFromBackendRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): DeleteRoomFromBackendRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}