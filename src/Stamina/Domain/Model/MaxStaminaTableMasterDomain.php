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


class MaxStaminaTableMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2StaminaRestClient
     */
    private $client;

    /**
     * @var \Gs2\Stamina\Domain\Cache\MaxStaminaTableMasterDomainCache
     */
    private $maxStaminaTableMasterCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $maxStaminaTableName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Stamina\Domain\Cache\MaxStaminaTableMasterDomainCache $maxStaminaTableMasterCache,
        string $namespaceName,
        string $maxStaminaTableName
    ) {
        $this->session = $session;
        $this->client = new Gs2StaminaRestClient(
            $session
        );
        $this->maxStaminaTableMasterCache = $maxStaminaTableMasterCache;
        $this->namespaceName = $namespaceName;
        $this->maxStaminaTableName = $maxStaminaTableName;
    }

    public function load(
        \Gs2\Stamina\Request\GetMaxStaminaTableMasterRequest $request
    ): \Gs2\Stamina\Result\GetMaxStaminaTableMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setMaxStaminaTableName($this->maxStaminaTableName);
        /**
         * @var \Gs2\Stamina\Result\GetMaxStaminaTableMasterResult
         */
        $r = $this->client->getMaxStaminaTableMaster(
            $request
        );
        $this->maxStaminaTableMasterCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Stamina\Request\UpdateMaxStaminaTableMasterRequest $request
    ): \Gs2\Stamina\Result\UpdateMaxStaminaTableMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setMaxStaminaTableName($this->maxStaminaTableName);
        /**
         * @var \Gs2\Stamina\Result\UpdateMaxStaminaTableMasterResult
         */
        $r = $this->client->updateMaxStaminaTableMaster(
            $request
        );
        $this->maxStaminaTableMasterCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Stamina\Request\DeleteMaxStaminaTableMasterRequest $request
    ): \Gs2\Stamina\Result\DeleteMaxStaminaTableMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setMaxStaminaTableName($this->maxStaminaTableName);
        /**
         * @var \Gs2\Stamina\Result\DeleteMaxStaminaTableMasterResult
         */
        $r = $this->client->deleteMaxStaminaTableMaster(
            $request
        );
        $this->maxStaminaTableMasterCache->delete($r->getItem());
        return $r;
    }

}
