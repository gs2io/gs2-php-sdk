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

namespace Gs2\Enhance\Domain;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Enhance\Gs2EnhanceRestClient;

class Gs2Enhance {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2EnhanceRestClient
     */
    private $client;

    /**
     * @var \Gs2\Enhance\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    public function __construct(
        Gs2RestSession $session
    ) {
        $this->session = $session;
        $this->client = new Gs2EnhanceRestClient (
            $session
        );
        $this->namespaceCache = new \Gs2\Enhance\Domain\Cache\NamespaceDomainCache();
    }

    public function createNamespace(
        \Gs2\Enhance\Request\CreateNamespaceRequest $request
    ): \Gs2\Enhance\Result\CreateNamespaceResult {
        /**
         * @var \Gs2\Enhance\Result\CreateNamespaceResult
         */
        $r = $this->client->createNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function directEnhanceByStampSheet(
        \Gs2\Enhance\Request\DirectEnhanceByStampSheetRequest $request
    ): \Gs2\Enhance\Result\DirectEnhanceByStampSheetResult {
        /**
         * @var \Gs2\Enhance\Result\DirectEnhanceByStampSheetResult
         */
        $r = $this->client->directEnhanceByStampSheet(
            $request
        );
        return $r;
    }

    public function createProgressByStampSheet(
        \Gs2\Enhance\Request\CreateProgressByStampSheetRequest $request
    ): \Gs2\Enhance\Result\CreateProgressByStampSheetResult {
        /**
         * @var \Gs2\Enhance\Result\CreateProgressByStampSheetResult
         */
        $r = $this->client->createProgressByStampSheet(
            $request
        );
        return $r;
    }

    public function deleteProgressByStampTask(
        \Gs2\Enhance\Request\DeleteProgressByStampTaskRequest $request
    ): \Gs2\Enhance\Result\DeleteProgressByStampTaskResult {
        /**
         * @var \Gs2\Enhance\Result\DeleteProgressByStampTaskResult
         */
        $r = $this->client->deleteProgressByStampTask(
            $request
        );
        return $r;
    }

    public function namespaces(
    ): \Gs2\Enhance\Domain\Iterator\DescribeNamespacesIterator {
        return new \Gs2\Enhance\Domain\Iterator\DescribeNamespacesIterator(
            $this->namespaceCache,
            $this->client
        );
    }

    public function namespace(
        string $namespaceName
    ): \Gs2\Enhance\Domain\Model\NamespaceDomain {
        return new \Gs2\Enhance\Domain\Model\NamespaceDomain(
            $this->session,
            $this->namespaceCache,
            $namespaceName
        );
    }
}
