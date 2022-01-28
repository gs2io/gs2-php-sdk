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


class UserDomain {

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
     * @var string
     */
    private $userId;

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
        string $userId
    ) {
        $this->session = $session;
        $this->client = new Gs2LotteryRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->boxCache = new \Gs2\Lottery\Domain\Cache\BoxDomainCache();
        $this->probabilityCache = new \Gs2\Lottery\Domain\Cache\ProbabilityDomainCache();
    }

    public function draw(
        \Gs2\Lottery\Request\DrawByUserIdRequest $request
    ): \Gs2\Lottery\Result\DrawByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Lottery\Result\DrawByUserIdResult
         */
        $r = $this->client->drawByUserId(
            $request
        );
        return $r;
    }

    public function boxes(
    ): \Gs2\Lottery\Domain\Iterator\DescribeBoxesByUserIdIterator {
        return new \Gs2\Lottery\Domain\Iterator\DescribeBoxesByUserIdIterator(
            $this->boxCache,
            $this->client,
            $this->namespaceName,
            $this->userId
        );
    }

    public function probabilities(
        string $lotteryName
    ): \Gs2\Lottery\Domain\Iterator\DescribeProbabilitiesByUserIdIterator {
        return new \Gs2\Lottery\Domain\Iterator\DescribeProbabilitiesByUserIdIterator(
            $this->probabilityCache,
            $this->client,
            $this->namespaceName,
            $lotteryName,
            $this->userId
        );
    }

    public function box(
        string $prizeTableName
    ): BoxDomain {
        return new BoxDomain(
            $this->session,
            $this->boxCache,
            $this->namespaceName,
            $this->userId,
            $prizeTableName
        );
    }

}
