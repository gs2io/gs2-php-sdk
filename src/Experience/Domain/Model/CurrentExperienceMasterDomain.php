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

namespace Gs2\Experience\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Experience\Gs2ExperienceRestClient;


class CurrentExperienceMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ExperienceRestClient
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
        $this->client = new Gs2ExperienceRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
    }

    public function exportMaster(
        \Gs2\Experience\Request\ExportMasterRequest $request
    ): \Gs2\Experience\Result\ExportMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Experience\Result\ExportMasterResult
         */
        $r = $this->client->exportMaster(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Experience\Request\GetCurrentExperienceMasterRequest $request
    ): \Gs2\Experience\Result\GetCurrentExperienceMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Experience\Result\GetCurrentExperienceMasterResult
         */
        $r = $this->client->getCurrentExperienceMaster(
            $request
        );
        return $r;
    }

    public function update(
        \Gs2\Experience\Request\UpdateCurrentExperienceMasterRequest $request
    ): \Gs2\Experience\Result\UpdateCurrentExperienceMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Experience\Result\UpdateCurrentExperienceMasterResult
         */
        $r = $this->client->updateCurrentExperienceMaster(
            $request
        );
        return $r;
    }

    public function updateFromGitHub(
        \Gs2\Experience\Request\UpdateCurrentExperienceMasterFromGitHubRequest $request
    ): \Gs2\Experience\Result\UpdateCurrentExperienceMasterFromGitHubResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Experience\Result\UpdateCurrentExperienceMasterFromGitHubResult
         */
        $r = $this->client->updateCurrentExperienceMasterFromGitHub(
            $request
        );
        return $r;
    }

}
