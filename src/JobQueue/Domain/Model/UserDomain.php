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

namespace Gs2\JobQueue\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\JobQueue\Gs2JobQueueRestClient;


class UserDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2JobQueueRestClient
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
     * @var \Gs2\JobQueue\Domain\Cache\JobDomainCache
     */
    private $jobCache;

    /**
     * @var \Gs2\JobQueue\Domain\Cache\DeadLetterJobDomainCache
     */
    private $deadLetterJobCache;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        string $userId
    ) {
        $this->session = $session;
        $this->client = new Gs2JobQueueRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->jobCache = new \Gs2\JobQueue\Domain\Cache\JobDomainCache();
        $this->deadLetterJobCache = new \Gs2\JobQueue\Domain\Cache\DeadLetterJobDomainCache();
    }

    public function push(
        \Gs2\JobQueue\Request\PushByUserIdRequest $request
    ): \Gs2\JobQueue\Result\PushByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\JobQueue\Result\PushByUserIdResult
         */
        $r = $this->client->pushByUserId(
            $request
        );
        return $r;
    }

    public function run(
        \Gs2\JobQueue\Request\RunByUserIdRequest $request
    ): \Gs2\JobQueue\Result\RunByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\JobQueue\Result\RunByUserIdResult
         */
        $r = $this->client->runByUserId(
            $request
        );
        return $r;
    }

    public function jobs(
    ): \Gs2\JobQueue\Domain\Iterator\DescribeJobsByUserIdIterator {
        return new \Gs2\JobQueue\Domain\Iterator\DescribeJobsByUserIdIterator(
            $this->jobCache,
            $this->client,
            $this->namespaceName,
            $this->userId
        );
    }

    public function deadLetterJobs(
    ): \Gs2\JobQueue\Domain\Iterator\DescribeDeadLetterJobsByUserIdIterator {
        return new \Gs2\JobQueue\Domain\Iterator\DescribeDeadLetterJobsByUserIdIterator(
            $this->deadLetterJobCache,
            $this->client,
            $this->namespaceName,
            $this->userId
        );
    }

    public function job(
        string $jobName
    ): JobDomain {
        return new JobDomain(
            $this->session,
            $this->jobCache,
            $this->namespaceName,
            $this->userId,
            $jobName
        );
    }

    public function deadLetterJob(
        string $deadLetterJobName
    ): DeadLetterJobDomain {
        return new DeadLetterJobDomain(
            $this->session,
            $this->deadLetterJobCache,
            $this->namespaceName,
            $this->userId,
            $deadLetterJobName
        );
    }

}
