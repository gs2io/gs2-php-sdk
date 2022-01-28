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


class StaminaModelMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2StaminaRestClient
     */
    private $client;

    /**
     * @var \Gs2\Stamina\Domain\Cache\StaminaModelMasterDomainCache
     */
    private $staminaModelMasterCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $staminaName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Stamina\Domain\Cache\StaminaModelMasterDomainCache $staminaModelMasterCache,
        string $namespaceName,
        string $staminaName
    ) {
        $this->session = $session;
        $this->client = new Gs2StaminaRestClient(
            $session
        );
        $this->staminaModelMasterCache = $staminaModelMasterCache;
        $this->namespaceName = $namespaceName;
        $this->staminaName = $staminaName;
    }

    public function load(
        \Gs2\Stamina\Request\GetStaminaModelMasterRequest $request
    ): \Gs2\Stamina\Result\GetStaminaModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setStaminaName($this->staminaName);
        /**
         * @var \Gs2\Stamina\Result\GetStaminaModelMasterResult
         */
        $r = $this->client->getStaminaModelMaster(
            $request
        );
        $this->staminaModelMasterCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Stamina\Request\UpdateStaminaModelMasterRequest $request
    ): \Gs2\Stamina\Result\UpdateStaminaModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setStaminaName($this->staminaName);
        /**
         * @var \Gs2\Stamina\Result\UpdateStaminaModelMasterResult
         */
        $r = $this->client->updateStaminaModelMaster(
            $request
        );
        $this->staminaModelMasterCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Stamina\Request\DeleteStaminaModelMasterRequest $request
    ): \Gs2\Stamina\Result\DeleteStaminaModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setStaminaName($this->staminaName);
        /**
         * @var \Gs2\Stamina\Result\DeleteStaminaModelMasterResult
         */
        $r = $this->client->deleteStaminaModelMaster(
            $request
        );
        $this->staminaModelMasterCache->delete($r->getItem());
        return $r;
    }

}
