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


class SendBoxAccessTokenDomain {

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

    public function getSendRequest(
        \Gs2\Friend\Request\GetSendRequestRequest $request
    ): \Gs2\Friend\Result\GetSendRequestResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Friend\Result\GetSendRequestResult
         */
        $r = $this->client->getSendRequest(
            $request
        );
        return $r;
    }

    public function sendRequest(
        \Gs2\Friend\Request\SendRequestRequest $request
    ): \Gs2\Friend\Result\SendRequestResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Friend\Result\SendRequestResult
         */
        $r = $this->client->sendRequest(
            $request
        );
        return $r;
    }

    public function deleteRequest(
        \Gs2\Friend\Request\DeleteRequestRequest $request
    ): \Gs2\Friend\Result\DeleteRequestResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Friend\Result\DeleteRequestResult
         */
        $r = $this->client->deleteRequest(
            $request
        );
        return $r;
    }

    public function list(
    ): \Gs2\Friend\Domain\Iterator\DescribeSendRequestsIterator {
        return new \Gs2\Friend\Domain\Iterator\DescribeSendRequestsIterator(
            $this->friendRequestCache,
            $this->client,
            $this->namespaceName,
            $this->accessToken
        );
    }

}
