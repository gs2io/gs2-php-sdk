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


class UserAccessTokenDomain {

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
     * @var \Gs2\Auth\Model\AccessToken
     */
    private $accessToken;

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
        \Gs2\Auth\Model\AccessToken $accessToken
    ) {
        $this->session = $session;
        $this->client = new Gs2JobQueueRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->jobCache = new \Gs2\JobQueue\Domain\Cache\JobDomainCache();
        $this->deadLetterJobCache = new \Gs2\JobQueue\Domain\Cache\DeadLetterJobDomainCache();
    }

    public function run(
        \Gs2\JobQueue\Request\RunRequest $request
    ): \Gs2\JobQueue\Result\RunResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\JobQueue\Result\RunResult
         */
        $r = $this->client->run(
            $request
        );
        return $r;
    }

    public function job(
        string $jobName
    ): JobAccessTokenDomain {
        return new JobAccessTokenDomain(
            $this->session,
            $this->jobCache,
            $this->namespaceName,
            $this->accessToken,
            $jobName
        );
    }

    public function deadLetterJob(
        string $deadLetterJobName
    ): DeadLetterJobAccessTokenDomain {
        return new DeadLetterJobAccessTokenDomain(
            $this->session,
            $this->deadLetterJobCache,
            $this->namespaceName,
            $this->accessToken,
            $deadLetterJobName
        );
    }

}
