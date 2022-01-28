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

namespace Gs2\Formation\Domain\Iterator;

use Gs2\Formation\Gs2FormationRestClient;
use Gs2\Formation\Domain\Cache\FormDomainCache;
use Gs2\Formation\Model\Form;
use Gs2\Formation\Request\DescribeFormsByUserIdRequest;
use Gs2\Formation\Result\DescribeFormsByUserIdResult;

use Iterator;

class DescribeFormsByUserIdIterator implements Iterator {

    /**
     * @var FormDomainCache
     */
    private $formCache;

    /**
     * @var Gs2FormationRestClient
     */
    private $client;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $moldName;

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
     * @var array<Form>
     */
    private $result;

    /**
     * @var ?number
     */
    public $fetchSize;

    public function __construct(
        FormDomainCache $formCache,
        Gs2FormationRestClient $client,
        string $namespaceName,
        string $moldName,
        string $userId
    ) {
        $this->formCache = $formCache;
        $this->client = $client;
        $this->namespaceName = $namespaceName;
        $this->moldName = $moldName;
        $this->userId = $userId;
        $this->pageToken = null;
        $this->last = false;
        $this->result = [];

        $this->fetchSize = null;
        $this->load();
    }

    private function load(): void {
        /**
         * @var DescribeFormsByUserIdResult
         */
         $r = $this->client->describeFormsByUserId(
            (new DescribeFormsByUserIdRequest())
                ->withNamespaceName($this->namespaceName)
                ->withMoldName($this->moldName)
                ->withUserId($this->userId)
                ->withPageToken($this->pageToken)
                ->withLimit($this->fetchSize)
        );
        foreach ($r->getItems() as $item) {
            $this->formCache->update($item);
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
