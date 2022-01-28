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


class WebSocketSessionDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2GatewayRestClient
     */
    private $client;

    /**
     * @var \Gs2\Gateway\Domain\Cache\WebSocketSessionDomainCache
     */
    private $webSocketSessionCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $userId;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Gateway\Domain\Cache\WebSocketSessionDomainCache $webSocketSessionCache,
        string $namespaceName,
        string $userId
    ) {
        $this->session = $session;
        $this->client = new Gs2GatewayRestClient(
            $session
        );
        $this->webSocketSessionCache = $webSocketSessionCache;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
    }

    public function setUserId(
        \Gs2\Gateway\Request\SetUserIdByUserIdRequest $request
    ): \Gs2\Gateway\Result\SetUserIdByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Gateway\Result\SetUserIdByUserIdResult
         */
        $r = $this->client->setUserIdByUserId(
            $request
        );
        $this->webSocketSessionCache->update($r->getItem());
        return $r;
    }

    public function sendNotification(
        \Gs2\Gateway\Request\SendNotificationRequest $request
    ): \Gs2\Gateway\Result\SendNotificationResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Gateway\Result\SendNotificationResult
         */
        $r = $this->client->sendNotification(
            $request
        );
        return $r;
    }

}
