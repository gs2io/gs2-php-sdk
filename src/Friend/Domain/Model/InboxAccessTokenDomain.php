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


class InboxAccessTokenDomain {

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
        $this->friendRequestCache = new \Gs2\Friend\Domain\Cache\FriendRequestDomainCache();
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
    }

    public function getReceiveRequest(
        \Gs2\Friend\Request\GetReceiveRequestRequest $request
    ): \Gs2\Friend\Result\GetReceiveRequestResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Friend\Result\GetReceiveRequestResult
         */
        $r = $this->client->getReceiveRequest(
            $request
        );
        return $r;
    }

    public function acceptRequest(
        \Gs2\Friend\Request\AcceptRequestRequest $request
    ): \Gs2\Friend\Result\AcceptRequestResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Friend\Result\AcceptRequestResult
         */
        $r = $this->client->acceptRequest(
            $request
        );
        return $r;
    }

    public function rejectRequest(
        \Gs2\Friend\Request\RejectRequestRequest $request
    ): \Gs2\Friend\Result\RejectRequestResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Friend\Result\RejectRequestResult
         */
        $r = $this->client->rejectRequest(
            $request
        );
        return $r;
    }

    public function list(
    ): \Gs2\Friend\Domain\Iterator\DescribeReceiveRequestsIterator {
        return new \Gs2\Friend\Domain\Iterator\DescribeReceiveRequestsIterator(
            $this->friendRequestCache,
            $this->client,
            $this->namespaceName,
            $this->accessToken
        );
    }

}
