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


class ProgressAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2EnhanceRestClient
     */
    private $client;

    /**
     * @var \Gs2\Enhance\Domain\Cache\ProgressDomainCache
     */
    private $progressCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Auth\Model\AccessToken
     */
    private $accessToken;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Enhance\Domain\Cache\ProgressDomainCache $progressCache,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken
    ) {
        $this->session = $session;
        $this->client = new Gs2EnhanceRestClient(
            $session
        );
        $this->progressCache = $progressCache;
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
    }

    public function load(
        \Gs2\Enhance\Request\GetProgressRequest $request
    ): \Gs2\Enhance\Result\GetProgressResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Enhance\Result\GetProgressResult
         */
        $r = $this->client->getProgress(
            $request
        );
        $this->progressCache->update($r->getItem());
        return $r;
    }

}
