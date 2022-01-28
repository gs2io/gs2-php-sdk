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

namespace Gs2\Version\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Version\Gs2VersionRestClient;


class NamespaceDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2VersionRestClient
     */
    private $client;

    /**
     * @var \Gs2\Version\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Version\Domain\Cache\VersionModelMasterDomainCache
     */
    private $versionModelMasterCache;

    /**
     * @var \Gs2\Version\Domain\Cache\VersionModelDomainCache
     */
    private $versionModelCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Version\Domain\Cache\NamespaceDomainCache $namespaceCache,
        string $namespaceName
    ) {
        $this->session = $session;
        $this->client = new Gs2VersionRestClient(
            $session
        );
        $this->namespaceCache = $namespaceCache;
        $this->namespaceName = $namespaceName;
        $this->versionModelMasterCache = new \Gs2\Version\Domain\Cache\VersionModelMasterDomainCache();
        $this->versionModelCache = new \Gs2\Version\Domain\Cache\VersionModelDomainCache();
    }

    public function getStatus(
        \Gs2\Version\Request\GetNamespaceStatusRequest $request
    ): \Gs2\Version\Result\GetNamespaceStatusResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Version\Result\GetNamespaceStatusResult
         */
        $r = $this->client->getNamespaceStatus(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Version\Request\GetNamespaceRequest $request
    ): \Gs2\Version\Result\GetNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Version\Result\GetNamespaceResult
         */
        $r = $this->client->getNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Version\Request\UpdateNamespaceRequest $request
    ): \Gs2\Version\Result\UpdateNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Version\Result\UpdateNamespaceResult
         */
        $r = $this->client->updateNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Version\Request\DeleteNamespaceRequest $request
    ): \Gs2\Version\Result\DeleteNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Version\Result\DeleteNamespaceResult
         */
        $r = $this->client->deleteNamespace(
            $request
        );
        $this->namespaceCache->delete($r->getItem());
        return $r;
    }

    public function createVersionModelMaster(
        \Gs2\Version\Request\CreateVersionModelMasterRequest $request
    ): \Gs2\Version\Result\CreateVersionModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Version\Result\CreateVersionModelMasterResult
         */
        $r = $this->client->createVersionModelMaster(
            $request
        );
        return $r;
    }

    public function versionModelMasters(
    ): \Gs2\Version\Domain\Iterator\DescribeVersionModelMastersIterator {
        return new \Gs2\Version\Domain\Iterator\DescribeVersionModelMastersIterator(
            $this->versionModelMasterCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function versionModels(
    ): \Gs2\Version\Domain\Iterator\DescribeVersionModelsIterator {
        return new \Gs2\Version\Domain\Iterator\DescribeVersionModelsIterator(
            $this->versionModelCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function currentVersionMaster(
    ): CurrentVersionMasterDomain {
        return new CurrentVersionMasterDomain(
            $this->session,
            $this->namespaceName
        );
    }

    public function versionModel(
        string $versionName
    ): VersionModelDomain {
        return new VersionModelDomain(
            $this->session,
            $this->versionModelCache,
            $this->namespaceName,
            $versionName
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

    public function versionModelMaster(
        string $versionName
    ): VersionModelMasterDomain {
        return new VersionModelMasterDomain(
            $this->session,
            $this->versionModelMasterCache,
            $this->namespaceName,
            $versionName
        );
    }

}
