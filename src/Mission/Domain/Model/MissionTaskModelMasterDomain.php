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


class MissionTaskModelMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2MissionRestClient
     */
    private $client;

    /**
     * @var \Gs2\Mission\Domain\Cache\MissionTaskModelMasterDomainCache
     */
    private $missionTaskModelMasterCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $missionGroupName;

    /**
     * @var string
     */
    private $missionTaskName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Mission\Domain\Cache\MissionTaskModelMasterDomainCache $missionTaskModelMasterCache,
        string $namespaceName,
        string $missionGroupName,
        string $missionTaskName
    ) {
        $this->session = $session;
        $this->client = new Gs2MissionRestClient(
            $session
        );
        $this->missionTaskModelMasterCache = $missionTaskModelMasterCache;
        $this->namespaceName = $namespaceName;
        $this->missionGroupName = $missionGroupName;
        $this->missionTaskName = $missionTaskName;
    }

    public function load(
        \Gs2\Mission\Request\GetMissionTaskModelMasterRequest $request
    ): \Gs2\Mission\Result\GetMissionTaskModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setMissionGroupName($this->missionGroupName);
        $request->setMissionTaskName($this->missionTaskName);
        /**
         * @var \Gs2\Mission\Result\GetMissionTaskModelMasterResult
         */
        $r = $this->client->getMissionTaskModelMaster(
            $request
        );
        $this->missionTaskModelMasterCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Mission\Request\UpdateMissionTaskModelMasterRequest $request
    ): \Gs2\Mission\Result\UpdateMissionTaskModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setMissionGroupName($this->missionGroupName);
        $request->setMissionTaskName($this->missionTaskName);
        /**
         * @var \Gs2\Mission\Result\UpdateMissionTaskModelMasterResult
         */
        $r = $this->client->updateMissionTaskModelMaster(
            $request
        );
        $this->missionTaskModelMasterCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Mission\Request\DeleteMissionTaskModelMasterRequest $request
    ): \Gs2\Mission\Result\DeleteMissionTaskModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setMissionGroupName($this->missionGroupName);
        $request->setMissionTaskName($this->missionTaskName);
        /**
         * @var \Gs2\Mission\Result\DeleteMissionTaskModelMasterResult
         */
        $r = $this->client->deleteMissionTaskModelMaster(
            $request
        );
        $this->missionTaskModelMasterCache->delete($r->getItem());
        return $r;
    }

}
