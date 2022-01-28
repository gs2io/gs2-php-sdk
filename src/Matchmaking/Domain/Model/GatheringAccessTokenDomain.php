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


class GatheringAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2MatchmakingRestClient
     */
    private $client;

    /**
     * @var \Gs2\Matchmaking\Domain\Cache\GatheringDomainCache
     */
    private $gatheringCache;

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
    private $gatheringName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Matchmaking\Domain\Cache\GatheringDomainCache $gatheringCache,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken,
        string $gatheringName
    ) {
        $this->session = $session;
        $this->client = new Gs2MatchmakingRestClient(
            $session
        );
        $this->gatheringCache = $gatheringCache;
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->gatheringName = $gatheringName;
    }

    public function update(
        \Gs2\Matchmaking\Request\UpdateGatheringRequest $request
    ): \Gs2\Matchmaking\Result\UpdateGatheringResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setGatheringName($this->gatheringName);
        /**
         * @var \Gs2\Matchmaking\Result\UpdateGatheringResult
         */
        $r = $this->client->updateGathering(
            $request
        );
        $this->gatheringCache->update($r->getItem());
        return $r;
    }

    public function cancelMatchmaking(
        \Gs2\Matchmaking\Request\CancelMatchmakingRequest $request
    ): \Gs2\Matchmaking\Result\CancelMatchmakingResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setGatheringName($this->gatheringName);
        /**
         * @var \Gs2\Matchmaking\Result\CancelMatchmakingResult
         */
        $r = $this->client->cancelMatchmaking(
            $request
        );
        $this->gatheringCache->update($r->getItem());
        return $r;
    }

}
