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


class MissionTaskModelDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2MissionRestClient
     */
    private $client;

    /**
     * @var \Gs2\Mission\Domain\Cache\MissionTaskModelDomainCache
     */
    private $missionTaskModelCache;

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
        \Gs2\Mission\Domain\Cache\MissionTaskModelDomainCache $missionTaskModelCache,
        string $namespaceName,
        string $missionGroupName,
        string $missionTaskName
    ) {
        $this->session = $session;
        $this->client = new Gs2MissionRestClient(
            $session
        );
        $this->missionTaskModelCache = $missionTaskModelCache;
        $this->namespaceName = $namespaceName;
        $this->missionGroupName = $missionGroupName;
        $this->missionTaskName = $missionTaskName;
    }

    public function load(
        \Gs2\Mission\Request\GetMissionTaskModelRequest $request
    ): \Gs2\Mission\Result\GetMissionTaskModelResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setMissionGroupName($this->missionGroupName);
        $request->setMissionTaskName($this->missionTaskName);
        /**
         * @var \Gs2\Mission\Result\GetMissionTaskModelResult
         */
        $r = $this->client->getMissionTaskModel(
            $request
        );
        $this->missionTaskModelCache->update($r->getItem());
        return $r;
    }

}
