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


class DeadLetterJobDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2JobQueueRestClient
     */
    private $client;

    /**
     * @var \Gs2\JobQueue\Domain\Cache\DeadLetterJobDomainCache
     */
    private $deadLetterJobCache;

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
    private $deadLetterJobName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\JobQueue\Domain\Cache\DeadLetterJobDomainCache $deadLetterJobCache,
        string $namespaceName,
        string $userId,
        string $deadLetterJobName
    ) {
        $this->session = $session;
        $this->client = new Gs2JobQueueRestClient(
            $session
        );
        $this->deadLetterJobCache = $deadLetterJobCache;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->deadLetterJobName = $deadLetterJobName;
    }

    public function load(
        \Gs2\JobQueue\Request\GetDeadLetterJobByUserIdRequest $request
    ): \Gs2\JobQueue\Result\GetDeadLetterJobByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setDeadLetterJobName($this->deadLetterJobName);
        /**
         * @var \Gs2\JobQueue\Result\GetDeadLetterJobByUserIdResult
         */
        $r = $this->client->getDeadLetterJobByUserId(
            $request
        );
        $this->deadLetterJobCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\JobQueue\Request\DeleteDeadLetterJobByUserIdRequest $request
    ): \Gs2\JobQueue\Result\DeleteDeadLetterJobByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setDeadLetterJobName($this->deadLetterJobName);
        /**
         * @var \Gs2\JobQueue\Result\DeleteDeadLetterJobByUserIdResult
         */
        $r = $this->client->deleteDeadLetterJobByUserId(
            $request
        );
        $this->deadLetterJobCache->delete($r->getItem());
        return $r;
    }

}
