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


class NamespaceDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2QuestRestClient
     */
    private $client;

    /**
     * @var \Gs2\Quest\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Quest\Domain\Cache\QuestGroupModelMasterDomainCache
     */
    private $questGroupModelMasterCache;

    /**
     * @var \Gs2\Quest\Domain\Cache\QuestGroupModelDomainCache
     */
    private $questGroupModelCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Quest\Domain\Cache\NamespaceDomainCache $namespaceCache,
        string $namespaceName
    ) {
        $this->session = $session;
        $this->client = new Gs2QuestRestClient(
            $session
        );
        $this->namespaceCache = $namespaceCache;
        $this->namespaceName = $namespaceName;
        $this->questGroupModelMasterCache = new \Gs2\Quest\Domain\Cache\QuestGroupModelMasterDomainCache();
        $this->questGroupModelCache = new \Gs2\Quest\Domain\Cache\QuestGroupModelDomainCache();
    }

    public function getStatus(
        \Gs2\Quest\Request\GetNamespaceStatusRequest $request
    ): \Gs2\Quest\Result\GetNamespaceStatusResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Quest\Result\GetNamespaceStatusResult
         */
        $r = $this->client->getNamespaceStatus(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Quest\Request\GetNamespaceRequest $request
    ): \Gs2\Quest\Result\GetNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Quest\Result\GetNamespaceResult
         */
        $r = $this->client->getNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Quest\Request\UpdateNamespaceRequest $request
    ): \Gs2\Quest\Result\UpdateNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Quest\Result\UpdateNamespaceResult
         */
        $r = $this->client->updateNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Quest\Request\DeleteNamespaceRequest $request
    ): \Gs2\Quest\Result\DeleteNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Quest\Result\DeleteNamespaceResult
         */
        $r = $this->client->deleteNamespace(
            $request
        );
        $this->namespaceCache->delete($r->getItem());
        return $r;
    }

    public function createQuestGroupModelMaster(
        \Gs2\Quest\Request\CreateQuestGroupModelMasterRequest $request
    ): \Gs2\Quest\Result\CreateQuestGroupModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Quest\Result\CreateQuestGroupModelMasterResult
         */
        $r = $this->client->createQuestGroupModelMaster(
            $request
        );
        return $r;
    }

    public function questGroupModelMasters(
    ): \Gs2\Quest\Domain\Iterator\DescribeQuestGroupModelMastersIterator {
        return new \Gs2\Quest\Domain\Iterator\DescribeQuestGroupModelMastersIterator(
            $this->questGroupModelMasterCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function questGroupModels(
    ): \Gs2\Quest\Domain\Iterator\DescribeQuestGroupModelsIterator {
        return new \Gs2\Quest\Domain\Iterator\DescribeQuestGroupModelsIterator(
            $this->questGroupModelCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function user(
        string $userId
    ): UserDomain {
        return new UserDomain(
            $this->session,
            $this->namespaceName,
            $userId
        );
    }

    public function accessToken(
        \Gs2\Auth\Model\AccessToken $accessToken
    ): UserAccessTokenDomain  {
        return new UserAccessTokenDomain(
            $this->session,
            $this->namespaceName,
            $accessToken
        );
    }

    public function currentQuestMaster(
    ): CurrentQuestMasterDomain {
        return new CurrentQuestMasterDomain(
            $this->session,
            $this->namespaceName
        );
    }

    public function questGroupModel(
        string $questGroupName
    ): QuestGroupModelDomain {
        return new QuestGroupModelDomain(
            $this->session,
            $this->questGroupModelCache,
            $this->namespaceName,
            $questGroupName
        );
    }

    public function questGroupModelMaster(
        string $questGroupName
    ): QuestGroupModelMasterDomain {
        return new QuestGroupModelMasterDomain(
            $this->session,
            $this->questGroupModelMasterCache,
            $this->namespaceName,
            $questGroupName
        );
    }

}
