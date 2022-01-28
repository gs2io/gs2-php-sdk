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

namespace Gs2\Inventory\Domain\Iterator;

use Gs2\Inventory\Gs2InventoryRestClient;
use Gs2\Inventory\Request\DescribeReferenceOfByUserIdRequest;
use Gs2\Inventory\Result\DescribeReferenceOfByUserIdResult;

use Iterator;

class DescribeReferenceOfByUserIdIterator implements Iterator {

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
    private $inventoryName;

    /**
     * @var string
     */
    private $userId;

    /**
     * @var string
     */
    private $itemName;

    /**
     * @var string
     */
    private $itemSetName;

    /**
     * @var bool
     */
    private $last;

    /**
     * @var array<string>
     */
    private $result;

    /**
     * @var ?number
     */
    public $fetchSize;

    public function __construct(
        Gs2InventoryRestClient $client,
        string $namespaceName,
        string $inventoryName,
        string $userId,
        string $itemName,
        string $itemSetName
    ) {
        $this->client = $client;
        $this->namespaceName = $namespaceName;
        $this->inventoryName = $inventoryName;
        $this->userId = $userId;
        $this->itemName = $itemName;
        $this->itemSetName = $itemSetName;
        $this->last = false;
        $this->result = [];

        $this->fetchSize = null;
        $this->load();
    }

    private function load(): void {
        /**
         * @var DescribeReferenceOfByUserIdResult
         */
         $r = $this->client->describeReferenceOfByUserId(
            (new DescribeReferenceOfByUserIdRequest())
                ->withNamespaceName($this->namespaceName)
                ->withInventoryName($this->inventoryName)
                ->withUserId($this->userId)
                ->withItemName($this->itemName)
                ->withItemSetName($this->itemSetName)
        );
        $this->result = $r->getItems();
        $this->last = true;
    }

    public function current()
    {
        if (count($this->result) == 0 && !$this->last) {
            $this->load();
        }
        if (count($this->result) == 0) {
            return null;
        }
        return $this->result[0];
    }

    public function key()
    {
        throw new \BadFunctionCallException();
    }

    public function valid()
    {
        return count($this->result) != 0 || !$this->last;
    }

    public function next()
    {
        $this->result = array_slice($this->result, 1);
        if (count($this->result) == 0 && !$this->last) {
            $this->load();
        }
    }

    public function rewind()
    {
        $this->last = false;
        $this->result = [];
    }
}
