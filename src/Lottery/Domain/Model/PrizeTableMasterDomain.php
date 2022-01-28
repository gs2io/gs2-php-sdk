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


class PrizeTableMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2LotteryRestClient
     */
    private $client;

    /**
     * @var \Gs2\Lottery\Domain\Cache\PrizeTableMasterDomainCache
     */
    private $prizeTableMasterCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $prizeTableName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Lottery\Domain\Cache\PrizeTableMasterDomainCache $prizeTableMasterCache,
        string $namespaceName,
        string $prizeTableName
    ) {
        $this->session = $session;
        $this->client = new Gs2LotteryRestClient(
            $session
        );
        $this->prizeTableMasterCache = $prizeTableMasterCache;
        $this->namespaceName = $namespaceName;
        $this->prizeTableName = $prizeTableName;
    }

    public function load(
        \Gs2\Lottery\Request\GetPrizeTableMasterRequest $request
    ): \Gs2\Lottery\Result\GetPrizeTableMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setPrizeTableName($this->prizeTableName);
        /**
         * @var \Gs2\Lottery\Result\GetPrizeTableMasterResult
         */
        $r = $this->client->getPrizeTableMaster(
            $request
        );
        $this->prizeTableMasterCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Lottery\Request\UpdatePrizeTableMasterRequest $request
    ): \Gs2\Lottery\Result\UpdatePrizeTableMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setPrizeTableName($this->prizeTableName);
        /**
         * @var \Gs2\Lottery\Result\UpdatePrizeTableMasterResult
         */
        $r = $this->client->updatePrizeTableMaster(
            $request
        );
        $this->prizeTableMasterCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Lottery\Request\DeletePrizeTableMasterRequest $request
    ): \Gs2\Lottery\Result\DeletePrizeTableMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setPrizeTableName($this->prizeTableName);
        /**
         * @var \Gs2\Lottery\Result\DeletePrizeTableMasterResult
         */
        $r = $this->client->deletePrizeTableMaster(
            $request
        );
        $this->prizeTableMasterCache->delete($r->getItem());
        return $r;
    }

}
