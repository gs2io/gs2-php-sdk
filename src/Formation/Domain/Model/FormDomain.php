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


class FormDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2FormationRestClient
     */
    private $client;

    /**
     * @var \Gs2\Formation\Domain\Cache\FormDomainCache
     */
    private $formCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $userId;

    /**
     * @var string
     */
    private $moldName;

    /**
     * @var int
     */
    private $index;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Formation\Domain\Cache\FormDomainCache $formCache,
        string $namespaceName,
        string $userId,
        string $moldName,
        int $index
    ) {
        $this->session = $session;
        $this->client = new Gs2FormationRestClient(
            $session
        );
        $this->formCache = $formCache;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->moldName = $moldName;
        $this->index = $index;
    }

    public function load(
        \Gs2\Formation\Request\GetFormByUserIdRequest $request
    ): \Gs2\Formation\Result\GetFormByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setMoldName($this->moldName);
        $request->setIndex($this->index);
        /**
         * @var \Gs2\Formation\Result\GetFormByUserIdResult
         */
        $r = $this->client->getFormByUserId(
            $request
        );
        $this->formCache->update($r->getItem());
        return $r;
    }

    public function getWithSignature(
        \Gs2\Formation\Request\GetFormWithSignatureByUserIdRequest $request
    ): \Gs2\Formation\Result\GetFormWithSignatureByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setMoldName($this->moldName);
        $request->setIndex($this->index);
        /**
         * @var \Gs2\Formation\Result\GetFormWithSignatureByUserIdResult
         */
        $r = $this->client->getFormWithSignatureByUserId(
            $request
        );
        $this->formCache->update($r->getItem());
        return $r;
    }

    public function set(
        \Gs2\Formation\Request\SetFormByUserIdRequest $request
    ): \Gs2\Formation\Result\SetFormByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setMoldName($this->moldName);
        $request->setIndex($this->index);
        /**
         * @var \Gs2\Formation\Result\SetFormByUserIdResult
         */
        $r = $this->client->setFormByUserId(
            $request
        );
        $this->formCache->update($r->getItem());
        return $r;
    }

    public function acquireActionsToProperties(
        \Gs2\Formation\Request\AcquireActionsToFormPropertiesRequest $request
    ): \Gs2\Formation\Result\AcquireActionsToFormPropertiesResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setMoldName($this->moldName);
        $request->setIndex($this->index);
        /**
         * @var \Gs2\Formation\Result\AcquireActionsToFormPropertiesResult
         */
        $r = $this->client->acquireActionsToFormProperties(
            $request
        );
        $this->formCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Formation\Request\DeleteFormByUserIdRequest $request
    ): \Gs2\Formation\Result\DeleteFormByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setMoldName($this->moldName);
        $request->setIndex($this->index);
        /**
         * @var \Gs2\Formation\Result\DeleteFormByUserIdResult
         */
        $r = $this->client->deleteFormByUserId(
            $request
        );
        $this->formCache->delete($r->getItem());
        return $r;
    }

}
