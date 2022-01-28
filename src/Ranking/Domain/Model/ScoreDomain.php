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


class ScoreDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2RankingRestClient
     */
    private $client;

    /**
     * @var \Gs2\Ranking\Domain\Cache\ScoreDomainCache
     */
    private $scoreCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $userId;

    /**
     * @var string
     */
    private $categoryName;

    /**
     * @var string
     */
    private $scorerUserId;

    /**
     * @var string
     */
    private $uniqueId;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Ranking\Domain\Cache\ScoreDomainCache $scoreCache,
        string $namespaceName,
        string $userId,
        string $categoryName,
        string $scorerUserId,
        string $uniqueId
    ) {
        $this->session = $session;
        $this->client = new Gs2RankingRestClient(
            $session
        );
        $this->scoreCache = $scoreCache;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->categoryName = $categoryName;
        $this->scorerUserId = $scorerUserId;
        $this->uniqueId = $uniqueId;
    }

    public function load(
        \Gs2\Ranking\Request\GetScoreByUserIdRequest $request
    ): \Gs2\Ranking\Result\GetScoreByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setCategoryName($this->categoryName);
        $request->setScorerUserId($this->scorerUserId);
        $request->setUniqueId($this->uniqueId);
        /**
         * @var \Gs2\Ranking\Result\GetScoreByUserIdResult
         */
        $r = $this->client->getScoreByUserId(
            $request
        );
        $this->scoreCache->update($r->getItem());
        return $r;
    }

}
