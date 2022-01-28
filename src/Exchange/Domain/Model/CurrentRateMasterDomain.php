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

namespace Gs2\Exchange\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Exchange\Gs2ExchangeRestClient;


class CurrentRateMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ExchangeRestClient
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
        $this->client = new Gs2ExchangeRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
    }

    public function exportMaster(
        \Gs2\Exchange\Request\ExportMasterRequest $request
    ): \Gs2\Exchange\Result\ExportMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Exchange\Result\ExportMasterResult
         */
        $r = $this->client->exportMaster(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Exchange\Request\GetCurrentRateMasterRequest $request
    ): \Gs2\Exchange\Result\GetCurrentRateMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Exchange\Result\GetCurrentRateMasterResult
         */
        $r = $this->client->getCurrentRateMaster(
            $request
        );
        return $r;
    }

    public function update(
        \Gs2\Exchange\Request\UpdateCurrentRateMasterRequest $request
    ): \Gs2\Exchange\Result\UpdateCurrentRateMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Exchange\Result\UpdateCurrentRateMasterResult
         */
        $r = $this->client->updateCurrentRateMaster(
            $request
        );
        return $r;
    }

    public function updateFromGitHub(
        \Gs2\Exchange\Request\UpdateCurrentRateMasterFromGitHubRequest $request
    ): \Gs2\Exchange\Result\UpdateCurrentRateMasterFromGitHubResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Exchange\Result\UpdateCurrentRateMasterFromGitHubResult
         */
        $r = $this->client->updateCurrentRateMasterFromGitHub(
            $request
        );
        return $r;
    }

}
