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

namespace Gs2\Exchange\Domain\Iterator;

use Gs2\Exchange\Gs2ExchangeRestClient;
use Gs2\Exchange\Domain\Cache\AwaitDomainCache;
use Gs2\Exchange\Model\Await;
use Gs2\Exchange\Request\DescribeAwaitsByUserIdRequest;
use Gs2\Exchange\Result\DescribeAwaitsByUserIdResult;

use Iterator;

class DescribeAwaitsByUserIdIterator implements Iterator {

    /**
     * @var AwaitDomainCache
     */
    private $awaitCache;

    /**
     * @var Gs2ExchangeRestClient
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
     * @var string
     */
    private $rateName;

    /**
     * @var ?string
     */
    private $pageToken;

    /**
     * @var bool
     */
    private $last;

    /**
     * @var array<Await>
     */
    private $result;

    /**
     * @var ?number
     */
    public $fetchSize;

    public function __construct(
        AwaitDomainCache $awaitCache,
        Gs2ExchangeRestClient $client,
        string $namespaceName,
        string $userId,
        ?string $rateName
    ) {
        $this->awaitCache = $awaitCache;
        $this->client = $client;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->rateName = $rateName;
        $this->pageToken = null;
        $this->last = false;
        $this->result = [];

        $this->fetchSize = null;
        $this->load();
    }

    private function load(): void {
        /**
         * @var DescribeAwaitsByUserIdResult
         */
         $r = $this->client->describeAwaitsByUserId(
            (new DescribeAwaitsByUserIdRequest())
                ->withNamespaceName($this->namespaceName)
                ->withUserId($this->userId)
                ->withRateName($this->rateName)
                ->withPageToken($this->pageToken)
                ->withLimit($this->fetchSize)
        );
        foreach ($r->getItems() as $item) {
            $this->awaitCache->update($item);
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
