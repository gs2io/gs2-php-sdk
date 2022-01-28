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


class UserDomain {

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
     * @var string
     */
    private $userId;

    /**
     * @var \Gs2\Stamina\Domain\Cache\StaminaDomainCache
     */
    private $staminaCache;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        string $userId
    ) {
        $this->session = $session;
        $this->client = new Gs2StaminaRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->staminaCache = new \Gs2\Stamina\Domain\Cache\StaminaDomainCache();
    }

    public function staminas(
    ): \Gs2\Stamina\Domain\Iterator\DescribeStaminasByUserIdIterator {
        return new \Gs2\Stamina\Domain\Iterator\DescribeStaminasByUserIdIterator(
            $this->staminaCache,
            $this->client,
            $this->namespaceName,
            $this->userId
        );
    }

    public function stamina(
        string $staminaName
    ): StaminaDomain {
        return new StaminaDomain(
            $this->session,
            $this->staminaCache,
            $this->namespaceName,
            $this->userId,
            $staminaName
        );
    }

}
