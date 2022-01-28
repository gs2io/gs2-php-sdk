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

namespace Gs2\Mission\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Mission\Gs2MissionRestClient;


class CounterAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2MissionRestClient
     */
    private $client;

    /**
     * @var \Gs2\Mission\Domain\Cache\CounterDomainCache
     */
    private $counterCache;

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
    private $counterName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Mission\Domain\Cache\CounterDomainCache $counterCache,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken,
        string $counterName
    ) {
        $this->session = $session;
        $this->client = new Gs2MissionRestClient(
            $session
        );
        $this->counterCache = $counterCache;
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->counterName = $counterName;
    }

    public function load(
        \Gs2\Mission\Request\GetCounterRequest $request
    ): \Gs2\Mission\Result\GetCounterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setCounterName($this->counterName);
        /**
         * @var \Gs2\Mission\Result\GetCounterResult
         */
        $r = $this->client->getCounter(
            $request
        );
        $this->counterCache->update($r->getItem());
        return $r;
    }

}
