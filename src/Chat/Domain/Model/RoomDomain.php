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


class RoomDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ChatRestClient
     */
    private $client;

    /**
     * @var \Gs2\Chat\Domain\Cache\RoomDomainCache
     */
    private $roomCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $userId;

    /**
     * @var string
     */
    private $roomName;

    /**
     * @var string
     */
    private $password;

    /**
     * @var \Gs2\Chat\Domain\Cache\MessageDomainCache
     */
    private $messageCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Chat\Domain\Cache\RoomDomainCache $roomCache,
        string $namespaceName,
        string $userId,
        string $roomName,
        ?string $password
    ) {
        $this->session = $session;
        $this->client = new Gs2ChatRestClient(
            $session
        );
        $this->roomCache = $roomCache;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->roomName = $roomName;
        $this->password = $password;
        $this->messageCache = new \Gs2\Chat\Domain\Cache\MessageDomainCache();
    }

    public function load(
        \Gs2\Chat\Request\GetRoomRequest $request
    ): \Gs2\Chat\Result\GetRoomResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setRoomName($this->roomName);
        /**
         * @var \Gs2\Chat\Result\GetRoomResult
         */
        $r = $this->client->getRoom(
            $request
        );
        $this->roomCache->update($r->getItem());
        return $r;
    }

    public function updateFromBackend(
        \Gs2\Chat\Request\UpdateRoomFromBackendRequest $request
    ): \Gs2\Chat\Result\UpdateRoomFromBackendResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setRoomName($this->roomName);
        $request->setPassword($this->password);
        /**
         * @var \Gs2\Chat\Result\UpdateRoomFromBackendResult
         */
        $r = $this->client->updateRoomFromBackend(
            $request
        );
        $this->roomCache->update($r->getItem());
        return $r;
    }

    public function deleteFromBackend(
        \Gs2\Chat\Request\DeleteRoomFromBackendRequest $request
    ): \Gs2\Chat\Result\DeleteRoomFromBackendResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setRoomName($this->roomName);
        /**
         * @var \Gs2\Chat\Result\DeleteRoomFromBackendResult
         */
        $r = $this->client->deleteRoomFromBackend(
            $request
        );
        $this->roomCache->delete($r->getItem());
        return $r;
    }

    public function post(
        \Gs2\Chat\Request\PostByUserIdRequest $request
    ): \Gs2\Chat\Result\PostByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setRoomName($this->roomName);
        $request->setPassword($this->password);
        /**
         * @var \Gs2\Chat\Result\PostByUserIdResult
         */
        $r = $this->client->postByUserId(
            $request
        );
        return $r;
    }

    public function messages(
    ): \Gs2\Chat\Domain\Iterator\DescribeMessagesByUserIdIterator {
        return new \Gs2\Chat\Domain\Iterator\DescribeMessagesByUserIdIterator(
            $this->messageCache,
            $this->client,
            $this->namespaceName,
            $this->roomName,
            $this->password,
            $this->userId
        );
    }

    public function message(
        string $messageName
    ): MessageDomain {
        return new MessageDomain(
            $this->session,
            $this->messageCache,
            $this->namespaceName,
            $this->userId,
            $this->roomName,
            $messageName,
            $this->password
        );
    }

}
