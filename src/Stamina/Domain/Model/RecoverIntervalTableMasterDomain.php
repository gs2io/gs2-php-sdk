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


class RecoverIntervalTableMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2StaminaRestClient
     */
    private $client;

    /**
     * @var \Gs2\Stamina\Domain\Cache\RecoverIntervalTableMasterDomainCache
     */
    private $recoverIntervalTableMasterCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $recoverIntervalTableName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Stamina\Domain\Cache\RecoverIntervalTableMasterDomainCache $recoverIntervalTableMasterCache,
        string $namespaceName,
        string $recoverIntervalTableName
    ) {
        $this->session = $session;
        $this->client = new Gs2StaminaRestClient(
            $session
        );
        $this->recoverIntervalTableMasterCache = $recoverIntervalTableMasterCache;
        $this->namespaceName = $namespaceName;
        $this->recoverIntervalTableName = $recoverIntervalTableName;
    }

    public function load(
        \Gs2\Stamina\Request\GetRecoverIntervalTableMasterRequest $request
    ): \Gs2\Stamina\Result\GetRecoverIntervalTableMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setRecoverIntervalTableName($this->recoverIntervalTableName);
        /**
         * @var \Gs2\Stamina\Result\GetRecoverIntervalTableMasterResult
         */
        $r = $this->client->getRecoverIntervalTableMaster(
            $request
        );
        $this->recoverIntervalTableMasterCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Stamina\Request\UpdateRecoverIntervalTableMasterRequest $request
    ): \Gs2\Stamina\Result\UpdateRecoverIntervalTableMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setRecoverIntervalTableName($this->recoverIntervalTableName);
        /**
         * @var \Gs2\Stamina\Result\UpdateRecoverIntervalTableMasterResult
         */
        $r = $this->client->updateRecoverIntervalTableMaster(
            $request
        );
        $this->recoverIntervalTableMasterCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Stamina\Request\DeleteRecoverIntervalTableMasterRequest $request
    ): \Gs2\Stamina\Result\DeleteRecoverIntervalTableMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setRecoverIntervalTableName($this->recoverIntervalTableName);
        /**
         * @var \Gs2\Stamina\Result\DeleteRecoverIntervalTableMasterResult
         */
        $r = $this->client->deleteRecoverIntervalTableMaster(
            $request
        );
        $this->recoverIntervalTableMasterCache->delete($r->getItem());
        return $r;
    }

}
