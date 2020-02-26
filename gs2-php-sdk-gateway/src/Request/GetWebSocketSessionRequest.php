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

namespace Gs2\Gateway\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Websocketセッションを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetWebSocketSessionRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null Websocketセッションを取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName Websocketセッションを取得
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName Websocketセッションを取得
     * @return GetWebSocketSessionRequest $this
     */
    public function withNamespaceName(string $namespaceName): GetWebSocketSessionRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string コネクションID */
    private $connectionId;

    /**
     * コネクションIDを取得
     *
     * @return string|null Websocketセッションを取得
     */
    public function getConnectionId(): ?string {
        return $this->connectionId;
    }

    /**
     * コネクションIDを設定
     *
     * @param string $connectionId Websocketセッションを取得
     */
    public function setConnectionId(string $connectionId) {
        $this->connectionId = $connectionId;
    }

    /**
     * コネクションIDを設定
     *
     * @param string $connectionId Websocketセッションを取得
     * @return GetWebSocketSessionRequest $this
     */
    public function withConnectionId(string $connectionId): GetWebSocketSessionRequest {
        $this->setConnectionId($connectionId);
        return $this;
    }

}