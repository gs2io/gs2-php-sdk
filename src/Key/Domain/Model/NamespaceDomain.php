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

namespace Gs2\Key\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Key\Gs2KeyRestClient;


class NamespaceDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2KeyRestClient
     */
    private $client;

    /**
     * @var \Gs2\Key\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Key\Domain\Cache\KeyDomainCache
     */
    private $keyCache;

    /**
     * @var \Gs2\Key\Domain\Cache\GitHubApiKeyDomainCache
     */
    private $gitHubApiKeyCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Key\Domain\Cache\NamespaceDomainCache $namespaceCache,
        string $namespaceName
    ) {
        $this->session = $session;
        $this->client = new Gs2KeyRestClient(
            $session
        );
        $this->namespaceCache = $namespaceCache;
        $this->namespaceName = $namespaceName;
        $this->keyCache = new \Gs2\Key\Domain\Cache\KeyDomainCache();
        $this->gitHubApiKeyCache = new \Gs2\Key\Domain\Cache\GitHubApiKeyDomainCache();
    }

    public function getStatus(
        \Gs2\Key\Request\GetNamespaceStatusRequest $request
    ): \Gs2\Key\Result\GetNamespaceStatusResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Key\Result\GetNamespaceStatusResult
         */
        $r = $this->client->getNamespaceStatus(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Key\Request\GetNamespaceRequest $request
    ): \Gs2\Key\Result\GetNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Key\Result\GetNamespaceResult
         */
        $r = $this->client->getNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Key\Request\UpdateNamespaceRequest $request
    ): \Gs2\Key\Result\UpdateNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Key\Result\UpdateNamespaceResult
         */
        $r = $this->client->updateNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Key\Request\DeleteNamespaceRequest $request
    ): \Gs2\Key\Result\DeleteNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Key\Result\DeleteNamespaceResult
         */
        $r = $this->client->deleteNamespace(
            $request
        );
        $this->namespaceCache->delete($r->getItem());
        return $r;
    }

    public function createKey(
        \Gs2\Key\Request\CreateKeyRequest $request
    ): \Gs2\Key\Result\CreateKeyResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Key\Result\CreateKeyResult
         */
        $r = $this->client->createKey(
            $request
        );
        return $r;
    }

    public function createGitHubApiKey(
        \Gs2\Key\Request\CreateGitHubApiKeyRequest $request
    ): \Gs2\Key\Result\CreateGitHubApiKeyResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Key\Result\CreateGitHubApiKeyResult
         */
        $r = $this->client->createGitHubApiKey(
            $request
        );
        return $r;
    }

    public function keys(
    ): \Gs2\Key\Domain\Iterator\DescribeKeysIterator {
        return new \Gs2\Key\Domain\Iterator\DescribeKeysIterator(
            $this->keyCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function gitHubApiKeys(
    ): \Gs2\Key\Domain\Iterator\DescribeGitHubApiKeysIterator {
        return new \Gs2\Key\Domain\Iterator\DescribeGitHubApiKeysIterator(
            $this->gitHubApiKeyCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function key(
        string $keyName
    ): KeyDomain {
        return new KeyDomain(
            $this->session,
            $this->keyCache,
            $this->namespaceName,
            $keyName
        );
    }

    public function gitHubApiKey(
        string $apiKeyName
    ): GitHubApiKeyDomain {
        return new GitHubApiKeyDomain(
            $this->session,
            $this->gitHubApiKeyCache,
            $this->namespaceName,
            $apiKeyName
        );
    }

}
