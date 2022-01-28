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

namespace Gs2\Inventory\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Inventory\Gs2InventoryRestClient;


class NamespaceDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2InventoryRestClient
     */
    private $client;

    /**
     * @var \Gs2\Inventory\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Inventory\Domain\Cache\InventoryModelMasterDomainCache
     */
    private $inventoryModelMasterCache;

    /**
     * @var \Gs2\Inventory\Domain\Cache\InventoryModelDomainCache
     */
    private $inventoryModelCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Inventory\Domain\Cache\NamespaceDomainCache $namespaceCache,
        string $namespaceName
    ) {
        $this->session = $session;
        $this->client = new Gs2InventoryRestClient(
            $session
        );
        $this->namespaceCache = $namespaceCache;
        $this->namespaceName = $namespaceName;
        $this->inventoryModelMasterCache = new \Gs2\Inventory\Domain\Cache\InventoryModelMasterDomainCache();
        $this->inventoryModelCache = new \Gs2\Inventory\Domain\Cache\InventoryModelDomainCache();
    }

    public function getStatus(
        \Gs2\Inventory\Request\GetNamespaceStatusRequest $request
    ): \Gs2\Inventory\Result\GetNamespaceStatusResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Inventory\Result\GetNamespaceStatusResult
         */
        $r = $this->client->getNamespaceStatus(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Inventory\Request\GetNamespaceRequest $request
    ): \Gs2\Inventory\Result\GetNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Inventory\Result\GetNamespaceResult
         */
        $r = $this->client->getNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Inventory\Request\UpdateNamespaceRequest $request
    ): \Gs2\Inventory\Result\UpdateNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Inventory\Result\UpdateNamespaceResult
         */
        $r = $this->client->updateNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Inventory\Request\DeleteNamespaceRequest $request
    ): \Gs2\Inventory\Result\DeleteNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Inventory\Result\DeleteNamespaceResult
         */
        $r = $this->client->deleteNamespace(
            $request
        );
        $this->namespaceCache->delete($r->getItem());
        return $r;
    }

    public function createInventoryModelMaster(
        \Gs2\Inventory\Request\CreateInventoryModelMasterRequest $request
    ): \Gs2\Inventory\Result\CreateInventoryModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Inventory\Result\CreateInventoryModelMasterResult
         */
        $r = $this->client->createInventoryModelMaster(
            $request
        );
        return $r;
    }

    public function inventoryModelMasters(
    ): \Gs2\Inventory\Domain\Iterator\DescribeInventoryModelMastersIterator {
        return new \Gs2\Inventory\Domain\Iterator\DescribeInventoryModelMastersIterator(
            $this->inventoryModelMasterCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function inventoryModels(
    ): \Gs2\Inventory\Domain\Iterator\DescribeInventoryModelsIterator {
        return new \Gs2\Inventory\Domain\Iterator\DescribeInventoryModelsIterator(
            $this->inventoryModelCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function currentItemModelMaster(
    ): CurrentItemModelMasterDomain {
        return new CurrentItemModelMasterDomain(
            $this->session,
            $this->namespaceName
        );
    }

    public function inventoryModel(
        string $inventoryName
    ): InventoryModelDomain {
        return new InventoryModelDomain(
            $this->session,
            $this->inventoryModelCache,
            $this->namespaceName,
            $inventoryName
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

    public function inventoryModelMaster(
        string $inventoryName
    ): InventoryModelMasterDomain {
        return new InventoryModelMasterDomain(
            $this->session,
            $this->inventoryModelMasterCache,
            $this->namespaceName,
            $inventoryName
        );
    }

}
