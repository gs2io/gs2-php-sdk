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
use Gs2\Ranking\Domain\Cache\ScoreDomainCache;
use Gs2\Ranking\Model\Score;
use Gs2\Ranking\Request\DescribeScoresByUserIdRequest;
use Gs2\Ranking\Result\DescribeScoresByUserIdResult;

use Iterator;

class DescribeScoresByUserIdIterator implements Iterator {

    /**
     * @var ScoreDomainCache
     */
    private $scoreCache;

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
     * @var string
     */
    private $userId;

    /**
     * @var string
     */
    private $scorerUserId;

    /**
     * @var ?string
     */
    private $pageToken;

    /**
     * @var bool
     */
    private $last;

    /**
     * @var array<Score>
     */
    private $result;

    /**
     * @var ?number
     */
    public $fetchSize;

    public function __construct(
        ScoreDomainCache $scoreCache,
        Gs2RankingRestClient $client,
        string $namespaceName,
        string $categoryName,
        string $userId,
        string $scorerUserId
    ) {
        $this->scoreCache = $scoreCache;
        $this->client = $client;
        $this->namespaceName = $namespaceName;
        $this->categoryName = $categoryName;
        $this->userId = $userId;
        $this->scorerUserId = $scorerUserId;
        $this->pageToken = null;
        $this->last = false;
        $this->result = [];

        $this->fetchSize = null;
        $this->load();
    }

    private function load(): void {
        /**
         * @var DescribeScoresByUserIdResult
         */
         $r = $this->client->describeScoresByUserId(
            (new DescribeScoresByUserIdRequest())
                ->withNamespaceName($this->namespaceName)
                ->withCategoryName($this->categoryName)
                ->withUserId($this->userId)
                ->withScorerUserId($this->scorerUserId)
                ->withPageToken($this->pageToken)
                ->withLimit($this->fetchSize)
        );
        foreach ($r->getItems() as $item) {
            $this->scoreCache->update($item);
        }
        $this->result = $r->getItems();
        $this->pageToken = $r->getNextPageToken();
        $this->last = $this->pageToken == null;
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
        $this->pageToken = null;
        $this->last = false;
        $this->result = [];
    }
}
