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

namespace Gs2\Exchange\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Exchange\Gs2ExchangeRestClient;


class UserDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ExchangeRestClient
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
     * @var \Gs2\Exchange\Domain\Cache\AwaitDomainCache
     */
    private $awaitCache;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        string $userId
    ) {
        $this->session = $session;
        $this->client = new Gs2ExchangeRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->awaitCache = new \Gs2\Exchange\Domain\Cache\AwaitDomainCache();
    }

    public function exchange(
        \Gs2\Exchange\Request\ExchangeByUserIdRequest $request
    ): \Gs2\Exchange\Result\ExchangeByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Exchange\Result\ExchangeByUserIdResult
         */
        $r = $this->client->exchangeByUserId(
            $request
        );
        return $r;
    }

    public function createAwait(
        \Gs2\Exchange\Request\CreateAwaitByUserIdRequest $request
    ): \Gs2\Exchange\Result\CreateAwaitByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Exchange\Result\CreateAwaitByUserIdResult
         */
        $r = $this->client->createAwaitByUserId(
            $request
        );
        return $r;
    }

    public function awaits(
        ?string $rateName
    ): \Gs2\Exchange\Domain\Iterator\DescribeAwaitsByUserIdIterator {
        return new \Gs2\Exchange\Domain\Iterator\DescribeAwaitsByUserIdIterator(
            $this->awaitCache,
            $this->client,
            $this->namespaceName,
            $this->userId,
            $rateName
        );
    }

    public function await(
        string $awaitName
    ): AwaitDomain {
        return new AwaitDomain(
            $this->session,
            $this->awaitCache,
            $this->namespaceName,
            $this->userId,
            $awaitName
        );
    }

}
