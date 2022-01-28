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

namespace Gs2\Mission\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Mission\Gs2MissionRestClient;


class NamespaceDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2MissionRestClient
     */
    private $client;

    /**
     * @var \Gs2\Mission\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Mission\Domain\Cache\CounterModelMasterDomainCache
     */
    private $counterModelMasterCache;

    /**
     * @var \Gs2\Mission\Domain\Cache\MissionGroupModelMasterDomainCache
     */
    private $missionGroupModelMasterCache;

    /**
     * @var \Gs2\Mission\Domain\Cache\CounterModelDomainCache
     */
    private $counterModelCache;

    /**
     * @var \Gs2\Mission\Domain\Cache\MissionGroupModelDomainCache
     */
    private $missionGroupModelCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Mission\Domain\Cache\NamespaceDomainCache $namespaceCache,
        string $namespaceName
    ) {
        $this->session = $session;
        $this->client = new Gs2MissionRestClient(
            $session
        );
        $this->namespaceCache = $namespaceCache;
        $this->namespaceName = $namespaceName;
        $this->counterModelMasterCache = new \Gs2\Mission\Domain\Cache\CounterModelMasterDomainCache();
        $this->missionGroupModelMasterCache = new \Gs2\Mission\Domain\Cache\MissionGroupModelMasterDomainCache();
        $this->counterModelCache = new \Gs2\Mission\Domain\Cache\CounterModelDomainCache();
        $this->missionGroupModelCache = new \Gs2\Mission\Domain\Cache\MissionGroupModelDomainCache();
    }

    public function createCounterModelMaster(
        \Gs2\Mission\Request\CreateCounterModelMasterRequest $request
    ): \Gs2\Mission\Result\CreateCounterModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Mission\Result\CreateCounterModelMasterResult
         */
        $r = $this->client->createCounterModelMaster(
            $request
        );
        return $r;
    }

    public function createMissionGroupModelMaster(
        \Gs2\Mission\Request\CreateMissionGroupModelMasterRequest $request
    ): \Gs2\Mission\Result\CreateMissionGroupModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Mission\Result\CreateMissionGroupModelMasterResult
         */
        $r = $this->client->createMissionGroupModelMaster(
            $request
        );
        return $r;
    }

    public function getStatus(
        \Gs2\Mission\Request\GetNamespaceStatusRequest $request
    ): \Gs2\Mission\Result\GetNamespaceStatusResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Mission\Result\GetNamespaceStatusResult
         */
        $r = $this->client->getNamespaceStatus(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Mission\Request\GetNamespaceRequest $request
    ): \Gs2\Mission\Result\GetNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Mission\Result\GetNamespaceResult
         */
        $r = $this->client->getNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Mission\Request\UpdateNamespaceRequest $request
    ): \Gs2\Mission\Result\UpdateNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Mission\Result\UpdateNamespaceResult
         */
        $r = $this->client->updateNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Mission\Request\DeleteNamespaceRequest $request
    ): \Gs2\Mission\Result\DeleteNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Mission\Result\DeleteNamespaceResult
         */
        $r = $this->client->deleteNamespace(
            $request
        );
        $this->namespaceCache->delete($r->getItem());
        return $r;
    }

    public function counterModelMasters(
    ): \Gs2\Mission\Domain\Iterator\DescribeCounterModelMastersIterator {
        return new \Gs2\Mission\Domain\Iterator\DescribeCounterModelMastersIterator(
            $this->counterModelMasterCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function missionGroupModelMasters(
    ): \Gs2\Mission\Domain\Iterator\DescribeMissionGroupModelMastersIterator {
        return new \Gs2\Mission\Domain\Iterator\DescribeMissionGroupModelMastersIterator(
            $this->missionGroupModelMasterCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function counterModels(
    ): \Gs2\Mission\Domain\Iterator\DescribeCounterModelsIterator {
        return new \Gs2\Mission\Domain\Iterator\DescribeCounterModelsIterator(
            $this->counterModelCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function missionGroupModels(
    ): \Gs2\Mission\Domain\Iterator\DescribeMissionGroupModelsIterator {
        return new \Gs2\Mission\Domain\Iterator\DescribeMissionGroupModelsIterator(
            $this->missionGroupModelCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function currentMissionMaster(
    ): CurrentMissionMasterDomain {
        return new CurrentMissionMasterDomain(
            $this->session,
            $this->namespaceName
        );
    }

    public function missionGroupModel(
        string $missionGroupName
    ): MissionGroupModelDomain {
        return new MissionGroupModelDomain(
            $this->session,
            $this->missionGroupModelCache,
            $this->namespaceName,
            $missionGroupName
        );
    }

    public function counterModel(
        string $counterName
    ): CounterModelDomain {
        return new CounterModelDomain(
            $this->session,
            $this->counterModelCache,
            $this->namespaceName,
            $counterName
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

    public function missionGroupModelMaster(
        string $missionGroupName
    ): MissionGroupModelMasterDomain {
        return new MissionGroupModelMasterDomain(
            $this->session,
            $this->missionGroupModelMasterCache,
            $this->namespaceName,
            $missionGroupName
        );
    }

    public function counterModelMaster(
        string $counterName
    ): CounterModelMasterDomain {
        return new CounterModelMasterDomain(
            $this->session,
            $this->counterModelMasterCache,
            $this->namespaceName,
            $counterName
        );
    }

}
