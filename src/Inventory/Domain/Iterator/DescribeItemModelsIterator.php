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
use Gs2\Inventory\Domain\Cache\ItemModelDomainCache;
use Gs2\Inventory\Model\ItemModel;
use Gs2\Inventory\Request\DescribeItemModelsRequest;
use Gs2\Inventory\Result\DescribeItemModelsResult;

use Iterator;

class DescribeItemModelsIterator implements Iterator {

    /**
     * @var ItemModelDomainCache
     */
    private $itemModelCache;

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
     * @var bool
     */
    private $last;

    /**
     * @var array<ItemModel>
     */
    private $result;

    /**
     * @var ?number
     */
    public $fetchSize;

    public function __construct(
        ItemModelDomainCache $itemModelCache,
        Gs2InventoryRestClient $client,
        string $namespaceName,
        string $inventoryName
    ) {
        $this->itemModelCache = $itemModelCache;
        $this->client = $client;
        $this->namespaceName = $namespaceName;
        $this->inventoryName = $inventoryName;
        $this->last = false;
        $this->result = [];

        $this->fetchSize = null;
        $this->load();
    }

    private function load(): void {
        /**
         * @var DescribeItemModelsResult
         */
         $r = $this->client->describeItemModels(
            (new DescribeItemModelsRequest())
                ->withNamespaceName($this->namespaceName)
                ->withInventoryName($this->inventoryName)
        );
        foreach ($r->getItems() as $item) {
            $this->itemModelCache->update($item);
        }
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
