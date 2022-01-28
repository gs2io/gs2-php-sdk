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


class ItemModelMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2InventoryRestClient
     */
    private $client;

    /**
     * @var \Gs2\Inventory\Domain\Cache\ItemModelMasterDomainCache
     */
    private $itemModelMasterCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $inventoryName;

    /**
     * @var string
     */
    private $itemName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Inventory\Domain\Cache\ItemModelMasterDomainCache $itemModelMasterCache,
        string $namespaceName,
        string $inventoryName,
        string $itemName
    ) {
        $this->session = $session;
        $this->client = new Gs2InventoryRestClient(
            $session
        );
        $this->itemModelMasterCache = $itemModelMasterCache;
        $this->namespaceName = $namespaceName;
        $this->inventoryName = $inventoryName;
        $this->itemName = $itemName;
    }

    public function load(
        \Gs2\Inventory\Request\GetItemModelMasterRequest $request
    ): \Gs2\Inventory\Result\GetItemModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setInventoryName($this->inventoryName);
        $request->setItemName($this->itemName);
        /**
         * @var \Gs2\Inventory\Result\GetItemModelMasterResult
         */
        $r = $this->client->getItemModelMaster(
            $request
        );
        $this->itemModelMasterCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Inventory\Request\UpdateItemModelMasterRequest $request
    ): \Gs2\Inventory\Result\UpdateItemModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setInventoryName($this->inventoryName);
        $request->setItemName($this->itemName);
        /**
         * @var \Gs2\Inventory\Result\UpdateItemModelMasterResult
         */
        $r = $this->client->updateItemModelMaster(
            $request
        );
        $this->itemModelMasterCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Inventory\Request\DeleteItemModelMasterRequest $request
    ): \Gs2\Inventory\Result\DeleteItemModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setInventoryName($this->inventoryName);
        $request->setItemName($this->itemName);
        /**
         * @var \Gs2\Inventory\Result\DeleteItemModelMasterResult
         */
        $r = $this->client->deleteItemModelMaster(
            $request
        );
        $this->itemModelMasterCache->delete($r->getItem());
        return $r;
    }

}
