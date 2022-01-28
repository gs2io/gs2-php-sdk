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

namespace Gs2\Account\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Account\Gs2AccountRestClient;


class NamespaceDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2AccountRestClient
     */
    private $client;

    /**
     * @var \Gs2\Account\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Account\Domain\Cache\AccountDomainCache
     */
    private $accountCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Account\Domain\Cache\NamespaceDomainCache $namespaceCache,
        string $namespaceName
    ) {
        $this->session = $session;
        $this->client = new Gs2AccountRestClient(
            $session
        );
        $this->namespaceCache = $namespaceCache;
        $this->namespaceName = $namespaceName;
        $this->accountCache = new \Gs2\Account\Domain\Cache\AccountDomainCache();
    }

    public function getStatus(
        \Gs2\Account\Request\GetNamespaceStatusRequest $request
    ): \Gs2\Account\Result\GetNamespaceStatusResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Account\Result\GetNamespaceStatusResult
         */
        $r = $this->client->getNamespaceStatus(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Account\Request\GetNamespaceRequest $request
    ): \Gs2\Account\Result\GetNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Account\Result\GetNamespaceResult
         */
        $r = $this->client->getNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Account\Request\UpdateNamespaceRequest $request
    ): \Gs2\Account\Result\UpdateNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Account\Result\UpdateNamespaceResult
         */
        $r = $this->client->updateNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Account\Request\DeleteNamespaceRequest $request
    ): \Gs2\Account\Result\DeleteNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Account\Result\DeleteNamespaceResult
         */
        $r = $this->client->deleteNamespace(
            $request
        );
        $this->namespaceCache->delete($r->getItem());
        return $r;
    }

    public function createAccount(
        \Gs2\Account\Request\CreateAccountRequest $request
    ): \Gs2\Account\Result\CreateAccountResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Account\Result\CreateAccountResult
         */
        $r = $this->client->createAccount(
            $request
        );
        return $r;
    }

    public function accounts(
    ): \Gs2\Account\Domain\Iterator\DescribeAccountsIterator {
        return new \Gs2\Account\Domain\Iterator\DescribeAccountsIterator(
            $this->accountCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function account(
        string $userId
    ): AccountDomain {
        return new AccountDomain(
            $this->session,
            $this->accountCache,
            $this->namespaceName,
            $userId
        );
    }

    public function accessToken(
        \Gs2\Auth\Model\AccessToken $accessToken
    ): AccountAccessTokenDomain  {
        return new AccountAccessTokenDomain(
            $this->session,
            $this->accountCache,
            $this->namespaceName,
            $accessToken
        );
    }

}
