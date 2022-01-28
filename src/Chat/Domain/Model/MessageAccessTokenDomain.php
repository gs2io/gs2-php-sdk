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

namespace Gs2\Chat\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Chat\Gs2ChatRestClient;


class MessageAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ChatRestClient
     */
    private $client;

    /**
     * @var \Gs2\Chat\Domain\Cache\MessageDomainCache
     */
    private $messageCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Auth\Model\AccessToken
     */
    private $accessToken;

    /**
     * @var string
     */
    private $roomName;

    /**
     * @var string
     */
    private $messageName;

    /**
     * @var string
     */
    private $password;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Chat\Domain\Cache\MessageDomainCache $messageCache,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken,
        string $roomName,
        string $messageName,
        ?string $password
    ) {
        $this->session = $session;
        $this->client = new Gs2ChatRestClient(
            $session
        );
        $this->messageCache = $messageCache;
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->roomName = $roomName;
        $this->messageName = $messageName;
        $this->password = $password;
    }

    public function load(
        \Gs2\Chat\Request\GetMessageRequest $request
    ): \Gs2\Chat\Result\GetMessageResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setRoomName($this->roomName);
        $request->setMessageName($this->messageName);
        $request->setPassword($this->password);
        /**
         * @var \Gs2\Chat\Result\GetMessageResult
         */
        $r = $this->client->getMessage(
            $request
        );
        $this->messageCache->update($r->getItem());
        return $r;
    }

}
