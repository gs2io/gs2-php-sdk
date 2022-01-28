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


class QuestGroupModelMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2QuestRestClient
     */
    private $client;

    /**
     * @var \Gs2\Quest\Domain\Cache\QuestGroupModelMasterDomainCache
     */
    private $questGroupModelMasterCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $questGroupName;

    /**
     * @var \Gs2\Quest\Domain\Cache\QuestModelMasterDomainCache
     */
    private $questModelMasterCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Quest\Domain\Cache\QuestGroupModelMasterDomainCache $questGroupModelMasterCache,
        string $namespaceName,
        string $questGroupName
    ) {
        $this->session = $session;
        $this->client = new Gs2QuestRestClient(
            $session
        );
        $this->questGroupModelMasterCache = $questGroupModelMasterCache;
        $this->namespaceName = $namespaceName;
        $this->questGroupName = $questGroupName;
        $this->questModelMasterCache = new \Gs2\Quest\Domain\Cache\QuestModelMasterDomainCache();
    }

    public function load(
        \Gs2\Quest\Request\GetQuestGroupModelMasterRequest $request
    ): \Gs2\Quest\Result\GetQuestGroupModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setQuestGroupName($this->questGroupName);
        /**
         * @var \Gs2\Quest\Result\GetQuestGroupModelMasterResult
         */
        $r = $this->client->getQuestGroupModelMaster(
            $request
        );
        $this->questGroupModelMasterCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Quest\Request\UpdateQuestGroupModelMasterRequest $request
    ): \Gs2\Quest\Result\UpdateQuestGroupModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setQuestGroupName($this->questGroupName);
        /**
         * @var \Gs2\Quest\Result\UpdateQuestGroupModelMasterResult
         */
        $r = $this->client->updateQuestGroupModelMaster(
            $request
        );
        $this->questGroupModelMasterCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Quest\Request\DeleteQuestGroupModelMasterRequest $request
    ): \Gs2\Quest\Result\DeleteQuestGroupModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setQuestGroupName($this->questGroupName);
        /**
         * @var \Gs2\Quest\Result\DeleteQuestGroupModelMasterResult
         */
        $r = $this->client->deleteQuestGroupModelMaster(
            $request
        );
        $this->questGroupModelMasterCache->delete($r->getItem());
        return $r;
    }

    public function createQuestModelMaster(
        \Gs2\Quest\Request\CreateQuestModelMasterRequest $request
    ): \Gs2\Quest\Result\CreateQuestModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setQuestGroupName($this->questGroupName);
        /**
         * @var \Gs2\Quest\Result\CreateQuestModelMasterResult
         */
        $r = $this->client->createQuestModelMaster(
            $request
        );
        return $r;
    }

    public function questModelMasters(
    ): \Gs2\Quest\Domain\Iterator\DescribeQuestModelMastersIterator {
        return new \Gs2\Quest\Domain\Iterator\DescribeQuestModelMastersIterator(
            $this->questModelMasterCache,
            $this->client,
            $this->namespaceName,
            $this->questGroupName
        );
    }

    public function questModelMaster(
        string $questName
    ): QuestModelMasterDomain {
        return new QuestModelMasterDomain(
            $this->session,
            $this->questModelMasterCache,
            $this->namespaceName,
            $this->questGroupName,
            $questName
        );
    }

}
