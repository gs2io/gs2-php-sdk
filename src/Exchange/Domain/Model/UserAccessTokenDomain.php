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


class UserAccessTokenDomain {

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
     * @var \Gs2\Auth\Model\AccessToken
     */
    private $accessToken;

    /**
     * @var \Gs2\Exchange\Domain\Cache\AwaitDomainCache
     */
    private $awaitCache;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken
    ) {
        $this->session = $session;
        $this->client = new Gs2ExchangeRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->awaitCache = new \Gs2\Exchange\Domain\Cache\AwaitDomainCache();
    }

    public function exchange(
        \Gs2\Exchange\Request\ExchangeRequest $request
    ): \Gs2\Exchange\Result\ExchangeResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Exchange\Result\ExchangeResult
         */
        $r = $this->client->exchange(
            $request
        );
        return $r;
    }

    public function awaits(
        ?string $rateName
    ): \Gs2\Exchange\Domain\Iterator\DescribeAwaitsIterator {
        return new \Gs2\Exchange\Domain\Iterator\DescribeAwaitsIterator(
            $this->awaitCache,
            $this->client,
            $this->namespaceName,
            $this->accessToken,
            $rateName
        );
    }

    public function await(
        string $awaitName
    ): AwaitAccessTokenDomain {
        return new AwaitAccessTokenDomain(
            $this->session,
            $this->awaitCache,
            $this->namespaceName,
            $this->accessToken,
            $awaitName
        );
    }

}
