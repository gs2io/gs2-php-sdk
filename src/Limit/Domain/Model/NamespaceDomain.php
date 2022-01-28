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

namespace Gs2\Limit\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Limit\Gs2LimitRestClient;


class NamespaceDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2LimitRestClient
     */
    private $client;

    /**
     * @var \Gs2\Limit\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Limit\Domain\Cache\LimitModelMasterDomainCache
     */
    private $limitModelMasterCache;

    /**
     * @var \Gs2\Limit\Domain\Cache\LimitModelDomainCache
     */
    private $limitModelCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Limit\Domain\Cache\NamespaceDomainCache $namespaceCache,
        string $namespaceName
    ) {
        $this->session = $session;
        $this->client = new Gs2LimitRestClient(
            $session
        );
        $this->namespaceCache = $namespaceCache;
        $this->namespaceName = $namespaceName;
        $this->limitModelMasterCache = new \Gs2\Limit\Domain\Cache\LimitModelMasterDomainCache();
        $this->limitModelCache = new \Gs2\Limit\Domain\Cache\LimitModelDomainCache();
    }

    public function getStatus(
        \Gs2\Limit\Request\GetNamespaceStatusRequest $request
    ): \Gs2\Limit\Result\GetNamespaceStatusResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Limit\Result\GetNamespaceStatusResult
         */
        $r = $this->client->getNamespaceStatus(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Limit\Request\GetNamespaceRequest $request
    ): \Gs2\Limit\Result\GetNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Limit\Result\GetNamespaceResult
         */
        $r = $this->client->getNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Limit\Request\UpdateNamespaceRequest $request
    ): \Gs2\Limit\Result\UpdateNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Limit\Result\UpdateNamespaceResult
         */
        $r = $this->client->updateNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Limit\Request\DeleteNamespaceRequest $request
    ): \Gs2\Limit\Result\DeleteNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Limit\Result\DeleteNamespaceResult
         */
        $r = $this->client->deleteNamespace(
            $request
        );
        $this->namespaceCache->delete($r->getItem());
        return $r;
    }

    public function createLimitModelMaster(
        \Gs2\Limit\Request\CreateLimitModelMasterRequest $request
    ): \Gs2\Limit\Result\CreateLimitModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Limit\Result\CreateLimitModelMasterResult
         */
        $r = $this->client->createLimitModelMaster(
            $request
        );
        return $r;
    }

    public function limitModelMasters(
    ): \Gs2\Limit\Domain\Iterator\DescribeLimitModelMastersIterator {
        return new \Gs2\Limit\Domain\Iterator\DescribeLimitModelMastersIterator(
            $this->limitModelMasterCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function limitModels(
    ): \Gs2\Limit\Domain\Iterator\DescribeLimitModelsIterator {
        return new \Gs2\Limit\Domain\Iterator\DescribeLimitModelsIterator(
            $this->limitModelCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function currentLimitMaster(
    ): CurrentLimitMasterDomain {
        return new CurrentLimitMasterDomain(
            $this->session,
            $this->namespaceName
        );
    }

    public function limitModel(
        string $limitName
    ): LimitModelDomain {
        return new LimitModelDomain(
            $this->session,
            $this->limitModelCache,
            $this->namespaceName,
            $limitName
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

    public function limitModelMaster(
        string $limitName
    ): LimitModelMasterDomain {
        return new LimitModelMasterDomain(
            $this->session,
            $this->limitModelMasterCache,
            $this->namespaceName,
            $limitName
        );
    }

}
