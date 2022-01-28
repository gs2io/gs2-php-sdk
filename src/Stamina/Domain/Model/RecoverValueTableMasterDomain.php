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


class RecoverValueTableMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2StaminaRestClient
     */
    private $client;

    /**
     * @var \Gs2\Stamina\Domain\Cache\RecoverValueTableMasterDomainCache
     */
    private $recoverValueTableMasterCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $recoverValueTableName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Stamina\Domain\Cache\RecoverValueTableMasterDomainCache $recoverValueTableMasterCache,
        string $namespaceName,
        string $recoverValueTableName
    ) {
        $this->session = $session;
        $this->client = new Gs2StaminaRestClient(
            $session
        );
        $this->recoverValueTableMasterCache = $recoverValueTableMasterCache;
        $this->namespaceName = $namespaceName;
        $this->recoverValueTableName = $recoverValueTableName;
    }

    public function load(
        \Gs2\Stamina\Request\GetRecoverValueTableMasterRequest $request
    ): \Gs2\Stamina\Result\GetRecoverValueTableMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setRecoverValueTableName($this->recoverValueTableName);
        /**
         * @var \Gs2\Stamina\Result\GetRecoverValueTableMasterResult
         */
        $r = $this->client->getRecoverValueTableMaster(
            $request
        );
        $this->recoverValueTableMasterCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Stamina\Request\UpdateRecoverValueTableMasterRequest $request
    ): \Gs2\Stamina\Result\UpdateRecoverValueTableMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setRecoverValueTableName($this->recoverValueTableName);
        /**
         * @var \Gs2\Stamina\Result\UpdateRecoverValueTableMasterResult
         */
        $r = $this->client->updateRecoverValueTableMaster(
            $request
        );
        $this->recoverValueTableMasterCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Stamina\Request\DeleteRecoverValueTableMasterRequest $request
    ): \Gs2\Stamina\Result\DeleteRecoverValueTableMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setRecoverValueTableName($this->recoverValueTableName);
        /**
         * @var \Gs2\Stamina\Result\DeleteRecoverValueTableMasterResult
         */
        $r = $this->client->deleteRecoverValueTableMaster(
            $request
        );
        $this->recoverValueTableMasterCache->delete($r->getItem());
        return $r;
    }

}
