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


class UserDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ScheduleRestClient
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
     * @var \Gs2\Schedule\Domain\Cache\TriggerDomainCache
     */
    private $triggerCache;

    /**
     * @var \Gs2\Schedule\Domain\Cache\EventDomainCache
     */
    private $eventCache;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        string $userId
    ) {
        $this->session = $session;
        $this->client = new Gs2ScheduleRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->triggerCache = new \Gs2\Schedule\Domain\Cache\TriggerDomainCache();
        $this->eventCache = new \Gs2\Schedule\Domain\Cache\EventDomainCache();
    }

    public function triggers(
    ): \Gs2\Schedule\Domain\Iterator\DescribeTriggersByUserIdIterator {
        return new \Gs2\Schedule\Domain\Iterator\DescribeTriggersByUserIdIterator(
            $this->triggerCache,
            $this->client,
            $this->namespaceName,
            $this->userId
        );
    }

    public function events(
    ): \Gs2\Schedule\Domain\Iterator\DescribeEventsByUserIdIterator {
        return new \Gs2\Schedule\Domain\Iterator\DescribeEventsByUserIdIterator(
            $this->eventCache,
            $this->client,
            $this->namespaceName,
            $this->userId
        );
    }

    public function rawEvents(
    ): \Gs2\Schedule\Domain\Iterator\DescribeRawEventsIterator {
        return new \Gs2\Schedule\Domain\Iterator\DescribeRawEventsIterator(
            $this->eventCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function trigger(
        string $triggerName
    ): TriggerDomain {
        return new TriggerDomain(
            $this->session,
            $this->triggerCache,
            $this->namespaceName,
            $this->userId,
            $triggerName
        );
    }

    public function event(
        string $eventName
    ): EventDomain {
        return new EventDomain(
            $this->session,
            $this->eventCache,
            $this->namespaceName,
            $this->userId,
            $eventName
        );
    }

}
