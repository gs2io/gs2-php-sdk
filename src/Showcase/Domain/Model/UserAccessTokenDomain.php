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

namespace Gs2\Showcase\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Showcase\Gs2ShowcaseRestClient;


class UserAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ShowcaseRestClient
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
     * @var \Gs2\Showcase\Domain\Cache\ShowcaseDomainCache
     */
    private $showcaseCache;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken
    ) {
        $this->session = $session;
        $this->client = new Gs2ShowcaseRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->showcaseCache = new \Gs2\Showcase\Domain\Cache\ShowcaseDomainCache();
    }

    public function showcases(
    ): \Gs2\Showcase\Domain\Iterator\DescribeShowcasesIterator {
        return new \Gs2\Showcase\Domain\Iterator\DescribeShowcasesIterator(
            $this->showcaseCache,
            $this->client,
            $this->namespaceName,
            $this->accessToken
        );
    }

    public function showcase(
        string $showcaseName
    ): ShowcaseAccessTokenDomain {
        return new ShowcaseAccessTokenDomain(
            $this->session,
            $this->showcaseCache,
            $this->namespaceName,
            $this->accessToken,
            $showcaseName
        );
    }

}