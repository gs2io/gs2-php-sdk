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


class StaminaAccessTokenDomain {

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
     * @var \Gs2\Auth\Model\AccessToken
     */
    private $accessToken;

    /**
     * @var string
     */
    private $staminaName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Stamina\Domain\Cache\StaminaDomainCache $staminaCache,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken,
        string $staminaName
    ) {
        $this->session = $session;
        $this->client = new Gs2StaminaRestClient(
            $session
        );
        $this->staminaCache = $staminaCache;
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->staminaName = $staminaName;
    }

    public function load(
        \Gs2\Stamina\Request\GetStaminaRequest $request
    ): \Gs2\Stamina\Result\GetStaminaResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setStaminaName($this->staminaName);
        /**
         * @var \Gs2\Stamina\Result\GetStaminaResult
         */
        $r = $this->client->getStamina(
            $request
        );
        $this->staminaCache->update($r->getItem());
        return $r;
    }

    public function consume(
        \Gs2\Stamina\Request\ConsumeStaminaRequest $request
    ): \Gs2\Stamina\Result\ConsumeStaminaResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setStaminaName($this->staminaName);
        /**
         * @var \Gs2\Stamina\Result\ConsumeStaminaResult
         */
        $r = $this->client->consumeStamina(
            $request
        );
        $this->staminaCache->update($r->getItem());
        return $r;
    }

    public function setMaxValueByStatus(
        \Gs2\Stamina\Request\SetMaxValueByStatusRequest $request
    ): \Gs2\Stamina\Result\SetMaxValueByStatusResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setStaminaName($this->staminaName);
        /**
         * @var \Gs2\Stamina\Result\SetMaxValueByStatusResult
         */
        $r = $this->client->setMaxValueByStatus(
            $request
        );
        $this->staminaCache->update($r->getItem());
        return $r;
    }

    public function setRecoverIntervalByStatus(
        \Gs2\Stamina\Request\SetRecoverIntervalByStatusRequest $request
    ): \Gs2\Stamina\Result\SetRecoverIntervalByStatusResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setStaminaName($this->staminaName);
        /**
         * @var \Gs2\Stamina\Result\SetRecoverIntervalByStatusResult
         */
        $r = $this->client->setRecoverIntervalByStatus(
            $request
        );
        $this->staminaCache->update($r->getItem());
        return $r;
    }

    public function setRecoverValueByStatus(
        \Gs2\Stamina\Request\SetRecoverValueByStatusRequest $request
    ): \Gs2\Stamina\Result\SetRecoverValueByStatusResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setStaminaName($this->staminaName);
        /**
         * @var \Gs2\Stamina\Result\SetRecoverValueByStatusResult
         */
        $r = $this->client->setRecoverValueByStatus(
            $request
        );
        $this->staminaCache->update($r->getItem());
        return $r;
    }

}
