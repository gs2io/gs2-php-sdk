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


class SubscribeDomain {

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
     * @var string
     */
    private $userId;

    /**
     * @var string
     */
    private $roomName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Chat\Domain\Cache\SubscribeDomainCache $subscribeCache,
        string $namespaceName,
        string $userId,
        string $roomName
    ) {
        $this->session = $session;
        $this->client = new Gs2ChatRestClient(
            $session
        );
        $this->subscribeCache = $subscribeCache;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->roomName = $roomName;
    }

    public function subscribe(
        \Gs2\Chat\Request\SubscribeByUserIdRequest $request
    ): \Gs2\Chat\Result\SubscribeByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setRoomName($this->roomName);
        /**
         * @var \Gs2\Chat\Result\SubscribeByUserIdResult
         */
        $r = $this->client->subscribeByUserId(
            $request
        );
        $this->subscribeCache->update($r->getItem());
        return $r;
    }

    public function load(
        \Gs2\Chat\Request\GetSubscribeByUserIdRequest $request
    ): \Gs2\Chat\Result\GetSubscribeByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setRoomName($this->roomName);
        /**
         * @var \Gs2\Chat\Result\GetSubscribeByUserIdResult
         */
        $r = $this->client->getSubscribeByUserId(
            $request
        );
        $this->subscribeCache->update($r->getItem());
        return $r;
    }

    public function updateNotificationType(
        \Gs2\Chat\Request\UpdateNotificationTypeByUserIdRequest $request
    ): \Gs2\Chat\Result\UpdateNotificationTypeByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setRoomName($this->roomName);
        /**
         * @var \Gs2\Chat\Result\UpdateNotificationTypeByUserIdResult
         */
        $r = $this->client->updateNotificationTypeByUserId(
            $request
        );
        $this->subscribeCache->update($r->getItem());
        return $r;
    }

    public function unsubscribe(
        \Gs2\Chat\Request\UnsubscribeByUserIdRequest $request
    ): \Gs2\Chat\Result\UnsubscribeByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setRoomName($this->roomName);
        /**
         * @var \Gs2\Chat\Result\UnsubscribeByUserIdResult
         */
        $r = $this->client->unsubscribeByUserId(
            $request
        );
        $this->subscribeCache->update($r->getItem());
        return $r;
    }

}
