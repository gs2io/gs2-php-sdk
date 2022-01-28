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

namespace Gs2\Enhance\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Enhance\Gs2EnhanceRestClient;


class UserAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2EnhanceRestClient
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
     * @var \Gs2\Enhance\Domain\Cache\ProgressDomainCache
     */
    private $progressCache;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken
    ) {
        $this->session = $session;
        $this->client = new Gs2EnhanceRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->progressCache = new \Gs2\Enhance\Domain\Cache\ProgressDomainCache();
    }

    public function directEnhance(
        \Gs2\Enhance\Request\DirectEnhanceRequest $request
    ): \Gs2\Enhance\Result\DirectEnhanceResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Enhance\Result\DirectEnhanceResult
         */
        $r = $this->client->directEnhance(
            $request
        );
        return $r;
    }

    public function start(
        \Gs2\Enhance\Request\StartRequest $request
    ): \Gs2\Enhance\Result\StartResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Enhance\Result\StartResult
         */
        $r = $this->client->start(
            $request
        );
        return $r;
    }

    public function end(
        \Gs2\Enhance\Request\EndRequest $request
    ): \Gs2\Enhance\Result\EndResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Enhance\Result\EndResult
         */
        $r = $this->client->end(
            $request
        );
        return $r;
    }

    public function deleteProgress(
        \Gs2\Enhance\Request\DeleteProgressRequest $request
    ): \Gs2\Enhance\Result\DeleteProgressResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Enhance\Result\DeleteProgressResult
         */
        $r = $this->client->deleteProgress(
            $request
        );
        return $r;
    }

    public function progress(
    ): ProgressAccessTokenDomain {
        return new ProgressAccessTokenDomain(
            $this->session,
            $this->progressCache,
            $this->namespaceName,
            $this->accessToken
        );
    }

}
