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

namespace Gs2\Friend\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Friend\Gs2FriendRestClient;


class NamespaceDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2FriendRestClient
     */
    private $client;

    /**
     * @var \Gs2\Friend\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    /**
     * @var string
     */
    private $namespaceName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Friend\Domain\Cache\NamespaceDomainCache $namespaceCache,
        string $namespaceName
    ) {
        $this->session = $session;
        $this->client = new Gs2FriendRestClient(
            $session
        );
        $this->namespaceCache = $namespaceCache;
        $this->namespaceName = $namespaceName;
    }

    public function getStatus(
        \Gs2\Friend\Request\GetNamespaceStatusRequest $request
    ): \Gs2\Friend\Result\GetNamespaceStatusResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Friend\Result\GetNamespaceStatusResult
         */
        $r = $this->client->getNamespaceStatus(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Friend\Request\GetNamespaceRequest $request
    ): \Gs2\Friend\Result\GetNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Friend\Result\GetNamespaceResult
         */
        $r = $this->client->getNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Friend\Request\UpdateNamespaceRequest $request
    ): \Gs2\Friend\Result\UpdateNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Friend\Result\UpdateNamespaceResult
         */
        $r = $this->client->updateNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Friend\Request\DeleteNamespaceRequest $request
    ): \Gs2\Friend\Result\DeleteNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Friend\Result\DeleteNamespaceResult
         */
        $r = $this->client->deleteNamespace(
            $request
        );
        $this->namespaceCache->delete($r->getItem());
        return $r;
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

}
