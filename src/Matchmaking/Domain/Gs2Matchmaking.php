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

namespace Gs2\Matchmaking\Domain;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Matchmaking\Gs2MatchmakingRestClient;

class Gs2Matchmaking {

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

    public function __construct(
        Gs2RestSession $session
    ) {
        $this->session = $session;
        $this->client = new Gs2MatchmakingRestClient (
            $session
        );
        $this->namespaceCache = new \Gs2\Matchmaking\Domain\Cache\NamespaceDomainCache();
    }

    public function createNamespace(
        \Gs2\Matchmaking\Request\CreateNamespaceRequest $request
    ): \Gs2\Matchmaking\Result\CreateNamespaceResult {
        /**
         * @var \Gs2\Matchmaking\Result\CreateNamespaceResult
         */
        $r = $this->client->createNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function doMatchmakingByPlayer(
        \Gs2\Matchmaking\Request\DoMatchmakingByPlayerRequest $request
    ): \Gs2\Matchmaking\Result\DoMatchmakingByPlayerResult {
        /**
         * @var \Gs2\Matchmaking\Result\DoMatchmakingByPlayerResult
         */
        $r = $this->client->doMatchmakingByPlayer(
            $request
        );
        return $r;
    }

    public function deleteGathering(
        \Gs2\Matchmaking\Request\DeleteGatheringRequest $request
    ): \Gs2\Matchmaking\Result\DeleteGatheringResult {
        /**
         * @var \Gs2\Matchmaking\Result\DeleteGatheringResult
         */
        $r = $this->client->deleteGathering(
            $request
        );
        return $r;
    }

    public function putResult(
        \Gs2\Matchmaking\Request\PutResultRequest $request
    ): \Gs2\Matchmaking\Result\PutResultResult {
        /**
         * @var \Gs2\Matchmaking\Result\PutResultResult
         */
        $r = $this->client->putResult(
            $request
        );
        return $r;
    }

    public function vote(
        \Gs2\Matchmaking\Request\VoteRequest $request
    ): \Gs2\Matchmaking\Result\VoteResult {
        /**
         * @var \Gs2\Matchmaking\Result\VoteResult
         */
        $r = $this->client->vote(
            $request
        );
        return $r;
    }

    public function voteMultiple(
        \Gs2\Matchmaking\Request\VoteMultipleRequest $request
    ): \Gs2\Matchmaking\Result\VoteMultipleResult {
        /**
         * @var \Gs2\Matchmaking\Result\VoteMultipleResult
         */
        $r = $this->client->voteMultiple(
            $request
        );
        return $r;
    }

    public function commitVote(
        \Gs2\Matchmaking\Request\CommitVoteRequest $request
    ): \Gs2\Matchmaking\Result\CommitVoteResult {
        /**
         * @var \Gs2\Matchmaking\Result\CommitVoteResult
         */
        $r = $this->client->commitVote(
            $request
        );
        return $r;
    }

    public function namespaces(
    ): \Gs2\Matchmaking\Domain\Iterator\DescribeNamespacesIterator {
        return new \Gs2\Matchmaking\Domain\Iterator\DescribeNamespacesIterator(
            $this->namespaceCache,
            $this->client
        );
    }

    public function namespace(
        string $namespaceName
    ): \Gs2\Matchmaking\Domain\Model\NamespaceDomain {
        return new \Gs2\Matchmaking\Domain\Model\NamespaceDomain(
            $this->session,
            $this->namespaceCache,
            $namespaceName
        );
    }
}
