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

namespace Gs2\Version\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Version\Gs2VersionRestClient;


class CurrentVersionMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2VersionRestClient
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
        $this->client = new Gs2VersionRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
    }

    public function exportMaster(
        \Gs2\Version\Request\ExportMasterRequest $request
    ): \Gs2\Version\Result\ExportMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Version\Result\ExportMasterResult
         */
        $r = $this->client->exportMaster(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Version\Request\GetCurrentVersionMasterRequest $request
    ): \Gs2\Version\Result\GetCurrentVersionMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Version\Result\GetCurrentVersionMasterResult
         */
        $r = $this->client->getCurrentVersionMaster(
            $request
        );
        return $r;
    }

    public function update(
        \Gs2\Version\Request\UpdateCurrentVersionMasterRequest $request
    ): \Gs2\Version\Result\UpdateCurrentVersionMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Version\Result\UpdateCurrentVersionMasterResult
         */
        $r = $this->client->updateCurrentVersionMaster(
            $request
        );
        return $r;
    }

    public function updateFromGitHub(
        \Gs2\Version\Request\UpdateCurrentVersionMasterFromGitHubRequest $request
    ): \Gs2\Version\Result\UpdateCurrentVersionMasterFromGitHubResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Version\Result\UpdateCurrentVersionMasterFromGitHubResult
         */
        $r = $this->client->updateCurrentVersionMasterFromGitHub(
            $request
        );
        return $r;
    }

}
