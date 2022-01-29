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

namespace Gs2\Mission\Domain\Iterator;

use Gs2\Mission\Gs2MissionRestClient;
use Gs2\Mission\Domain\Cache\CounterModelDomainCache;
use Gs2\Mission\Model\CounterModel;
use Gs2\Mission\Request\DescribeCounterModelsRequest;
use Gs2\Mission\Result\DescribeCounterModelsResult;

use Iterator;

class DescribeCounterModelsIterator implements Iterator {

    /**
     * @var CounterModelDomainCache
     */
    private $counterModelCache;

    /**
     * @var Gs2MissionRestClient
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
     * @var array<CounterModel>
     */
    private $result;

    /**
     * @var ?number
     */
    public $fetchSize;

    public function __construct(
        CounterModelDomainCache $counterModelCache,
        Gs2MissionRestClient $client,
        string $namespaceName
    ) {
        $this->counterModelCache = $counterModelCache;
        $this->client = $client;
        $this->namespaceName = $namespaceName;
        $this->last = false;
        $this->result = [];

        $this->fetchSize = null;
        $this->load();
    }

    private function load(): void {
        /**
         * @var DescribeCounterModelsResult
         */
         $r = $this->client->describeCounterModels(
            (new DescribeCounterModelsRequest())
                ->withNamespaceName($this->namespaceName)
        );
        foreach ($r->getItems() as $item) {
            $this->counterModelCache->update($item);
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