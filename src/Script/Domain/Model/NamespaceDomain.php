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

namespace Gs2\Script\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Script\Gs2ScriptRestClient;


class NamespaceDomain {

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

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Script\Domain\Cache\ScriptDomainCache
     */
    private $scriptCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Script\Domain\Cache\NamespaceDomainCache $namespaceCache,
        string $namespaceName
    ) {
        $this->session = $session;
        $this->client = new Gs2ScriptRestClient(
            $session
        );
        $this->namespaceCache = $namespaceCache;
        $this->namespaceName = $namespaceName;
        $this->scriptCache = new \Gs2\Script\Domain\Cache\ScriptDomainCache();
    }

    public function getStatus(
        \Gs2\Script\Request\GetNamespaceStatusRequest $request
    ): \Gs2\Script\Result\GetNamespaceStatusResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Script\Result\GetNamespaceStatusResult
         */
        $r = $this->client->getNamespaceStatus(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Script\Request\GetNamespaceRequest $request
    ): \Gs2\Script\Result\GetNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Script\Result\GetNamespaceResult
         */
        $r = $this->client->getNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Script\Request\UpdateNamespaceRequest $request
    ): \Gs2\Script\Result\UpdateNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Script\Result\UpdateNamespaceResult
         */
        $r = $this->client->updateNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Script\Request\DeleteNamespaceRequest $request
    ): \Gs2\Script\Result\DeleteNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Script\Result\DeleteNamespaceResult
         */
        $r = $this->client->deleteNamespace(
            $request
        );
        return $r;
    }

    public function createScript(
        \Gs2\Script\Request\CreateScriptRequest $request
    ): \Gs2\Script\Result\CreateScriptResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Script\Result\CreateScriptResult
         */
        $r = $this->client->createScript(
            $request
        );
        return $r;
    }

    public function createScriptFromGitHub(
        \Gs2\Script\Request\CreateScriptFromGitHubRequest $request
    ): \Gs2\Script\Result\CreateScriptFromGitHubResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Script\Result\CreateScriptFromGitHubResult
         */
        $r = $this->client->createScriptFromGitHub(
            $request
        );
        return $r;
    }

    public function scripts(
    ): \Gs2\Script\Domain\Iterator\DescribeScriptsIterator {
        return new \Gs2\Script\Domain\Iterator\DescribeScriptsIterator(
            $this->scriptCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function script(
        string $scriptName
    ): ScriptDomain {
        return new ScriptDomain(
            $this->session,
            $this->scriptCache,
            $this->namespaceName,
            $scriptName
        );
    }

}
