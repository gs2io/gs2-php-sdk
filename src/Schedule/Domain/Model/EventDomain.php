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

namespace Gs2\Schedule\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Schedule\Gs2ScheduleRestClient;


class EventDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ScheduleRestClient
     */
    private $client;

    /**
     * @var \Gs2\Schedule\Domain\Cache\EventDomainCache
     */
    private $eventCache;

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
    private $eventName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Schedule\Domain\Cache\EventDomainCache $eventCache,
        string $namespaceName,
        string $userId,
        string $eventName
    ) {
        $this->session = $session;
        $this->client = new Gs2ScheduleRestClient(
            $session
        );
        $this->eventCache = $eventCache;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->eventName = $eventName;
    }

    public function load(
        \Gs2\Schedule\Request\GetEventByUserIdRequest $request
    ): \Gs2\Schedule\Result\GetEventByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setEventName($this->eventName);
        /**
         * @var \Gs2\Schedule\Result\GetEventByUserIdResult
         */
        $r = $this->client->getEventByUserId(
            $request
        );
        $this->eventCache->update($r->getItem());
        return $r;
    }

    public function getRaw(
        \Gs2\Schedule\Request\GetRawEventRequest $request
    ): \Gs2\Schedule\Result\GetRawEventResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setEventName($this->eventName);
        /**
         * @var \Gs2\Schedule\Result\GetRawEventResult
         */
        $r = $this->client->getRawEvent(
            $request
        );
        $this->eventCache->update($r->getItem());
        return $r;
    }

}
