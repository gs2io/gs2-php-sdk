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


class StaminaDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2StaminaRestClient
     */
    private $client;

    /**
     * @var \Gs2\Stamina\Domain\Cache\StaminaDomainCache
     */
    private $staminaCache;

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
    private $staminaName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Stamina\Domain\Cache\StaminaDomainCache $staminaCache,
        string $namespaceName,
        string $userId,
        string $staminaName
    ) {
        $this->session = $session;
        $this->client = new Gs2StaminaRestClient(
            $session
        );
        $this->staminaCache = $staminaCache;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->staminaName = $staminaName;
    }

    public function load(
        \Gs2\Stamina\Request\GetStaminaByUserIdRequest $request
    ): \Gs2\Stamina\Result\GetStaminaByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setStaminaName($this->staminaName);
        /**
         * @var \Gs2\Stamina\Result\GetStaminaByUserIdResult
         */
        $r = $this->client->getStaminaByUserId(
            $request
        );
        $this->staminaCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Stamina\Request\UpdateStaminaByUserIdRequest $request
    ): \Gs2\Stamina\Result\UpdateStaminaByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setStaminaName($this->staminaName);
        /**
         * @var \Gs2\Stamina\Result\UpdateStaminaByUserIdResult
         */
        $r = $this->client->updateStaminaByUserId(
            $request
        );
        $this->staminaCache->update($r->getItem());
        return $r;
    }

    public function consume(
        \Gs2\Stamina\Request\ConsumeStaminaByUserIdRequest $request
    ): \Gs2\Stamina\Result\ConsumeStaminaByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setStaminaName($this->staminaName);
        /**
         * @var \Gs2\Stamina\Result\ConsumeStaminaByUserIdResult
         */
        $r = $this->client->consumeStaminaByUserId(
            $request
        );
        $this->staminaCache->update($r->getItem());
        return $r;
    }

    public function recover(
        \Gs2\Stamina\Request\RecoverStaminaByUserIdRequest $request
    ): \Gs2\Stamina\Result\RecoverStaminaByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setStaminaName($this->staminaName);
        /**
         * @var \Gs2\Stamina\Result\RecoverStaminaByUserIdResult
         */
        $r = $this->client->recoverStaminaByUserId(
            $request
        );
        $this->staminaCache->update($r->getItem());
        return $r;
    }

    public function raiseMaxValue(
        \Gs2\Stamina\Request\RaiseMaxValueByUserIdRequest $request
    ): \Gs2\Stamina\Result\RaiseMaxValueByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setStaminaName($this->staminaName);
        /**
         * @var \Gs2\Stamina\Result\RaiseMaxValueByUserIdResult
         */
        $r = $this->client->raiseMaxValueByUserId(
            $request
        );
        $this->staminaCache->update($r->getItem());
        return $r;
    }

    public function setMaxValue(
        \Gs2\Stamina\Request\SetMaxValueByUserIdRequest $request
    ): \Gs2\Stamina\Result\SetMaxValueByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setStaminaName($this->staminaName);
        /**
         * @var \Gs2\Stamina\Result\SetMaxValueByUserIdResult
         */
        $r = $this->client->setMaxValueByUserId(
            $request
        );
        $this->staminaCache->update($r->getItem());
        return $r;
    }

    public function setRecoverInterval(
        \Gs2\Stamina\Request\SetRecoverIntervalByUserIdRequest $request
    ): \Gs2\Stamina\Result\SetRecoverIntervalByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setStaminaName($this->staminaName);
        /**
         * @var \Gs2\Stamina\Result\SetRecoverIntervalByUserIdResult
         */
        $r = $this->client->setRecoverIntervalByUserId(
            $request
        );
        $this->staminaCache->update($r->getItem());
        return $r;
    }

    public function setRecoverValue(
        \Gs2\Stamina\Request\SetRecoverValueByUserIdRequest $request
    ): \Gs2\Stamina\Result\SetRecoverValueByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setStaminaName($this->staminaName);
        /**
         * @var \Gs2\Stamina\Result\SetRecoverValueByUserIdResult
         */
        $r = $this->client->setRecoverValueByUserId(
            $request
        );
        $this->staminaCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Stamina\Request\DeleteStaminaByUserIdRequest $request
    ): \Gs2\Stamina\Result\DeleteStaminaByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setStaminaName($this->staminaName);
        /**
         * @var \Gs2\Stamina\Result\DeleteStaminaByUserIdResult
         */
        $r = $this->client->deleteStaminaByUserId(
            $request
        );
        return $r;
    }

}
