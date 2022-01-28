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

namespace Gs2\Dictionary\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Dictionary\Gs2DictionaryRestClient;


class NamespaceDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2DictionaryRestClient
     */
    private $client;

    /**
     * @var \Gs2\Dictionary\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Dictionary\Domain\Cache\EntryModelDomainCache
     */
    private $entryModelCache;

    /**
     * @var \Gs2\Dictionary\Domain\Cache\EntryModelMasterDomainCache
     */
    private $entryModelMasterCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Dictionary\Domain\Cache\NamespaceDomainCache $namespaceCache,
        string $namespaceName
    ) {
        $this->session = $session;
        $this->client = new Gs2DictionaryRestClient(
            $session
        );
        $this->namespaceCache = $namespaceCache;
        $this->namespaceName = $namespaceName;
        $this->entryModelCache = new \Gs2\Dictionary\Domain\Cache\EntryModelDomainCache();
        $this->entryModelMasterCache = new \Gs2\Dictionary\Domain\Cache\EntryModelMasterDomainCache();
    }

    public function getStatus(
        \Gs2\Dictionary\Request\GetNamespaceStatusRequest $request
    ): \Gs2\Dictionary\Result\GetNamespaceStatusResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Dictionary\Result\GetNamespaceStatusResult
         */
        $r = $this->client->getNamespaceStatus(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Dictionary\Request\GetNamespaceRequest $request
    ): \Gs2\Dictionary\Result\GetNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Dictionary\Result\GetNamespaceResult
         */
        $r = $this->client->getNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Dictionary\Request\UpdateNamespaceRequest $request
    ): \Gs2\Dictionary\Result\UpdateNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Dictionary\Result\UpdateNamespaceResult
         */
        $r = $this->client->updateNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Dictionary\Request\DeleteNamespaceRequest $request
    ): \Gs2\Dictionary\Result\DeleteNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Dictionary\Result\DeleteNamespaceResult
         */
        $r = $this->client->deleteNamespace(
            $request
        );
        $this->namespaceCache->delete($r->getItem());
        return $r;
    }

    public function createEntryModelMaster(
        \Gs2\Dictionary\Request\CreateEntryModelMasterRequest $request
    ): \Gs2\Dictionary\Result\CreateEntryModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Dictionary\Result\CreateEntryModelMasterResult
         */
        $r = $this->client->createEntryModelMaster(
            $request
        );
        return $r;
    }

    public function entryModels(
    ): \Gs2\Dictionary\Domain\Iterator\DescribeEntryModelsIterator {
        return new \Gs2\Dictionary\Domain\Iterator\DescribeEntryModelsIterator(
            $this->entryModelCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function entryModelMasters(
    ): \Gs2\Dictionary\Domain\Iterator\DescribeEntryModelMastersIterator {
        return new \Gs2\Dictionary\Domain\Iterator\DescribeEntryModelMastersIterator(
            $this->entryModelMasterCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function currentEntryMaster(
    ): CurrentEntryMasterDomain {
        return new CurrentEntryMasterDomain(
            $this->session,
            $this->namespaceName
        );
    }

    public function entryModel(
        string $entryName
    ): EntryModelDomain {
        return new EntryModelDomain(
            $this->session,
            $this->entryModelCache,
            $this->namespaceName,
            $entryName
        );
    }

    public function user(
        string $userId
    ): UserDomain {
        return new UserDomain(
            $this->session,
            $this->namespaceName,
            $userId
        );
    }

    public function accessToken(
        \Gs2\Auth\Model\AccessToken $accessToken
    ): UserAccessTokenDomain  {
        return new UserAccessTokenDomain(
            $this->session,
            $this->namespaceName,
            $accessToken
        );
    }

    public function entryModelMaster(
        string $entryName
    ): EntryModelMasterDomain {
        return new EntryModelMasterDomain(
            $this->session,
            $this->entryModelMasterCache,
            $this->namespaceName,
            $entryName
        );
    }

}
