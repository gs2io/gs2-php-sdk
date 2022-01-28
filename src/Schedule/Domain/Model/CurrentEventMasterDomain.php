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

namespace Gs2\Schedule\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Schedule\Gs2ScheduleRestClient;


class CurrentEventMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ScheduleRestClient
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
        $this->client = new Gs2ScheduleRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
    }

    public function exportMaster(
        \Gs2\Schedule\Request\ExportMasterRequest $request
    ): \Gs2\Schedule\Result\ExportMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Schedule\Result\ExportMasterResult
         */
        $r = $this->client->exportMaster(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Schedule\Request\GetCurrentEventMasterRequest $request
    ): \Gs2\Schedule\Result\GetCurrentEventMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Schedule\Result\GetCurrentEventMasterResult
         */
        $r = $this->client->getCurrentEventMaster(
            $request
        );
        return $r;
    }

    public function update(
        \Gs2\Schedule\Request\UpdateCurrentEventMasterRequest $request
    ): \Gs2\Schedule\Result\UpdateCurrentEventMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Schedule\Result\UpdateCurrentEventMasterResult
         */
        $r = $this->client->updateCurrentEventMaster(
            $request
        );
        return $r;
    }

    public function updateFromGitHub(
        \Gs2\Schedule\Request\UpdateCurrentEventMasterFromGitHubRequest $request
    ): \Gs2\Schedule\Result\UpdateCurrentEventMasterFromGitHubResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Schedule\Result\UpdateCurrentEventMasterFromGitHubResult
         */
        $r = $this->client->updateCurrentEventMasterFromGitHub(
            $request
        );
        return $r;
    }

}
