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

namespace Gs2\Limit\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Limit\Gs2LimitRestClient;


class CounterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2LimitRestClient
     */
    private $client;

    /**
     * @var \Gs2\Limit\Domain\Cache\CounterDomainCache
     */
    private $counterCache;

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
    private $limitName;

    /**
     * @var string
     */
    private $counterName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Limit\Domain\Cache\CounterDomainCache $counterCache,
        string $namespaceName,
        string $userId,
        string $limitName,
        string $counterName
    ) {
        $this->session = $session;
        $this->client = new Gs2LimitRestClient(
            $session
        );
        $this->counterCache = $counterCache;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->limitName = $limitName;
        $this->counterName = $counterName;
    }

    public function load(
        \Gs2\Limit\Request\GetCounterByUserIdRequest $request
    ): \Gs2\Limit\Result\GetCounterByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setLimitName($this->limitName);
        $request->setCounterName($this->counterName);
        /**
         * @var \Gs2\Limit\Result\GetCounterByUserIdResult
         */
        $r = $this->client->getCounterByUserId(
            $request
        );
        $this->counterCache->update($r->getItem());
        return $r;
    }

    public function countUp(
        \Gs2\Limit\Request\CountUpByUserIdRequest $request
    ): \Gs2\Limit\Result\CountUpByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setLimitName($this->limitName);
        $request->setCounterName($this->counterName);
        /**
         * @var \Gs2\Limit\Result\CountUpByUserIdResult
         */
        $r = $this->client->countUpByUserId(
            $request
        );
        $this->counterCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Limit\Request\DeleteCounterByUserIdRequest $request
    ): \Gs2\Limit\Result\DeleteCounterByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setLimitName($this->limitName);
        $request->setCounterName($this->counterName);
        /**
         * @var \Gs2\Limit\Result\DeleteCounterByUserIdResult
         */
        $r = $this->client->deleteCounterByUserId(
            $request
        );
        $this->counterCache->delete($r->getItem());
        return $r;
    }

}
