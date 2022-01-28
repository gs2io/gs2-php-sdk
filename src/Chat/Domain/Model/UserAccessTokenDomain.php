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


class UserAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ChatRestClient
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
     * @var \Gs2\Chat\Domain\Cache\RoomDomainCache
     */
    private $roomCache;

    /**
     * @var \Gs2\Chat\Domain\Cache\SubscribeDomainCache
     */
    private $subscribeCache;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken
    ) {
        $this->session = $session;
        $this->client = new Gs2ChatRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->roomCache = new \Gs2\Chat\Domain\Cache\RoomDomainCache();
        $this->subscribeCache = new \Gs2\Chat\Domain\Cache\SubscribeDomainCache();
    }

    public function createRoom(
        \Gs2\Chat\Request\CreateRoomRequest $request
    ): \Gs2\Chat\Result\CreateRoomResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Chat\Result\CreateRoomResult
         */
        $r = $this->client->createRoom(
            $request
        );
        return $r;
    }

    public function subscribes(
    ): \Gs2\Chat\Domain\Iterator\DescribeSubscribesIterator {
        return new \Gs2\Chat\Domain\Iterator\DescribeSubscribesIterator(
            $this->subscribeCache,
            $this->client,
            $this->namespaceName,
            $this->accessToken
        );
    }

    public function room(
        string $roomName,
        ?string $password
    ): RoomAccessTokenDomain {
        return new RoomAccessTokenDomain(
            $this->session,
            $this->roomCache,
            $this->namespaceName,
            $this->accessToken,
            $roomName,
            $password
        );
    }

    public function subscribe(
        string $roomName
    ): SubscribeAccessTokenDomain {
        return new SubscribeAccessTokenDomain(
            $this->session,
            $this->subscribeCache,
            $this->namespaceName,
            $this->accessToken,
            $roomName
        );
    }

}
