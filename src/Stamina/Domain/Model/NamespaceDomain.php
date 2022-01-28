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

namespace Gs2\Stamina\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Stamina\Gs2StaminaRestClient;


class NamespaceDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2StaminaRestClient
     */
    private $client;

    /**
     * @var \Gs2\Stamina\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Stamina\Domain\Cache\StaminaModelMasterDomainCache
     */
    private $staminaModelMasterCache;

    /**
     * @var \Gs2\Stamina\Domain\Cache\MaxStaminaTableMasterDomainCache
     */
    private $maxStaminaTableMasterCache;

    /**
     * @var \Gs2\Stamina\Domain\Cache\RecoverIntervalTableMasterDomainCache
     */
    private $recoverIntervalTableMasterCache;

    /**
     * @var \Gs2\Stamina\Domain\Cache\RecoverValueTableMasterDomainCache
     */
    private $recoverValueTableMasterCache;

    /**
     * @var \Gs2\Stamina\Domain\Cache\StaminaModelDomainCache
     */
    private $staminaModelCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Stamina\Domain\Cache\NamespaceDomainCache $namespaceCache,
        string $namespaceName
    ) {
        $this->session = $session;
        $this->client = new Gs2StaminaRestClient(
            $session
        );
        $this->namespaceCache = $namespaceCache;
        $this->namespaceName = $namespaceName;
        $this->staminaModelMasterCache = new \Gs2\Stamina\Domain\Cache\StaminaModelMasterDomainCache();
        $this->maxStaminaTableMasterCache = new \Gs2\Stamina\Domain\Cache\MaxStaminaTableMasterDomainCache();
        $this->recoverIntervalTableMasterCache = new \Gs2\Stamina\Domain\Cache\RecoverIntervalTableMasterDomainCache();
        $this->recoverValueTableMasterCache = new \Gs2\Stamina\Domain\Cache\RecoverValueTableMasterDomainCache();
        $this->staminaModelCache = new \Gs2\Stamina\Domain\Cache\StaminaModelDomainCache();
    }

    public function getStatus(
        \Gs2\Stamina\Request\GetNamespaceStatusRequest $request
    ): \Gs2\Stamina\Result\GetNamespaceStatusResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Stamina\Result\GetNamespaceStatusResult
         */
        $r = $this->client->getNamespaceStatus(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Stamina\Request\GetNamespaceRequest $request
    ): \Gs2\Stamina\Result\GetNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Stamina\Result\GetNamespaceResult
         */
        $r = $this->client->getNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Stamina\Request\UpdateNamespaceRequest $request
    ): \Gs2\Stamina\Result\UpdateNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Stamina\Result\UpdateNamespaceResult
         */
        $r = $this->client->updateNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Stamina\Request\DeleteNamespaceRequest $request
    ): \Gs2\Stamina\Result\DeleteNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Stamina\Result\DeleteNamespaceResult
         */
        $r = $this->client->deleteNamespace(
            $request
        );
        $this->namespaceCache->delete($r->getItem());
        return $r;
    }

    public function createStaminaModelMaster(
        \Gs2\Stamina\Request\CreateStaminaModelMasterRequest $request
    ): \Gs2\Stamina\Result\CreateStaminaModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Stamina\Result\CreateStaminaModelMasterResult
         */
        $r = $this->client->createStaminaModelMaster(
            $request
        );
        return $r;
    }

    public function createMaxStaminaTableMaster(
        \Gs2\Stamina\Request\CreateMaxStaminaTableMasterRequest $request
    ): \Gs2\Stamina\Result\CreateMaxStaminaTableMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Stamina\Result\CreateMaxStaminaTableMasterResult
         */
        $r = $this->client->createMaxStaminaTableMaster(
            $request
        );
        return $r;
    }

    public function createRecoverIntervalTableMaster(
        \Gs2\Stamina\Request\CreateRecoverIntervalTableMasterRequest $request
    ): \Gs2\Stamina\Result\CreateRecoverIntervalTableMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Stamina\Result\CreateRecoverIntervalTableMasterResult
         */
        $r = $this->client->createRecoverIntervalTableMaster(
            $request
        );
        return $r;
    }

    public function createRecoverValueTableMaster(
        \Gs2\Stamina\Request\CreateRecoverValueTableMasterRequest $request
    ): \Gs2\Stamina\Result\CreateRecoverValueTableMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Stamina\Result\CreateRecoverValueTableMasterResult
         */
        $r = $this->client->createRecoverValueTableMaster(
            $request
        );
        return $r;
    }

    public function staminaModelMasters(
    ): \Gs2\Stamina\Domain\Iterator\DescribeStaminaModelMastersIterator {
        return new \Gs2\Stamina\Domain\Iterator\DescribeStaminaModelMastersIterator(
            $this->staminaModelMasterCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function maxStaminaTableMasters(
    ): \Gs2\Stamina\Domain\Iterator\DescribeMaxStaminaTableMastersIterator {
        return new \Gs2\Stamina\Domain\Iterator\DescribeMaxStaminaTableMastersIterator(
            $this->maxStaminaTableMasterCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function recoverIntervalTableMasters(
    ): \Gs2\Stamina\Domain\Iterator\DescribeRecoverIntervalTableMastersIterator {
        return new \Gs2\Stamina\Domain\Iterator\DescribeRecoverIntervalTableMastersIterator(
            $this->recoverIntervalTableMasterCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function recoverValueTableMasters(
    ): \Gs2\Stamina\Domain\Iterator\DescribeRecoverValueTableMastersIterator {
        return new \Gs2\Stamina\Domain\Iterator\DescribeRecoverValueTableMastersIterator(
            $this->recoverValueTableMasterCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function staminaModels(
    ): \Gs2\Stamina\Domain\Iterator\DescribeStaminaModelsIterator {
        return new \Gs2\Stamina\Domain\Iterator\DescribeStaminaModelsIterator(
            $this->staminaModelCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function currentStaminaMaster(
    ): CurrentStaminaMasterDomain {
        return new CurrentStaminaMasterDomain(
            $this->session,
            $this->namespaceName
        );
    }

    public function staminaModel(
        string $staminaName
    ): StaminaModelDomain {
        return new StaminaModelDomain(
            $this->session,
            $this->staminaModelCache,
            $this->namespaceName,
            $staminaName
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

    public function recoverIntervalTableMaster(
        string $recoverIntervalTableName
    ): RecoverIntervalTableMasterDomain {
        return new RecoverIntervalTableMasterDomain(
            $this->session,
            $this->recoverIntervalTableMasterCache,
            $this->namespaceName,
            $recoverIntervalTableName
        );
    }

    public function maxStaminaTableMaster(
        string $maxStaminaTableName
    ): MaxStaminaTableMasterDomain {
        return new MaxStaminaTableMasterDomain(
            $this->session,
            $this->maxStaminaTableMasterCache,
            $this->namespaceName,
            $maxStaminaTableName
        );
    }

    public function recoverValueTableMaster(
        string $recoverValueTableName
    ): RecoverValueTableMasterDomain {
        return new RecoverValueTableMasterDomain(
            $this->session,
            $this->recoverValueTableMasterCache,
            $this->namespaceName,
            $recoverValueTableName
        );
    }

    public function staminaModelMaster(
        string $staminaName
    ): StaminaModelMasterDomain {
        return new StaminaModelMasterDomain(
            $this->session,
            $this->staminaModelMasterCache,
            $this->namespaceName,
            $staminaName
        );
    }

}
