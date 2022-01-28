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
use Gs2\Ranking\Domain\Cache\RankingDomainCache;
use Gs2\Ranking\Model\Ranking;
use Gs2\Ranking\Request\DescribeNearRankingsRequest;
use Gs2\Ranking\Result\DescribeNearRankingsResult;

use Iterator;

class DescribeNearRankingsIterator implements Iterator {

    /**
     * @var RankingDomainCache
     */
    private $rankingCache;

    /**
     * @var Gs2RankingRestClient
     */
    private $client;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $categoryName;

    /**
     * @var int
     */
    private $score;

    /**
     * @var bool
     */
    private $last;

    /**
     * @var array<Ranking>
     */
    private $result;

    /**
     * @var ?number
     */
    public $fetchSize;

    public function __construct(
        RankingDomainCache $rankingCache,
        Gs2RankingRestClient $client,
        string $namespaceName,
        string $categoryName,
        int $score
    ) {
        $this->rankingCache = $rankingCache;
        $this->client = $client;
        $this->namespaceName = $namespaceName;
        $this->categoryName = $categoryName;
        $this->score = $score;
        $this->last = false;
        $this->result = [];

        $this->fetchSize = null;
        $this->load();
    }

    private function load(): void {
        /**
         * @var DescribeNearRankingsResult
         */
         $r = $this->client->describeNearRankings(
            (new DescribeNearRankingsRequest())
                ->withNamespaceName($this->namespaceName)
                ->withCategoryName($this->categoryName)
                ->withScore($this->score)
        );
        foreach ($r->getItems() as $item) {
            $this->rankingCache->update($item);
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
