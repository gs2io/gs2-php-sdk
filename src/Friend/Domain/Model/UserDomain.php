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


class UserDomain {

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
     * @var string
     */
    private $userId;

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
        string $userId
    ) {
        $this->session = $session;
        $this->client = new Gs2FriendRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->followUserCache = new \Gs2\Friend\Domain\Cache\FollowUserDomainCache();
        $this->friendUserCache = new \Gs2\Friend\Domain\Cache\FriendUserDomainCache();
        $this->friendRequestCache = new \Gs2\Friend\Domain\Cache\FriendRequestDomainCache();
    }

    public function profile(
    ): ProfileDomain {
        return new ProfileDomain(
            $this->session,
            $this->namespaceName,
            $this->userId
        );
    }

    public function blackList(
    ): BlackListDomain {
        return new BlackListDomain(
            $this->session,
            $this->namespaceName,
            $this->userId
        );
    }

    public function follow(
    ): FollowDomain {
        return new FollowDomain(
            $this->session,
            $this->namespaceName,
            $this->userId
        );
    }

    public function friend(
    ): FriendDomain {
        return new FriendDomain(
            $this->session,
            $this->namespaceName,
            $this->userId
        );
    }

    public function sendBox(
    ): SendBoxDomain {
        return new SendBoxDomain(
            $this->session,
            $this->namespaceName,
            $this->userId
        );
    }

    public function inbox(
    ): InboxDomain {
        return new InboxDomain(
            $this->session,
            $this->namespaceName,
            $this->userId
        );
    }

}
