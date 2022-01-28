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

namespace Gs2\Money\Domain;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Money\Gs2MoneyRestClient;

class Gs2Money {

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

    public function __construct(
        Gs2RestSession $session
    ) {
        $this->session = $session;
        $this->client = new Gs2MoneyRestClient (
            $session
        );
        $this->namespaceCache = new \Gs2\Money\Domain\Cache\NamespaceDomainCache();
    }

    public function createNamespace(
        \Gs2\Money\Request\CreateNamespaceRequest $request
    ): \Gs2\Money\Result\CreateNamespaceResult {
        /**
         * @var \Gs2\Money\Result\CreateNamespaceResult
         */
        $r = $this->client->createNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function depositByStampSheet(
        \Gs2\Money\Request\DepositByStampSheetRequest $request
    ): \Gs2\Money\Result\DepositByStampSheetResult {
        /**
         * @var \Gs2\Money\Result\DepositByStampSheetResult
         */
        $r = $this->client->depositByStampSheet(
            $request
        );
        return $r;
    }

    public function withdrawByStampTask(
        \Gs2\Money\Request\WithdrawByStampTaskRequest $request
    ): \Gs2\Money\Result\WithdrawByStampTaskResult {
        /**
         * @var \Gs2\Money\Result\WithdrawByStampTaskResult
         */
        $r = $this->client->withdrawByStampTask(
            $request
        );
        return $r;
    }

    public function recordReceipt(
        \Gs2\Money\Request\RecordReceiptRequest $request
    ): \Gs2\Money\Result\RecordReceiptResult {
        /**
         * @var \Gs2\Money\Result\RecordReceiptResult
         */
        $r = $this->client->recordReceipt(
            $request
        );
        return $r;
    }

    public function recordReceiptByStampTask(
        \Gs2\Money\Request\RecordReceiptByStampTaskRequest $request
    ): \Gs2\Money\Result\RecordReceiptByStampTaskResult {
        /**
         * @var \Gs2\Money\Result\RecordReceiptByStampTaskResult
         */
        $r = $this->client->recordReceiptByStampTask(
            $request
        );
        return $r;
    }

    public function namespaces(
    ): \Gs2\Money\Domain\Iterator\DescribeNamespacesIterator {
        return new \Gs2\Money\Domain\Iterator\DescribeNamespacesIterator(
            $this->namespaceCache,
            $this->client
        );
    }

    public function namespace(
        string $namespaceName
    ): \Gs2\Money\Domain\Model\NamespaceDomain {
        return new \Gs2\Money\Domain\Model\NamespaceDomain(
            $this->session,
            $this->namespaceCache,
            $namespaceName
        );
    }
}
