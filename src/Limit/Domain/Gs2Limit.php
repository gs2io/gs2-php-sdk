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

namespace Gs2\Limit\Domain;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Limit\Gs2LimitRestClient;

class Gs2Limit {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2LimitRestClient
     */
    private $client;

    /**
     * @var \Gs2\Limit\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    public function __construct(
        Gs2RestSession $session
    ) {
        $this->session = $session;
        $this->client = new Gs2LimitRestClient (
            $session
        );
        $this->namespaceCache = new \Gs2\Limit\Domain\Cache\NamespaceDomainCache();
    }

    public function createNamespace(
        \Gs2\Limit\Request\CreateNamespaceRequest $request
    ): \Gs2\Limit\Result\CreateNamespaceResult {
        /**
         * @var \Gs2\Limit\Result\CreateNamespaceResult
         */
        $r = $this->client->createNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function countUpByStampTask(
        \Gs2\Limit\Request\CountUpByStampTaskRequest $request
    ): \Gs2\Limit\Result\CountUpByStampTaskResult {
        /**
         * @var \Gs2\Limit\Result\CountUpByStampTaskResult
         */
        $r = $this->client->countUpByStampTask(
            $request
        );
        return $r;
    }

    public function deleteByStampSheet(
        \Gs2\Limit\Request\DeleteByStampSheetRequest $request
    ): \Gs2\Limit\Result\DeleteByStampSheetResult {
        /**
         * @var \Gs2\Limit\Result\DeleteByStampSheetResult
         */
        $r = $this->client->deleteByStampSheet(
            $request
        );
        return $r;
    }

    public function namespaces(
    ): \Gs2\Limit\Domain\Iterator\DescribeNamespacesIterator {
        return new \Gs2\Limit\Domain\Iterator\DescribeNamespacesIterator(
            $this->namespaceCache,
            $this->client
        );
    }

    public function namespace(
        string $namespaceName
    ): \Gs2\Limit\Domain\Model\NamespaceDomain {
        return new \Gs2\Limit\Domain\Model\NamespaceDomain(
            $this->session,
            $this->namespaceCache,
            $namespaceName
        );
    }
}
