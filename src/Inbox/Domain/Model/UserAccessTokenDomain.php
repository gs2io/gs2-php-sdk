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

namespace Gs2\Inbox\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Inbox\Gs2InboxRestClient;


class UserAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2InboxRestClient
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
     * @var \Gs2\Inbox\Domain\Cache\MessageDomainCache
     */
    private $messageCache;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken
    ) {
        $this->session = $session;
        $this->client = new Gs2InboxRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->messageCache = new \Gs2\Inbox\Domain\Cache\MessageDomainCache();
    }

    public function receiveGlobalMessage(
        \Gs2\Inbox\Request\ReceiveGlobalMessageRequest $request
    ): \Gs2\Inbox\Result\ReceiveGlobalMessageResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Inbox\Result\ReceiveGlobalMessageResult
         */
        $r = $this->client->receiveGlobalMessage(
            $request
        );
        return $r;
    }

    public function messages(
    ): \Gs2\Inbox\Domain\Iterator\DescribeMessagesIterator {
        return new \Gs2\Inbox\Domain\Iterator\DescribeMessagesIterator(
            $this->messageCache,
            $this->client,
            $this->namespaceName,
            $this->accessToken
        );
    }

    public function message(
        string $messageName
    ): MessageAccessTokenDomain {
        return new MessageAccessTokenDomain(
            $this->session,
            $this->messageCache,
            $this->namespaceName,
            $this->accessToken,
            $messageName
        );
    }

    public function received(
    ): ReceivedAccessTokenDomain {
        return new ReceivedAccessTokenDomain(
            $this->session,
            $this->namespaceName,
            $this->accessToken
        );
    }

}
