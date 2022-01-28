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

namespace Gs2\Matchmaking\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Matchmaking\Gs2MatchmakingRestClient;


class UserAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2MatchmakingRestClient
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
     * @var \Gs2\Matchmaking\Domain\Cache\GatheringDomainCache
     */
    private $gatheringCache;

    /**
     * @var \Gs2\Matchmaking\Domain\Cache\RatingDomainCache
     */
    private $ratingCache;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken
    ) {
        $this->session = $session;
        $this->client = new Gs2MatchmakingRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->gatheringCache = new \Gs2\Matchmaking\Domain\Cache\GatheringDomainCache();
        $this->ratingCache = new \Gs2\Matchmaking\Domain\Cache\RatingDomainCache();
    }

    public function createGathering(
        \Gs2\Matchmaking\Request\CreateGatheringRequest $request
    ): \Gs2\Matchmaking\Result\CreateGatheringResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Matchmaking\Result\CreateGatheringResult
         */
        $r = $this->client->createGathering(
            $request
        );
        return $r;
    }

    public function doMatchmaking(
        \Gs2\Matchmaking\Request\DoMatchmakingRequest $request
    ): \Gs2\Matchmaking\Result\DoMatchmakingResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Matchmaking\Result\DoMatchmakingResult
         */
        $r = $this->client->doMatchmaking(
            $request
        );
        return $r;
    }

    public function ratings(
    ): \Gs2\Matchmaking\Domain\Iterator\DescribeRatingsIterator {
        return new \Gs2\Matchmaking\Domain\Iterator\DescribeRatingsIterator(
            $this->ratingCache,
            $this->client,
            $this->namespaceName,
            $this->accessToken
        );
    }

    public function rating(
        string $ratingName
    ): RatingAccessTokenDomain {
        return new RatingAccessTokenDomain(
            $this->session,
            $this->ratingCache,
            $this->namespaceName,
            $this->accessToken,
            $ratingName
        );
    }

    public function gathering(
        string $gatheringName
    ): GatheringAccessTokenDomain {
        return new GatheringAccessTokenDomain(
            $this->session,
            $this->gatheringCache,
            $this->namespaceName,
            $this->accessToken,
            $gatheringName
        );
    }

    public function vote(
        string $ratingName,
        string $gatheringName
    ): VoteAccessTokenDomain {
        return new VoteAccessTokenDomain(
            $this->session,
            $this->namespaceName,
            $this->accessToken,
            $ratingName,
            $gatheringName
        );
    }

}
