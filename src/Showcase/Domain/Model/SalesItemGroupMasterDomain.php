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


class SalesItemGroupMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ShowcaseRestClient
     */
    private $client;

    /**
     * @var \Gs2\Showcase\Domain\Cache\SalesItemGroupMasterDomainCache
     */
    private $salesItemGroupMasterCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $salesItemGroupName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Showcase\Domain\Cache\SalesItemGroupMasterDomainCache $salesItemGroupMasterCache,
        string $namespaceName,
        string $salesItemGroupName
    ) {
        $this->session = $session;
        $this->client = new Gs2ShowcaseRestClient(
            $session
        );
        $this->salesItemGroupMasterCache = $salesItemGroupMasterCache;
        $this->namespaceName = $namespaceName;
        $this->salesItemGroupName = $salesItemGroupName;
    }

    public function load(
        \Gs2\Showcase\Request\GetSalesItemGroupMasterRequest $request
    ): \Gs2\Showcase\Result\GetSalesItemGroupMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setSalesItemGroupName($this->salesItemGroupName);
        /**
         * @var \Gs2\Showcase\Result\GetSalesItemGroupMasterResult
         */
        $r = $this->client->getSalesItemGroupMaster(
            $request
        );
        $this->salesItemGroupMasterCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Showcase\Request\UpdateSalesItemGroupMasterRequest $request
    ): \Gs2\Showcase\Result\UpdateSalesItemGroupMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setSalesItemGroupName($this->salesItemGroupName);
        /**
         * @var \Gs2\Showcase\Result\UpdateSalesItemGroupMasterResult
         */
        $r = $this->client->updateSalesItemGroupMaster(
            $request
        );
        $this->salesItemGroupMasterCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Showcase\Request\DeleteSalesItemGroupMasterRequest $request
    ): \Gs2\Showcase\Result\DeleteSalesItemGroupMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setSalesItemGroupName($this->salesItemGroupName);
        /**
         * @var \Gs2\Showcase\Result\DeleteSalesItemGroupMasterResult
         */
        $r = $this->client->deleteSalesItemGroupMaster(
            $request
        );
        $this->salesItemGroupMasterCache->delete($r->getItem());
        return $r;
    }

}
