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


class AwaitDomain {

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
     * @var string
     */
    private $userId;

    /**
     * @var string
     */
    private $awaitName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Exchange\Domain\Cache\AwaitDomainCache $awaitCache,
        string $namespaceName,
        string $userId,
        string $awaitName
    ) {
        $this->session = $session;
        $this->client = new Gs2ExchangeRestClient(
            $session
        );
        $this->awaitCache = $awaitCache;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->awaitName = $awaitName;
    }

    public function load(
        \Gs2\Exchange\Request\GetAwaitByUserIdRequest $request
    ): \Gs2\Exchange\Result\GetAwaitByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setAwaitName($this->awaitName);
        /**
         * @var \Gs2\Exchange\Result\GetAwaitByUserIdResult
         */
        $r = $this->client->getAwaitByUserId(
            $request
        );
        $this->awaitCache->update($r->getItem());
        return $r;
    }

    public function acquire(
        \Gs2\Exchange\Request\AcquireByUserIdRequest $request
    ): \Gs2\Exchange\Result\AcquireByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setAwaitName($this->awaitName);
        /**
         * @var \Gs2\Exchange\Result\AcquireByUserIdResult
         */
        $r = $this->client->acquireByUserId(
            $request
        );
        $this->awaitCache->update($r->getItem());
        return $r;
    }

    public function acquireForce(
        \Gs2\Exchange\Request\AcquireForceByUserIdRequest $request
    ): \Gs2\Exchange\Result\AcquireForceByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setAwaitName($this->awaitName);
        /**
         * @var \Gs2\Exchange\Result\AcquireForceByUserIdResult
         */
        $r = $this->client->acquireForceByUserId(
            $request
        );
        $this->awaitCache->update($r->getItem());
        return $r;
    }

    public function skip(
        \Gs2\Exchange\Request\SkipByUserIdRequest $request
    ): \Gs2\Exchange\Result\SkipByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setAwaitName($this->awaitName);
        /**
         * @var \Gs2\Exchange\Result\SkipByUserIdResult
         */
        $r = $this->client->skipByUserId(
            $request
        );
        $this->awaitCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Exchange\Request\DeleteAwaitByUserIdRequest $request
    ): \Gs2\Exchange\Result\DeleteAwaitByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setAwaitName($this->awaitName);
        /**
         * @var \Gs2\Exchange\Result\DeleteAwaitByUserIdResult
         */
        $r = $this->client->deleteAwaitByUserId(
            $request
        );
        $this->awaitCache->delete($r->getItem());
        return $r;
    }

}
