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

namespace Gs2\Distributor\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Distributor\Gs2DistributorRestClient;


class DistributorModelDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2DistributorRestClient
     */
    private $client;

    /**
     * @var \Gs2\Distributor\Domain\Cache\DistributorModelDomainCache
     */
    private $distributorModelCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $distributorName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Distributor\Domain\Cache\DistributorModelDomainCache $distributorModelCache,
        string $namespaceName,
        string $distributorName
    ) {
        $this->session = $session;
        $this->client = new Gs2DistributorRestClient(
            $session
        );
        $this->distributorModelCache = $distributorModelCache;
        $this->namespaceName = $namespaceName;
        $this->distributorName = $distributorName;
    }

    public function load(
        \Gs2\Distributor\Request\GetDistributorModelRequest $request
    ): \Gs2\Distributor\Result\GetDistributorModelResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setDistributorName($this->distributorName);
        /**
         * @var \Gs2\Distributor\Result\GetDistributorModelResult
         */
        $r = $this->client->getDistributorModel(
            $request
        );
        $this->distributorModelCache->update($r->getItem());
        return $r;
    }

}
