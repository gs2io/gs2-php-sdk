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

namespace Gs2\Money\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Money\Gs2MoneyRestClient;


class NamespaceDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2MoneyRestClient
     */
    private $client;

    /**
     * @var \Gs2\Money\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    /**
     * @var string
     */
    private $namespaceName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Money\Domain\Cache\NamespaceDomainCache $namespaceCache,
        string $namespaceName
    ) {
        $this->session = $session;
        $this->client = new Gs2MoneyRestClient(
            $session
        );
        $this->namespaceCache = $namespaceCache;
        $this->namespaceName = $namespaceName;
    }

    public function getStatus(
        \Gs2\Money\Request\GetNamespaceStatusRequest $request
    ): \Gs2\Money\Result\GetNamespaceStatusResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Money\Result\GetNamespaceStatusResult
         */
        $r = $this->client->getNamespaceStatus(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Money\Request\GetNamespaceRequest $request
    ): \Gs2\Money\Result\GetNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Money\Result\GetNamespaceResult
         */
        $r = $this->client->getNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Money\Request\UpdateNamespaceRequest $request
    ): \Gs2\Money\Result\UpdateNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Money\Result\UpdateNamespaceResult
         */
        $r = $this->client->updateNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Money\Request\DeleteNamespaceRequest $request
    ): \Gs2\Money\Result\DeleteNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Money\Result\DeleteNamespaceResult
         */
        $r = $this->client->deleteNamespace(
            $request
        );
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
