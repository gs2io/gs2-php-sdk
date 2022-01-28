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

namespace Gs2\Lottery\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Lottery\Gs2LotteryRestClient;


class CurrentLotteryMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2LotteryRestClient
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
        $this->client = new Gs2LotteryRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
    }

    public function exportMaster(
        \Gs2\Lottery\Request\ExportMasterRequest $request
    ): \Gs2\Lottery\Result\ExportMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Lottery\Result\ExportMasterResult
         */
        $r = $this->client->exportMaster(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Lottery\Request\GetCurrentLotteryMasterRequest $request
    ): \Gs2\Lottery\Result\GetCurrentLotteryMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Lottery\Result\GetCurrentLotteryMasterResult
         */
        $r = $this->client->getCurrentLotteryMaster(
            $request
        );
        return $r;
    }

    public function update(
        \Gs2\Lottery\Request\UpdateCurrentLotteryMasterRequest $request
    ): \Gs2\Lottery\Result\UpdateCurrentLotteryMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Lottery\Result\UpdateCurrentLotteryMasterResult
         */
        $r = $this->client->updateCurrentLotteryMaster(
            $request
        );
        return $r;
    }

    public function updateFromGitHub(
        \Gs2\Lottery\Request\UpdateCurrentLotteryMasterFromGitHubRequest $request
    ): \Gs2\Lottery\Result\UpdateCurrentLotteryMasterFromGitHubResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Lottery\Result\UpdateCurrentLotteryMasterFromGitHubResult
         */
        $r = $this->client->updateCurrentLotteryMasterFromGitHub(
            $request
        );
        return $r;
    }

}
