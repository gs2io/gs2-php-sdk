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

namespace Gs2\Inventory\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Inventory\Gs2InventoryRestClient;


class CurrentItemModelMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2InventoryRestClient
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
        $this->client = new Gs2InventoryRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
    }

    public function exportMaster(
        \Gs2\Inventory\Request\ExportMasterRequest $request
    ): \Gs2\Inventory\Result\ExportMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Inventory\Result\ExportMasterResult
         */
        $r = $this->client->exportMaster(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Inventory\Request\GetCurrentItemModelMasterRequest $request
    ): \Gs2\Inventory\Result\GetCurrentItemModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Inventory\Result\GetCurrentItemModelMasterResult
         */
        $r = $this->client->getCurrentItemModelMaster(
            $request
        );
        return $r;
    }

    public function update(
        \Gs2\Inventory\Request\UpdateCurrentItemModelMasterRequest $request
    ): \Gs2\Inventory\Result\UpdateCurrentItemModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Inventory\Result\UpdateCurrentItemModelMasterResult
         */
        $r = $this->client->updateCurrentItemModelMaster(
            $request
        );
        return $r;
    }

    public function updateFromGitHub(
        \Gs2\Inventory\Request\UpdateCurrentItemModelMasterFromGitHubRequest $request
    ): \Gs2\Inventory\Result\UpdateCurrentItemModelMasterFromGitHubResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Inventory\Result\UpdateCurrentItemModelMasterFromGitHubResult
         */
        $r = $this->client->updateCurrentItemModelMasterFromGitHub(
            $request
        );
        return $r;
    }

}
