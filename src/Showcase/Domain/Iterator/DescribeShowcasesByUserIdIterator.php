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

namespace Gs2\Showcase\Domain\Iterator;

use Gs2\Showcase\Gs2ShowcaseRestClient;
use Gs2\Showcase\Domain\Cache\ShowcaseDomainCache;
use Gs2\Showcase\Model\Showcase;
use Gs2\Showcase\Request\DescribeShowcasesByUserIdRequest;
use Gs2\Showcase\Result\DescribeShowcasesByUserIdResult;

use Iterator;

class DescribeShowcasesByUserIdIterator implements Iterator {

    /**
     * @var ShowcaseDomainCache
     */
    private $showcaseCache;

    /**
     * @var Gs2ShowcaseRestClient
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
     * @var bool
     */
    private $last;

    /**
     * @var array<Showcase>
     */
    private $result;

    /**
     * @var ?number
     */
    public $fetchSize;

    public function __construct(
        ShowcaseDomainCache $showcaseCache,
        Gs2ShowcaseRestClient $client,
        string $namespaceName,
        string $userId
    ) {
        $this->showcaseCache = $showcaseCache;
        $this->client = $client;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->last = false;
        $this->result = [];

        $this->fetchSize = null;
        $this->load();
    }

    private function load(): void {
        /**
         * @var DescribeShowcasesByUserIdResult
         */
         $r = $this->client->describeShowcasesByUserId(
            (new DescribeShowcasesByUserIdRequest())
                ->withNamespaceName($this->namespaceName)
                ->withUserId($this->userId)
        );
        foreach ($r->getItems() as $item) {
            $this->showcaseCache->update($item);
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
