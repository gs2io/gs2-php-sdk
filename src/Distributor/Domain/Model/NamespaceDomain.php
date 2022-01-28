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

namespace Gs2\Distributor\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Distributor\Gs2DistributorRestClient;


class NamespaceDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2DistributorRestClient
     */
    private $client;

    /**
     * @var \Gs2\Distributor\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Distributor\Domain\Cache\DistributorModelMasterDomainCache
     */
    private $distributorModelMasterCache;

    /**
     * @var \Gs2\Distributor\Domain\Cache\DistributorModelDomainCache
     */
    private $distributorModelCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Distributor\Domain\Cache\NamespaceDomainCache $namespaceCache,
        string $namespaceName
    ) {
        $this->session = $session;
        $this->client = new Gs2DistributorRestClient(
            $session
        );
        $this->namespaceCache = $namespaceCache;
        $this->namespaceName = $namespaceName;
        $this->distributorModelMasterCache = new \Gs2\Distributor\Domain\Cache\DistributorModelMasterDomainCache();
        $this->distributorModelCache = new \Gs2\Distributor\Domain\Cache\DistributorModelDomainCache();
    }

    public function getStatus(
        \Gs2\Distributor\Request\GetNamespaceStatusRequest $request
    ): \Gs2\Distributor\Result\GetNamespaceStatusResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Distributor\Result\GetNamespaceStatusResult
         */
        $r = $this->client->getNamespaceStatus(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Distributor\Request\GetNamespaceRequest $request
    ): \Gs2\Distributor\Result\GetNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Distributor\Result\GetNamespaceResult
         */
        $r = $this->client->getNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Distributor\Request\UpdateNamespaceRequest $request
    ): \Gs2\Distributor\Result\UpdateNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Distributor\Result\UpdateNamespaceResult
         */
        $r = $this->client->updateNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Distributor\Request\DeleteNamespaceRequest $request
    ): \Gs2\Distributor\Result\DeleteNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Distributor\Result\DeleteNamespaceResult
         */
        $r = $this->client->deleteNamespace(
            $request
        );
        $this->namespaceCache->delete($r->getItem());
        return $r;
    }

    public function createDistributorModelMaster(
        \Gs2\Distributor\Request\CreateDistributorModelMasterRequest $request
    ): \Gs2\Distributor\Result\CreateDistributorModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Distributor\Result\CreateDistributorModelMasterResult
         */
        $r = $this->client->createDistributorModelMaster(
            $request
        );
        return $r;
    }

    public function distribute(
        \Gs2\Distributor\Request\DistributeRequest $request
    ): \Gs2\Distributor\Result\DistributeResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Distributor\Result\DistributeResult
         */
        $r = $this->client->distribute(
            $request
        );
        return $r;
    }

    public function runStampTask(
        \Gs2\Distributor\Request\RunStampTaskRequest $request
    ): \Gs2\Distributor\Result\RunStampTaskResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Distributor\Result\RunStampTaskResult
         */
        $r = $this->client->runStampTask(
            $request
        );
        return $r;
    }

    public function runStampSheet(
        \Gs2\Distributor\Request\RunStampSheetRequest $request
    ): \Gs2\Distributor\Result\RunStampSheetResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Distributor\Result\RunStampSheetResult
         */
        $r = $this->client->runStampSheet(
            $request
        );
        return $r;
    }

    public function runStampSheetExpress(
        \Gs2\Distributor\Request\RunStampSheetExpressRequest $request
    ): \Gs2\Distributor\Result\RunStampSheetExpressResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Distributor\Result\RunStampSheetExpressResult
         */
        $r = $this->client->runStampSheetExpress(
            $request
        );
        return $r;
    }

    public function distributorModelMasters(
    ): \Gs2\Distributor\Domain\Iterator\DescribeDistributorModelMastersIterator {
        return new \Gs2\Distributor\Domain\Iterator\DescribeDistributorModelMastersIterator(
            $this->distributorModelMasterCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function distributorModels(
    ): \Gs2\Distributor\Domain\Iterator\DescribeDistributorModelsIterator {
        return new \Gs2\Distributor\Domain\Iterator\DescribeDistributorModelsIterator(
            $this->distributorModelCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function currentDistributorMaster(
    ): CurrentDistributorMasterDomain {
        return new CurrentDistributorMasterDomain(
            $this->session,
            $this->namespaceName
        );
    }

    public function distributorModel(
        string $distributorName
    ): DistributorModelDomain {
        return new DistributorModelDomain(
            $this->session,
            $this->distributorModelCache,
            $this->namespaceName,
            $distributorName
        );
    }

    public function distributorModelMaster(
        string $distributorName
    ): DistributorModelMasterDomain {
        return new DistributorModelMasterDomain(
            $this->session,
            $this->distributorModelMasterCache,
            $this->namespaceName,
            $distributorName
        );
    }

}
