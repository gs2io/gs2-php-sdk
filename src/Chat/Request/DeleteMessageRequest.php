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
 * メッセージを削除 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteMessageRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null メッセージを削除
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName メッセージを削除
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName メッセージを削除
     * @return DeleteMessageRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): DeleteMessageRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ルーム名 */
    private $roomName;

    /**
     * ルーム名を取得
     *
     * @return string|null メッセージを削除
     */
    public function getRoomName(): ?string {
        return $this->roomName;
    }

    /**
     * ルーム名を設定
     *
     * @param string $roomName メッセージを削除
     */
    public function setRoomName(string $roomName = null) {
        $this->roomName = $roomName;
    }

    /**
     * ルーム名を設定
     *
     * @param string $roomName メッセージを削除
     * @return DeleteMessageRequest $this
     */
    public function withRoomName(string $roomName = null): DeleteMessageRequest {
        $this->setRoomName($roomName);
        return $this;
    }

    /** @var string メッセージ名 */
    private $messageName;

    /**
     * メッセージ名を取得
     *
     * @return string|null メッセージを削除
     */
    public function getMessageName(): ?string {
        return $this->messageName;
    }

    /**
     * メッセージ名を設定
     *
     * @param string $messageName メッセージを削除
     */
    public function setMessageName(string $messageName = null) {
        $this->messageName = $messageName;
    }

    /**
     * メッセージ名を設定
     *
     * @param string $messageName メッセージを削除
     * @return DeleteMessageRequest $this
     */
    public function withMessageName(string $messageName = null): DeleteMessageRequest {
        $this->setMessageName($messageName);
        return $this;
    }

}