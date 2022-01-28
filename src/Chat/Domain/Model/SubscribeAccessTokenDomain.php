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


class SubscribeAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ChatRestClient
     */
    private $client;

    /**
     * @var \Gs2\Chat\Domain\Cache\SubscribeDomainCache
     */
    private $subscribeCache;

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

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Chat\Domain\Cache\SubscribeDomainCache $subscribeCache,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken,
        string $roomName
    ) {
        $this->session = $session;
        $this->client = new Gs2ChatRestClient(
            $session
        );
        $this->subscribeCache = $subscribeCache;
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->roomName = $roomName;
    }

    public function subscribe(
        \Gs2\Chat\Request\SubscribeRequest $request
    ): \Gs2\Chat\Result\SubscribeResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setRoomName($this->roomName);
        /**
         * @var \Gs2\Chat\Result\SubscribeResult
         */
        $r = $this->client->subscribe(
            $request
        );
        $this->subscribeCache->update($r->getItem());
        return $r;
    }

    public function load(
        \Gs2\Chat\Request\GetSubscribeRequest $request
    ): \Gs2\Chat\Result\GetSubscribeResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setRoomName($this->roomName);
        /**
         * @var \Gs2\Chat\Result\GetSubscribeResult
         */
        $r = $this->client->getSubscribe(
            $request
        );
        $this->subscribeCache->update($r->getItem());
        return $r;
    }

    public function updateNotificationType(
        \Gs2\Chat\Request\UpdateNotificationTypeRequest $request
    ): \Gs2\Chat\Result\UpdateNotificationTypeResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setRoomName($this->roomName);
        /**
         * @var \Gs2\Chat\Result\UpdateNotificationTypeResult
         */
        $r = $this->client->updateNotificationType(
            $request
        );
        $this->subscribeCache->update($r->getItem());
        return $r;
    }

    public function unsubscribe(
        \Gs2\Chat\Request\UnsubscribeRequest $request
    ): \Gs2\Chat\Result\UnsubscribeResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setRoomName($this->roomName);
        /**
         * @var \Gs2\Chat\Result\UnsubscribeResult
         */
        $r = $this->client->unsubscribe(
            $request
        );
        $this->subscribeCache->update($r->getItem());
        return $r;
    }

}
