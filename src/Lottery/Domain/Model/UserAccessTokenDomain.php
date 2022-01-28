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

namespace Gs2\Lottery\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Lottery\Gs2LotteryRestClient;


class UserAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2LotteryRestClient
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
     * @var \Gs2\Lottery\Domain\Cache\BoxDomainCache
     */
    private $boxCache;

    /**
     * @var \Gs2\Lottery\Domain\Cache\ProbabilityDomainCache
     */
    private $probabilityCache;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken
    ) {
        $this->session = $session;
        $this->client = new Gs2LotteryRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->boxCache = new \Gs2\Lottery\Domain\Cache\BoxDomainCache();
        $this->probabilityCache = new \Gs2\Lottery\Domain\Cache\ProbabilityDomainCache();
    }

    public function boxes(
    ): \Gs2\Lottery\Domain\Iterator\DescribeBoxesIterator {
        return new \Gs2\Lottery\Domain\Iterator\DescribeBoxesIterator(
            $this->boxCache,
            $this->client,
            $this->namespaceName,
            $this->accessToken
        );
    }

    public function probabilities(
        string $lotteryName
    ): \Gs2\Lottery\Domain\Iterator\DescribeProbabilitiesIterator {
        return new \Gs2\Lottery\Domain\Iterator\DescribeProbabilitiesIterator(
            $this->probabilityCache,
            $this->client,
            $this->namespaceName,
            $lotteryName,
            $this->accessToken
        );
    }

    public function box(
        string $prizeTableName
    ): BoxAccessTokenDomain {
        return new BoxAccessTokenDomain(
            $this->session,
            $this->boxCache,
            $this->namespaceName,
            $this->accessToken,
            $prizeTableName
        );
    }

}
