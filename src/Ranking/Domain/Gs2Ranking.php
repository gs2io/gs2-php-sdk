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

namespace Gs2\Ranking\Domain;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Ranking\Gs2RankingRestClient;

class Gs2Ranking {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2RankingRestClient
     */
    private $client;

    /**
     * @var \Gs2\Ranking\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    /**
     * @var \Gs2\Ranking\Domain\Cache\SubscribeUserDomainCache
     */
    private $subscribeUserCache;

    public function __construct(
        Gs2RestSession $session
    ) {
        $this->session = $session;
        $this->client = new Gs2RankingRestClient (
            $session
        );
        $this->namespaceCache = new \Gs2\Ranking\Domain\Cache\NamespaceDomainCache();
        $this->subscribeUserCache = new \Gs2\Ranking\Domain\Cache\SubscribeUserDomainCache();
    }

    public function createNamespace(
        \Gs2\Ranking\Request\CreateNamespaceRequest $request
    ): \Gs2\Ranking\Result\CreateNamespaceResult {
        /**
         * @var \Gs2\Ranking\Result\CreateNamespaceResult
         */
        $r = $this->client->createNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function calcRanking(
        \Gs2\Ranking\Request\CalcRankingRequest $request
    ): \Gs2\Ranking\Result\CalcRankingResult {
        /**
         * @var \Gs2\Ranking\Result\CalcRankingResult
         */
        $r = $this->client->calcRanking(
            $request
        );
        return $r;
    }

    public function namespaces(
    ): \Gs2\Ranking\Domain\Iterator\DescribeNamespacesIterator {
        return new \Gs2\Ranking\Domain\Iterator\DescribeNamespacesIterator(
            $this->namespaceCache,
            $this->client
        );
    }

    public function namespace(
        string $namespaceName
    ): \Gs2\Ranking\Domain\Model\NamespaceDomain {
        return new \Gs2\Ranking\Domain\Model\NamespaceDomain(
            $this->session,
            $this->namespaceCache,
            $namespaceName
        );
    }
}
