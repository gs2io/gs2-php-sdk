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


class UserDomain {

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
     * @var string
     */
    private $userId;

    /**
     * @var \Gs2\Gateway\Domain\Cache\WebSocketSessionDomainCache
     */
    private $webSocketSessionCache;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        string $userId
    ) {
        $this->session = $session;
        $this->client = new Gs2GatewayRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->webSocketSessionCache = new \Gs2\Gateway\Domain\Cache\WebSocketSessionDomainCache();
    }

    public function webSocketSessions(
    ): \Gs2\Gateway\Domain\Iterator\DescribeWebSocketSessionsByUserIdIterator {
        return new \Gs2\Gateway\Domain\Iterator\DescribeWebSocketSessionsByUserIdIterator(
            $this->webSocketSessionCache,
            $this->client,
            $this->namespaceName,
            $this->userId
        );
    }

    public function webSocketSession(
    ): WebSocketSessionDomain {
        return new WebSocketSessionDomain(
            $this->session,
            $this->webSocketSessionCache,
            $this->namespaceName,
            $this->userId
        );
    }

    public function firebaseToken(
    ): FirebaseTokenDomain {
        return new FirebaseTokenDomain(
            $this->session,
            $this->namespaceName,
            $this->userId
        );
    }

}
