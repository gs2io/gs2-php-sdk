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

namespace Gs2\Ranking\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Ranking\Gs2RankingRestClient;


class CurrentRankingMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2RankingRestClient
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
        $this->client = new Gs2RankingRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
    }

    public function exportMaster(
        \Gs2\Ranking\Request\ExportMasterRequest $request
    ): \Gs2\Ranking\Result\ExportMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Ranking\Result\ExportMasterResult
         */
        $r = $this->client->exportMaster(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Ranking\Request\GetCurrentRankingMasterRequest $request
    ): \Gs2\Ranking\Result\GetCurrentRankingMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Ranking\Result\GetCurrentRankingMasterResult
         */
        $r = $this->client->getCurrentRankingMaster(
            $request
        );
        return $r;
    }

    public function update(
        \Gs2\Ranking\Request\UpdateCurrentRankingMasterRequest $request
    ): \Gs2\Ranking\Result\UpdateCurrentRankingMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Ranking\Result\UpdateCurrentRankingMasterResult
         */
        $r = $this->client->updateCurrentRankingMaster(
            $request
        );
        return $r;
    }

    public function updateFromGitHub(
        \Gs2\Ranking\Request\UpdateCurrentRankingMasterFromGitHubRequest $request
    ): \Gs2\Ranking\Result\UpdateCurrentRankingMasterFromGitHubResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Ranking\Result\UpdateCurrentRankingMasterFromGitHubResult
         */
        $r = $this->client->updateCurrentRankingMasterFromGitHub(
            $request
        );
        return $r;
    }

}
