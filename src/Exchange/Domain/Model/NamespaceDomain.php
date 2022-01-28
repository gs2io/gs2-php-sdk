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

namespace Gs2\Exchange\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Exchange\Gs2ExchangeRestClient;


class NamespaceDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ExchangeRestClient
     */
    private $client;

    /**
     * @var \Gs2\Exchange\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Exchange\Domain\Cache\RateModelDomainCache
     */
    private $rateModelCache;

    /**
     * @var \Gs2\Exchange\Domain\Cache\RateModelMasterDomainCache
     */
    private $rateModelMasterCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Exchange\Domain\Cache\NamespaceDomainCache $namespaceCache,
        string $namespaceName
    ) {
        $this->session = $session;
        $this->client = new Gs2ExchangeRestClient(
            $session
        );
        $this->namespaceCache = $namespaceCache;
        $this->namespaceName = $namespaceName;
        $this->rateModelCache = new \Gs2\Exchange\Domain\Cache\RateModelDomainCache();
        $this->rateModelMasterCache = new \Gs2\Exchange\Domain\Cache\RateModelMasterDomainCache();
    }

    public function getStatus(
        \Gs2\Exchange\Request\GetNamespaceStatusRequest $request
    ): \Gs2\Exchange\Result\GetNamespaceStatusResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Exchange\Result\GetNamespaceStatusResult
         */
        $r = $this->client->getNamespaceStatus(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Exchange\Request\GetNamespaceRequest $request
    ): \Gs2\Exchange\Result\GetNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Exchange\Result\GetNamespaceResult
         */
        $r = $this->client->getNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Exchange\Request\UpdateNamespaceRequest $request
    ): \Gs2\Exchange\Result\UpdateNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Exchange\Result\UpdateNamespaceResult
         */
        $r = $this->client->updateNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Exchange\Request\DeleteNamespaceRequest $request
    ): \Gs2\Exchange\Result\DeleteNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Exchange\Result\DeleteNamespaceResult
         */
        $r = $this->client->deleteNamespace(
            $request
        );
        $this->namespaceCache->delete($r->getItem());
        return $r;
    }

    public function createRateModelMaster(
        \Gs2\Exchange\Request\CreateRateModelMasterRequest $request
    ): \Gs2\Exchange\Result\CreateRateModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Exchange\Result\CreateRateModelMasterResult
         */
        $r = $this->client->createRateModelMaster(
            $request
        );
        return $r;
    }

    public function rateModels(
    ): \Gs2\Exchange\Domain\Iterator\DescribeRateModelsIterator {
        return new \Gs2\Exchange\Domain\Iterator\DescribeRateModelsIterator(
            $this->rateModelCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function rateModelMasters(
    ): \Gs2\Exchange\Domain\Iterator\DescribeRateModelMastersIterator {
        return new \Gs2\Exchange\Domain\Iterator\DescribeRateModelMastersIterator(
            $this->rateModelMasterCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function rateModelMaster(
        string $rateName
    ): RateModelMasterDomain {
        return new RateModelMasterDomain(
            $this->session,
            $this->rateModelMasterCache,
            $this->namespaceName,
            $rateName
        );
    }

    public function currentRateMaster(
    ): CurrentRateMasterDomain {
        return new CurrentRateMasterDomain(
            $this->session,
            $this->namespaceName
        );
    }

    public function rateModel(
        string $rateName
    ): RateModelDomain {
        return new RateModelDomain(
            $this->session,
            $this->rateModelCache,
            $this->namespaceName,
            $rateName
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

}
