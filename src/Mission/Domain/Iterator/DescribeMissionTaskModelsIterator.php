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
use Gs2\Mission\Domain\Cache\MissionTaskModelDomainCache;
use Gs2\Mission\Model\MissionTaskModel;
use Gs2\Mission\Request\DescribeMissionTaskModelsRequest;
use Gs2\Mission\Result\DescribeMissionTaskModelsResult;

use Iterator;

class DescribeMissionTaskModelsIterator implements Iterator {

    /**
     * @var MissionTaskModelDomainCache
     */
    private $missionTaskModelCache;

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
    private $missionGroupName;

    /**
     * @var bool
     */
    private $last;

    /**
     * @var array<MissionTaskModel>
     */
    private $result;

    /**
     * @var ?number
     */
    public $fetchSize;

    public function __construct(
        MissionTaskModelDomainCache $missionTaskModelCache,
        Gs2MissionRestClient $client,
        string $namespaceName,
        string $missionGroupName
    ) {
        $this->missionTaskModelCache = $missionTaskModelCache;
        $this->client = $client;
        $this->namespaceName = $namespaceName;
        $this->missionGroupName = $missionGroupName;
        $this->last = false;
        $this->result = [];

        $this->fetchSize = null;
        $this->load();
    }

    private function load(): void {
        /**
         * @var DescribeMissionTaskModelsResult
         */
         $r = $this->client->describeMissionTaskModels(
            (new DescribeMissionTaskModelsRequest())
                ->withNamespaceName($this->namespaceName)
                ->withMissionGroupName($this->missionGroupName)
        );
        foreach ($r->getItems() as $item) {
            $this->missionTaskModelCache->update($item);
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
