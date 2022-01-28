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

namespace Gs2\Quest\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Quest\Gs2QuestRestClient;


class UserDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2QuestRestClient
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
     * @var \Gs2\Quest\Domain\Cache\ProgressDomainCache
     */
    private $progressCache;

    /**
     * @var \Gs2\Quest\Domain\Cache\CompletedQuestListDomainCache
     */
    private $completedQuestListCache;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        string $userId
    ) {
        $this->session = $session;
        $this->client = new Gs2QuestRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->progressCache = new \Gs2\Quest\Domain\Cache\ProgressDomainCache();
        $this->completedQuestListCache = new \Gs2\Quest\Domain\Cache\CompletedQuestListDomainCache();
    }

    public function createProgress(
        \Gs2\Quest\Request\CreateProgressByUserIdRequest $request
    ): \Gs2\Quest\Result\CreateProgressByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Quest\Result\CreateProgressByUserIdResult
         */
        $r = $this->client->createProgressByUserId(
            $request
        );
        return $r;
    }

    public function completedQuestLists(
    ): \Gs2\Quest\Domain\Iterator\DescribeCompletedQuestListsByUserIdIterator {
        return new \Gs2\Quest\Domain\Iterator\DescribeCompletedQuestListsByUserIdIterator(
            $this->completedQuestListCache,
            $this->client,
            $this->namespaceName,
            $this->userId
        );
    }

    public function progress(
    ): ProgressDomain {
        return new ProgressDomain(
            $this->session,
            $this->progressCache,
            $this->namespaceName,
            $this->userId
        );
    }

    public function completedQuestList(
        string $questGroupName
    ): CompletedQuestListDomain {
        return new CompletedQuestListDomain(
            $this->session,
            $this->completedQuestListCache,
            $this->namespaceName,
            $this->userId,
            $questGroupName
        );
    }

}
