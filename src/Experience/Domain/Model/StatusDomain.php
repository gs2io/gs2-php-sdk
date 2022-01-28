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


class StatusDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ExperienceRestClient
     */
    private $client;

    /**
     * @var \Gs2\Experience\Domain\Cache\StatusDomainCache
     */
    private $statusCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $userId;

    /**
     * @var string
     */
    private $experienceName;

    /**
     * @var string
     */
    private $propertyId;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Experience\Domain\Cache\StatusDomainCache $statusCache,
        string $namespaceName,
        string $userId,
        string $experienceName,
        string $propertyId
    ) {
        $this->session = $session;
        $this->client = new Gs2ExperienceRestClient(
            $session
        );
        $this->statusCache = $statusCache;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->experienceName = $experienceName;
        $this->propertyId = $propertyId;
    }

    public function load(
        \Gs2\Experience\Request\GetStatusByUserIdRequest $request
    ): \Gs2\Experience\Result\GetStatusByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setExperienceName($this->experienceName);
        $request->setPropertyId($this->propertyId);
        /**
         * @var \Gs2\Experience\Result\GetStatusByUserIdResult
         */
        $r = $this->client->getStatusByUserId(
            $request
        );
        $this->statusCache->update($r->getItem());
        return $r;
    }

    public function getWithSignature(
        \Gs2\Experience\Request\GetStatusWithSignatureByUserIdRequest $request
    ): \Gs2\Experience\Result\GetStatusWithSignatureByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setExperienceName($this->experienceName);
        $request->setPropertyId($this->propertyId);
        /**
         * @var \Gs2\Experience\Result\GetStatusWithSignatureByUserIdResult
         */
        $r = $this->client->getStatusWithSignatureByUserId(
            $request
        );
        $this->statusCache->update($r->getItem());
        return $r;
    }

    public function addExperience(
        \Gs2\Experience\Request\AddExperienceByUserIdRequest $request
    ): \Gs2\Experience\Result\AddExperienceByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setExperienceName($this->experienceName);
        $request->setPropertyId($this->propertyId);
        /**
         * @var \Gs2\Experience\Result\AddExperienceByUserIdResult
         */
        $r = $this->client->addExperienceByUserId(
            $request
        );
        $this->statusCache->update($r->getItem());
        return $r;
    }

    public function setExperience(
        \Gs2\Experience\Request\SetExperienceByUserIdRequest $request
    ): \Gs2\Experience\Result\SetExperienceByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setExperienceName($this->experienceName);
        $request->setPropertyId($this->propertyId);
        /**
         * @var \Gs2\Experience\Result\SetExperienceByUserIdResult
         */
        $r = $this->client->setExperienceByUserId(
            $request
        );
        $this->statusCache->update($r->getItem());
        return $r;
    }

    public function addRankCap(
        \Gs2\Experience\Request\AddRankCapByUserIdRequest $request
    ): \Gs2\Experience\Result\AddRankCapByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setExperienceName($this->experienceName);
        $request->setPropertyId($this->propertyId);
        /**
         * @var \Gs2\Experience\Result\AddRankCapByUserIdResult
         */
        $r = $this->client->addRankCapByUserId(
            $request
        );
        $this->statusCache->update($r->getItem());
        return $r;
    }

    public function setRankCap(
        \Gs2\Experience\Request\SetRankCapByUserIdRequest $request
    ): \Gs2\Experience\Result\SetRankCapByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setExperienceName($this->experienceName);
        $request->setPropertyId($this->propertyId);
        /**
         * @var \Gs2\Experience\Result\SetRankCapByUserIdResult
         */
        $r = $this->client->setRankCapByUserId(
            $request
        );
        $this->statusCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Experience\Request\DeleteStatusByUserIdRequest $request
    ): \Gs2\Experience\Result\DeleteStatusByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setExperienceName($this->experienceName);
        $request->setPropertyId($this->propertyId);
        /**
         * @var \Gs2\Experience\Result\DeleteStatusByUserIdResult
         */
        $r = $this->client->deleteStatusByUserId(
            $request
        );
        $this->statusCache->delete($r->getItem());
        return $r;
    }

}
