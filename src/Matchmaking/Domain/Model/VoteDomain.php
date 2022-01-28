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


class VoteDomain {

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
     * @var string
     */
    private $ratingName;

    /**
     * @var string
     */
    private $gatheringName;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        string $userId,
        string $ratingName,
        string $gatheringName
    ) {
        $this->session = $session;
        $this->client = new Gs2MatchmakingRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->ratingName = $ratingName;
        $this->gatheringName = $gatheringName;
    }

    public function getBallot(
        \Gs2\Matchmaking\Request\GetBallotByUserIdRequest $request
    ): \Gs2\Matchmaking\Result\GetBallotByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setRatingName($this->ratingName);
        $request->setGatheringName($this->gatheringName);
        /**
         * @var \Gs2\Matchmaking\Result\GetBallotByUserIdResult
         */
        $r = $this->client->getBallotByUserId(
            $request
        );
        return $r;
    }

}
