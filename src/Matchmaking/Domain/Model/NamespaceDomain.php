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


class NamespaceDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2MatchmakingRestClient
     */
    private $client;

    /**
     * @var \Gs2\Matchmaking\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Matchmaking\Domain\Cache\RatingModelMasterDomainCache
     */
    private $ratingModelMasterCache;

    /**
     * @var \Gs2\Matchmaking\Domain\Cache\RatingModelDomainCache
     */
    private $ratingModelCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Matchmaking\Domain\Cache\NamespaceDomainCache $namespaceCache,
        string $namespaceName
    ) {
        $this->session = $session;
        $this->client = new Gs2MatchmakingRestClient(
            $session
        );
        $this->namespaceCache = $namespaceCache;
        $this->namespaceName = $namespaceName;
        $this->ratingModelMasterCache = new \Gs2\Matchmaking\Domain\Cache\RatingModelMasterDomainCache();
        $this->ratingModelCache = new \Gs2\Matchmaking\Domain\Cache\RatingModelDomainCache();
    }

    public function getStatus(
        \Gs2\Matchmaking\Request\GetNamespaceStatusRequest $request
    ): \Gs2\Matchmaking\Result\GetNamespaceStatusResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Matchmaking\Result\GetNamespaceStatusResult
         */
        $r = $this->client->getNamespaceStatus(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Matchmaking\Request\GetNamespaceRequest $request
    ): \Gs2\Matchmaking\Result\GetNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Matchmaking\Result\GetNamespaceResult
         */
        $r = $this->client->getNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Matchmaking\Request\UpdateNamespaceRequest $request
    ): \Gs2\Matchmaking\Result\UpdateNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Matchmaking\Result\UpdateNamespaceResult
         */
        $r = $this->client->updateNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Matchmaking\Request\DeleteNamespaceRequest $request
    ): \Gs2\Matchmaking\Result\DeleteNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Matchmaking\Result\DeleteNamespaceResult
         */
        $r = $this->client->deleteNamespace(
            $request
        );
        $this->namespaceCache->delete($r->getItem());
        return $r;
    }

    public function createRatingModelMaster(
        \Gs2\Matchmaking\Request\CreateRatingModelMasterRequest $request
    ): \Gs2\Matchmaking\Result\CreateRatingModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Matchmaking\Result\CreateRatingModelMasterResult
         */
        $r = $this->client->createRatingModelMaster(
            $request
        );
        return $r;
    }

    public function ratingModelMasters(
    ): \Gs2\Matchmaking\Domain\Iterator\DescribeRatingModelMastersIterator {
        return new \Gs2\Matchmaking\Domain\Iterator\DescribeRatingModelMastersIterator(
            $this->ratingModelMasterCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function ratingModels(
    ): \Gs2\Matchmaking\Domain\Iterator\DescribeRatingModelsIterator {
        return new \Gs2\Matchmaking\Domain\Iterator\DescribeRatingModelsIterator(
            $this->ratingModelCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function user(
        string $userId
    ): UserDomain {
        return new UserDomain(
            $this->session,
            $this->namespaceName,
            $userId
        );
    }

    public function accessToken(
        \Gs2\Auth\Model\AccessToken $accessToken
    ): UserAccessTokenDomain  {
        return new UserAccessTokenDomain(
            $this->session,
            $this->namespaceName,
            $accessToken
        );
    }

    public function currentRatingModelMaster(
    ): CurrentRatingModelMasterDomain {
        return new CurrentRatingModelMasterDomain(
            $this->session,
            $this->namespaceName
        );
    }

    public function ratingModel(
        string $ratingName
    ): RatingModelDomain {
        return new RatingModelDomain(
            $this->session,
            $this->ratingModelCache,
            $this->namespaceName,
            $ratingName
        );
    }

    public function ratingModelMaster(
        string $ratingName
    ): RatingModelMasterDomain {
        return new RatingModelMasterDomain(
            $this->session,
            $this->ratingModelMasterCache,
            $this->namespaceName,
            $ratingName
        );
    }

}
