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


class InventoryDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2InventoryRestClient
     */
    private $client;

    /**
     * @var \Gs2\Inventory\Domain\Cache\InventoryDomainCache
     */
    private $inventoryCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $userId;

    /**
     * @var string
     */
    private $inventoryName;

    /**
     * @var \Gs2\Inventory\Domain\Cache\ItemSetDomainCache
     */
    private $itemSetCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Inventory\Domain\Cache\InventoryDomainCache $inventoryCache,
        string $namespaceName,
        string $userId,
        string $inventoryName
    ) {
        $this->session = $session;
        $this->client = new Gs2InventoryRestClient(
            $session
        );
        $this->inventoryCache = $inventoryCache;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->inventoryName = $inventoryName;
        $this->itemSetCache = new \Gs2\Inventory\Domain\Cache\ItemSetDomainCache();
    }

    public function load(
        \Gs2\Inventory\Request\GetInventoryByUserIdRequest $request
    ): \Gs2\Inventory\Result\GetInventoryByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setInventoryName($this->inventoryName);
        /**
         * @var \Gs2\Inventory\Result\GetInventoryByUserIdResult
         */
        $r = $this->client->getInventoryByUserId(
            $request
        );
        $this->inventoryCache->update($r->getItem());
        return $r;
    }

    public function addCapacity(
        \Gs2\Inventory\Request\AddCapacityByUserIdRequest $request
    ): \Gs2\Inventory\Result\AddCapacityByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setInventoryName($this->inventoryName);
        /**
         * @var \Gs2\Inventory\Result\AddCapacityByUserIdResult
         */
        $r = $this->client->addCapacityByUserId(
            $request
        );
        $this->inventoryCache->update($r->getItem());
        return $r;
    }

    public function setCapacity(
        \Gs2\Inventory\Request\SetCapacityByUserIdRequest $request
    ): \Gs2\Inventory\Result\SetCapacityByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setInventoryName($this->inventoryName);
        /**
         * @var \Gs2\Inventory\Result\SetCapacityByUserIdResult
         */
        $r = $this->client->setCapacityByUserId(
            $request
        );
        $this->inventoryCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Inventory\Request\DeleteInventoryByUserIdRequest $request
    ): \Gs2\Inventory\Result\DeleteInventoryByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setInventoryName($this->inventoryName);
        /**
         * @var \Gs2\Inventory\Result\DeleteInventoryByUserIdResult
         */
        $r = $this->client->deleteInventoryByUserId(
            $request
        );
        $this->inventoryCache->delete($r->getItem());
        return $r;
    }

    public function itemSets(
    ): \Gs2\Inventory\Domain\Iterator\DescribeItemSetsByUserIdIterator {
        return new \Gs2\Inventory\Domain\Iterator\DescribeItemSetsByUserIdIterator(
            $this->itemSetCache,
            $this->client,
            $this->namespaceName,
            $this->inventoryName,
            $this->userId
        );
    }

    public function itemSet(
        string $itemName,
        string $itemSetName
    ): ItemSetDomain {
        return new ItemSetDomain(
            $this->session,
            $this->itemSetCache,
            $this->namespaceName,
            $this->userId,
            $this->inventoryName,
            $itemName,
            $itemSetName
        );
    }

}
