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

namespace Gs2\Distributor\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Distributor\Gs2DistributorRestClient;


class CurrentDistributorMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2DistributorRestClient
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
        $this->client = new Gs2DistributorRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
    }

    public function exportMaster(
        \Gs2\Distributor\Request\ExportMasterRequest $request
    ): \Gs2\Distributor\Result\ExportMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Distributor\Result\ExportMasterResult
         */
        $r = $this->client->exportMaster(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Distributor\Request\GetCurrentDistributorMasterRequest $request
    ): \Gs2\Distributor\Result\GetCurrentDistributorMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Distributor\Result\GetCurrentDistributorMasterResult
         */
        $r = $this->client->getCurrentDistributorMaster(
            $request
        );
        return $r;
    }

    public function update(
        \Gs2\Distributor\Request\UpdateCurrentDistributorMasterRequest $request
    ): \Gs2\Distributor\Result\UpdateCurrentDistributorMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Distributor\Result\UpdateCurrentDistributorMasterResult
         */
        $r = $this->client->updateCurrentDistributorMaster(
            $request
        );
        return $r;
    }

    public function updateFromGitHub(
        \Gs2\Distributor\Request\UpdateCurrentDistributorMasterFromGitHubRequest $request
    ): \Gs2\Distributor\Result\UpdateCurrentDistributorMasterFromGitHubResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Distributor\Result\UpdateCurrentDistributorMasterFromGitHubResult
         */
        $r = $this->client->updateCurrentDistributorMasterFromGitHub(
            $request
        );
        return $r;
    }

}
