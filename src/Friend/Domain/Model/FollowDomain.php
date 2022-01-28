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


class FollowDomain {

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
     * @var string
     */
    private $userId;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        string $userId
    ) {
        $this->session = $session;
        $this->client = new Gs2FriendRestClient(
            $session
        );
        $this->followUserCache = new \Gs2\Friend\Domain\Cache\FollowUserDomainCache();
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
    }

    public function load(
        \Gs2\Friend\Request\GetFollowByUserIdRequest $request
    ): \Gs2\Friend\Result\GetFollowByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Friend\Result\GetFollowByUserIdResult
         */
        $r = $this->client->getFollowByUserId(
            $request
        );
        return $r;
    }

    public function follow(
        \Gs2\Friend\Request\FollowByUserIdRequest $request
    ): \Gs2\Friend\Result\FollowByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Friend\Result\FollowByUserIdResult
         */
        $r = $this->client->followByUserId(
            $request
        );
        return $r;
    }

    public function unfollow(
        \Gs2\Friend\Request\UnfollowByUserIdRequest $request
    ): \Gs2\Friend\Result\UnfollowByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Friend\Result\UnfollowByUserIdResult
         */
        $r = $this->client->unfollowByUserId(
            $request
        );
        return $r;
    }

    public function list(
        ?bool $withProfile
    ): \Gs2\Friend\Domain\Iterator\DescribeFollowsByUserIdIterator {
        return new \Gs2\Friend\Domain\Iterator\DescribeFollowsByUserIdIterator(
            $this->followUserCache,
            $this->client,
            $this->namespaceName,
            $this->userId,
            $withProfile
        );
    }

}
