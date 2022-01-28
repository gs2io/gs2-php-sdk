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

namespace Gs2\Showcase\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Showcase\Gs2ShowcaseRestClient;


class CurrentShowcaseMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ShowcaseRestClient
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
        $this->client = new Gs2ShowcaseRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
    }

    public function exportMaster(
        \Gs2\Showcase\Request\ExportMasterRequest $request
    ): \Gs2\Showcase\Result\ExportMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Showcase\Result\ExportMasterResult
         */
        $r = $this->client->exportMaster(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Showcase\Request\GetCurrentShowcaseMasterRequest $request
    ): \Gs2\Showcase\Result\GetCurrentShowcaseMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Showcase\Result\GetCurrentShowcaseMasterResult
         */
        $r = $this->client->getCurrentShowcaseMaster(
            $request
        );
        return $r;
    }

    public function update(
        \Gs2\Showcase\Request\UpdateCurrentShowcaseMasterRequest $request
    ): \Gs2\Showcase\Result\UpdateCurrentShowcaseMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Showcase\Result\UpdateCurrentShowcaseMasterResult
         */
        $r = $this->client->updateCurrentShowcaseMaster(
            $request
        );
        return $r;
    }

    public function updateFromGitHub(
        \Gs2\Showcase\Request\UpdateCurrentShowcaseMasterFromGitHubRequest $request
    ): \Gs2\Showcase\Result\UpdateCurrentShowcaseMasterFromGitHubResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Showcase\Result\UpdateCurrentShowcaseMasterFromGitHubResult
         */
        $r = $this->client->updateCurrentShowcaseMasterFromGitHub(
            $request
        );
        return $r;
    }

}
