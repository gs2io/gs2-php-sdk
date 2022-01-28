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

namespace Gs2\Account\Domain;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Account\Gs2AccountRestClient;

class Gs2Account {

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

    public function __construct(
        Gs2RestSession $session
    ) {
        $this->session = $session;
        $this->client = new Gs2AccountRestClient (
            $session
        );
        $this->namespaceCache = new \Gs2\Account\Domain\Cache\NamespaceDomainCache();
    }

    public function createNamespace(
        \Gs2\Account\Request\CreateNamespaceRequest $request
    ): \Gs2\Account\Result\CreateNamespaceResult {
        /**
         * @var \Gs2\Account\Result\CreateNamespaceResult
         */
        $r = $this->client->createNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function deleteTakeOverByUserIdentifier(
        \Gs2\Account\Request\DeleteTakeOverByUserIdentifierRequest $request
    ): \Gs2\Account\Result\DeleteTakeOverByUserIdentifierResult {
        /**
         * @var \Gs2\Account\Result\DeleteTakeOverByUserIdentifierResult
         */
        $r = $this->client->deleteTakeOverByUserIdentifier(
            $request
        );
        return $r;
    }

    public function doTakeOver(
        \Gs2\Account\Request\DoTakeOverRequest $request
    ): \Gs2\Account\Result\DoTakeOverResult {
        /**
         * @var \Gs2\Account\Result\DoTakeOverResult
         */
        $r = $this->client->doTakeOver(
            $request
        );
        return $r;
    }

    public function namespaces(
    ): \Gs2\Account\Domain\Iterator\DescribeNamespacesIterator {
        return new \Gs2\Account\Domain\Iterator\DescribeNamespacesIterator(
            $this->namespaceCache,
            $this->client
        );
    }

    public function namespace(
        string $namespaceName
    ): \Gs2\Account\Domain\Model\NamespaceDomain {
        return new \Gs2\Account\Domain\Model\NamespaceDomain(
            $this->session,
            $this->namespaceCache,
            $namespaceName
        );
    }
}
