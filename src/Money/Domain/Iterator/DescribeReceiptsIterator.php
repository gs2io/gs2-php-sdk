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

namespace Gs2\Money\Domain\Iterator;

use Gs2\Money\Gs2MoneyRestClient;
use Gs2\Money\Domain\Cache\ReceiptDomainCache;
use Gs2\Money\Model\Receipt;
use Gs2\Money\Request\DescribeReceiptsRequest;
use Gs2\Money\Result\DescribeReceiptsResult;

use Iterator;

class DescribeReceiptsIterator implements Iterator {

    /**
     * @var ReceiptDomainCache
     */
    private $receiptCache;

    /**
     * @var Gs2MoneyRestClient
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
     * @var int
     */
    private $slot;

    /**
     * @var int
     */
    private $begin;

    /**
     * @var int
     */
    private $end;

    /**
     * @var ?string
     */
    private $pageToken;

    /**
     * @var bool
     */
    private $last;

    /**
     * @var array<Receipt>
     */
    private $result;

    /**
     * @var ?number
     */
    public $fetchSize;

    public function __construct(
        ReceiptDomainCache $receiptCache,
        Gs2MoneyRestClient $client,
        string $namespaceName,
        string $userId,
        ?int $slot,
        ?int $begin,
        ?int $end
    ) {
        $this->receiptCache = $receiptCache;
        $this->client = $client;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->slot = $slot;
        $this->begin = $begin;
        $this->end = $end;
        $this->pageToken = null;
        $this->last = false;
        $this->result = [];

        $this->fetchSize = null;
        $this->load();
    }

    private function load(): void {
        /**
         * @var DescribeReceiptsResult
         */
         $r = $this->client->describeReceipts(
            (new DescribeReceiptsRequest())
                ->withNamespaceName($this->namespaceName)
                ->withUserId($this->userId)
                ->withSlot($this->slot)
                ->withBegin($this->begin)
                ->withEnd($this->end)
                ->withPageToken($this->pageToken)
                ->withLimit($this->fetchSize)
        );
        foreach ($r->getItems() as $item) {
            $this->receiptCache->update($item);
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
