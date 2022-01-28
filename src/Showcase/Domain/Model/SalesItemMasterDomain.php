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


class SalesItemMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ShowcaseRestClient
     */
    private $client;

    /**
     * @var \Gs2\Showcase\Domain\Cache\SalesItemMasterDomainCache
     */
    private $salesItemMasterCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $salesItemName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Showcase\Domain\Cache\SalesItemMasterDomainCache $salesItemMasterCache,
        string $namespaceName,
        string $salesItemName
    ) {
        $this->session = $session;
        $this->client = new Gs2ShowcaseRestClient(
            $session
        );
        $this->salesItemMasterCache = $salesItemMasterCache;
        $this->namespaceName = $namespaceName;
        $this->salesItemName = $salesItemName;
    }

    public function load(
        \Gs2\Showcase\Request\GetSalesItemMasterRequest $request
    ): \Gs2\Showcase\Result\GetSalesItemMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setSalesItemName($this->salesItemName);
        /**
         * @var \Gs2\Showcase\Result\GetSalesItemMasterResult
         */
        $r = $this->client->getSalesItemMaster(
            $request
        );
        $this->salesItemMasterCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Showcase\Request\UpdateSalesItemMasterRequest $request
    ): \Gs2\Showcase\Result\UpdateSalesItemMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setSalesItemName($this->salesItemName);
        /**
         * @var \Gs2\Showcase\Result\UpdateSalesItemMasterResult
         */
        $r = $this->client->updateSalesItemMaster(
            $request
        );
        $this->salesItemMasterCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Showcase\Request\DeleteSalesItemMasterRequest $request
    ): \Gs2\Showcase\Result\DeleteSalesItemMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setSalesItemName($this->salesItemName);
        /**
         * @var \Gs2\Showcase\Result\DeleteSalesItemMasterResult
         */
        $r = $this->client->deleteSalesItemMaster(
            $request
        );
        $this->salesItemMasterCache->delete($r->getItem());
        return $r;
    }

}
