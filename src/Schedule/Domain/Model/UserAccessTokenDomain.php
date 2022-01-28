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


class UserAccessTokenDomain {

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
     * @var \Gs2\Auth\Model\AccessToken
     */
    private $accessToken;

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
        \Gs2\Auth\Model\AccessToken $accessToken
    ) {
        $this->session = $session;
        $this->client = new Gs2ScheduleRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->triggerCache = new \Gs2\Schedule\Domain\Cache\TriggerDomainCache();
        $this->eventCache = new \Gs2\Schedule\Domain\Cache\EventDomainCache();
    }

    public function triggers(
    ): \Gs2\Schedule\Domain\Iterator\DescribeTriggersIterator {
        return new \Gs2\Schedule\Domain\Iterator\DescribeTriggersIterator(
            $this->triggerCache,
            $this->client,
            $this->namespaceName,
            $this->accessToken
        );
    }

    public function events(
    ): \Gs2\Schedule\Domain\Iterator\DescribeEventsIterator {
        return new \Gs2\Schedule\Domain\Iterator\DescribeEventsIterator(
            $this->eventCache,
            $this->client,
            $this->namespaceName,
            $this->accessToken
        );
    }

    public function trigger(
        string $triggerName
    ): TriggerAccessTokenDomain {
        return new TriggerAccessTokenDomain(
            $this->session,
            $this->triggerCache,
            $this->namespaceName,
            $this->accessToken,
            $triggerName
        );
    }

    public function event(
        string $eventName
    ): EventAccessTokenDomain {
        return new EventAccessTokenDomain(
            $this->session,
            $this->eventCache,
            $this->namespaceName,
            $this->accessToken,
            $eventName
        );
    }

}
