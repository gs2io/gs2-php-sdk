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


class CategoryModelMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2RankingRestClient
     */
    private $client;

    /**
     * @var \Gs2\Ranking\Domain\Cache\CategoryModelMasterDomainCache
     */
    private $categoryModelMasterCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $categoryName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Ranking\Domain\Cache\CategoryModelMasterDomainCache $categoryModelMasterCache,
        string $namespaceName,
        string $categoryName
    ) {
        $this->session = $session;
        $this->client = new Gs2RankingRestClient(
            $session
        );
        $this->categoryModelMasterCache = $categoryModelMasterCache;
        $this->namespaceName = $namespaceName;
        $this->categoryName = $categoryName;
    }

    public function load(
        \Gs2\Ranking\Request\GetCategoryModelMasterRequest $request
    ): \Gs2\Ranking\Result\GetCategoryModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setCategoryName($this->categoryName);
        /**
         * @var \Gs2\Ranking\Result\GetCategoryModelMasterResult
         */
        $r = $this->client->getCategoryModelMaster(
            $request
        );
        $this->categoryModelMasterCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Ranking\Request\UpdateCategoryModelMasterRequest $request
    ): \Gs2\Ranking\Result\UpdateCategoryModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setCategoryName($this->categoryName);
        /**
         * @var \Gs2\Ranking\Result\UpdateCategoryModelMasterResult
         */
        $r = $this->client->updateCategoryModelMaster(
            $request
        );
        $this->categoryModelMasterCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Ranking\Request\DeleteCategoryModelMasterRequest $request
    ): \Gs2\Ranking\Result\DeleteCategoryModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setCategoryName($this->categoryName);
        /**
         * @var \Gs2\Ranking\Result\DeleteCategoryModelMasterResult
         */
        $r = $this->client->deleteCategoryModelMaster(
            $request
        );
        $this->categoryModelMasterCache->delete($r->getItem());
        return $r;
    }

}
