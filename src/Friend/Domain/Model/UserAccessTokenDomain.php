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


class UserAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2FriendRestClient
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
     * @var \Gs2\Friend\Domain\Cache\FollowUserDomainCache
     */
    private $followUserCache;

    /**
     * @var \Gs2\Friend\Domain\Cache\FriendUserDomainCache
     */
    private $friendUserCache;

    /**
     * @var \Gs2\Friend\Domain\Cache\FriendRequestDomainCache
     */
    private $friendRequestCache;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken
    ) {
        $this->session = $session;
        $this->client = new Gs2FriendRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->followUserCache = new \Gs2\Friend\Domain\Cache\FollowUserDomainCache();
        $this->friendUserCache = new \Gs2\Friend\Domain\Cache\FriendUserDomainCache();
        $this->friendRequestCache = new \Gs2\Friend\Domain\Cache\FriendRequestDomainCache();
    }

    public function profile(
    ): ProfileAccessTokenDomain {
        return new ProfileAccessTokenDomain(
            $this->session,
            $this->namespaceName,
            $this->accessToken
        );
    }

    public function blackList(
    ): BlackListAccessTokenDomain {
        return new BlackListAccessTokenDomain(
            $this->session,
            $this->namespaceName,
            $this->accessToken
        );
    }

    public function follow(
    ): FollowAccessTokenDomain {
        return new FollowAccessTokenDomain(
            $this->session,
            $this->namespaceName,
            $this->accessToken
        );
    }

    public function friend(
    ): FriendAccessTokenDomain {
        return new FriendAccessTokenDomain(
            $this->session,
            $this->namespaceName,
            $this->accessToken
        );
    }

    public function sendBox(
    ): SendBoxAccessTokenDomain {
        return new SendBoxAccessTokenDomain(
            $this->session,
            $this->namespaceName,
            $this->accessToken
        );
    }

    public function inbox(
    ): InboxAccessTokenDomain {
        return new InboxAccessTokenDomain(
            $this->session,
            $this->namespaceName,
            $this->accessToken
        );
    }

}
