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

namespace Gs2\Limit\Domain\Iterator;

use Gs2\Limit\Gs2LimitRestClient;
use Gs2\Limit\Domain\Cache\LimitModelDomainCache;
use Gs2\Limit\Model\LimitModel;
use Gs2\Limit\Request\DescribeLimitModelsRequest;
use Gs2\Limit\Result\DescribeLimitModelsResult;

use Iterator;

class DescribeLimitModelsIterator implements Iterator {

    /**
     * @var LimitModelDomainCache
     */
    private $limitModelCache;

    /**
     * @var Gs2LimitRestClient
     */
    private $client;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var bool
     */
    private $last;

    /**
     * @var array<LimitModel>
     */
    private $result;

    /**
     * @var ?number
     */
    public $fetchSize;

    public function __construct(
        LimitModelDomainCache $limitModelCache,
        Gs2LimitRestClient $client,
        string $namespaceName
    ) {
        $this->limitModelCache = $limitModelCache;
        $this->client = $client;
        $this->namespaceName = $namespaceName;
        $this->last = false;
        $this->result = [];

        $this->fetchSize = null;
        $this->load();
    }

    private function load(): void {
        /**
         * @var DescribeLimitModelsResult
         */
         $r = $this->client->describeLimitModels(
            (new DescribeLimitModelsRequest())
                ->withNamespaceName($this->namespaceName)
        );
        foreach ($r->getItems() as $item) {
            $this->limitModelCache->update($item);
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
