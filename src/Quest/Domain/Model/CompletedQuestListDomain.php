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


class CompletedQuestListDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2QuestRestClient
     */
    private $client;

    /**
     * @var \Gs2\Quest\Domain\Cache\CompletedQuestListDomainCache
     */
    private $completedQuestListCache;

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
    private $questGroupName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Quest\Domain\Cache\CompletedQuestListDomainCache $completedQuestListCache,
        string $namespaceName,
        string $userId,
        string $questGroupName
    ) {
        $this->session = $session;
        $this->client = new Gs2QuestRestClient(
            $session
        );
        $this->completedQuestListCache = $completedQuestListCache;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->questGroupName = $questGroupName;
    }

    public function load(
        \Gs2\Quest\Request\GetCompletedQuestListByUserIdRequest $request
    ): \Gs2\Quest\Result\GetCompletedQuestListByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setQuestGroupName($this->questGroupName);
        /**
         * @var \Gs2\Quest\Result\GetCompletedQuestListByUserIdResult
         */
        $r = $this->client->getCompletedQuestListByUserId(
            $request
        );
        $this->completedQuestListCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Quest\Request\DeleteCompletedQuestListByUserIdRequest $request
    ): \Gs2\Quest\Result\DeleteCompletedQuestListByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setQuestGroupName($this->questGroupName);
        /**
         * @var \Gs2\Quest\Result\DeleteCompletedQuestListByUserIdResult
         */
        $r = $this->client->deleteCompletedQuestListByUserId(
            $request
        );
        $this->completedQuestListCache->delete($r->getItem());
        return $r;
    }

}
