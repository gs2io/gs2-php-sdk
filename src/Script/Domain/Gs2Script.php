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

namespace Gs2\Script\Domain;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Script\Gs2ScriptRestClient;

class Gs2Script {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ScriptRestClient
     */
    private $client;

    /**
     * @var \Gs2\Script\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    public function __construct(
        Gs2RestSession $session
    ) {
        $this->session = $session;
        $this->client = new Gs2ScriptRestClient (
            $session
        );
        $this->namespaceCache = new \Gs2\Script\Domain\Cache\NamespaceDomainCache();
    }

    public function createNamespace(
        \Gs2\Script\Request\CreateNamespaceRequest $request
    ): \Gs2\Script\Result\CreateNamespaceResult {
        /**
         * @var \Gs2\Script\Result\CreateNamespaceResult
         */
        $r = $this->client->createNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function invokeScript(
        \Gs2\Script\Request\InvokeScriptRequest $request
    ): \Gs2\Script\Result\InvokeScriptResult {
        /**
         * @var \Gs2\Script\Result\InvokeScriptResult
         */
        $r = $this->client->invokeScript(
            $request
        );
        return $r;
    }

    public function debugInvoke(
        \Gs2\Script\Request\DebugInvokeRequest $request
    ): \Gs2\Script\Result\DebugInvokeResult {
        /**
         * @var \Gs2\Script\Result\DebugInvokeResult
         */
        $r = $this->client->debugInvoke(
            $request
        );
        return $r;
    }

    public function namespaces(
    ): \Gs2\Script\Domain\Iterator\DescribeNamespacesIterator {
        return new \Gs2\Script\Domain\Iterator\DescribeNamespacesIterator(
            $this->namespaceCache,
            $this->client
        );
    }

    public function namespace(
        string $namespaceName
    ): \Gs2\Script\Domain\Model\NamespaceDomain {
        return new \Gs2\Script\Domain\Model\NamespaceDomain(
            $this->session,
            $this->namespaceCache,
            $namespaceName
        );
    }
}
