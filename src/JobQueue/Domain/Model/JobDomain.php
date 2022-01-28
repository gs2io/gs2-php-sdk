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


class JobDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2JobQueueRestClient
     */
    private $client;

    /**
     * @var \Gs2\JobQueue\Domain\Cache\JobDomainCache
     */
    private $jobCache;

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
    private $jobName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\JobQueue\Domain\Cache\JobDomainCache $jobCache,
        string $namespaceName,
        string $userId,
        string $jobName
    ) {
        $this->session = $session;
        $this->client = new Gs2JobQueueRestClient(
            $session
        );
        $this->jobCache = $jobCache;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->jobName = $jobName;
    }

    public function load(
        \Gs2\JobQueue\Request\GetJobByUserIdRequest $request
    ): \Gs2\JobQueue\Result\GetJobByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setJobName($this->jobName);
        /**
         * @var \Gs2\JobQueue\Result\GetJobByUserIdResult
         */
        $r = $this->client->getJobByUserId(
            $request
        );
        $this->jobCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\JobQueue\Request\DeleteJobByUserIdRequest $request
    ): \Gs2\JobQueue\Result\DeleteJobByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setJobName($this->jobName);
        /**
         * @var \Gs2\JobQueue\Result\DeleteJobByUserIdResult
         */
        $r = $this->client->deleteJobByUserId(
            $request
        );
        $this->jobCache->delete($r->getItem());
        return $r;
    }

}
