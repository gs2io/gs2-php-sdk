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

namespace Gs2\Ranking\Domain\Iterator;

use Gs2\Ranking\Gs2RankingRestClient;
use Gs2\Ranking\Domain\Cache\CategoryModelDomainCache;
use Gs2\Ranking\Model\CategoryModel;
use Gs2\Ranking\Request\DescribeCategoryModelsRequest;
use Gs2\Ranking\Result\DescribeCategoryModelsResult;

use Iterator;

class DescribeCategoryModelsIterator implements Iterator {

    /**
     * @var CategoryModelDomainCache
     */
    private $categoryModelCache;

    /**
     * @var Gs2RankingRestClient
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
     * @var array<CategoryModel>
     */
    private $result;

    /**
     * @var ?number
     */
    public $fetchSize;

    public function __construct(
        CategoryModelDomainCache $categoryModelCache,
        Gs2RankingRestClient $client,
        string $namespaceName
    ) {
        $this->categoryModelCache = $categoryModelCache;
        $this->client = $client;
        $this->namespaceName = $namespaceName;
        $this->last = false;
        $this->result = [];

        $this->fetchSize = null;
        $this->load();
    }

    private function load(): void {
        /**
         * @var DescribeCategoryModelsResult
         */
         $r = $this->client->describeCategoryModels(
            (new DescribeCategoryModelsRequest())
                ->withNamespaceName($this->namespaceName)
        );
        foreach ($r->getItems() as $item) {
            $this->categoryModelCache->update($item);
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
