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

namespace Gs2\Dictionary\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Dictionary\Gs2DictionaryRestClient;


class CurrentEntryMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2DictionaryRestClient
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
        $this->client = new Gs2DictionaryRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
    }

    public function exportMaster(
        \Gs2\Dictionary\Request\ExportMasterRequest $request
    ): \Gs2\Dictionary\Result\ExportMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Dictionary\Result\ExportMasterResult
         */
        $r = $this->client->exportMaster(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Dictionary\Request\GetCurrentEntryMasterRequest $request
    ): \Gs2\Dictionary\Result\GetCurrentEntryMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Dictionary\Result\GetCurrentEntryMasterResult
         */
        $r = $this->client->getCurrentEntryMaster(
            $request
        );
        return $r;
    }

    public function update(
        \Gs2\Dictionary\Request\UpdateCurrentEntryMasterRequest $request
    ): \Gs2\Dictionary\Result\UpdateCurrentEntryMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Dictionary\Result\UpdateCurrentEntryMasterResult
         */
        $r = $this->client->updateCurrentEntryMaster(
            $request
        );
        return $r;
    }

    public function updateFromGitHub(
        \Gs2\Dictionary\Request\UpdateCurrentEntryMasterFromGitHubRequest $request
    ): \Gs2\Dictionary\Result\UpdateCurrentEntryMasterFromGitHubResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Dictionary\Result\UpdateCurrentEntryMasterFromGitHubResult
         */
        $r = $this->client->updateCurrentEntryMasterFromGitHub(
            $request
        );
        return $r;
    }

}
