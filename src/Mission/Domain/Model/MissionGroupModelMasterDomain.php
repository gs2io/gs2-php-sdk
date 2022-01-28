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


class MissionGroupModelMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2MissionRestClient
     */
    private $client;

    /**
     * @var \Gs2\Mission\Domain\Cache\MissionGroupModelMasterDomainCache
     */
    private $missionGroupModelMasterCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $missionGroupName;

    /**
     * @var \Gs2\Mission\Domain\Cache\MissionTaskModelMasterDomainCache
     */
    private $missionTaskModelMasterCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Mission\Domain\Cache\MissionGroupModelMasterDomainCache $missionGroupModelMasterCache,
        string $namespaceName,
        string $missionGroupName
    ) {
        $this->session = $session;
        $this->client = new Gs2MissionRestClient(
            $session
        );
        $this->missionGroupModelMasterCache = $missionGroupModelMasterCache;
        $this->namespaceName = $namespaceName;
        $this->missionGroupName = $missionGroupName;
        $this->missionTaskModelMasterCache = new \Gs2\Mission\Domain\Cache\MissionTaskModelMasterDomainCache();
    }

    public function load(
        \Gs2\Mission\Request\GetMissionGroupModelMasterRequest $request
    ): \Gs2\Mission\Result\GetMissionGroupModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setMissionGroupName($this->missionGroupName);
        /**
         * @var \Gs2\Mission\Result\GetMissionGroupModelMasterResult
         */
        $r = $this->client->getMissionGroupModelMaster(
            $request
        );
        $this->missionGroupModelMasterCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Mission\Request\UpdateMissionGroupModelMasterRequest $request
    ): \Gs2\Mission\Result\UpdateMissionGroupModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setMissionGroupName($this->missionGroupName);
        /**
         * @var \Gs2\Mission\Result\UpdateMissionGroupModelMasterResult
         */
        $r = $this->client->updateMissionGroupModelMaster(
            $request
        );
        $this->missionGroupModelMasterCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Mission\Request\DeleteMissionGroupModelMasterRequest $request
    ): \Gs2\Mission\Result\DeleteMissionGroupModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setMissionGroupName($this->missionGroupName);
        /**
         * @var \Gs2\Mission\Result\DeleteMissionGroupModelMasterResult
         */
        $r = $this->client->deleteMissionGroupModelMaster(
            $request
        );
        $this->missionGroupModelMasterCache->delete($r->getItem());
        return $r;
    }

    public function createMissionTaskModelMaster(
        \Gs2\Mission\Request\CreateMissionTaskModelMasterRequest $request
    ): \Gs2\Mission\Result\CreateMissionTaskModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setMissionGroupName($this->missionGroupName);
        /**
         * @var \Gs2\Mission\Result\CreateMissionTaskModelMasterResult
         */
        $r = $this->client->createMissionTaskModelMaster(
            $request
        );
        return $r;
    }

    public function missionTaskModelMasters(
    ): \Gs2\Mission\Domain\Iterator\DescribeMissionTaskModelMastersIterator {
        return new \Gs2\Mission\Domain\Iterator\DescribeMissionTaskModelMastersIterator(
            $this->missionTaskModelMasterCache,
            $this->client,
            $this->namespaceName,
            $this->missionGroupName
        );
    }

    public function missionTaskModelMaster(
        string $missionTaskName
    ): MissionTaskModelMasterDomain {
        return new MissionTaskModelMasterDomain(
            $this->session,
            $this->missionTaskModelMasterCache,
            $this->namespaceName,
            $this->missionGroupName,
            $missionTaskName
        );
    }

}
