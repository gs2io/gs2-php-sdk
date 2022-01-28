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


class BlackListAccessTokenDomain {

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
    }

    public function register(
        \Gs2\Friend\Request\RegisterBlackListRequest $request
    ): \Gs2\Friend\Result\RegisterBlackListResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Friend\Result\RegisterBlackListResult
         */
        $r = $this->client->registerBlackList(
            $request
        );
        return $r;
    }

    public function unregister(
        \Gs2\Friend\Request\UnregisterBlackListRequest $request
    ): \Gs2\Friend\Result\UnregisterBlackListResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Friend\Result\UnregisterBlackListResult
         */
        $r = $this->client->unregisterBlackList(
            $request
        );
        return $r;
    }

    public function list(
    ): \Gs2\Friend\Domain\Iterator\DescribeBlackListIterator {
        return new \Gs2\Friend\Domain\Iterator\DescribeBlackListIterator(
            $this->client,
            $this->namespaceName,
            $this->accessToken
        );
    }

}
