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


class PrizeTableDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2LotteryRestClient
     */
    private $client;

    /**
     * @var \Gs2\Lottery\Domain\Cache\PrizeTableDomainCache
     */
    private $prizeTableCache;

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
        \Gs2\Lottery\Domain\Cache\PrizeTableDomainCache $prizeTableCache,
        string $namespaceName,
        string $prizeTableName
    ) {
        $this->session = $session;
        $this->client = new Gs2LotteryRestClient(
            $session
        );
        $this->prizeTableCache = $prizeTableCache;
        $this->namespaceName = $namespaceName;
        $this->prizeTableName = $prizeTableName;
    }

    public function load(
        \Gs2\Lottery\Request\GetPrizeTableRequest $request
    ): \Gs2\Lottery\Result\GetPrizeTableResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setPrizeTableName($this->prizeTableName);
        /**
         * @var \Gs2\Lottery\Result\GetPrizeTableResult
         */
        $r = $this->client->getPrizeTable(
            $request
        );
        $this->prizeTableCache->update($r->getItem());
        return $r;
    }

}