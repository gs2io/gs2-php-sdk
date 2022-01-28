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

namespace Gs2\Realtime\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Realtime\Gs2RealtimeRestClient;


class NamespaceDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2RealtimeRestClient
     */
    private $client;

    /**
     * @var \Gs2\Realtime\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Realtime\Domain\Cache\RoomDomainCache
     */
    private $roomCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Realtime\Domain\Cache\NamespaceDomainCache $namespaceCache,
        string $namespaceName
    ) {
        $this->session = $session;
        $this->client = new Gs2RealtimeRestClient(
            $session
        );
        $this->namespaceCache = $namespaceCache;
        $this->namespaceName = $namespaceName;
        $this->roomCache = new \Gs2\Realtime\Domain\Cache\RoomDomainCache();
    }

    public function getStatus(
        \Gs2\Realtime\Request\GetNamespaceStatusRequest $request
    ): \Gs2\Realtime\Result\GetNamespaceStatusResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Realtime\Result\GetNamespaceStatusResult
         */
        $r = $this->client->getNamespaceStatus(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Realtime\Request\GetNamespaceRequest $request
    ): \Gs2\Realtime\Result\GetNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Realtime\Result\GetNamespaceResult
         */
        $r = $this->client->getNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Realtime\Request\UpdateNamespaceRequest $request
    ): \Gs2\Realtime\Result\UpdateNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Realtime\Result\UpdateNamespaceResult
         */
        $r = $this->client->updateNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Realtime\Request\DeleteNamespaceRequest $request
    ): \Gs2\Realtime\Result\DeleteNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Realtime\Result\DeleteNamespaceResult
         */
        $r = $this->client->deleteNamespace(
            $request
        );
        $this->namespaceCache->delete($r->getItem());
        return $r;
    }

    public function rooms(
    ): \Gs2\Realtime\Domain\Iterator\DescribeRoomsIterator {
        return new \Gs2\Realtime\Domain\Iterator\DescribeRoomsIterator(
            $this->roomCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function room(
        string $roomName
    ): RoomDomain {
        return new RoomDomain(
            $this->session,
            $this->roomCache,
            $this->namespaceName,
            $roomName
        );
    }

}
