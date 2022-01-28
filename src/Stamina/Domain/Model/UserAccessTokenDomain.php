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


class UserAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2StaminaRestClient
     */
    private $client;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Auth\Model\AccessToken
     */
    private $accessToken;

    /**
     * @var \Gs2\Stamina\Domain\Cache\StaminaDomainCache
     */
    private $staminaCache;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken
    ) {
        $this->session = $session;
        $this->client = new Gs2StaminaRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->staminaCache = new \Gs2\Stamina\Domain\Cache\StaminaDomainCache();
    }

    public function staminas(
    ): \Gs2\Stamina\Domain\Iterator\DescribeStaminasIterator {
        return new \Gs2\Stamina\Domain\Iterator\DescribeStaminasIterator(
            $this->staminaCache,
            $this->client,
            $this->namespaceName,
            $this->accessToken
        );
    }

    public function stamina(
        string $staminaName
    ): StaminaAccessTokenDomain {
        return new StaminaAccessTokenDomain(
            $this->session,
            $this->staminaCache,
            $this->namespaceName,
            $this->accessToken,
            $staminaName
        );
    }

}
