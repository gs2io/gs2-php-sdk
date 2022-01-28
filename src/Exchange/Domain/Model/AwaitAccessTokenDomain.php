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


class AwaitAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ExchangeRestClient
     */
    private $client;

    /**
     * @var \Gs2\Exchange\Domain\Cache\AwaitDomainCache
     */
    private $awaitCache;

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
    private $awaitName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Exchange\Domain\Cache\AwaitDomainCache $awaitCache,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken,
        string $awaitName
    ) {
        $this->session = $session;
        $this->client = new Gs2ExchangeRestClient(
            $session
        );
        $this->awaitCache = $awaitCache;
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->awaitName = $awaitName;
    }

    public function load(
        \Gs2\Exchange\Request\GetAwaitRequest $request
    ): \Gs2\Exchange\Result\GetAwaitResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setAwaitName($this->awaitName);
        /**
         * @var \Gs2\Exchange\Result\GetAwaitResult
         */
        $r = $this->client->getAwait(
            $request
        );
        $this->awaitCache->update($r->getItem());
        return $r;
    }

    public function acquire(
        \Gs2\Exchange\Request\AcquireRequest $request
    ): \Gs2\Exchange\Result\AcquireResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setAwaitName($this->awaitName);
        /**
         * @var \Gs2\Exchange\Result\AcquireResult
         */
        $r = $this->client->acquire(
            $request
        );
        $this->awaitCache->update($r->getItem());
        return $r;
    }

    public function skip(
        \Gs2\Exchange\Request\SkipRequest $request
    ): \Gs2\Exchange\Result\SkipResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setAwaitName($this->awaitName);
        /**
         * @var \Gs2\Exchange\Result\SkipResult
         */
        $r = $this->client->skip(
            $request
        );
        $this->awaitCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Exchange\Request\DeleteAwaitRequest $request
    ): \Gs2\Exchange\Result\DeleteAwaitResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setAwaitName($this->awaitName);
        /**
         * @var \Gs2\Exchange\Result\DeleteAwaitResult
         */
        $r = $this->client->deleteAwait(
            $request
        );
        $this->awaitCache->delete($r->getItem());
        return $r;
    }

}
