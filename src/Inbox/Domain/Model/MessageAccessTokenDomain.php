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


class MessageAccessTokenDomain {

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
     * @var \Gs2\Auth\Model\AccessToken
     */
    private $accessToken;

    /**
     * @var string
     */
    private $messageName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Inbox\Domain\Cache\MessageDomainCache $messageCache,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken,
        string $messageName
    ) {
        $this->session = $session;
        $this->client = new Gs2InboxRestClient(
            $session
        );
        $this->messageCache = $messageCache;
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->messageName = $messageName;
    }

    public function load(
        \Gs2\Inbox\Request\GetMessageRequest $request
    ): \Gs2\Inbox\Result\GetMessageResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setMessageName($this->messageName);
        /**
         * @var \Gs2\Inbox\Result\GetMessageResult
         */
        $r = $this->client->getMessage(
            $request
        );
        $this->messageCache->update($r->getItem());
        return $r;
    }

    public function open(
        \Gs2\Inbox\Request\OpenMessageRequest $request
    ): \Gs2\Inbox\Result\OpenMessageResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setMessageName($this->messageName);
        /**
         * @var \Gs2\Inbox\Result\OpenMessageResult
         */
        $r = $this->client->openMessage(
            $request
        );
        $this->messageCache->update($r->getItem());
        return $r;
    }

    public function read(
        \Gs2\Inbox\Request\ReadMessageRequest $request
    ): \Gs2\Inbox\Result\ReadMessageResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setMessageName($this->messageName);
        /**
         * @var \Gs2\Inbox\Result\ReadMessageResult
         */
        $r = $this->client->readMessage(
            $request
        );
        $this->messageCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Inbox\Request\DeleteMessageRequest $request
    ): \Gs2\Inbox\Result\DeleteMessageResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setMessageName($this->messageName);
        /**
         * @var \Gs2\Inbox\Result\DeleteMessageResult
         */
        $r = $this->client->deleteMessage(
            $request
        );
        return $r;
    }

}
