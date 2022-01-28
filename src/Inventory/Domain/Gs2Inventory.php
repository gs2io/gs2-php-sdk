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

namespace Gs2\Inventory\Domain;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Inventory\Gs2InventoryRestClient;

class Gs2Inventory {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2InventoryRestClient
     */
    private $client;

    /**
     * @var \Gs2\Inventory\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    public function __construct(
        Gs2RestSession $session
    ) {
        $this->session = $session;
        $this->client = new Gs2InventoryRestClient (
            $session
        );
        $this->namespaceCache = new \Gs2\Inventory\Domain\Cache\NamespaceDomainCache();
    }

    public function createNamespace(
        \Gs2\Inventory\Request\CreateNamespaceRequest $request
    ): \Gs2\Inventory\Result\CreateNamespaceResult {
        /**
         * @var \Gs2\Inventory\Result\CreateNamespaceResult
         */
        $r = $this->client->createNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function addCapacityByStampSheet(
        \Gs2\Inventory\Request\AddCapacityByStampSheetRequest $request
    ): \Gs2\Inventory\Result\AddCapacityByStampSheetResult {
        /**
         * @var \Gs2\Inventory\Result\AddCapacityByStampSheetResult
         */
        $r = $this->client->addCapacityByStampSheet(
            $request
        );
        return $r;
    }

    public function setCapacityByStampSheet(
        \Gs2\Inventory\Request\SetCapacityByStampSheetRequest $request
    ): \Gs2\Inventory\Result\SetCapacityByStampSheetResult {
        /**
         * @var \Gs2\Inventory\Result\SetCapacityByStampSheetResult
         */
        $r = $this->client->setCapacityByStampSheet(
            $request
        );
        return $r;
    }

    public function acquireItemSetByStampSheet(
        \Gs2\Inventory\Request\AcquireItemSetByStampSheetRequest $request
    ): \Gs2\Inventory\Result\AcquireItemSetByStampSheetResult {
        /**
         * @var \Gs2\Inventory\Result\AcquireItemSetByStampSheetResult
         */
        $r = $this->client->acquireItemSetByStampSheet(
            $request
        );
        return $r;
    }

    public function consumeItemSetByStampTask(
        \Gs2\Inventory\Request\ConsumeItemSetByStampTaskRequest $request
    ): \Gs2\Inventory\Result\ConsumeItemSetByStampTaskResult {
        /**
         * @var \Gs2\Inventory\Result\ConsumeItemSetByStampTaskResult
         */
        $r = $this->client->consumeItemSetByStampTask(
            $request
        );
        return $r;
    }

    public function addReferenceOfItemSetByStampSheet(
        \Gs2\Inventory\Request\AddReferenceOfItemSetByStampSheetRequest $request
    ): \Gs2\Inventory\Result\AddReferenceOfItemSetByStampSheetResult {
        /**
         * @var \Gs2\Inventory\Result\AddReferenceOfItemSetByStampSheetResult
         */
        $r = $this->client->addReferenceOfItemSetByStampSheet(
            $request
        );
        return $r;
    }

    public function deleteReferenceOfItemSetByStampSheet(
        \Gs2\Inventory\Request\DeleteReferenceOfItemSetByStampSheetRequest $request
    ): \Gs2\Inventory\Result\DeleteReferenceOfItemSetByStampSheetResult {
        /**
         * @var \Gs2\Inventory\Result\DeleteReferenceOfItemSetByStampSheetResult
         */
        $r = $this->client->deleteReferenceOfItemSetByStampSheet(
            $request
        );
        return $r;
    }

    public function verifyReferenceOfByStampTask(
        \Gs2\Inventory\Request\VerifyReferenceOfByStampTaskRequest $request
    ): \Gs2\Inventory\Result\VerifyReferenceOfByStampTaskResult {
        /**
         * @var \Gs2\Inventory\Result\VerifyReferenceOfByStampTaskResult
         */
        $r = $this->client->verifyReferenceOfByStampTask(
            $request
        );
        return $r;
    }

    public function namespaces(
    ): \Gs2\Inventory\Domain\Iterator\DescribeNamespacesIterator {
        return new \Gs2\Inventory\Domain\Iterator\DescribeNamespacesIterator(
            $this->namespaceCache,
            $this->client
        );
    }

    public function namespace(
        string $namespaceName
    ): \Gs2\Inventory\Domain\Model\NamespaceDomain {
        return new \Gs2\Inventory\Domain\Model\NamespaceDomain(
            $this->session,
            $this->namespaceCache,
            $namespaceName
        );
    }
}
