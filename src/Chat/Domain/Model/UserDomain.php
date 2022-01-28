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


class UserDomain {

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
     * @var string
     */
    private $userId;

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
        string $userId
    ) {
        $this->session = $session;
        $this->client = new Gs2ChatRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->roomCache = new \Gs2\Chat\Domain\Cache\RoomDomainCache();
        $this->subscribeCache = new \Gs2\Chat\Domain\Cache\SubscribeDomainCache();
    }

    public function createRoomFromBackend(
        \Gs2\Chat\Request\CreateRoomFromBackendRequest $request
    ): \Gs2\Chat\Result\CreateRoomFromBackendResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Chat\Result\CreateRoomFromBackendResult
         */
        $r = $this->client->createRoomFromBackend(
            $request
        );
        return $r;
    }

    public function rooms(
    ): \Gs2\Chat\Domain\Iterator\DescribeRoomsIterator {
        return new \Gs2\Chat\Domain\Iterator\DescribeRoomsIterator(
            $this->roomCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function subscribes(
    ): \Gs2\Chat\Domain\Iterator\DescribeSubscribesByUserIdIterator {
        return new \Gs2\Chat\Domain\Iterator\DescribeSubscribesByUserIdIterator(
            $this->subscribeCache,
            $this->client,
            $this->namespaceName,
            $this->userId
        );
    }

    public function room(
        string $roomName,
        ?string $password
    ): RoomDomain {
        return new RoomDomain(
            $this->session,
            $this->roomCache,
            $this->namespaceName,
            $this->userId,
            $roomName,
            $password
        );
    }

    public function subscribe(
        string $roomName
    ): SubscribeDomain {
        return new SubscribeDomain(
            $this->session,
            $this->subscribeCache,
            $this->namespaceName,
            $this->userId,
            $roomName
        );
    }

}
