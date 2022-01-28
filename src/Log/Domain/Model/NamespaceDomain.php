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

namespace Gs2\Log\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Log\Gs2LogRestClient;


class NamespaceDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2LogRestClient
     */
    private $client;

    /**
     * @var \Gs2\Log\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    /**
     * @var string
     */
    private $namespaceName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Log\Domain\Cache\NamespaceDomainCache $namespaceCache,
        string $namespaceName
    ) {
        $this->session = $session;
        $this->client = new Gs2LogRestClient(
            $session
        );
        $this->namespaceCache = $namespaceCache;
        $this->namespaceName = $namespaceName;
    }

    public function getStatus(
        \Gs2\Log\Request\GetNamespaceStatusRequest $request
    ): \Gs2\Log\Result\GetNamespaceStatusResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Log\Result\GetNamespaceStatusResult
         */
        $r = $this->client->getNamespaceStatus(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Log\Request\GetNamespaceRequest $request
    ): \Gs2\Log\Result\GetNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Log\Result\GetNamespaceResult
         */
        $r = $this->client->getNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Log\Request\UpdateNamespaceRequest $request
    ): \Gs2\Log\Result\UpdateNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Log\Result\UpdateNamespaceResult
         */
        $r = $this->client->updateNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Log\Request\DeleteNamespaceRequest $request
    ): \Gs2\Log\Result\DeleteNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Log\Result\DeleteNamespaceResult
         */
        $r = $this->client->deleteNamespace(
            $request
        );
        $this->namespaceCache->delete($r->getItem());
        return $r;
    }

    public function queryAccessLog(
        \Gs2\Log\Request\QueryAccessLogRequest $request
    ): \Gs2\Log\Result\QueryAccessLogResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Log\Result\QueryAccessLogResult
         */
        $r = $this->client->queryAccessLog(
            $request
        );
        return $r;
    }

    public function countAccessLog(
        \Gs2\Log\Request\CountAccessLogRequest $request
    ): \Gs2\Log\Result\CountAccessLogResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Log\Result\CountAccessLogResult
         */
        $r = $this->client->countAccessLog(
            $request
        );
        return $r;
    }

    public function queryIssueStampSheetLog(
        \Gs2\Log\Request\QueryIssueStampSheetLogRequest $request
    ): \Gs2\Log\Result\QueryIssueStampSheetLogResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Log\Result\QueryIssueStampSheetLogResult
         */
        $r = $this->client->queryIssueStampSheetLog(
            $request
        );
        return $r;
    }

    public function countIssueStampSheetLog(
        \Gs2\Log\Request\CountIssueStampSheetLogRequest $request
    ): \Gs2\Log\Result\CountIssueStampSheetLogResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Log\Result\CountIssueStampSheetLogResult
         */
        $r = $this->client->countIssueStampSheetLog(
            $request
        );
        return $r;
    }

    public function queryExecuteStampSheetLog(
        \Gs2\Log\Request\QueryExecuteStampSheetLogRequest $request
    ): \Gs2\Log\Result\QueryExecuteStampSheetLogResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Log\Result\QueryExecuteStampSheetLogResult
         */
        $r = $this->client->queryExecuteStampSheetLog(
            $request
        );
        return $r;
    }

    public function countExecuteStampSheetLog(
        \Gs2\Log\Request\CountExecuteStampSheetLogRequest $request
    ): \Gs2\Log\Result\CountExecuteStampSheetLogResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Log\Result\CountExecuteStampSheetLogResult
         */
        $r = $this->client->countExecuteStampSheetLog(
            $request
        );
        return $r;
    }

    public function queryExecuteStampTaskLog(
        \Gs2\Log\Request\QueryExecuteStampTaskLogRequest $request
    ): \Gs2\Log\Result\QueryExecuteStampTaskLogResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Log\Result\QueryExecuteStampTaskLogResult
         */
        $r = $this->client->queryExecuteStampTaskLog(
            $request
        );
        return $r;
    }

    public function countExecuteStampTaskLog(
        \Gs2\Log\Request\CountExecuteStampTaskLogRequest $request
    ): \Gs2\Log\Result\CountExecuteStampTaskLogResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Log\Result\CountExecuteStampTaskLogResult
         */
        $r = $this->client->countExecuteStampTaskLog(
            $request
        );
        return $r;
    }

}
