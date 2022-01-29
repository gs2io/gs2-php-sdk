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

namespace Gs2\Quest\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Quest\Gs2QuestRestClient;


class CurrentQuestMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2QuestRestClient
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
        $this->client = new Gs2QuestRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
    }

    public function exportMaster(
        \Gs2\Quest\Request\ExportMasterRequest $request
    ): \Gs2\Quest\Result\ExportMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Quest\Result\ExportMasterResult
         */
        $r = $this->client->exportMaster(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Quest\Request\GetCurrentQuestMasterRequest $request
    ): \Gs2\Quest\Result\GetCurrentQuestMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Quest\Result\GetCurrentQuestMasterResult
         */
        $r = $this->client->getCurrentQuestMaster(
            $request
        );
        return $r;
    }

    public function update(
        \Gs2\Quest\Request\UpdateCurrentQuestMasterRequest $request
    ): \Gs2\Quest\Result\UpdateCurrentQuestMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Quest\Result\UpdateCurrentQuestMasterResult
         */
        $r = $this->client->updateCurrentQuestMaster(
            $request
        );
        return $r;
    }

    public function updateFromGitHub(
        \Gs2\Quest\Request\UpdateCurrentQuestMasterFromGitHubRequest $request
    ): \Gs2\Quest\Result\UpdateCurrentQuestMasterFromGitHubResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Quest\Result\UpdateCurrentQuestMasterFromGitHubResult
         */
        $r = $this->client->updateCurrentQuestMasterFromGitHub(
            $request
        );
        return $r;
    }

}