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


class RatingModelMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2MatchmakingRestClient
     */
    private $client;

    /**
     * @var \Gs2\Matchmaking\Domain\Cache\RatingModelMasterDomainCache
     */
    private $ratingModelMasterCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $ratingName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Matchmaking\Domain\Cache\RatingModelMasterDomainCache $ratingModelMasterCache,
        string $namespaceName,
        string $ratingName
    ) {
        $this->session = $session;
        $this->client = new Gs2MatchmakingRestClient(
            $session
        );
        $this->ratingModelMasterCache = $ratingModelMasterCache;
        $this->namespaceName = $namespaceName;
        $this->ratingName = $ratingName;
    }

    public function load(
        \Gs2\Matchmaking\Request\GetRatingModelMasterRequest $request
    ): \Gs2\Matchmaking\Result\GetRatingModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setRatingName($this->ratingName);
        /**
         * @var \Gs2\Matchmaking\Result\GetRatingModelMasterResult
         */
        $r = $this->client->getRatingModelMaster(
            $request
        );
        $this->ratingModelMasterCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Matchmaking\Request\UpdateRatingModelMasterRequest $request
    ): \Gs2\Matchmaking\Result\UpdateRatingModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setRatingName($this->ratingName);
        /**
         * @var \Gs2\Matchmaking\Result\UpdateRatingModelMasterResult
         */
        $r = $this->client->updateRatingModelMaster(
            $request
        );
        $this->ratingModelMasterCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Matchmaking\Request\DeleteRatingModelMasterRequest $request
    ): \Gs2\Matchmaking\Result\DeleteRatingModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setRatingName($this->ratingName);
        /**
         * @var \Gs2\Matchmaking\Result\DeleteRatingModelMasterResult
         */
        $r = $this->client->deleteRatingModelMaster(
            $request
        );
        $this->ratingModelMasterCache->delete($r->getItem());
        return $r;
    }

}
