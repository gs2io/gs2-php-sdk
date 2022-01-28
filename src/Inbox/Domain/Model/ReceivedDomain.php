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


class ReceivedDomain {

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
    }

    public function load(
        \Gs2\Inbox\Request\GetReceivedByUserIdRequest $request
    ): \Gs2\Inbox\Result\GetReceivedByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Inbox\Result\GetReceivedByUserIdResult
         */
        $r = $this->client->getReceivedByUserId(
            $request
        );
        return $r;
    }

    public function update(
        \Gs2\Inbox\Request\UpdateReceivedByUserIdRequest $request
    ): \Gs2\Inbox\Result\UpdateReceivedByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Inbox\Result\UpdateReceivedByUserIdResult
         */
        $r = $this->client->updateReceivedByUserId(
            $request
        );
        return $r;
    }

    public function delete(
        \Gs2\Inbox\Request\DeleteReceivedByUserIdRequest $request
    ): \Gs2\Inbox\Result\DeleteReceivedByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Inbox\Result\DeleteReceivedByUserIdResult
         */
        $r = $this->client->deleteReceivedByUserId(
            $request
        );
        return $r;
    }

}
