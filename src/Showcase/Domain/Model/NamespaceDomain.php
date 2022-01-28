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

namespace Gs2\Showcase\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Showcase\Gs2ShowcaseRestClient;


class NamespaceDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ShowcaseRestClient
     */
    private $client;

    /**
     * @var \Gs2\Showcase\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Showcase\Domain\Cache\SalesItemMasterDomainCache
     */
    private $salesItemMasterCache;

    /**
     * @var \Gs2\Showcase\Domain\Cache\SalesItemGroupMasterDomainCache
     */
    private $salesItemGroupMasterCache;

    /**
     * @var \Gs2\Showcase\Domain\Cache\ShowcaseMasterDomainCache
     */
    private $showcaseMasterCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Showcase\Domain\Cache\NamespaceDomainCache $namespaceCache,
        string $namespaceName
    ) {
        $this->session = $session;
        $this->client = new Gs2ShowcaseRestClient(
            $session
        );
        $this->namespaceCache = $namespaceCache;
        $this->namespaceName = $namespaceName;
        $this->salesItemMasterCache = new \Gs2\Showcase\Domain\Cache\SalesItemMasterDomainCache();
        $this->salesItemGroupMasterCache = new \Gs2\Showcase\Domain\Cache\SalesItemGroupMasterDomainCache();
        $this->showcaseMasterCache = new \Gs2\Showcase\Domain\Cache\ShowcaseMasterDomainCache();
    }

    public function getStatus(
        \Gs2\Showcase\Request\GetNamespaceStatusRequest $request
    ): \Gs2\Showcase\Result\GetNamespaceStatusResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Showcase\Result\GetNamespaceStatusResult
         */
        $r = $this->client->getNamespaceStatus(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Showcase\Request\GetNamespaceRequest $request
    ): \Gs2\Showcase\Result\GetNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Showcase\Result\GetNamespaceResult
         */
        $r = $this->client->getNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Showcase\Request\UpdateNamespaceRequest $request
    ): \Gs2\Showcase\Result\UpdateNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Showcase\Result\UpdateNamespaceResult
         */
        $r = $this->client->updateNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Showcase\Request\DeleteNamespaceRequest $request
    ): \Gs2\Showcase\Result\DeleteNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Showcase\Result\DeleteNamespaceResult
         */
        $r = $this->client->deleteNamespace(
            $request
        );
        $this->namespaceCache->delete($r->getItem());
        return $r;
    }

    public function createSalesItemMaster(
        \Gs2\Showcase\Request\CreateSalesItemMasterRequest $request
    ): \Gs2\Showcase\Result\CreateSalesItemMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Showcase\Result\CreateSalesItemMasterResult
         */
        $r = $this->client->createSalesItemMaster(
            $request
        );
        return $r;
    }

    public function createSalesItemGroupMaster(
        \Gs2\Showcase\Request\CreateSalesItemGroupMasterRequest $request
    ): \Gs2\Showcase\Result\CreateSalesItemGroupMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Showcase\Result\CreateSalesItemGroupMasterResult
         */
        $r = $this->client->createSalesItemGroupMaster(
            $request
        );
        return $r;
    }

    public function createShowcaseMaster(
        \Gs2\Showcase\Request\CreateShowcaseMasterRequest $request
    ): \Gs2\Showcase\Result\CreateShowcaseMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Showcase\Result\CreateShowcaseMasterResult
         */
        $r = $this->client->createShowcaseMaster(
            $request
        );
        return $r;
    }

    public function salesItemMasters(
    ): \Gs2\Showcase\Domain\Iterator\DescribeSalesItemMastersIterator {
        return new \Gs2\Showcase\Domain\Iterator\DescribeSalesItemMastersIterator(
            $this->salesItemMasterCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function salesItemGroupMasters(
    ): \Gs2\Showcase\Domain\Iterator\DescribeSalesItemGroupMastersIterator {
        return new \Gs2\Showcase\Domain\Iterator\DescribeSalesItemGroupMastersIterator(
            $this->salesItemGroupMasterCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function showcaseMasters(
    ): \Gs2\Showcase\Domain\Iterator\DescribeShowcaseMastersIterator {
        return new \Gs2\Showcase\Domain\Iterator\DescribeShowcaseMastersIterator(
            $this->showcaseMasterCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function currentShowcaseMaster(
    ): CurrentShowcaseMasterDomain {
        return new CurrentShowcaseMasterDomain(
            $this->session,
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

    public function salesItemMaster(
        string $salesItemName
    ): SalesItemMasterDomain {
        return new SalesItemMasterDomain(
            $this->session,
            $this->salesItemMasterCache,
            $this->namespaceName,
            $salesItemName
        );
    }

    public function salesItemGroupMaster(
        string $salesItemGroupName
    ): SalesItemGroupMasterDomain {
        return new SalesItemGroupMasterDomain(
            $this->session,
            $this->salesItemGroupMasterCache,
            $this->namespaceName,
            $salesItemGroupName
        );
    }

    public function showcaseMaster(
        string $showcaseName
    ): ShowcaseMasterDomain {
        return new ShowcaseMasterDomain(
            $this->session,
            $this->showcaseMasterCache,
            $this->namespaceName,
            $showcaseName
        );
    }

}
