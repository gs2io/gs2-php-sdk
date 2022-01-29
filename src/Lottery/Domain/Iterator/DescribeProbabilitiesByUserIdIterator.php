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

namespace Gs2\Lottery\Domain\Iterator;

use Gs2\Lottery\Gs2LotteryRestClient;
use Gs2\Lottery\Domain\Cache\ProbabilityDomainCache;
use Gs2\Lottery\Model\Probability;
use Gs2\Lottery\Request\DescribeProbabilitiesByUserIdRequest;
use Gs2\Lottery\Result\DescribeProbabilitiesByUserIdResult;

use Iterator;

class DescribeProbabilitiesByUserIdIterator implements Iterator {

    /**
     * @var ProbabilityDomainCache
     */
    private $probabilityCache;

    /**
     * @var Gs2LotteryRestClient
     */
    private $client;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $lotteryName;

    /**
     * @var string
     */
    private $userId;

    /**
     * @var bool
     */
    private $last;

    /**
     * @var array<Probability>
     */
    private $result;

    /**
     * @var ?number
     */
    public $fetchSize;

    public function __construct(
        ProbabilityDomainCache $probabilityCache,
        Gs2LotteryRestClient $client,
        string $namespaceName,
        string $lotteryName,
        string $userId
    ) {
        $this->probabilityCache = $probabilityCache;
        $this->client = $client;
        $this->namespaceName = $namespaceName;
        $this->lotteryName = $lotteryName;
        $this->userId = $userId;
        $this->last = false;
        $this->result = [];

        $this->fetchSize = null;
        $this->load();
    }

    private function load(): void {
        /**
         * @var DescribeProbabilitiesByUserIdResult
         */
         $r = $this->client->describeProbabilitiesByUserId(
            (new DescribeProbabilitiesByUserIdRequest())
                ->withNamespaceName($this->namespaceName)
                ->withLotteryName($this->lotteryName)
                ->withUserId($this->userId)
        );
        $this->probabilityCache->update($r->getItems());
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