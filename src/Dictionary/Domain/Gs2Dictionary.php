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

namespace Gs2\Dictionary\Domain;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Dictionary\Gs2DictionaryRestClient;

class Gs2Dictionary {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2DictionaryRestClient
     */
    private $client;

    /**
     * @var \Gs2\Dictionary\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    public function __construct(
        Gs2RestSession $session
    ) {
        $this->session = $session;
        $this->client = new Gs2DictionaryRestClient (
            $session
        );
        $this->namespaceCache = new \Gs2\Dictionary\Domain\Cache\NamespaceDomainCache();
    }

    public function createNamespace(
        \Gs2\Dictionary\Request\CreateNamespaceRequest $request
    ): \Gs2\Dictionary\Result\CreateNamespaceResult {
        /**
         * @var \Gs2\Dictionary\Result\CreateNamespaceResult
         */
        $r = $this->client->createNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function addEntriesByStampSheet(
        \Gs2\Dictionary\Request\AddEntriesByStampSheetRequest $request
    ): \Gs2\Dictionary\Result\AddEntriesByStampSheetResult {
        /**
         * @var \Gs2\Dictionary\Result\AddEntriesByStampSheetResult
         */
        $r = $this->client->addEntriesByStampSheet(
            $request
        );
        return $r;
    }

    public function namespaces(
    ): \Gs2\Dictionary\Domain\Iterator\DescribeNamespacesIterator {
        return new \Gs2\Dictionary\Domain\Iterator\DescribeNamespacesIterator(
            $this->namespaceCache,
            $this->client
        );
    }

    public function namespace(
        string $namespaceName
    ): \Gs2\Dictionary\Domain\Model\NamespaceDomain {
        return new \Gs2\Dictionary\Domain\Model\NamespaceDomain(
            $this->session,
            $this->namespaceCache,
            $namespaceName
        );
    }
}
