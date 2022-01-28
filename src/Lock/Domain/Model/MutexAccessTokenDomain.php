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

namespace Gs2\Lock\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Lock\Gs2LockRestClient;


class MutexAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2LockRestClient
     */
    private $client;

    /**
     * @var \Gs2\Lock\Domain\Cache\MutexDomainCache
     */
    private $mutexCache;

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
    private $propertyId;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Lock\Domain\Cache\MutexDomainCache $mutexCache,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken,
        string $propertyId
    ) {
        $this->session = $session;
        $this->client = new Gs2LockRestClient(
            $session
        );
        $this->mutexCache = $mutexCache;
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->propertyId = $propertyId;
    }

    public function lock(
        \Gs2\Lock\Request\LockRequest $request
    ): \Gs2\Lock\Result\LockResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setPropertyId($this->propertyId);
        /**
         * @var \Gs2\Lock\Result\LockResult
         */
        $r = $this->client->lock(
            $request
        );
        $this->mutexCache->update($r->getItem());
        return $r;
    }

    public function unlock(
        \Gs2\Lock\Request\UnlockRequest $request
    ): \Gs2\Lock\Result\UnlockResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setPropertyId($this->propertyId);
        /**
         * @var \Gs2\Lock\Result\UnlockResult
         */
        $r = $this->client->unlock(
            $request
        );
        $this->mutexCache->update($r->getItem());
        return $r;
    }

    public function load(
        \Gs2\Lock\Request\GetMutexRequest $request
    ): \Gs2\Lock\Result\GetMutexResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setPropertyId($this->propertyId);
        /**
         * @var \Gs2\Lock\Result\GetMutexResult
         */
        $r = $this->client->getMutex(
            $request
        );
        $this->mutexCache->update($r->getItem());
        return $r;
    }

}
