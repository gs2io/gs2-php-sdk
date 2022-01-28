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


class NamespaceDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2LotteryRestClient
     */
    private $client;

    /**
     * @var \Gs2\Lottery\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Lottery\Domain\Cache\LotteryModelMasterDomainCache
     */
    private $lotteryModelMasterCache;

    /**
     * @var \Gs2\Lottery\Domain\Cache\PrizeTableMasterDomainCache
     */
    private $prizeTableMasterCache;

    /**
     * @var \Gs2\Lottery\Domain\Cache\LotteryModelDomainCache
     */
    private $lotteryModelCache;

    /**
     * @var \Gs2\Lottery\Domain\Cache\PrizeTableDomainCache
     */
    private $prizeTableCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Lottery\Domain\Cache\NamespaceDomainCache $namespaceCache,
        string $namespaceName
    ) {
        $this->session = $session;
        $this->client = new Gs2LotteryRestClient(
            $session
        );
        $this->namespaceCache = $namespaceCache;
        $this->namespaceName = $namespaceName;
        $this->lotteryModelMasterCache = new \Gs2\Lottery\Domain\Cache\LotteryModelMasterDomainCache();
        $this->prizeTableMasterCache = new \Gs2\Lottery\Domain\Cache\PrizeTableMasterDomainCache();
        $this->lotteryModelCache = new \Gs2\Lottery\Domain\Cache\LotteryModelDomainCache();
        $this->prizeTableCache = new \Gs2\Lottery\Domain\Cache\PrizeTableDomainCache();
    }

    public function getStatus(
        \Gs2\Lottery\Request\GetNamespaceStatusRequest $request
    ): \Gs2\Lottery\Result\GetNamespaceStatusResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Lottery\Result\GetNamespaceStatusResult
         */
        $r = $this->client->getNamespaceStatus(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Lottery\Request\GetNamespaceRequest $request
    ): \Gs2\Lottery\Result\GetNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Lottery\Result\GetNamespaceResult
         */
        $r = $this->client->getNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Lottery\Request\UpdateNamespaceRequest $request
    ): \Gs2\Lottery\Result\UpdateNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Lottery\Result\UpdateNamespaceResult
         */
        $r = $this->client->updateNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Lottery\Request\DeleteNamespaceRequest $request
    ): \Gs2\Lottery\Result\DeleteNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Lottery\Result\DeleteNamespaceResult
         */
        $r = $this->client->deleteNamespace(
            $request
        );
        $this->namespaceCache->delete($r->getItem());
        return $r;
    }

    public function createLotteryModelMaster(
        \Gs2\Lottery\Request\CreateLotteryModelMasterRequest $request
    ): \Gs2\Lottery\Result\CreateLotteryModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Lottery\Result\CreateLotteryModelMasterResult
         */
        $r = $this->client->createLotteryModelMaster(
            $request
        );
        return $r;
    }

    public function createPrizeTableMaster(
        \Gs2\Lottery\Request\CreatePrizeTableMasterRequest $request
    ): \Gs2\Lottery\Result\CreatePrizeTableMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Lottery\Result\CreatePrizeTableMasterResult
         */
        $r = $this->client->createPrizeTableMaster(
            $request
        );
        return $r;
    }

    public function lotteryModelMasters(
    ): \Gs2\Lottery\Domain\Iterator\DescribeLotteryModelMastersIterator {
        return new \Gs2\Lottery\Domain\Iterator\DescribeLotteryModelMastersIterator(
            $this->lotteryModelMasterCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function prizeTableMasters(
    ): \Gs2\Lottery\Domain\Iterator\DescribePrizeTableMastersIterator {
        return new \Gs2\Lottery\Domain\Iterator\DescribePrizeTableMastersIterator(
            $this->prizeTableMasterCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function lotteryModels(
    ): \Gs2\Lottery\Domain\Iterator\DescribeLotteryModelsIterator {
        return new \Gs2\Lottery\Domain\Iterator\DescribeLotteryModelsIterator(
            $this->lotteryModelCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function prizeTables(
    ): \Gs2\Lottery\Domain\Iterator\DescribePrizeTablesIterator {
        return new \Gs2\Lottery\Domain\Iterator\DescribePrizeTablesIterator(
            $this->prizeTableCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function user(
        string $userId
    ): UserDomain {
        return new UserDomain(
            $this->session,
            $this->namespaceName,
            $userId
        );
    }

    public function accessToken(
        \Gs2\Auth\Model\AccessToken $accessToken
    ): UserAccessTokenDomain  {
        return new UserAccessTokenDomain(
            $this->session,
            $this->namespaceName,
            $accessToken
        );
    }

    public function currentLotteryMaster(
    ): CurrentLotteryMasterDomain {
        return new CurrentLotteryMasterDomain(
            $this->session,
            $this->namespaceName
        );
    }

    public function lotteryModel(
        string $lotteryName
    ): LotteryModelDomain {
        return new LotteryModelDomain(
            $this->session,
            $this->lotteryModelCache,
            $this->namespaceName,
            $lotteryName
        );
    }

    public function prizeTableMaster(
        string $prizeTableName
    ): PrizeTableMasterDomain {
        return new PrizeTableMasterDomain(
            $this->session,
            $this->prizeTableMasterCache,
            $this->namespaceName,
            $prizeTableName
        );
    }

    public function lotteryModelMaster(
        string $lotteryName
    ): LotteryModelMasterDomain {
        return new LotteryModelMasterDomain(
            $this->session,
            $this->lotteryModelMasterCache,
            $this->namespaceName,
            $lotteryName
        );
    }

    public function prizeTable(
        string $prizeTableName
    ): PrizeTableDomain {
        return new PrizeTableDomain(
            $this->session,
            $this->prizeTableCache,
            $this->namespaceName,
            $prizeTableName
        );
    }

}
