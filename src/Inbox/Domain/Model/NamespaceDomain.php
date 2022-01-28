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

namespace Gs2\Inbox\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Inbox\Gs2InboxRestClient;


class NamespaceDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2InboxRestClient
     */
    private $client;

    /**
     * @var \Gs2\Inbox\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Inbox\Domain\Cache\GlobalMessageMasterDomainCache
     */
    private $globalMessageMasterCache;

    /**
     * @var \Gs2\Inbox\Domain\Cache\GlobalMessageDomainCache
     */
    private $globalMessageCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Inbox\Domain\Cache\NamespaceDomainCache $namespaceCache,
        string $namespaceName
    ) {
        $this->session = $session;
        $this->client = new Gs2InboxRestClient(
            $session
        );
        $this->namespaceCache = $namespaceCache;
        $this->namespaceName = $namespaceName;
        $this->globalMessageMasterCache = new \Gs2\Inbox\Domain\Cache\GlobalMessageMasterDomainCache();
        $this->globalMessageCache = new \Gs2\Inbox\Domain\Cache\GlobalMessageDomainCache();
    }

    public function getStatus(
        \Gs2\Inbox\Request\GetNamespaceStatusRequest $request
    ): \Gs2\Inbox\Result\GetNamespaceStatusResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Inbox\Result\GetNamespaceStatusResult
         */
        $r = $this->client->getNamespaceStatus(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Inbox\Request\GetNamespaceRequest $request
    ): \Gs2\Inbox\Result\GetNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Inbox\Result\GetNamespaceResult
         */
        $r = $this->client->getNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Inbox\Request\UpdateNamespaceRequest $request
    ): \Gs2\Inbox\Result\UpdateNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Inbox\Result\UpdateNamespaceResult
         */
        $r = $this->client->updateNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Inbox\Request\DeleteNamespaceRequest $request
    ): \Gs2\Inbox\Result\DeleteNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Inbox\Result\DeleteNamespaceResult
         */
        $r = $this->client->deleteNamespace(
            $request
        );
        $this->namespaceCache->delete($r->getItem());
        return $r;
    }

    public function createGlobalMessageMaster(
        \Gs2\Inbox\Request\CreateGlobalMessageMasterRequest $request
    ): \Gs2\Inbox\Result\CreateGlobalMessageMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Inbox\Result\CreateGlobalMessageMasterResult
         */
        $r = $this->client->createGlobalMessageMaster(
            $request
        );
        return $r;
    }

    public function globalMessageMasters(
    ): \Gs2\Inbox\Domain\Iterator\DescribeGlobalMessageMastersIterator {
        return new \Gs2\Inbox\Domain\Iterator\DescribeGlobalMessageMastersIterator(
            $this->globalMessageMasterCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function globalMessages(
    ): \Gs2\Inbox\Domain\Iterator\DescribeGlobalMessagesIterator {
        return new \Gs2\Inbox\Domain\Iterator\DescribeGlobalMessagesIterator(
            $this->globalMessageCache,
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

    public function currentMessageMaster(
    ): CurrentMessageMasterDomain {
        return new CurrentMessageMasterDomain(
            $this->session,
            $this->namespaceName
        );
    }

    public function globalMessage(
        string $globalMessageName
    ): GlobalMessageDomain {
        return new GlobalMessageDomain(
            $this->session,
            $this->globalMessageCache,
            $this->namespaceName,
            $globalMessageName
        );
    }

    public function globalMessageMaster(
        string $globalMessageName
    ): GlobalMessageMasterDomain {
        return new GlobalMessageMasterDomain(
            $this->session,
            $this->globalMessageMasterCache,
            $this->namespaceName,
            $globalMessageName
        );
    }

}
