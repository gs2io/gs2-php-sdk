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

namespace Gs2\Limit\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Limit\Gs2LimitRestClient;


class LimitModelMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2LimitRestClient
     */
    private $client;

    /**
     * @var \Gs2\Limit\Domain\Cache\LimitModelMasterDomainCache
     */
    private $limitModelMasterCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $limitName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Limit\Domain\Cache\LimitModelMasterDomainCache $limitModelMasterCache,
        string $namespaceName,
        string $limitName
    ) {
        $this->session = $session;
        $this->client = new Gs2LimitRestClient(
            $session
        );
        $this->limitModelMasterCache = $limitModelMasterCache;
        $this->namespaceName = $namespaceName;
        $this->limitName = $limitName;
    }

    public function load(
        \Gs2\Limit\Request\GetLimitModelMasterRequest $request
    ): \Gs2\Limit\Result\GetLimitModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setLimitName($this->limitName);
        /**
         * @var \Gs2\Limit\Result\GetLimitModelMasterResult
         */
        $r = $this->client->getLimitModelMaster(
            $request
        );
        $this->limitModelMasterCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Limit\Request\UpdateLimitModelMasterRequest $request
    ): \Gs2\Limit\Result\UpdateLimitModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setLimitName($this->limitName);
        /**
         * @var \Gs2\Limit\Result\UpdateLimitModelMasterResult
         */
        $r = $this->client->updateLimitModelMaster(
            $request
        );
        $this->limitModelMasterCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Limit\Request\DeleteLimitModelMasterRequest $request
    ): \Gs2\Limit\Result\DeleteLimitModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setLimitName($this->limitName);
        /**
         * @var \Gs2\Limit\Result\DeleteLimitModelMasterResult
         */
        $r = $this->client->deleteLimitModelMaster(
            $request
        );
        $this->limitModelMasterCache->delete($r->getItem());
        return $r;
    }

}
