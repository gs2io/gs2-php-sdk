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


class FriendDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2FriendRestClient
     */
    private $client;

    /**
     * @var \Gs2\Friend\Domain\Cache\FriendUserDomainCache
     */
    private $friendUserCache;

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
        $this->friendUserCache = new \Gs2\Friend\Domain\Cache\FriendUserDomainCache();
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
    }

    public function load(
        \Gs2\Friend\Request\GetFriendByUserIdRequest $request
    ): \Gs2\Friend\Result\GetFriendByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Friend\Result\GetFriendByUserIdResult
         */
        $r = $this->client->getFriendByUserId(
            $request
        );
        return $r;
    }

    public function delete(
        \Gs2\Friend\Request\DeleteFriendByUserIdRequest $request
    ): \Gs2\Friend\Result\DeleteFriendByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Friend\Result\DeleteFriendByUserIdResult
         */
        $r = $this->client->deleteFriendByUserId(
            $request
        );
        return $r;
    }

    public function list(
        ?bool $withProfile
    ): \Gs2\Friend\Domain\Iterator\DescribeFriendsByUserIdIterator {
        return new \Gs2\Friend\Domain\Iterator\DescribeFriendsByUserIdIterator(
            $this->friendUserCache,
            $this->client,
            $this->namespaceName,
            $this->userId,
            $withProfile
        );
    }

}
