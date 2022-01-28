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

namespace Gs2\Ranking\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Ranking\Gs2RankingRestClient;


class NamespaceDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2RankingRestClient
     */
    private $client;

    /**
     * @var \Gs2\Ranking\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Ranking\Domain\Cache\CategoryModelDomainCache
     */
    private $categoryModelCache;

    /**
     * @var \Gs2\Ranking\Domain\Cache\CategoryModelMasterDomainCache
     */
    private $categoryModelMasterCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Ranking\Domain\Cache\NamespaceDomainCache $namespaceCache,
        string $namespaceName
    ) {
        $this->session = $session;
        $this->client = new Gs2RankingRestClient(
            $session
        );
        $this->namespaceCache = $namespaceCache;
        $this->namespaceName = $namespaceName;
        $this->categoryModelCache = new \Gs2\Ranking\Domain\Cache\CategoryModelDomainCache();
        $this->categoryModelMasterCache = new \Gs2\Ranking\Domain\Cache\CategoryModelMasterDomainCache();
    }

    public function getStatus(
        \Gs2\Ranking\Request\GetNamespaceStatusRequest $request
    ): \Gs2\Ranking\Result\GetNamespaceStatusResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Ranking\Result\GetNamespaceStatusResult
         */
        $r = $this->client->getNamespaceStatus(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Ranking\Request\GetNamespaceRequest $request
    ): \Gs2\Ranking\Result\GetNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Ranking\Result\GetNamespaceResult
         */
        $r = $this->client->getNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Ranking\Request\UpdateNamespaceRequest $request
    ): \Gs2\Ranking\Result\UpdateNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Ranking\Result\UpdateNamespaceResult
         */
        $r = $this->client->updateNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Ranking\Request\DeleteNamespaceRequest $request
    ): \Gs2\Ranking\Result\DeleteNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Ranking\Result\DeleteNamespaceResult
         */
        $r = $this->client->deleteNamespace(
            $request
        );
        $this->namespaceCache->delete($r->getItem());
        return $r;
    }

    public function createCategoryModelMaster(
        \Gs2\Ranking\Request\CreateCategoryModelMasterRequest $request
    ): \Gs2\Ranking\Result\CreateCategoryModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Ranking\Result\CreateCategoryModelMasterResult
         */
        $r = $this->client->createCategoryModelMaster(
            $request
        );
        return $r;
    }

    public function categoryModels(
    ): \Gs2\Ranking\Domain\Iterator\DescribeCategoryModelsIterator {
        return new \Gs2\Ranking\Domain\Iterator\DescribeCategoryModelsIterator(
            $this->categoryModelCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function categoryModelMasters(
    ): \Gs2\Ranking\Domain\Iterator\DescribeCategoryModelMastersIterator {
        return new \Gs2\Ranking\Domain\Iterator\DescribeCategoryModelMastersIterator(
            $this->categoryModelMasterCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function currentRankingMaster(
    ): CurrentRankingMasterDomain {
        return new CurrentRankingMasterDomain(
            $this->session,
            $this->namespaceName
        );
    }

    public function categoryModel(
        string $categoryName
    ): CategoryModelDomain {
        return new CategoryModelDomain(
            $this->session,
            $this->categoryModelCache,
            $this->namespaceName,
            $categoryName
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

    public function categoryModelMaster(
        string $categoryName
    ): CategoryModelMasterDomain {
        return new CategoryModelMasterDomain(
            $this->session,
            $this->categoryModelMasterCache,
            $this->namespaceName,
            $categoryName
        );
    }

}
