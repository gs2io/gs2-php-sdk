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


class UserDomain {

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
     * @var string
     */
    private $userId;

    /**
     * @var \Gs2\Inbox\Domain\Cache\MessageDomainCache
     */
    private $messageCache;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        string $userId
    ) {
        $this->session = $session;
        $this->client = new Gs2InboxRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->messageCache = new \Gs2\Inbox\Domain\Cache\MessageDomainCache();
    }

    public function sendMessage(
        \Gs2\Inbox\Request\SendMessageByUserIdRequest $request
    ): \Gs2\Inbox\Result\SendMessageByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Inbox\Result\SendMessageByUserIdResult
         */
        $r = $this->client->sendMessageByUserId(
            $request
        );
        return $r;
    }

    public function receiveGlobalMessage(
        \Gs2\Inbox\Request\ReceiveGlobalMessageByUserIdRequest $request
    ): \Gs2\Inbox\Result\ReceiveGlobalMessageByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Inbox\Result\ReceiveGlobalMessageByUserIdResult
         */
        $r = $this->client->receiveGlobalMessageByUserId(
            $request
        );
        return $r;
    }

    public function messages(
    ): \Gs2\Inbox\Domain\Iterator\DescribeMessagesByUserIdIterator {
        return new \Gs2\Inbox\Domain\Iterator\DescribeMessagesByUserIdIterator(
            $this->messageCache,
            $this->client,
            $this->namespaceName,
            $this->userId
        );
    }

    public function message(
        string $messageName
    ): MessageDomain {
        return new MessageDomain(
            $this->session,
            $this->messageCache,
            $this->namespaceName,
            $this->userId,
            $messageName
        );
    }

    public function received(
    ): ReceivedDomain {
        return new ReceivedDomain(
            $this->session,
            $this->namespaceName,
            $this->userId
        );
    }

}
