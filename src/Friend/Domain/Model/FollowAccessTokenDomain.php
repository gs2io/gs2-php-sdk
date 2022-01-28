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

namespace Gs2\Friend\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Friend\Gs2FriendRestClient;


class FollowAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2FriendRestClient
     */
    private $client;

    /**
     * @var \Gs2\Friend\Domain\Cache\FollowUserDomainCache
     */
    private $followUserCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Auth\Model\AccessToken
     */
    private $accessToken;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken
    ) {
        $this->session = $session;
        $this->client = new Gs2FriendRestClient(
            $session
        );
        $this->followUserCache = new \Gs2\Friend\Domain\Cache\FollowUserDomainCache();
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
    }

    public function load(
        \Gs2\Friend\Request\GetFollowRequest $request
    ): \Gs2\Friend\Result\GetFollowResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Friend\Result\GetFollowResult
         */
        $r = $this->client->getFollow(
            $request
        );
        return $r;
    }

    public function follow(
        \Gs2\Friend\Request\FollowRequest $request
    ): \Gs2\Friend\Result\FollowResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Friend\Result\FollowResult
         */
        $r = $this->client->follow(
            $request
        );
        return $r;
    }

    public function unfollow(
        \Gs2\Friend\Request\UnfollowRequest $request
    ): \Gs2\Friend\Result\UnfollowResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Friend\Result\UnfollowResult
         */
        $r = $this->client->unfollow(
            $request
        );
        return $r;
    }

    public function list(
        ?bool $withProfile
    ): \Gs2\Friend\Domain\Iterator\DescribeFollowsIterator {
        return new \Gs2\Friend\Domain\Iterator\DescribeFollowsIterator(
            $this->followUserCache,
            $this->client,
            $this->namespaceName,
            $this->accessToken,
            $withProfile
        );
    }

}
