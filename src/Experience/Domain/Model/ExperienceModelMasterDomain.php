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


class ExperienceModelMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ExperienceRestClient
     */
    private $client;

    /**
     * @var \Gs2\Experience\Domain\Cache\ExperienceModelMasterDomainCache
     */
    private $experienceModelMasterCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $experienceName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Experience\Domain\Cache\ExperienceModelMasterDomainCache $experienceModelMasterCache,
        string $namespaceName,
        string $experienceName
    ) {
        $this->session = $session;
        $this->client = new Gs2ExperienceRestClient(
            $session
        );
        $this->experienceModelMasterCache = $experienceModelMasterCache;
        $this->namespaceName = $namespaceName;
        $this->experienceName = $experienceName;
    }

    public function load(
        \Gs2\Experience\Request\GetExperienceModelMasterRequest $request
    ): \Gs2\Experience\Result\GetExperienceModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setExperienceName($this->experienceName);
        /**
         * @var \Gs2\Experience\Result\GetExperienceModelMasterResult
         */
        $r = $this->client->getExperienceModelMaster(
            $request
        );
        $this->experienceModelMasterCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Experience\Request\UpdateExperienceModelMasterRequest $request
    ): \Gs2\Experience\Result\UpdateExperienceModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setExperienceName($this->experienceName);
        /**
         * @var \Gs2\Experience\Result\UpdateExperienceModelMasterResult
         */
        $r = $this->client->updateExperienceModelMaster(
            $request
        );
        $this->experienceModelMasterCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Experience\Request\DeleteExperienceModelMasterRequest $request
    ): \Gs2\Experience\Result\DeleteExperienceModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setExperienceName($this->experienceName);
        /**
         * @var \Gs2\Experience\Result\DeleteExperienceModelMasterResult
         */
        $r = $this->client->deleteExperienceModelMaster(
            $request
        );
        $this->experienceModelMasterCache->delete($r->getItem());
        return $r;
    }

}
