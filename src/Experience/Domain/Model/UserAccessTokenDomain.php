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

namespace Gs2\Experience\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Experience\Gs2ExperienceRestClient;


class UserAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ExperienceRestClient
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
     * @var \Gs2\Experience\Domain\Cache\StatusDomainCache
     */
    private $statusCache;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken
    ) {
        $this->session = $session;
        $this->client = new Gs2ExperienceRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->statusCache = new \Gs2\Experience\Domain\Cache\StatusDomainCache();
    }

    public function statuses(
        ?string $experienceName
    ): \Gs2\Experience\Domain\Iterator\DescribeStatusesIterator {
        return new \Gs2\Experience\Domain\Iterator\DescribeStatusesIterator(
            $this->statusCache,
            $this->client,
            $this->namespaceName,
            $experienceName,
            $this->accessToken
        );
    }

    public function status(
        string $experienceName,
        string $propertyId
    ): StatusAccessTokenDomain {
        return new StatusAccessTokenDomain(
            $this->session,
            $this->statusCache,
            $this->namespaceName,
            $this->accessToken,
            $experienceName,
            $propertyId
        );
    }

}
