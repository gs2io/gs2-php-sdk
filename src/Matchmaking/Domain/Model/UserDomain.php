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


class UserDomain {

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
     * @var string
     */
    private $userId;

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
        string $userId
    ) {
        $this->session = $session;
        $this->client = new Gs2MatchmakingRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->gatheringCache = new \Gs2\Matchmaking\Domain\Cache\GatheringDomainCache();
        $this->ratingCache = new \Gs2\Matchmaking\Domain\Cache\RatingDomainCache();
    }

    public function createGathering(
        \Gs2\Matchmaking\Request\CreateGatheringByUserIdRequest $request
    ): \Gs2\Matchmaking\Result\CreateGatheringByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Matchmaking\Result\CreateGatheringByUserIdResult
         */
        $r = $this->client->createGatheringByUserId(
            $request
        );
        return $r;
    }

    public function doMatchmaking(
        \Gs2\Matchmaking\Request\DoMatchmakingByUserIdRequest $request
    ): \Gs2\Matchmaking\Result\DoMatchmakingByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Matchmaking\Result\DoMatchmakingByUserIdResult
         */
        $r = $this->client->doMatchmakingByUserId(
            $request
        );
        return $r;
    }

    public function gatherings(
    ): \Gs2\Matchmaking\Domain\Iterator\DescribeGatheringsIterator {
        return new \Gs2\Matchmaking\Domain\Iterator\DescribeGatheringsIterator(
            $this->gatheringCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function ratings(
    ): \Gs2\Matchmaking\Domain\Iterator\DescribeRatingsByUserIdIterator {
        return new \Gs2\Matchmaking\Domain\Iterator\DescribeRatingsByUserIdIterator(
            $this->ratingCache,
            $this->client,
            $this->namespaceName,
            $this->userId
        );
    }

    public function rating(
        string $ratingName
    ): RatingDomain {
        return new RatingDomain(
            $this->session,
            $this->ratingCache,
            $this->namespaceName,
            $this->userId,
            $ratingName
        );
    }

    public function gathering(
        string $gatheringName
    ): GatheringDomain {
        return new GatheringDomain(
            $this->session,
            $this->gatheringCache,
            $this->namespaceName,
            $this->userId,
            $gatheringName
        );
    }

    public function vote(
        string $ratingName,
        string $gatheringName
    ): VoteDomain {
        return new VoteDomain(
            $this->session,
            $this->namespaceName,
            $this->userId,
            $ratingName,
            $gatheringName
        );
    }

}
