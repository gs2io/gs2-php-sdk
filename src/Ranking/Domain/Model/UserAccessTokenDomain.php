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


class UserAccessTokenDomain {

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
     * @var \Gs2\Auth\Model\AccessToken
     */
    private $accessToken;

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
        \Gs2\Auth\Model\AccessToken $accessToken
    ) {
        $this->session = $session;
        $this->client = new Gs2RankingRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->scoreCache = new \Gs2\Ranking\Domain\Cache\ScoreDomainCache();
        $this->rankingCache = new \Gs2\Ranking\Domain\Cache\RankingDomainCache();
        $this->subscribeUserCache = new \Gs2\Ranking\Domain\Cache\SubscribeUserDomainCache();
    }

    public function putScore(
        \Gs2\Ranking\Request\PutScoreRequest $request
    ): \Gs2\Ranking\Result\PutScoreResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Ranking\Result\PutScoreResult
         */
        $r = $this->client->putScore(
            $request
        );
        return $r;
    }

    public function subscribeUsers(
        string $categoryName
    ): \Gs2\Ranking\Domain\Iterator\DescribeSubscribesByCategoryNameIterator {
        return new \Gs2\Ranking\Domain\Iterator\DescribeSubscribesByCategoryNameIterator(
            $this->subscribeUserCache,
            $this->client,
            $this->namespaceName,
            $categoryName,
            $this->accessToken
        );
    }

    public function scores(
        string $categoryName,
        string $scorerUserId
    ): \Gs2\Ranking\Domain\Iterator\DescribeScoresIterator {
        return new \Gs2\Ranking\Domain\Iterator\DescribeScoresIterator(
            $this->scoreCache,
            $this->client,
            $this->namespaceName,
            $categoryName,
            $this->accessToken,
            $scorerUserId
        );
    }

    public function rankings(
        string $categoryName
    ): \Gs2\Ranking\Domain\Iterator\DescribeRankingsIterator {
        return new \Gs2\Ranking\Domain\Iterator\DescribeRankingsIterator(
            $this->rankingCache,
            $this->client,
            $this->namespaceName,
            $categoryName,
            $this->accessToken
        );
    }

    public function ranking(
        ?string $categoryName
    ): RankingAccessTokenDomain {
        return new RankingAccessTokenDomain(
            $this->session,
            $this->rankingCache,
            $this->namespaceName,
            $this->accessToken,
            $categoryName
        );
    }

    public function score(
        string $categoryName,
        string $scorerUserId,
        string $uniqueId
    ): ScoreAccessTokenDomain {
        return new ScoreAccessTokenDomain(
            $this->session,
            $this->scoreCache,
            $this->namespaceName,
            $this->accessToken,
            $categoryName,
            $scorerUserId,
            $uniqueId
        );
    }

    public function subscribe(
        string $categoryName
    ): SubscribeAccessTokenDomain {
        return new SubscribeAccessTokenDomain(
            $this->session,
            $this->namespaceName,
            $this->accessToken,
            $categoryName
        );
    }

}
