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
 * プロジェクトトークン を取得します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class LoginRequest extends Gs2BasicRequest {

    /** @var string クライアントID */
    private $client_id;

    /**
     * クライアントIDを取得
     *
     * @return string|null プロジェクトトークン を取得します
     */
    public function getClientId(): ?string {
        return $this->client_id;
    }

    /**
     * クライアントIDを設定
     *
     * @param string $clientId プロジェクトトークン を取得します
     */
    public function setClientId(string $clientId = null) {
        $this->client_id = $clientId;
    }

    /**
     * クライアントIDを設定
     *
     * @param string $clientId プロジェクトトークン を取得します
     * @return LoginRequest $this
     */
    public function withClientId(string $clientId = null): LoginRequest {
        $this->setClientId($clientId);
        return $this;
    }

    /** @var string クライアントシークレット */
    private $client_secret;

    /**
     * クライアントシークレットを取得
     *
     * @return string|null プロジェクトトークン を取得します
     */
    public function getClientSecret(): ?string {
        return $this->client_secret;
    }

    /**
     * クライアントシークレットを設定
     *
     * @param string $clientSecret プロジェクトトークン を取得します
     */
    public function setClientSecret(string $clientSecret = null) {
        $this->client_secret = $clientSecret;
    }

    /**
     * クライアントシークレットを設定
     *
     * @param string $clientSecret プロジェクトトークン を取得します
     * @return LoginRequest $this
     */
    public function withClientSecret(string $clientSecret = null): LoginRequest {
        $this->setClientSecret($clientSecret);
        return $this;
    }

}