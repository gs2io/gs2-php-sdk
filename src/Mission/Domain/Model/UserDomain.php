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

namespace Gs2\Mission\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Mission\Gs2MissionRestClient;


class UserDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2MissionRestClient
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
     * @var \Gs2\Mission\Domain\Cache\CompleteDomainCache
     */
    private $completeCache;

    /**
     * @var \Gs2\Mission\Domain\Cache\CounterDomainCache
     */
    private $counterCache;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        string $userId
    ) {
        $this->session = $session;
        $this->client = new Gs2MissionRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->completeCache = new \Gs2\Mission\Domain\Cache\CompleteDomainCache();
        $this->counterCache = new \Gs2\Mission\Domain\Cache\CounterDomainCache();
    }

    public function completes(
    ): \Gs2\Mission\Domain\Iterator\DescribeCompletesByUserIdIterator {
        return new \Gs2\Mission\Domain\Iterator\DescribeCompletesByUserIdIterator(
            $this->completeCache,
            $this->client,
            $this->namespaceName,
            $this->userId
        );
    }

    public function counters(
    ): \Gs2\Mission\Domain\Iterator\DescribeCountersByUserIdIterator {
        return new \Gs2\Mission\Domain\Iterator\DescribeCountersByUserIdIterator(
            $this->counterCache,
            $this->client,
            $this->namespaceName,
            $this->userId
        );
    }

    public function counter(
        string $counterName
    ): CounterDomain {
        return new CounterDomain(
            $this->session,
            $this->counterCache,
            $this->namespaceName,
            $this->userId,
            $counterName
        );
    }

    public function complete(
        string $missionGroupName
    ): CompleteDomain {
        return new CompleteDomain(
            $this->session,
            $this->completeCache,
            $this->namespaceName,
            $this->userId,
            $missionGroupName
        );
    }

}
