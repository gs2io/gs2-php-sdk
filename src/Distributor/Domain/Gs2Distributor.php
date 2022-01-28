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

namespace Gs2\Distributor\Domain;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Distributor\Gs2DistributorRestClient;

class Gs2Distributor {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2DistributorRestClient
     */
    private $client;

    /**
     * @var \Gs2\Distributor\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    public function __construct(
        Gs2RestSession $session
    ) {
        $this->session = $session;
        $this->client = new Gs2DistributorRestClient (
            $session
        );
        $this->namespaceCache = new \Gs2\Distributor\Domain\Cache\NamespaceDomainCache();
    }

    public function createNamespace(
        \Gs2\Distributor\Request\CreateNamespaceRequest $request
    ): \Gs2\Distributor\Result\CreateNamespaceResult {
        /**
         * @var \Gs2\Distributor\Result\CreateNamespaceResult
         */
        $r = $this->client->createNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function distributeWithoutOverflowProcess(
        \Gs2\Distributor\Request\DistributeWithoutOverflowProcessRequest $request
    ): \Gs2\Distributor\Result\DistributeWithoutOverflowProcessResult {
        /**
         * @var \Gs2\Distributor\Result\DistributeWithoutOverflowProcessResult
         */
        $r = $this->client->distributeWithoutOverflowProcess(
            $request
        );
        return $r;
    }

    public function runStampTaskWithoutNamespace(
        \Gs2\Distributor\Request\RunStampTaskWithoutNamespaceRequest $request
    ): \Gs2\Distributor\Result\RunStampTaskWithoutNamespaceResult {
        /**
         * @var \Gs2\Distributor\Result\RunStampTaskWithoutNamespaceResult
         */
        $r = $this->client->runStampTaskWithoutNamespace(
            $request
        );
        return $r;
    }

    public function runStampSheetWithoutNamespace(
        \Gs2\Distributor\Request\RunStampSheetWithoutNamespaceRequest $request
    ): \Gs2\Distributor\Result\RunStampSheetWithoutNamespaceResult {
        /**
         * @var \Gs2\Distributor\Result\RunStampSheetWithoutNamespaceResult
         */
        $r = $this->client->runStampSheetWithoutNamespace(
            $request
        );
        return $r;
    }

    public function runStampSheetExpressWithoutNamespace(
        \Gs2\Distributor\Request\RunStampSheetExpressWithoutNamespaceRequest $request
    ): \Gs2\Distributor\Result\RunStampSheetExpressWithoutNamespaceResult {
        /**
         * @var \Gs2\Distributor\Result\RunStampSheetExpressWithoutNamespaceResult
         */
        $r = $this->client->runStampSheetExpressWithoutNamespace(
            $request
        );
        return $r;
    }

    public function namespaces(
    ): \Gs2\Distributor\Domain\Iterator\DescribeNamespacesIterator {
        return new \Gs2\Distributor\Domain\Iterator\DescribeNamespacesIterator(
            $this->namespaceCache,
            $this->client
        );
    }

    public function namespace(
        string $namespaceName
    ): \Gs2\Distributor\Domain\Model\NamespaceDomain {
        return new \Gs2\Distributor\Domain\Model\NamespaceDomain(
            $this->session,
            $this->namespaceCache,
            $namespaceName
        );
    }
}
