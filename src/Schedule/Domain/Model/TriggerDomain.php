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

namespace Gs2\Schedule\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Schedule\Gs2ScheduleRestClient;


class TriggerDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ScheduleRestClient
     */
    private $client;

    /**
     * @var \Gs2\Schedule\Domain\Cache\TriggerDomainCache
     */
    private $triggerCache;

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
    private $triggerName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Schedule\Domain\Cache\TriggerDomainCache $triggerCache,
        string $namespaceName,
        string $userId,
        string $triggerName
    ) {
        $this->session = $session;
        $this->client = new Gs2ScheduleRestClient(
            $session
        );
        $this->triggerCache = $triggerCache;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->triggerName = $triggerName;
    }

    public function load(
        \Gs2\Schedule\Request\GetTriggerByUserIdRequest $request
    ): \Gs2\Schedule\Result\GetTriggerByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setTriggerName($this->triggerName);
        /**
         * @var \Gs2\Schedule\Result\GetTriggerByUserIdResult
         */
        $r = $this->client->getTriggerByUserId(
            $request
        );
        $this->triggerCache->update($r->getItem());
        return $r;
    }

    public function trigger(
        \Gs2\Schedule\Request\TriggerByUserIdRequest $request
    ): \Gs2\Schedule\Result\TriggerByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setTriggerName($this->triggerName);
        /**
         * @var \Gs2\Schedule\Result\TriggerByUserIdResult
         */
        $r = $this->client->triggerByUserId(
            $request
        );
        $this->triggerCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Schedule\Request\DeleteTriggerByUserIdRequest $request
    ): \Gs2\Schedule\Result\DeleteTriggerByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setTriggerName($this->triggerName);
        /**
         * @var \Gs2\Schedule\Result\DeleteTriggerByUserIdResult
         */
        $r = $this->client->deleteTriggerByUserId(
            $request
        );
        $this->triggerCache->delete($r->getItem());
        return $r;
    }

}
