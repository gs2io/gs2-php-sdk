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


class ExperienceModelDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ExperienceRestClient
     */
    private $client;

    /**
     * @var \Gs2\Experience\Domain\Cache\ExperienceModelDomainCache
     */
    private $experienceModelCache;

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
        \Gs2\Experience\Domain\Cache\ExperienceModelDomainCache $experienceModelCache,
        string $namespaceName,
        string $experienceName
    ) {
        $this->session = $session;
        $this->client = new Gs2ExperienceRestClient(
            $session
        );
        $this->experienceModelCache = $experienceModelCache;
        $this->namespaceName = $namespaceName;
        $this->experienceName = $experienceName;
    }

    public function load(
        \Gs2\Experience\Request\GetExperienceModelRequest $request
    ): \Gs2\Experience\Result\GetExperienceModelResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setExperienceName($this->experienceName);
        /**
         * @var \Gs2\Experience\Result\GetExperienceModelResult
         */
        $r = $this->client->getExperienceModel(
            $request
        );
        $this->experienceModelCache->update($r->getItem());
        return $r;
    }

}
