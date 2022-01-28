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


class CategoryModelDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2RankingRestClient
     */
    private $client;

    /**
     * @var \Gs2\Ranking\Domain\Cache\CategoryModelDomainCache
     */
    private $categoryModelCache;

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
        \Gs2\Ranking\Domain\Cache\CategoryModelDomainCache $categoryModelCache,
        string $namespaceName,
        string $categoryName
    ) {
        $this->session = $session;
        $this->client = new Gs2RankingRestClient(
            $session
        );
        $this->categoryModelCache = $categoryModelCache;
        $this->namespaceName = $namespaceName;
        $this->categoryName = $categoryName;
    }

    public function load(
        \Gs2\Ranking\Request\GetCategoryModelRequest $request
    ): \Gs2\Ranking\Result\GetCategoryModelResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setCategoryName($this->categoryName);
        /**
         * @var \Gs2\Ranking\Result\GetCategoryModelResult
         */
        $r = $this->client->getCategoryModel(
            $request
        );
        $this->categoryModelCache->update($r->getItem());
        return $r;
    }

}
