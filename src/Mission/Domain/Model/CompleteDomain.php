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


class CompleteDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2MissionRestClient
     */
    private $client;

    /**
     * @var \Gs2\Mission\Domain\Cache\CompleteDomainCache
     */
    private $completeCache;

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
    private $missionGroupName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Mission\Domain\Cache\CompleteDomainCache $completeCache,
        string $namespaceName,
        string $userId,
        string $missionGroupName
    ) {
        $this->session = $session;
        $this->client = new Gs2MissionRestClient(
            $session
        );
        $this->completeCache = $completeCache;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->missionGroupName = $missionGroupName;
    }

    public function complete(
        \Gs2\Mission\Request\CompleteByUserIdRequest $request
    ): \Gs2\Mission\Result\CompleteByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setMissionGroupName($this->missionGroupName);
        /**
         * @var \Gs2\Mission\Result\CompleteByUserIdResult
         */
        $r = $this->client->completeByUserId(
            $request
        );
        return $r;
    }

    public function receive(
        \Gs2\Mission\Request\ReceiveByUserIdRequest $request
    ): \Gs2\Mission\Result\ReceiveByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setMissionGroupName($this->missionGroupName);
        /**
         * @var \Gs2\Mission\Result\ReceiveByUserIdResult
         */
        $r = $this->client->receiveByUserId(
            $request
        );
        $this->completeCache->update($r->getItem());
        return $r;
    }

    public function load(
        \Gs2\Mission\Request\GetCompleteByUserIdRequest $request
    ): \Gs2\Mission\Result\GetCompleteByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setMissionGroupName($this->missionGroupName);
        /**
         * @var \Gs2\Mission\Result\GetCompleteByUserIdResult
         */
        $r = $this->client->getCompleteByUserId(
            $request
        );
        $this->completeCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Mission\Request\DeleteCompleteByUserIdRequest $request
    ): \Gs2\Mission\Result\DeleteCompleteByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setMissionGroupName($this->missionGroupName);
        /**
         * @var \Gs2\Mission\Result\DeleteCompleteByUserIdResult
         */
        $r = $this->client->deleteCompleteByUserId(
            $request
        );
        $this->completeCache->delete($r->getItem());
        return $r;
    }

}
