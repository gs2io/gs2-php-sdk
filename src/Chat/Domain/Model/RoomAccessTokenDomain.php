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


class RoomAccessTokenDomain {

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
    private $password;

    /**
     * @var \Gs2\Chat\Domain\Cache\MessageDomainCache
     */
    private $messageCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Chat\Domain\Cache\RoomDomainCache $roomCache,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken,
        string $roomName,
        ?string $password
    ) {
        $this->session = $session;
        $this->client = new Gs2ChatRestClient(
            $session
        );
        $this->roomCache = $roomCache;
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->roomName = $roomName;
        $this->password = $password;
        $this->messageCache = new \Gs2\Chat\Domain\Cache\MessageDomainCache();
    }

    public function update(
        \Gs2\Chat\Request\UpdateRoomRequest $request
    ): \Gs2\Chat\Result\UpdateRoomResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setRoomName($this->roomName);
        $request->setPassword($this->password);
        /**
         * @var \Gs2\Chat\Result\UpdateRoomResult
         */
        $r = $this->client->updateRoom(
            $request
        );
        $this->roomCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Chat\Request\DeleteRoomRequest $request
    ): \Gs2\Chat\Result\DeleteRoomResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setRoomName($this->roomName);
        /**
         * @var \Gs2\Chat\Result\DeleteRoomResult
         */
        $r = $this->client->deleteRoom(
            $request
        );
        $this->roomCache->delete($r->getItem());
        return $r;
    }

    public function post(
        \Gs2\Chat\Request\PostRequest $request
    ): \Gs2\Chat\Result\PostResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setRoomName($this->roomName);
        $request->setPassword($this->password);
        /**
         * @var \Gs2\Chat\Result\PostResult
         */
        $r = $this->client->post(
            $request
        );
        return $r;
    }

    public function messages(
    ): \Gs2\Chat\Domain\Iterator\DescribeMessagesIterator {
        return new \Gs2\Chat\Domain\Iterator\DescribeMessagesIterator(
            $this->messageCache,
            $this->client,
            $this->namespaceName,
            $this->roomName,
            $this->password,
            $this->accessToken
        );
    }

    public function message(
        string $messageName
    ): MessageAccessTokenDomain {
        return new MessageAccessTokenDomain(
            $this->session,
            $this->messageCache,
            $this->namespaceName,
            $this->accessToken,
            $this->roomName,
            $messageName,
            $this->password
        );
    }

}
