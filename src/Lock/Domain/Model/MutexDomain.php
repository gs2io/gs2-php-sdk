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


class MutexDomain {

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
     * @var string
     */
    private $userId;

    /**
     * @var string
     */
    private $propertyId;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Lock\Domain\Cache\MutexDomainCache $mutexCache,
        string $namespaceName,
        string $userId,
        string $propertyId
    ) {
        $this->session = $session;
        $this->client = new Gs2LockRestClient(
            $session
        );
        $this->mutexCache = $mutexCache;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->propertyId = $propertyId;
    }

    public function lock(
        \Gs2\Lock\Request\LockByUserIdRequest $request
    ): \Gs2\Lock\Result\LockByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setPropertyId($this->propertyId);
        /**
         * @var \Gs2\Lock\Result\LockByUserIdResult
         */
        $r = $this->client->lockByUserId(
            $request
        );
        $this->mutexCache->update($r->getItem());
        return $r;
    }

    public function unlock(
        \Gs2\Lock\Request\UnlockByUserIdRequest $request
    ): \Gs2\Lock\Result\UnlockByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setPropertyId($this->propertyId);
        /**
         * @var \Gs2\Lock\Result\UnlockByUserIdResult
         */
        $r = $this->client->unlockByUserId(
            $request
        );
        $this->mutexCache->update($r->getItem());
        return $r;
    }

    public function load(
        \Gs2\Lock\Request\GetMutexByUserIdRequest $request
    ): \Gs2\Lock\Result\GetMutexByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setPropertyId($this->propertyId);
        /**
         * @var \Gs2\Lock\Result\GetMutexByUserIdResult
         */
        $r = $this->client->getMutexByUserId(
            $request
        );
        $this->mutexCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Lock\Request\DeleteMutexByUserIdRequest $request
    ): \Gs2\Lock\Result\DeleteMutexByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setPropertyId($this->propertyId);
        /**
         * @var \Gs2\Lock\Result\DeleteMutexByUserIdResult
         */
        $r = $this->client->deleteMutexByUserId(
            $request
        );
        $this->mutexCache->delete($r->getItem());
        return $r;
    }

}
