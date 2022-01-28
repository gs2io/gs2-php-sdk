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

namespace Gs2\Matchmaking\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Matchmaking\Gs2MatchmakingRestClient;


class CurrentRatingModelMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2MatchmakingRestClient
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
        $this->client = new Gs2MatchmakingRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
    }

    public function exportMaster(
        \Gs2\Matchmaking\Request\ExportMasterRequest $request
    ): \Gs2\Matchmaking\Result\ExportMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Matchmaking\Result\ExportMasterResult
         */
        $r = $this->client->exportMaster(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Matchmaking\Request\GetCurrentRatingModelMasterRequest $request
    ): \Gs2\Matchmaking\Result\GetCurrentRatingModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Matchmaking\Result\GetCurrentRatingModelMasterResult
         */
        $r = $this->client->getCurrentRatingModelMaster(
            $request
        );
        return $r;
    }

    public function update(
        \Gs2\Matchmaking\Request\UpdateCurrentRatingModelMasterRequest $request
    ): \Gs2\Matchmaking\Result\UpdateCurrentRatingModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Matchmaking\Result\UpdateCurrentRatingModelMasterResult
         */
        $r = $this->client->updateCurrentRatingModelMaster(
            $request
        );
        return $r;
    }

    public function updateFromGitHub(
        \Gs2\Matchmaking\Request\UpdateCurrentRatingModelMasterFromGitHubRequest $request
    ): \Gs2\Matchmaking\Result\UpdateCurrentRatingModelMasterFromGitHubResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Matchmaking\Result\UpdateCurrentRatingModelMasterFromGitHubResult
         */
        $r = $this->client->updateCurrentRatingModelMasterFromGitHub(
            $request
        );
        return $r;
    }

}
