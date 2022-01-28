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

namespace Gs2\News\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\News\Gs2NewsRestClient;


class CurrentNewsMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2NewsRestClient
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
        $this->client = new Gs2NewsRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
    }

    public function prepareUpdate(
        \Gs2\News\Request\PrepareUpdateCurrentNewsMasterRequest $request
    ): \Gs2\News\Result\PrepareUpdateCurrentNewsMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\News\Result\PrepareUpdateCurrentNewsMasterResult
         */
        $r = $this->client->prepareUpdateCurrentNewsMaster(
            $request
        );
        return $r;
    }

    public function update(
        \Gs2\News\Request\UpdateCurrentNewsMasterRequest $request
    ): \Gs2\News\Result\UpdateCurrentNewsMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\News\Result\UpdateCurrentNewsMasterResult
         */
        $r = $this->client->updateCurrentNewsMaster(
            $request
        );
        return $r;
    }

    public function prepareUpdateFromGitHub(
        \Gs2\News\Request\PrepareUpdateCurrentNewsMasterFromGitHubRequest $request
    ): \Gs2\News\Result\PrepareUpdateCurrentNewsMasterFromGitHubResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\News\Result\PrepareUpdateCurrentNewsMasterFromGitHubResult
         */
        $r = $this->client->prepareUpdateCurrentNewsMasterFromGitHub(
            $request
        );
        return $r;
    }

}
