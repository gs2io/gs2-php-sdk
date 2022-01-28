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


class QuestGroupModelDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2QuestRestClient
     */
    private $client;

    /**
     * @var \Gs2\Quest\Domain\Cache\QuestGroupModelDomainCache
     */
    private $questGroupModelCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $questGroupName;

    /**
     * @var \Gs2\Quest\Domain\Cache\QuestModelDomainCache
     */
    private $questModelCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Quest\Domain\Cache\QuestGroupModelDomainCache $questGroupModelCache,
        string $namespaceName,
        string $questGroupName
    ) {
        $this->session = $session;
        $this->client = new Gs2QuestRestClient(
            $session
        );
        $this->questGroupModelCache = $questGroupModelCache;
        $this->namespaceName = $namespaceName;
        $this->questGroupName = $questGroupName;
        $this->questModelCache = new \Gs2\Quest\Domain\Cache\QuestModelDomainCache();
    }

    public function load(
        \Gs2\Quest\Request\GetQuestGroupModelRequest $request
    ): \Gs2\Quest\Result\GetQuestGroupModelResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setQuestGroupName($this->questGroupName);
        /**
         * @var \Gs2\Quest\Result\GetQuestGroupModelResult
         */
        $r = $this->client->getQuestGroupModel(
            $request
        );
        $this->questGroupModelCache->update($r->getItem());
        return $r;
    }

    public function questModels(
    ): \Gs2\Quest\Domain\Iterator\DescribeQuestModelsIterator {
        return new \Gs2\Quest\Domain\Iterator\DescribeQuestModelsIterator(
            $this->questModelCache,
            $this->client,
            $this->namespaceName,
            $this->questGroupName
        );
    }

    public function questModel(
        string $questName
    ): QuestModelDomain {
        return new QuestModelDomain(
            $this->session,
            $this->questModelCache,
            $this->namespaceName,
            $this->questGroupName,
            $questName
        );
    }

}
