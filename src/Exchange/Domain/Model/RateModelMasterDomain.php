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

namespace Gs2\Exchange\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Exchange\Gs2ExchangeRestClient;


class RateModelMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ExchangeRestClient
     */
    private $client;

    /**
     * @var \Gs2\Exchange\Domain\Cache\RateModelMasterDomainCache
     */
    private $rateModelMasterCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $rateName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Exchange\Domain\Cache\RateModelMasterDomainCache $rateModelMasterCache,
        string $namespaceName,
        string $rateName
    ) {
        $this->session = $session;
        $this->client = new Gs2ExchangeRestClient(
            $session
        );
        $this->rateModelMasterCache = $rateModelMasterCache;
        $this->namespaceName = $namespaceName;
        $this->rateName = $rateName;
    }

    public function load(
        \Gs2\Exchange\Request\GetRateModelMasterRequest $request
    ): \Gs2\Exchange\Result\GetRateModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setRateName($this->rateName);
        /**
         * @var \Gs2\Exchange\Result\GetRateModelMasterResult
         */
        $r = $this->client->getRateModelMaster(
            $request
        );
        $this->rateModelMasterCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Exchange\Request\UpdateRateModelMasterRequest $request
    ): \Gs2\Exchange\Result\UpdateRateModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setRateName($this->rateName);
        /**
         * @var \Gs2\Exchange\Result\UpdateRateModelMasterResult
         */
        $r = $this->client->updateRateModelMaster(
            $request
        );
        $this->rateModelMasterCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Exchange\Request\DeleteRateModelMasterRequest $request
    ): \Gs2\Exchange\Result\DeleteRateModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setRateName($this->rateName);
        /**
         * @var \Gs2\Exchange\Result\DeleteRateModelMasterResult
         */
        $r = $this->client->deleteRateModelMaster(
            $request
        );
        $this->rateModelMasterCache->delete($r->getItem());
        return $r;
    }

}
