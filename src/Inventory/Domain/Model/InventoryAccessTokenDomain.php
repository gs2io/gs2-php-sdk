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


class InventoryAccessTokenDomain {

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
     * @var \Gs2\Auth\Model\AccessToken
     */
    private $accessToken;

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
        \Gs2\Auth\Model\AccessToken $accessToken,
        string $inventoryName
    ) {
        $this->session = $session;
        $this->client = new Gs2InventoryRestClient(
            $session
        );
        $this->inventoryCache = $inventoryCache;
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->inventoryName = $inventoryName;
        $this->itemSetCache = new \Gs2\Inventory\Domain\Cache\ItemSetDomainCache();
    }

    public function load(
        \Gs2\Inventory\Request\GetInventoryRequest $request
    ): \Gs2\Inventory\Result\GetInventoryResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setInventoryName($this->inventoryName);
        /**
         * @var \Gs2\Inventory\Result\GetInventoryResult
         */
        $r = $this->client->getInventory(
            $request
        );
        $this->inventoryCache->update($r->getItem());
        return $r;
    }

    public function itemSets(
    ): \Gs2\Inventory\Domain\Iterator\DescribeItemSetsIterator {
        return new \Gs2\Inventory\Domain\Iterator\DescribeItemSetsIterator(
            $this->itemSetCache,
            $this->client,
            $this->namespaceName,
            $this->inventoryName,
            $this->accessToken
        );
    }

    public function itemSet(
        string $itemName,
        string $itemSetName
    ): ItemSetAccessTokenDomain {
        return new ItemSetAccessTokenDomain(
            $this->session,
            $this->itemSetCache,
            $this->namespaceName,
            $this->accessToken,
            $this->inventoryName,
            $itemName,
            $itemSetName
        );
    }

}
