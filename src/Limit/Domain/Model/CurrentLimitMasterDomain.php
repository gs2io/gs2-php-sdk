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

namespace Gs2\Limit\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Limit\Gs2LimitRestClient;


class CurrentLimitMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2LimitRestClient
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
        $this->client = new Gs2LimitRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
    }

    public function exportMaster(
        \Gs2\Limit\Request\ExportMasterRequest $request
    ): \Gs2\Limit\Result\ExportMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Limit\Result\ExportMasterResult
         */
        $r = $this->client->exportMaster(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Limit\Request\GetCurrentLimitMasterRequest $request
    ): \Gs2\Limit\Result\GetCurrentLimitMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Limit\Result\GetCurrentLimitMasterResult
         */
        $r = $this->client->getCurrentLimitMaster(
            $request
        );
        return $r;
    }

    public function update(
        \Gs2\Limit\Request\UpdateCurrentLimitMasterRequest $request
    ): \Gs2\Limit\Result\UpdateCurrentLimitMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Limit\Result\UpdateCurrentLimitMasterResult
         */
        $r = $this->client->updateCurrentLimitMaster(
            $request
        );
        return $r;
    }

    public function updateFromGitHub(
        \Gs2\Limit\Request\UpdateCurrentLimitMasterFromGitHubRequest $request
    ): \Gs2\Limit\Result\UpdateCurrentLimitMasterFromGitHubResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Limit\Result\UpdateCurrentLimitMasterFromGitHubResult
         */
        $r = $this->client->updateCurrentLimitMasterFromGitHub(
            $request
        );
        return $r;
    }

}
