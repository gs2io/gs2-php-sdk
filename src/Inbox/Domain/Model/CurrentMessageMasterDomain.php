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

namespace Gs2\Inbox\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Inbox\Gs2InboxRestClient;


class CurrentMessageMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2InboxRestClient
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
        $this->client = new Gs2InboxRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
    }

    public function exportMaster(
        \Gs2\Inbox\Request\ExportMasterRequest $request
    ): \Gs2\Inbox\Result\ExportMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Inbox\Result\ExportMasterResult
         */
        $r = $this->client->exportMaster(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Inbox\Request\GetCurrentMessageMasterRequest $request
    ): \Gs2\Inbox\Result\GetCurrentMessageMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Inbox\Result\GetCurrentMessageMasterResult
         */
        $r = $this->client->getCurrentMessageMaster(
            $request
        );
        return $r;
    }

    public function update(
        \Gs2\Inbox\Request\UpdateCurrentMessageMasterRequest $request
    ): \Gs2\Inbox\Result\UpdateCurrentMessageMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Inbox\Result\UpdateCurrentMessageMasterResult
         */
        $r = $this->client->updateCurrentMessageMaster(
            $request
        );
        return $r;
    }

    public function updateFromGitHub(
        \Gs2\Inbox\Request\UpdateCurrentMessageMasterFromGitHubRequest $request
    ): \Gs2\Inbox\Result\UpdateCurrentMessageMasterFromGitHubResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Inbox\Result\UpdateCurrentMessageMasterFromGitHubResult
         */
        $r = $this->client->updateCurrentMessageMasterFromGitHub(
            $request
        );
        return $r;
    }

}
