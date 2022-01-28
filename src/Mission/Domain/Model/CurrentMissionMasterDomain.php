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


class CurrentMissionMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2MissionRestClient
     */
    private $client;

    /**
     * @var string
     */
    private $namespaceName;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName
    ) {
        $this->session = $session;
        $this->client = new Gs2MissionRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
    }

    public function exportMaster(
        \Gs2\Mission\Request\ExportMasterRequest $request
    ): \Gs2\Mission\Result\ExportMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Mission\Result\ExportMasterResult
         */
        $r = $this->client->exportMaster(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Mission\Request\GetCurrentMissionMasterRequest $request
    ): \Gs2\Mission\Result\GetCurrentMissionMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Mission\Result\GetCurrentMissionMasterResult
         */
        $r = $this->client->getCurrentMissionMaster(
            $request
        );
        return $r;
    }

    public function update(
        \Gs2\Mission\Request\UpdateCurrentMissionMasterRequest $request
    ): \Gs2\Mission\Result\UpdateCurrentMissionMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Mission\Result\UpdateCurrentMissionMasterResult
         */
        $r = $this->client->updateCurrentMissionMaster(
            $request
        );
        return $r;
    }

    public function updateFromGitHub(
        \Gs2\Mission\Request\UpdateCurrentMissionMasterFromGitHubRequest $request
    ): \Gs2\Mission\Result\UpdateCurrentMissionMasterFromGitHubResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Mission\Result\UpdateCurrentMissionMasterFromGitHubResult
         */
        $r = $this->client->updateCurrentMissionMasterFromGitHub(
            $request
        );
        return $r;
    }

}
