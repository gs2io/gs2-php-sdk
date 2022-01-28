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

namespace Gs2\Quest\Domain\Iterator;

use Gs2\Quest\Gs2QuestRestClient;
use Gs2\Quest\Domain\Cache\QuestModelDomainCache;
use Gs2\Quest\Model\QuestModel;
use Gs2\Quest\Request\DescribeQuestModelsRequest;
use Gs2\Quest\Result\DescribeQuestModelsResult;

use Iterator;

class DescribeQuestModelsIterator implements Iterator {

    /**
     * @var QuestModelDomainCache
     */
    private $questModelCache;

    /**
     * @var Gs2QuestRestClient
     */
    private $client;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $questGroupName;

    /**
     * @var bool
     */
    private $last;

    /**
     * @var array<QuestModel>
     */
    private $result;

    /**
     * @var ?number
     */
    public $fetchSize;

    public function __construct(
        QuestModelDomainCache $questModelCache,
        Gs2QuestRestClient $client,
        string $namespaceName,
        string $questGroupName
    ) {
        $this->questModelCache = $questModelCache;
        $this->client = $client;
        $this->namespaceName = $namespaceName;
        $this->questGroupName = $questGroupName;
        $this->last = false;
        $this->result = [];

        $this->fetchSize = null;
        $this->load();
    }

    private function load(): void {
        /**
         * @var DescribeQuestModelsResult
         */
         $r = $this->client->describeQuestModels(
            (new DescribeQuestModelsRequest())
                ->withNamespaceName($this->namespaceName)
                ->withQuestGroupName($this->questGroupName)
        );
        foreach ($r->getItems() as $item) {
            $this->questModelCache->update($item);
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
