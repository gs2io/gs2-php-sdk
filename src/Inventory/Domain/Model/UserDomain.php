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


class UserDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2InventoryRestClient
     */
    private $client;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $userId;

    /**
     * @var \Gs2\Inventory\Domain\Cache\InventoryDomainCache
     */
    private $inventoryCache;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        string $userId
    ) {
        $this->session = $session;
        $this->client = new Gs2InventoryRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->inventoryCache = new \Gs2\Inventory\Domain\Cache\InventoryDomainCache();
    }

    public function inventories(
    ): \Gs2\Inventory\Domain\Iterator\DescribeInventoriesByUserIdIterator {
        return new \Gs2\Inventory\Domain\Iterator\DescribeInventoriesByUserIdIterator(
            $this->inventoryCache,
            $this->client,
            $this->namespaceName,
            $this->userId
        );
    }

    public function inventory(
        string $inventoryName
    ): InventoryDomain {
        return new InventoryDomain(
            $this->session,
            $this->inventoryCache,
            $this->namespaceName,
            $this->userId,
            $inventoryName
        );
    }

}
