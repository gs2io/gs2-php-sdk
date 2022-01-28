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


class InventoryModelDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2InventoryRestClient
     */
    private $client;

    /**
     * @var \Gs2\Inventory\Domain\Cache\InventoryModelDomainCache
     */
    private $inventoryModelCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $inventoryName;

    /**
     * @var \Gs2\Inventory\Domain\Cache\ItemModelDomainCache
     */
    private $itemModelCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Inventory\Domain\Cache\InventoryModelDomainCache $inventoryModelCache,
        string $namespaceName,
        string $inventoryName
    ) {
        $this->session = $session;
        $this->client = new Gs2InventoryRestClient(
            $session
        );
        $this->inventoryModelCache = $inventoryModelCache;
        $this->namespaceName = $namespaceName;
        $this->inventoryName = $inventoryName;
        $this->itemModelCache = new \Gs2\Inventory\Domain\Cache\ItemModelDomainCache();
    }

    public function load(
        \Gs2\Inventory\Request\GetInventoryModelRequest $request
    ): \Gs2\Inventory\Result\GetInventoryModelResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setInventoryName($this->inventoryName);
        /**
         * @var \Gs2\Inventory\Result\GetInventoryModelResult
         */
        $r = $this->client->getInventoryModel(
            $request
        );
        $this->inventoryModelCache->update($r->getItem());
        return $r;
    }

    public function itemModels(
    ): \Gs2\Inventory\Domain\Iterator\DescribeItemModelsIterator {
        return new \Gs2\Inventory\Domain\Iterator\DescribeItemModelsIterator(
            $this->itemModelCache,
            $this->client,
            $this->namespaceName,
            $this->inventoryName
        );
    }

    public function itemModel(
        string $itemName
    ): ItemModelDomain {
        return new ItemModelDomain(
            $this->session,
            $this->itemModelCache,
            $this->namespaceName,
            $this->inventoryName,
            $itemName
        );
    }

}
