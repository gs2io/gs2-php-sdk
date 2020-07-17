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

namespace Gs2\Identifier\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * クレデンシャルを削除します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteIdentifierRequest extends Gs2BasicRequest {

    /** @var string ユーザー名 */
    private $userName;

    /**
     * ユーザー名を取得
     *
     * @return string|null クレデンシャルを削除します
     */
    public function getUserName(): ?string {
        return $this->userName;
    }

    /**
     * ユーザー名を設定
     *
     * @param string $userName クレデンシャルを削除します
     */
    public function setUserName(string $userName = null) {
        $this->userName = $userName;
    }

    /**
     * ユーザー名を設定
     *
     * @param string $userName クレデンシャルを削除します
     * @return DeleteIdentifierRequest $this
     */
    public function withUserName(string $userName = null): DeleteIdentifierRequest {
        $this->setUserName($userName);
        return $this;
    }

    /** @var string クライアントID */
    private $clientId;

    /**
     * クライアントIDを取得
     *
     * @return string|null クレデンシャルを削除します
     */
    public function getClientId(): ?string {
        return $this->clientId;
    }

    /**
     * クライアントIDを設定
     *
     * @param string $clientId クレデンシャルを削除します
     */
    public function setClientId(string $clientId = null) {
        $this->clientId = $clientId;
    }

    /**
     * クライアントIDを設定
     *
     * @param string $clientId クレデンシャルを削除します
     * @return DeleteIdentifierRequest $this
     */
    public function withClientId(string $clientId = null): DeleteIdentifierRequest {
        $this->setClientId($clientId);
        return $this;
    }

}