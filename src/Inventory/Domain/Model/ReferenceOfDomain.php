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


class ReferenceOfDomain {

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
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->inventoryName = $inventoryName;
        $this->itemName = $itemName;
        $this->itemSetName = $itemSetName;
    }

    public function load(
        \Gs2\Inventory\Request\GetReferenceOfByUserIdRequest $request
    ): \Gs2\Inventory\Result\GetReferenceOfByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setInventoryName($this->inventoryName);
        $request->setItemName($this->itemName);
        $request->setItemSetName($this->itemSetName);
        /**
         * @var \Gs2\Inventory\Result\GetReferenceOfByUserIdResult
         */
        $r = $this->client->getReferenceOfByUserId(
            $request
        );
        return $r;
    }

    public function verify(
        \Gs2\Inventory\Request\VerifyReferenceOfByUserIdRequest $request
    ): \Gs2\Inventory\Result\VerifyReferenceOfByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setInventoryName($this->inventoryName);
        $request->setItemName($this->itemName);
        $request->setItemSetName($this->itemSetName);
        /**
         * @var \Gs2\Inventory\Result\VerifyReferenceOfByUserIdResult
         */
        $r = $this->client->verifyReferenceOfByUserId(
            $request
        );
        return $r;
    }

    public function add(
        \Gs2\Inventory\Request\AddReferenceOfByUserIdRequest $request
    ): \Gs2\Inventory\Result\AddReferenceOfByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setInventoryName($this->inventoryName);
        $request->setItemName($this->itemName);
        $request->setItemSetName($this->itemSetName);
        /**
         * @var \Gs2\Inventory\Result\AddReferenceOfByUserIdResult
         */
        $r = $this->client->addReferenceOfByUserId(
            $request
        );
        return $r;
    }

    public function delete(
        \Gs2\Inventory\Request\DeleteReferenceOfByUserIdRequest $request
    ): \Gs2\Inventory\Result\DeleteReferenceOfByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setInventoryName($this->inventoryName);
        $request->setItemName($this->itemName);
        $request->setItemSetName($this->itemSetName);
        /**
         * @var \Gs2\Inventory\Result\DeleteReferenceOfByUserIdResult
         */
        $r = $this->client->deleteReferenceOfByUserId(
            $request
        );
        return $r;
    }

    public function list(
    ): \Gs2\Inventory\Domain\Iterator\DescribeReferenceOfByUserIdIterator {
        return new \Gs2\Inventory\Domain\Iterator\DescribeReferenceOfByUserIdIterator(
            $this->client,
            $this->namespaceName,
            $this->inventoryName,
            $this->userId,
            $this->itemName,
            $this->itemSetName
        );
    }

}
