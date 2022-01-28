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


class FormModelMasterDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2FormationRestClient
     */
    private $client;

    /**
     * @var \Gs2\Formation\Domain\Cache\FormModelMasterDomainCache
     */
    private $formModelMasterCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $formModelName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Formation\Domain\Cache\FormModelMasterDomainCache $formModelMasterCache,
        string $namespaceName,
        string $formModelName
    ) {
        $this->session = $session;
        $this->client = new Gs2FormationRestClient(
            $session
        );
        $this->formModelMasterCache = $formModelMasterCache;
        $this->namespaceName = $namespaceName;
        $this->formModelName = $formModelName;
    }

    public function load(
        \Gs2\Formation\Request\GetFormModelMasterRequest $request
    ): \Gs2\Formation\Result\GetFormModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setFormModelName($this->formModelName);
        /**
         * @var \Gs2\Formation\Result\GetFormModelMasterResult
         */
        $r = $this->client->getFormModelMaster(
            $request
        );
        $this->formModelMasterCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Formation\Request\UpdateFormModelMasterRequest $request
    ): \Gs2\Formation\Result\UpdateFormModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setFormModelName($this->formModelName);
        /**
         * @var \Gs2\Formation\Result\UpdateFormModelMasterResult
         */
        $r = $this->client->updateFormModelMaster(
            $request
        );
        $this->formModelMasterCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Formation\Request\DeleteFormModelMasterRequest $request
    ): \Gs2\Formation\Result\DeleteFormModelMasterResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setFormModelName($this->formModelName);
        /**
         * @var \Gs2\Formation\Result\DeleteFormModelMasterResult
         */
        $r = $this->client->deleteFormModelMaster(
            $request
        );
        $this->formModelMasterCache->delete($r->getItem());
        return $r;
    }

}
