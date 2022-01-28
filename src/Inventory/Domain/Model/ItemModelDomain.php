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


class ItemModelDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2InventoryRestClient
     */
    private $client;

    /**
     * @var \Gs2\Inventory\Domain\Cache\ItemModelDomainCache
     */
    private $itemModelCache;

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
        \Gs2\Inventory\Domain\Cache\ItemModelDomainCache $itemModelCache,
        string $namespaceName,
        string $inventoryName,
        string $itemName
    ) {
        $this->session = $session;
        $this->client = new Gs2InventoryRestClient(
            $session
        );
        $this->itemModelCache = $itemModelCache;
        $this->namespaceName = $namespaceName;
        $this->inventoryName = $inventoryName;
        $this->itemName = $itemName;
    }

    public function load(
        \Gs2\Inventory\Request\GetItemModelRequest $request
    ): \Gs2\Inventory\Result\GetItemModelResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setInventoryName($this->inventoryName);
        $request->setItemName($this->itemName);
        /**
         * @var \Gs2\Inventory\Result\GetItemModelResult
         */
        $r = $this->client->getItemModel(
            $request
        );
        $this->itemModelCache->update($r->getItem());
        return $r;
    }

}
