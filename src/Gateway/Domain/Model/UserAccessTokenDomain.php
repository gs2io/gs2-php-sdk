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

namespace Gs2\Gateway\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Gateway\Gs2GatewayRestClient;


class UserAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2GatewayRestClient
     */
    private $client;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Auth\Model\AccessToken
     */
    private $accessToken;

    /**
     * @var \Gs2\Gateway\Domain\Cache\WebSocketSessionDomainCache
     */
    private $webSocketSessionCache;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken
    ) {
        $this->session = $session;
        $this->client = new Gs2GatewayRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->webSocketSessionCache = new \Gs2\Gateway\Domain\Cache\WebSocketSessionDomainCache();
    }

    public function webSocketSessions(
    ): \Gs2\Gateway\Domain\Iterator\DescribeWebSocketSessionsIterator {
        return new \Gs2\Gateway\Domain\Iterator\DescribeWebSocketSessionsIterator(
            $this->webSocketSessionCache,
            $this->client,
            $this->namespaceName,
            $this->accessToken
        );
    }

    public function webSocketSession(
    ): WebSocketSessionAccessTokenDomain {
        return new WebSocketSessionAccessTokenDomain(
            $this->session,
            $this->webSocketSessionCache,
            $this->namespaceName,
            $this->accessToken
        );
    }

    public function firebaseToken(
    ): FirebaseTokenAccessTokenDomain {
        return new FirebaseTokenAccessTokenDomain(
            $this->session,
            $this->namespaceName,
            $this->accessToken
        );
    }

}
