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
use Gs2\Mission\Domain\Cache\CompleteDomainCache;
use Gs2\Mission\Model\Complete;
use Gs2\Mission\Request\DescribeCompletesByUserIdRequest;
use Gs2\Mission\Result\DescribeCompletesByUserIdResult;

use Iterator;

class DescribeCompletesByUserIdIterator implements Iterator {

    /**
     * @var CompleteDomainCache
     */
    private $completeCache;

    /**
     * @var Gs2MissionRestClient
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
     * @var ?string
     */
    private $pageToken;

    /**
     * @var bool
     */
    private $last;

    /**
     * @var array<Complete>
     */
    private $result;

    /**
     * @var ?number
     */
    public $fetchSize;

    public function __construct(
        CompleteDomainCache $completeCache,
        Gs2MissionRestClient $client,
        string $namespaceName,
        string $userId
    ) {
        $this->completeCache = $completeCache;
        $this->client = $client;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->pageToken = null;
        $this->last = false;
        $this->result = [];

        $this->fetchSize = null;
        $this->load();
    }

    private function load(): void {
        /**
         * @var DescribeCompletesByUserIdResult
         */
         $r = $this->client->describeCompletesByUserId(
            (new DescribeCompletesByUserIdRequest())
                ->withNamespaceName($this->namespaceName)
                ->withUserId($this->userId)
                ->withPageToken($this->pageToken)
                ->withLimit($this->fetchSize)
        );
        foreach ($r->getItems() as $item) {
            $this->completeCache->update($item);
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
