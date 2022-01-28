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

namespace Gs2\Mission\Domain;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Mission\Gs2MissionRestClient;

class Gs2Mission {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2MissionRestClient
     */
    private $client;

    /**
     * @var \Gs2\Mission\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    public function __construct(
        Gs2RestSession $session
    ) {
        $this->session = $session;
        $this->client = new Gs2MissionRestClient (
            $session
        );
        $this->namespaceCache = new \Gs2\Mission\Domain\Cache\NamespaceDomainCache();
    }

    public function receiveByStampTask(
        \Gs2\Mission\Request\ReceiveByStampTaskRequest $request
    ): \Gs2\Mission\Result\ReceiveByStampTaskResult {
        /**
         * @var \Gs2\Mission\Result\ReceiveByStampTaskResult
         */
        $r = $this->client->receiveByStampTask(
            $request
        );
        return $r;
    }

    public function createNamespace(
        \Gs2\Mission\Request\CreateNamespaceRequest $request
    ): \Gs2\Mission\Result\CreateNamespaceResult {
        /**
         * @var \Gs2\Mission\Result\CreateNamespaceResult
         */
        $r = $this->client->createNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function increaseByStampSheet(
        \Gs2\Mission\Request\IncreaseByStampSheetRequest $request
    ): \Gs2\Mission\Result\IncreaseByStampSheetResult {
        /**
         * @var \Gs2\Mission\Result\IncreaseByStampSheetResult
         */
        $r = $this->client->increaseByStampSheet(
            $request
        );
        return $r;
    }

    public function namespaces(
    ): \Gs2\Mission\Domain\Iterator\DescribeNamespacesIterator {
        return new \Gs2\Mission\Domain\Iterator\DescribeNamespacesIterator(
            $this->namespaceCache,
            $this->client
        );
    }

    public function namespace(
        string $namespaceName
    ): \Gs2\Mission\Domain\Model\NamespaceDomain {
        return new \Gs2\Mission\Domain\Model\NamespaceDomain(
            $this->session,
            $this->namespaceCache,
            $namespaceName
        );
    }
}
