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


class UserDomain {

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
     * @var string
     */
    private $userId;

    /**
     * @var \Gs2\Showcase\Domain\Cache\ShowcaseDomainCache
     */
    private $showcaseCache;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        string $userId
    ) {
        $this->session = $session;
        $this->client = new Gs2ShowcaseRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->showcaseCache = new \Gs2\Showcase\Domain\Cache\ShowcaseDomainCache();
    }

    public function showcases(
    ): \Gs2\Showcase\Domain\Iterator\DescribeShowcasesByUserIdIterator {
        return new \Gs2\Showcase\Domain\Iterator\DescribeShowcasesByUserIdIterator(
            $this->showcaseCache,
            $this->client,
            $this->namespaceName,
            $this->userId
        );
    }

    public function showcase(
        string $showcaseName
    ): ShowcaseDomain {
        return new ShowcaseDomain(
            $this->session,
            $this->showcaseCache,
            $this->namespaceName,
            $this->userId,
            $showcaseName
        );
    }

}
