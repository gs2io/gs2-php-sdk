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

namespace Gs2\Formation\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Formation\Gs2FormationRestClient;


class MoldModelMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2FormationRestClient
     */
    private $client;

    /**
     * @var \Gs2\Formation\Domain\Cache\MoldModelMasterDomainCache
     */
    private $moldModelMasterCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $moldName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Formation\Domain\Cache\MoldModelMasterDomainCache $moldModelMasterCache,
        string $namespaceName,
        string $moldName
    ) {
        $this->session = $session;
        $this->client = new Gs2FormationRestClient(
            $session
        );
        $this->moldModelMasterCache = $moldModelMasterCache;
        $this->namespaceName = $namespaceName;
        $this->moldName = $moldName;
    }

    public function load(
        \Gs2\Formation\Request\GetMoldModelMasterRequest $request
    ): \Gs2\Formation\Result\GetMoldModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setMoldName($this->moldName);
        /**
         * @var \Gs2\Formation\Result\GetMoldModelMasterResult
         */
        $r = $this->client->getMoldModelMaster(
            $request
        );
        $this->moldModelMasterCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Formation\Request\UpdateMoldModelMasterRequest $request
    ): \Gs2\Formation\Result\UpdateMoldModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setMoldName($this->moldName);
        /**
         * @var \Gs2\Formation\Result\UpdateMoldModelMasterResult
         */
        $r = $this->client->updateMoldModelMaster(
            $request
        );
        $this->moldModelMasterCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Formation\Request\DeleteMoldModelMasterRequest $request
    ): \Gs2\Formation\Result\DeleteMoldModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setMoldName($this->moldName);
        /**
         * @var \Gs2\Formation\Result\DeleteMoldModelMasterResult
         */
        $r = $this->client->deleteMoldModelMaster(
            $request
        );
        $this->moldModelMasterCache->delete($r->getItem());
        return $r;
    }

}
