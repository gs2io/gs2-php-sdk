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


class ThresholdMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ExperienceRestClient
     */
    private $client;

    /**
     * @var \Gs2\Experience\Domain\Cache\ThresholdMasterDomainCache
     */
    private $thresholdMasterCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $thresholdName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Experience\Domain\Cache\ThresholdMasterDomainCache $thresholdMasterCache,
        string $namespaceName,
        string $thresholdName
    ) {
        $this->session = $session;
        $this->client = new Gs2ExperienceRestClient(
            $session
        );
        $this->thresholdMasterCache = $thresholdMasterCache;
        $this->namespaceName = $namespaceName;
        $this->thresholdName = $thresholdName;
    }

    public function load(
        \Gs2\Experience\Request\GetThresholdMasterRequest $request
    ): \Gs2\Experience\Result\GetThresholdMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setThresholdName($this->thresholdName);
        /**
         * @var \Gs2\Experience\Result\GetThresholdMasterResult
         */
        $r = $this->client->getThresholdMaster(
            $request
        );
        $this->thresholdMasterCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Experience\Request\UpdateThresholdMasterRequest $request
    ): \Gs2\Experience\Result\UpdateThresholdMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setThresholdName($this->thresholdName);
        /**
         * @var \Gs2\Experience\Result\UpdateThresholdMasterResult
         */
        $r = $this->client->updateThresholdMaster(
            $request
        );
        $this->thresholdMasterCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Experience\Request\DeleteThresholdMasterRequest $request
    ): \Gs2\Experience\Result\DeleteThresholdMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setThresholdName($this->thresholdName);
        /**
         * @var \Gs2\Experience\Result\DeleteThresholdMasterResult
         */
        $r = $this->client->deleteThresholdMaster(
            $request
        );
        $this->thresholdMasterCache->delete($r->getItem());
        return $r;
    }

}
