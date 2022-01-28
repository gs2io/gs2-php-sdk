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


class CounterDomain {

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
     * @var string
     */
    private $userId;

    /**
     * @var string
     */
    private $counterName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Mission\Domain\Cache\CounterDomainCache $counterCache,
        string $namespaceName,
        string $userId,
        string $counterName
    ) {
        $this->session = $session;
        $this->client = new Gs2MissionRestClient(
            $session
        );
        $this->counterCache = $counterCache;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->counterName = $counterName;
    }

    public function increase(
        \Gs2\Mission\Request\IncreaseCounterByUserIdRequest $request
    ): \Gs2\Mission\Result\IncreaseCounterByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setCounterName($this->counterName);
        /**
         * @var \Gs2\Mission\Result\IncreaseCounterByUserIdResult
         */
        $r = $this->client->increaseCounterByUserId(
            $request
        );
        $this->counterCache->update($r->getItem());
        return $r;
    }

    public function load(
        \Gs2\Mission\Request\GetCounterByUserIdRequest $request
    ): \Gs2\Mission\Result\GetCounterByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setCounterName($this->counterName);
        /**
         * @var \Gs2\Mission\Result\GetCounterByUserIdResult
         */
        $r = $this->client->getCounterByUserId(
            $request
        );
        $this->counterCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Mission\Request\DeleteCounterByUserIdRequest $request
    ): \Gs2\Mission\Result\DeleteCounterByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setCounterName($this->counterName);
        /**
         * @var \Gs2\Mission\Result\DeleteCounterByUserIdResult
         */
        $r = $this->client->deleteCounterByUserId(
            $request
        );
        $this->counterCache->delete($r->getItem());
        return $r;
    }

}
