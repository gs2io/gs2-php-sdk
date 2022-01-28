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


class UserDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2RankingRestClient
     */
    private $client;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $userId;

    /**
     * @var \Gs2\Ranking\Domain\Cache\ScoreDomainCache
     */
    private $scoreCache;

    /**
     * @var \Gs2\Ranking\Domain\Cache\RankingDomainCache
     */
    private $rankingCache;

    /**
     * @var \Gs2\Ranking\Domain\Cache\SubscribeUserDomainCache
     */
    private $subscribeUserCache;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        string $userId
    ) {
        $this->session = $session;
        $this->client = new Gs2RankingRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->scoreCache = new \Gs2\Ranking\Domain\Cache\ScoreDomainCache();
        $this->rankingCache = new \Gs2\Ranking\Domain\Cache\RankingDomainCache();
        $this->subscribeUserCache = new \Gs2\Ranking\Domain\Cache\SubscribeUserDomainCache();
    }

    public function putScore(
        \Gs2\Ranking\Request\PutScoreByUserIdRequest $request
    ): \Gs2\Ranking\Result\PutScoreByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Ranking\Result\PutScoreByUserIdResult
         */
        $r = $this->client->putScoreByUserId(
            $request
        );
        return $r;
    }

    public function subscribeUsers(
        string $categoryName
    ): \Gs2\Ranking\Domain\Iterator\DescribeSubscribesByCategoryNameAndUserIdIterator {
        return new \Gs2\Ranking\Domain\Iterator\DescribeSubscribesByCategoryNameAndUserIdIterator(
            $this->subscribeUserCache,
            $this->client,
            $this->namespaceName,
            $categoryName,
            $this->userId
        );
    }

    public function scores(
        string $categoryName,
        string $scorerUserId
    ): \Gs2\Ranking\Domain\Iterator\DescribeScoresByUserIdIterator {
        return new \Gs2\Ranking\Domain\Iterator\DescribeScoresByUserIdIterator(
            $this->scoreCache,
            $this->client,
            $this->namespaceName,
            $categoryName,
            $this->userId,
            $scorerUserId
        );
    }

    public function rankings(
        string $categoryName
    ): \Gs2\Ranking\Domain\Iterator\DescribeRankingsByUserIdIterator {
        return new \Gs2\Ranking\Domain\Iterator\DescribeRankingsByUserIdIterator(
            $this->rankingCache,
            $this->client,
            $this->namespaceName,
            $categoryName,
            $this->userId
        );
    }

    public function nearRankings(
        string $categoryName,
        int $score
    ): \Gs2\Ranking\Domain\Iterator\DescribeNearRankingsIterator {
        return new \Gs2\Ranking\Domain\Iterator\DescribeNearRankingsIterator(
            $this->rankingCache,
            $this->client,
            $this->namespaceName,
            $categoryName,
            $score
        );
    }

    public function ranking(
        ?string $categoryName
    ): RankingDomain {
        return new RankingDomain(
            $this->session,
            $this->rankingCache,
            $this->namespaceName,
            $this->userId,
            $categoryName
        );
    }

    public function score(
        string $categoryName,
        string $scorerUserId,
        string $uniqueId
    ): ScoreDomain {
        return new ScoreDomain(
            $this->session,
            $this->scoreCache,
            $this->namespaceName,
            $this->userId,
            $categoryName,
            $scorerUserId,
            $uniqueId
        );
    }

    public function subscribe(
        string $categoryName
    ): SubscribeDomain {
        return new SubscribeDomain(
            $this->session,
            $this->namespaceName,
            $this->userId,
            $categoryName
        );
    }

}
