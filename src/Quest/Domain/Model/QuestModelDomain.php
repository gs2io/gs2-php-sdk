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


class QuestModelDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2QuestRestClient
     */
    private $client;

    /**
     * @var \Gs2\Quest\Domain\Cache\QuestModelDomainCache
     */
    private $questModelCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $questGroupName;

    /**
     * @var string
     */
    private $questName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Quest\Domain\Cache\QuestModelDomainCache $questModelCache,
        string $namespaceName,
        string $questGroupName,
        string $questName
    ) {
        $this->session = $session;
        $this->client = new Gs2QuestRestClient(
            $session
        );
        $this->questModelCache = $questModelCache;
        $this->namespaceName = $namespaceName;
        $this->questGroupName = $questGroupName;
        $this->questName = $questName;
    }

    public function load(
        \Gs2\Quest\Request\GetQuestModelRequest $request
    ): \Gs2\Quest\Result\GetQuestModelResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setQuestGroupName($this->questGroupName);
        $request->setQuestName($this->questName);
        /**
         * @var \Gs2\Quest\Result\GetQuestModelResult
         */
        $r = $this->client->getQuestModel(
            $request
        );
        $this->questModelCache->update($r->getItem());
        return $r;
    }

}
