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


class InboxDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2FriendRestClient
     */
    private $client;

    /**
     * @var \Gs2\Friend\Domain\Cache\FriendRequestDomainCache
     */
    private $friendRequestCache;

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
        $this->friendRequestCache = new \Gs2\Friend\Domain\Cache\FriendRequestDomainCache();
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
    }

    public function getReceiveRequest(
        \Gs2\Friend\Request\GetReceiveRequestByUserIdRequest $request
    ): \Gs2\Friend\Result\GetReceiveRequestByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Friend\Result\GetReceiveRequestByUserIdResult
         */
        $r = $this->client->getReceiveRequestByUserId(
            $request
        );
        return $r;
    }

    public function acceptRequest(
        \Gs2\Friend\Request\AcceptRequestByUserIdRequest $request
    ): \Gs2\Friend\Result\AcceptRequestByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Friend\Result\AcceptRequestByUserIdResult
         */
        $r = $this->client->acceptRequestByUserId(
            $request
        );
        return $r;
    }

    public function rejectRequest(
        \Gs2\Friend\Request\RejectRequestByUserIdRequest $request
    ): \Gs2\Friend\Result\RejectRequestByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Friend\Result\RejectRequestByUserIdResult
         */
        $r = $this->client->rejectRequestByUserId(
            $request
        );
        return $r;
    }

    public function list(
    ): \Gs2\Friend\Domain\Iterator\DescribeReceiveRequestsByUserIdIterator {
        return new \Gs2\Friend\Domain\Iterator\DescribeReceiveRequestsByUserIdIterator(
            $this->friendRequestCache,
            $this->client,
            $this->namespaceName,
            $this->userId
        );
    }

}
