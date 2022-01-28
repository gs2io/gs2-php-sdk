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

namespace Gs2\Exchange\Domain;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Exchange\Gs2ExchangeRestClient;

class Gs2Exchange {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ExchangeRestClient
     */
    private $client;

    /**
     * @var \Gs2\Exchange\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    public function __construct(
        Gs2RestSession $session
    ) {
        $this->session = $session;
        $this->client = new Gs2ExchangeRestClient (
            $session
        );
        $this->namespaceCache = new \Gs2\Exchange\Domain\Cache\NamespaceDomainCache();
    }

    public function createNamespace(
        \Gs2\Exchange\Request\CreateNamespaceRequest $request
    ): \Gs2\Exchange\Result\CreateNamespaceResult {
        /**
         * @var \Gs2\Exchange\Result\CreateNamespaceResult
         */
        $r = $this->client->createNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function exchangeByStampSheet(
        \Gs2\Exchange\Request\ExchangeByStampSheetRequest $request
    ): \Gs2\Exchange\Result\ExchangeByStampSheetResult {
        /**
         * @var \Gs2\Exchange\Result\ExchangeByStampSheetResult
         */
        $r = $this->client->exchangeByStampSheet(
            $request
        );
        return $r;
    }

    public function createAwaitByStampSheet(
        \Gs2\Exchange\Request\CreateAwaitByStampSheetRequest $request
    ): \Gs2\Exchange\Result\CreateAwaitByStampSheetResult {
        /**
         * @var \Gs2\Exchange\Result\CreateAwaitByStampSheetResult
         */
        $r = $this->client->createAwaitByStampSheet(
            $request
        );
        return $r;
    }

    public function deleteAwaitByStampTask(
        \Gs2\Exchange\Request\DeleteAwaitByStampTaskRequest $request
    ): \Gs2\Exchange\Result\DeleteAwaitByStampTaskResult {
        /**
         * @var \Gs2\Exchange\Result\DeleteAwaitByStampTaskResult
         */
        $r = $this->client->deleteAwaitByStampTask(
            $request
        );
        return $r;
    }

    public function namespaces(
    ): \Gs2\Exchange\Domain\Iterator\DescribeNamespacesIterator {
        return new \Gs2\Exchange\Domain\Iterator\DescribeNamespacesIterator(
            $this->namespaceCache,
            $this->client
        );
    }

    public function namespace(
        string $namespaceName
    ): \Gs2\Exchange\Domain\Model\NamespaceDomain {
        return new \Gs2\Exchange\Domain\Model\NamespaceDomain(
            $this->session,
            $this->namespaceCache,
            $namespaceName
        );
    }
}
