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
use Gs2\Lottery\Request\DescribeProbabilitiesRequest;
use Gs2\Lottery\Result\DescribeProbabilitiesResult;

use Iterator;

class DescribeProbabilitiesIterator implements Iterator {

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
     * @var \Gs2\Auth\Model\AccessToken
     */
    private $accessToken;

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
        \Gs2\Auth\Model\AccessToken $accessToken
    ) {
        $this->probabilityCache = $probabilityCache;
        $this->client = $client;
        $this->namespaceName = $namespaceName;
        $this->lotteryName = $lotteryName;
        $this->accessToken = $accessToken;
        $this->last = false;
        $this->result = [];

        $this->fetchSize = null;
        $this->load();
    }

    private function load(): void {
        /**
         * @var DescribeProbabilitiesResult
         */
         $r = $this->client->describeProbabilities(
            (new DescribeProbabilitiesRequest())
                ->withNamespaceName($this->namespaceName)
                ->withLotteryName($this->lotteryName)
                ->withAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null)
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
