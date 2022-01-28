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

namespace Gs2\News\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\News\Gs2NewsRestClient;


class UserAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2NewsRestClient
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
     * @var \Gs2\News\Domain\Cache\NewsDomainCache
     */
    private $newsCache;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken
    ) {
        $this->session = $session;
        $this->client = new Gs2NewsRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->newsCache = new \Gs2\News\Domain\Cache\NewsDomainCache();
    }

    public function wantGrant(
        \Gs2\News\Request\WantGrantRequest $request
    ): \Gs2\News\Result\WantGrantResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\News\Result\WantGrantResult
         */
        $r = $this->client->wantGrant(
            $request
        );
        return $r;
    }

    public function newses(
    ): \Gs2\News\Domain\Iterator\DescribeNewsIterator {
        return new \Gs2\News\Domain\Iterator\DescribeNewsIterator(
            $this->newsCache,
            $this->client,
            $this->namespaceName,
            $this->accessToken
        );
    }

}
