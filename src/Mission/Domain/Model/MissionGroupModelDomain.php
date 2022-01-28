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

namespace Gs2\Mission\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Mission\Gs2MissionRestClient;


class MissionGroupModelDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2MissionRestClient
     */
    private $client;

    /**
     * @var \Gs2\Mission\Domain\Cache\MissionGroupModelDomainCache
     */
    private $missionGroupModelCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $missionGroupName;

    /**
     * @var \Gs2\Mission\Domain\Cache\MissionTaskModelDomainCache
     */
    private $missionTaskModelCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Mission\Domain\Cache\MissionGroupModelDomainCache $missionGroupModelCache,
        string $namespaceName,
        string $missionGroupName
    ) {
        $this->session = $session;
        $this->client = new Gs2MissionRestClient(
            $session
        );
        $this->missionGroupModelCache = $missionGroupModelCache;
        $this->namespaceName = $namespaceName;
        $this->missionGroupName = $missionGroupName;
        $this->missionTaskModelCache = new \Gs2\Mission\Domain\Cache\MissionTaskModelDomainCache();
    }

    public function load(
        \Gs2\Mission\Request\GetMissionGroupModelRequest $request
    ): \Gs2\Mission\Result\GetMissionGroupModelResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setMissionGroupName($this->missionGroupName);
        /**
         * @var \Gs2\Mission\Result\GetMissionGroupModelResult
         */
        $r = $this->client->getMissionGroupModel(
            $request
        );
        $this->missionGroupModelCache->update($r->getItem());
        return $r;
    }

    public function missionTaskModels(
    ): \Gs2\Mission\Domain\Iterator\DescribeMissionTaskModelsIterator {
        return new \Gs2\Mission\Domain\Iterator\DescribeMissionTaskModelsIterator(
            $this->missionTaskModelCache,
            $this->client,
            $this->namespaceName,
            $this->missionGroupName
        );
    }

    public function missionTaskModel(
        string $missionTaskName
    ): MissionTaskModelDomain {
        return new MissionTaskModelDomain(
            $this->session,
            $this->missionTaskModelCache,
            $this->namespaceName,
            $this->missionGroupName,
            $missionTaskName
        );
    }

}
