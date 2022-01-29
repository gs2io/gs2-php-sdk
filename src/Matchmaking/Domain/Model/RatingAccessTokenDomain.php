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


class RatingAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2MatchmakingRestClient
     */
    private $client;

    /**
     * @var \Gs2\Matchmaking\Domain\Cache\RatingDomainCache
     */
    private $ratingCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Auth\Model\AccessToken
     */
    private $accessToken;

    /**
     * @var string
     */
    private $ratingName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Matchmaking\Domain\Cache\RatingDomainCache $ratingCache,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken,
        string $ratingName
    ) {
        $this->session = $session;
        $this->client = new Gs2MatchmakingRestClient(
            $session
        );
        $this->ratingCache = $ratingCache;
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->ratingName = $ratingName;
    }

    public function load(
        \Gs2\Matchmaking\Request\GetRatingRequest $request
    ): \Gs2\Matchmaking\Result\GetRatingResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setRatingName($this->ratingName);
        /**
         * @var \Gs2\Matchmaking\Result\GetRatingResult
         */
        $r = $this->client->getRating(
            $request
        );
        $this->ratingCache->update($r->getItem());
        return $r;
    }

}