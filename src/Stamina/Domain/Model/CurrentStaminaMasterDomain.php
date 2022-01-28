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

namespace Gs2\Stamina\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Stamina\Gs2StaminaRestClient;


class CurrentStaminaMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2StaminaRestClient
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
        $this->client = new Gs2StaminaRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
    }

    public function exportMaster(
        \Gs2\Stamina\Request\ExportMasterRequest $request
    ): \Gs2\Stamina\Result\ExportMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Stamina\Result\ExportMasterResult
         */
        $r = $this->client->exportMaster(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Stamina\Request\GetCurrentStaminaMasterRequest $request
    ): \Gs2\Stamina\Result\GetCurrentStaminaMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Stamina\Result\GetCurrentStaminaMasterResult
         */
        $r = $this->client->getCurrentStaminaMaster(
            $request
        );
        return $r;
    }

    public function update(
        \Gs2\Stamina\Request\UpdateCurrentStaminaMasterRequest $request
    ): \Gs2\Stamina\Result\UpdateCurrentStaminaMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Stamina\Result\UpdateCurrentStaminaMasterResult
         */
        $r = $this->client->updateCurrentStaminaMaster(
            $request
        );
        return $r;
    }

    public function updateFromGitHub(
        \Gs2\Stamina\Request\UpdateCurrentStaminaMasterFromGitHubRequest $request
    ): \Gs2\Stamina\Result\UpdateCurrentStaminaMasterFromGitHubResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Stamina\Result\UpdateCurrentStaminaMasterFromGitHubResult
         */
        $r = $this->client->updateCurrentStaminaMasterFromGitHub(
            $request
        );
        return $r;
    }

}
