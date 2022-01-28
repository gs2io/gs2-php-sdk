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


class InventoryModelMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2InventoryRestClient
     */
    private $client;

    /**
     * @var \Gs2\Inventory\Domain\Cache\InventoryModelMasterDomainCache
     */
    private $inventoryModelMasterCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $inventoryName;

    /**
     * @var \Gs2\Inventory\Domain\Cache\ItemModelMasterDomainCache
     */
    private $itemModelMasterCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Inventory\Domain\Cache\InventoryModelMasterDomainCache $inventoryModelMasterCache,
        string $namespaceName,
        string $inventoryName
    ) {
        $this->session = $session;
        $this->client = new Gs2InventoryRestClient(
            $session
        );
        $this->inventoryModelMasterCache = $inventoryModelMasterCache;
        $this->namespaceName = $namespaceName;
        $this->inventoryName = $inventoryName;
        $this->itemModelMasterCache = new \Gs2\Inventory\Domain\Cache\ItemModelMasterDomainCache();
    }

    public function load(
        \Gs2\Inventory\Request\GetInventoryModelMasterRequest $request
    ): \Gs2\Inventory\Result\GetInventoryModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setInventoryName($this->inventoryName);
        /**
         * @var \Gs2\Inventory\Result\GetInventoryModelMasterResult
         */
        $r = $this->client->getInventoryModelMaster(
            $request
        );
        $this->inventoryModelMasterCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Inventory\Request\UpdateInventoryModelMasterRequest $request
    ): \Gs2\Inventory\Result\UpdateInventoryModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setInventoryName($this->inventoryName);
        /**
         * @var \Gs2\Inventory\Result\UpdateInventoryModelMasterResult
         */
        $r = $this->client->updateInventoryModelMaster(
            $request
        );
        $this->inventoryModelMasterCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Inventory\Request\DeleteInventoryModelMasterRequest $request
    ): \Gs2\Inventory\Result\DeleteInventoryModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setInventoryName($this->inventoryName);
        /**
         * @var \Gs2\Inventory\Result\DeleteInventoryModelMasterResult
         */
        $r = $this->client->deleteInventoryModelMaster(
            $request
        );
        $this->inventoryModelMasterCache->delete($r->getItem());
        return $r;
    }

    public function createItemModelMaster(
        \Gs2\Inventory\Request\CreateItemModelMasterRequest $request
    ): \Gs2\Inventory\Result\CreateItemModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setInventoryName($this->inventoryName);
        /**
         * @var \Gs2\Inventory\Result\CreateItemModelMasterResult
         */
        $r = $this->client->createItemModelMaster(
            $request
        );
        return $r;
    }

    public function itemModelMasters(
    ): \Gs2\Inventory\Domain\Iterator\DescribeItemModelMastersIterator {
        return new \Gs2\Inventory\Domain\Iterator\DescribeItemModelMastersIterator(
            $this->itemModelMasterCache,
            $this->client,
            $this->namespaceName,
            $this->inventoryName
        );
    }

    public function itemModelMaster(
        string $itemName
    ): ItemModelMasterDomain {
        return new ItemModelMasterDomain(
            $this->session,
            $this->itemModelMasterCache,
            $this->namespaceName,
            $this->inventoryName,
            $itemName
        );
    }

}
