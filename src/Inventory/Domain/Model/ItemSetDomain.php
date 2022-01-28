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


class ItemSetDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2InventoryRestClient
     */
    private $client;

    /**
     * @var \Gs2\Inventory\Domain\Cache\ItemSetDomainCache
     */
    private $itemSetCache;

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
     * @var string
     */
    private $itemName;

    /**
     * @var string
     */
    private $itemSetName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Inventory\Domain\Cache\ItemSetDomainCache $itemSetCache,
        string $namespaceName,
        string $userId,
        string $inventoryName,
        string $itemName,
        string $itemSetName
    ) {
        $this->session = $session;
        $this->client = new Gs2InventoryRestClient(
            $session
        );
        $this->itemSetCache = $itemSetCache;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->inventoryName = $inventoryName;
        $this->itemName = $itemName;
        $this->itemSetName = $itemSetName;
    }

    public function load(
        \Gs2\Inventory\Request\GetItemSetByUserIdRequest $request
    ): \Gs2\Inventory\Result\GetItemSetByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setInventoryName($this->inventoryName);
        $request->setItemName($this->itemName);
        $request->setItemSetName($this->itemSetName);
        /**
         * @var \Gs2\Inventory\Result\GetItemSetByUserIdResult
         */
        $r = $this->client->getItemSetByUserId(
            $request
        );
        return $r;
    }

    public function getItemWithSignature(
        \Gs2\Inventory\Request\GetItemWithSignatureByUserIdRequest $request
    ): \Gs2\Inventory\Result\GetItemWithSignatureByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setInventoryName($this->inventoryName);
        $request->setItemName($this->itemName);
        $request->setItemSetName($this->itemSetName);
        /**
         * @var \Gs2\Inventory\Result\GetItemWithSignatureByUserIdResult
         */
        $r = $this->client->getItemWithSignatureByUserId(
            $request
        );
        return $r;
    }

    public function acquire(
        \Gs2\Inventory\Request\AcquireItemSetByUserIdRequest $request
    ): \Gs2\Inventory\Result\AcquireItemSetByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setInventoryName($this->inventoryName);
        $request->setItemName($this->itemName);
        $request->setItemSetName($this->itemSetName);
        /**
         * @var \Gs2\Inventory\Result\AcquireItemSetByUserIdResult
         */
        $r = $this->client->acquireItemSetByUserId(
            $request
        );
        return $r;
    }

    public function consume(
        \Gs2\Inventory\Request\ConsumeItemSetByUserIdRequest $request
    ): \Gs2\Inventory\Result\ConsumeItemSetByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setInventoryName($this->inventoryName);
        $request->setItemName($this->itemName);
        $request->setItemSetName($this->itemSetName);
        /**
         * @var \Gs2\Inventory\Result\ConsumeItemSetByUserIdResult
         */
        $r = $this->client->consumeItemSetByUserId(
            $request
        );
        return $r;
    }

    public function delete(
        \Gs2\Inventory\Request\DeleteItemSetByUserIdRequest $request
    ): \Gs2\Inventory\Result\DeleteItemSetByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setInventoryName($this->inventoryName);
        $request->setItemName($this->itemName);
        $request->setItemSetName($this->itemSetName);
        /**
         * @var \Gs2\Inventory\Result\DeleteItemSetByUserIdResult
         */
        $r = $this->client->deleteItemSetByUserId(
            $request
        );
        return $r;
    }

    public function referenceOf(
    ): ReferenceOfDomain {
        return new ReferenceOfDomain(
            $this->session,
            $this->namespaceName,
            $this->userId,
            $this->inventoryName,
            $this->itemName,
            $this->itemSetName
        );
    }

}
