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

namespace Gs2\Datastore\Domain\Iterator;

use Gs2\Datastore\Gs2DatastoreRestClient;
use Gs2\Datastore\Domain\Cache\DataObjectHistoryDomainCache;
use Gs2\Datastore\Model\DataObjectHistory;
use Gs2\Datastore\Request\DescribeDataObjectHistoriesRequest;
use Gs2\Datastore\Result\DescribeDataObjectHistoriesResult;

use Iterator;

class DescribeDataObjectHistoriesIterator implements Iterator {

    /**
     * @var DataObjectHistoryDomainCache
     */
    private $dataObjectHistoryCache;

    /**
     * @var Gs2DatastoreRestClient
     */
    private $client;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Auth\Model\AccessToken
     */
    private $accessToken;

    /**
     * @var string
     */
    private $dataObjectName;

    /**
     * @var ?string
     */
    private $pageToken;

    /**
     * @var bool
     */
    private $last;

    /**
     * @var array<DataObjectHistory>
     */
    private $result;

    /**
     * @var ?number
     */
    public $fetchSize;

    public function __construct(
        DataObjectHistoryDomainCache $dataObjectHistoryCache,
        Gs2DatastoreRestClient $client,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken,
        string $dataObjectName
    ) {
        $this->dataObjectHistoryCache = $dataObjectHistoryCache;
        $this->client = $client;
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->dataObjectName = $dataObjectName;
        $this->pageToken = null;
        $this->last = false;
        $this->result = [];

        $this->fetchSize = null;
        $this->load();
    }

    private function load(): void {
        /**
         * @var DescribeDataObjectHistoriesResult
         */
         $r = $this->client->describeDataObjectHistories(
            (new DescribeDataObjectHistoriesRequest())
                ->withNamespaceName($this->namespaceName)
                ->withAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null)
                ->withDataObjectName($this->dataObjectName)
                ->withPageToken($this->pageToken)
                ->withLimit($this->fetchSize)
        );
        foreach ($r->getItems() as $item) {
            $this->dataObjectHistoryCache->update($item);
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
