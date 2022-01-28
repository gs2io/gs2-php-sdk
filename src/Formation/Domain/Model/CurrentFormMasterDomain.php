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

namespace Gs2\Formation\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Formation\Gs2FormationRestClient;


class CurrentFormMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2FormationRestClient
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
        $this->client = new Gs2FormationRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
    }

    public function exportMaster(
        \Gs2\Formation\Request\ExportMasterRequest $request
    ): \Gs2\Formation\Result\ExportMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Formation\Result\ExportMasterResult
         */
        $r = $this->client->exportMaster(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Formation\Request\GetCurrentFormMasterRequest $request
    ): \Gs2\Formation\Result\GetCurrentFormMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Formation\Result\GetCurrentFormMasterResult
         */
        $r = $this->client->getCurrentFormMaster(
            $request
        );
        return $r;
    }

    public function update(
        \Gs2\Formation\Request\UpdateCurrentFormMasterRequest $request
    ): \Gs2\Formation\Result\UpdateCurrentFormMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Formation\Result\UpdateCurrentFormMasterResult
         */
        $r = $this->client->updateCurrentFormMaster(
            $request
        );
        return $r;
    }

    public function updateFromGitHub(
        \Gs2\Formation\Request\UpdateCurrentFormMasterFromGitHubRequest $request
    ): \Gs2\Formation\Result\UpdateCurrentFormMasterFromGitHubResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Formation\Result\UpdateCurrentFormMasterFromGitHubResult
         */
        $r = $this->client->updateCurrentFormMasterFromGitHub(
            $request
        );
        return $r;
    }

}
