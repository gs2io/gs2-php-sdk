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

namespace Gs2\Chat\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Chat\Gs2ChatRestClient;


class MessageDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ChatRestClient
     */
    private $client;

    /**
     * @var \Gs2\Chat\Domain\Cache\MessageDomainCache
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
    private $roomName;

    /**
     * @var string
     */
    private $messageName;

    /**
     * @var string
     */
    private $password;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Chat\Domain\Cache\MessageDomainCache $messageCache,
        string $namespaceName,
        string $userId,
        string $roomName,
        string $messageName,
        ?string $password
    ) {
        $this->session = $session;
        $this->client = new Gs2ChatRestClient(
            $session
        );
        $this->messageCache = $messageCache;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->roomName = $roomName;
        $this->messageName = $messageName;
        $this->password = $password;
    }

    public function load(
        \Gs2\Chat\Request\GetMessageByUserIdRequest $request
    ): \Gs2\Chat\Result\GetMessageByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setRoomName($this->roomName);
        $request->setMessageName($this->messageName);
        $request->setPassword($this->password);
        /**
         * @var \Gs2\Chat\Result\GetMessageByUserIdResult
         */
        $r = $this->client->getMessageByUserId(
            $request
        );
        $this->messageCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Chat\Request\DeleteMessageRequest $request
    ): \Gs2\Chat\Result\DeleteMessageResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setRoomName($this->roomName);
        $request->setMessageName($this->messageName);
        /**
         * @var \Gs2\Chat\Result\DeleteMessageResult
         */
        $r = $this->client->deleteMessage(
            $request
        );
        $this->messageCache->delete($r->getItem());
        return $r;
    }

}
