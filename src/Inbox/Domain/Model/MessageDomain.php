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


class MessageDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2InboxRestClient
     */
    private $client;

    /**
     * @var \Gs2\Inbox\Domain\Cache\MessageDomainCache
     */
    private $messageCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $userId;

    /**
     * @var string
     */
    private $messageName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Inbox\Domain\Cache\MessageDomainCache $messageCache,
        string $namespaceName,
        string $userId,
        string $messageName
    ) {
        $this->session = $session;
        $this->client = new Gs2InboxRestClient(
            $session
        );
        $this->messageCache = $messageCache;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->messageName = $messageName;
    }

    public function load(
        \Gs2\Inbox\Request\GetMessageByUserIdRequest $request
    ): \Gs2\Inbox\Result\GetMessageByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setMessageName($this->messageName);
        /**
         * @var \Gs2\Inbox\Result\GetMessageByUserIdResult
         */
        $r = $this->client->getMessageByUserId(
            $request
        );
        $this->messageCache->update($r->getItem());
        return $r;
    }

    public function open(
        \Gs2\Inbox\Request\OpenMessageByUserIdRequest $request
    ): \Gs2\Inbox\Result\OpenMessageByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setMessageName($this->messageName);
        /**
         * @var \Gs2\Inbox\Result\OpenMessageByUserIdResult
         */
        $r = $this->client->openMessageByUserId(
            $request
        );
        $this->messageCache->update($r->getItem());
        return $r;
    }

    public function read(
        \Gs2\Inbox\Request\ReadMessageByUserIdRequest $request
    ): \Gs2\Inbox\Result\ReadMessageByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setMessageName($this->messageName);
        /**
         * @var \Gs2\Inbox\Result\ReadMessageByUserIdResult
         */
        $r = $this->client->readMessageByUserId(
            $request
        );
        $this->messageCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Inbox\Request\DeleteMessageByUserIdRequest $request
    ): \Gs2\Inbox\Result\DeleteMessageByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setMessageName($this->messageName);
        /**
         * @var \Gs2\Inbox\Result\DeleteMessageByUserIdResult
         */
        $r = $this->client->deleteMessageByUserId(
            $request
        );
        return $r;
    }

}
