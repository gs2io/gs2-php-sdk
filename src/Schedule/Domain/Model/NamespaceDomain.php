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


class NamespaceDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ScheduleRestClient
     */
    private $client;

    /**
     * @var \Gs2\Schedule\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Schedule\Domain\Cache\EventMasterDomainCache
     */
    private $eventMasterCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Schedule\Domain\Cache\NamespaceDomainCache $namespaceCache,
        string $namespaceName
    ) {
        $this->session = $session;
        $this->client = new Gs2ScheduleRestClient(
            $session
        );
        $this->namespaceCache = $namespaceCache;
        $this->namespaceName = $namespaceName;
        $this->eventMasterCache = new \Gs2\Schedule\Domain\Cache\EventMasterDomainCache();
    }

    public function getStatus(
        \Gs2\Schedule\Request\GetNamespaceStatusRequest $request
    ): \Gs2\Schedule\Result\GetNamespaceStatusResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Schedule\Result\GetNamespaceStatusResult
         */
        $r = $this->client->getNamespaceStatus(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Schedule\Request\GetNamespaceRequest $request
    ): \Gs2\Schedule\Result\GetNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Schedule\Result\GetNamespaceResult
         */
        $r = $this->client->getNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Schedule\Request\UpdateNamespaceRequest $request
    ): \Gs2\Schedule\Result\UpdateNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Schedule\Result\UpdateNamespaceResult
         */
        $r = $this->client->updateNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Schedule\Request\DeleteNamespaceRequest $request
    ): \Gs2\Schedule\Result\DeleteNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Schedule\Result\DeleteNamespaceResult
         */
        $r = $this->client->deleteNamespace(
            $request
        );
        $this->namespaceCache->delete($r->getItem());
        return $r;
    }

    public function createEventMaster(
        \Gs2\Schedule\Request\CreateEventMasterRequest $request
    ): \Gs2\Schedule\Result\CreateEventMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Schedule\Result\CreateEventMasterResult
         */
        $r = $this->client->createEventMaster(
            $request
        );
        return $r;
    }

    public function eventMasters(
    ): \Gs2\Schedule\Domain\Iterator\DescribeEventMastersIterator {
        return new \Gs2\Schedule\Domain\Iterator\DescribeEventMastersIterator(
            $this->eventMasterCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function user(
        string $userId
    ): UserDomain {
        return new UserDomain(
            $this->session,
            $this->namespaceName,
            $userId
        );
    }

    public function accessToken(
        \Gs2\Auth\Model\AccessToken $accessToken
    ): UserAccessTokenDomain  {
        return new UserAccessTokenDomain(
            $this->session,
            $this->namespaceName,
            $accessToken
        );
    }

    public function currentEventMaster(
    ): CurrentEventMasterDomain {
        return new CurrentEventMasterDomain(
            $this->session,
            $this->namespaceName
        );
    }

    public function eventMaster(
        string $eventName
    ): EventMasterDomain {
        return new EventMasterDomain(
            $this->session,
            $this->eventMasterCache,
            $this->namespaceName,
            $eventName
        );
    }

}
