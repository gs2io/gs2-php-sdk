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


class EventMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ScheduleRestClient
     */
    private $client;

    /**
     * @var \Gs2\Schedule\Domain\Cache\EventMasterDomainCache
     */
    private $eventMasterCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $eventName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Schedule\Domain\Cache\EventMasterDomainCache $eventMasterCache,
        string $namespaceName,
        string $eventName
    ) {
        $this->session = $session;
        $this->client = new Gs2ScheduleRestClient(
            $session
        );
        $this->eventMasterCache = $eventMasterCache;
        $this->namespaceName = $namespaceName;
        $this->eventName = $eventName;
    }

    public function load(
        \Gs2\Schedule\Request\GetEventMasterRequest $request
    ): \Gs2\Schedule\Result\GetEventMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setEventName($this->eventName);
        /**
         * @var \Gs2\Schedule\Result\GetEventMasterResult
         */
        $r = $this->client->getEventMaster(
            $request
        );
        $this->eventMasterCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Schedule\Request\UpdateEventMasterRequest $request
    ): \Gs2\Schedule\Result\UpdateEventMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setEventName($this->eventName);
        /**
         * @var \Gs2\Schedule\Result\UpdateEventMasterResult
         */
        $r = $this->client->updateEventMaster(
            $request
        );
        $this->eventMasterCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Schedule\Request\DeleteEventMasterRequest $request
    ): \Gs2\Schedule\Result\DeleteEventMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setEventName($this->eventName);
        /**
         * @var \Gs2\Schedule\Result\DeleteEventMasterResult
         */
        $r = $this->client->deleteEventMaster(
            $request
        );
        $this->eventMasterCache->delete($r->getItem());
        return $r;
    }

}
