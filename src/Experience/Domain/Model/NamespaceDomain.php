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

namespace Gs2\Experience\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Experience\Gs2ExperienceRestClient;


class NamespaceDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ExperienceRestClient
     */
    private $client;

    /**
     * @var \Gs2\Experience\Domain\Cache\NamespaceDomainCache
     */
    private $namespaceCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Experience\Domain\Cache\ExperienceModelMasterDomainCache
     */
    private $experienceModelMasterCache;

    /**
     * @var \Gs2\Experience\Domain\Cache\ExperienceModelDomainCache
     */
    private $experienceModelCache;

    /**
     * @var \Gs2\Experience\Domain\Cache\ThresholdMasterDomainCache
     */
    private $thresholdMasterCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Experience\Domain\Cache\NamespaceDomainCache $namespaceCache,
        string $namespaceName
    ) {
        $this->session = $session;
        $this->client = new Gs2ExperienceRestClient(
            $session
        );
        $this->namespaceCache = $namespaceCache;
        $this->namespaceName = $namespaceName;
        $this->experienceModelMasterCache = new \Gs2\Experience\Domain\Cache\ExperienceModelMasterDomainCache();
        $this->experienceModelCache = new \Gs2\Experience\Domain\Cache\ExperienceModelDomainCache();
        $this->thresholdMasterCache = new \Gs2\Experience\Domain\Cache\ThresholdMasterDomainCache();
    }

    public function getStatus(
        \Gs2\Experience\Request\GetNamespaceStatusRequest $request
    ): \Gs2\Experience\Result\GetNamespaceStatusResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Experience\Result\GetNamespaceStatusResult
         */
        $r = $this->client->getNamespaceStatus(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Experience\Request\GetNamespaceRequest $request
    ): \Gs2\Experience\Result\GetNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Experience\Result\GetNamespaceResult
         */
        $r = $this->client->getNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Experience\Request\UpdateNamespaceRequest $request
    ): \Gs2\Experience\Result\UpdateNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Experience\Result\UpdateNamespaceResult
         */
        $r = $this->client->updateNamespace(
            $request
        );
        $this->namespaceCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Experience\Request\DeleteNamespaceRequest $request
    ): \Gs2\Experience\Result\DeleteNamespaceResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Experience\Result\DeleteNamespaceResult
         */
        $r = $this->client->deleteNamespace(
            $request
        );
        $this->namespaceCache->delete($r->getItem());
        return $r;
    }

    public function createExperienceModelMaster(
        \Gs2\Experience\Request\CreateExperienceModelMasterRequest $request
    ): \Gs2\Experience\Result\CreateExperienceModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Experience\Result\CreateExperienceModelMasterResult
         */
        $r = $this->client->createExperienceModelMaster(
            $request
        );
        return $r;
    }

    public function createThresholdMaster(
        \Gs2\Experience\Request\CreateThresholdMasterRequest $request
    ): \Gs2\Experience\Result\CreateThresholdMasterResult {
        $request->setNamespaceName($this->namespaceName);
        /**
         * @var \Gs2\Experience\Result\CreateThresholdMasterResult
         */
        $r = $this->client->createThresholdMaster(
            $request
        );
        return $r;
    }

    public function experienceModelMasters(
    ): \Gs2\Experience\Domain\Iterator\DescribeExperienceModelMastersIterator {
        return new \Gs2\Experience\Domain\Iterator\DescribeExperienceModelMastersIterator(
            $this->experienceModelMasterCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function experienceModels(
    ): \Gs2\Experience\Domain\Iterator\DescribeExperienceModelsIterator {
        return new \Gs2\Experience\Domain\Iterator\DescribeExperienceModelsIterator(
            $this->experienceModelCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function thresholdMasters(
    ): \Gs2\Experience\Domain\Iterator\DescribeThresholdMastersIterator {
        return new \Gs2\Experience\Domain\Iterator\DescribeThresholdMastersIterator(
            $this->thresholdMasterCache,
            $this->client,
            $this->namespaceName
        );
    }

    public function currentExperienceMaster(
    ): CurrentExperienceMasterDomain {
        return new CurrentExperienceMasterDomain(
            $this->session,
            $this->namespaceName
        );
    }

    public function experienceModel(
        string $experienceName
    ): ExperienceModelDomain {
        return new ExperienceModelDomain(
            $this->session,
            $this->experienceModelCache,
            $this->namespaceName,
            $experienceName
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

    public function thresholdMaster(
        string $thresholdName
    ): ThresholdMasterDomain {
        return new ThresholdMasterDomain(
            $this->session,
            $this->thresholdMasterCache,
            $this->namespaceName,
            $thresholdName
        );
    }

    public function experienceModelMaster(
        string $experienceName
    ): ExperienceModelMasterDomain {
        return new ExperienceModelMasterDomain(
            $this->session,
            $this->experienceModelMasterCache,
            $this->namespaceName,
            $experienceName
        );
    }

}
