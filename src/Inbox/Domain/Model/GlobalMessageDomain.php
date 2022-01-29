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


class GlobalMessageDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2InboxRestClient
     */
    private $client;

    /**
     * @var \Gs2\Inbox\Domain\Cache\GlobalMessageDomainCache
     */
    private $globalMessageCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $globalMessageName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Inbox\Domain\Cache\GlobalMessageDomainCache $globalMessageCache,
        string $namespaceName,
        string $globalMessageName
    ) {
        $this->session = $session;
        $this->client = new Gs2InboxRestClient(
            $session
        );
        $this->globalMessageCache = $globalMessageCache;
        $this->namespaceName = $namespaceName;
        $this->globalMessageName = $globalMessageName;
    }

    public function load(
        \Gs2\Inbox\Request\GetGlobalMessageRequest $request
    ): \Gs2\Inbox\Result\GetGlobalMessageResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setGlobalMessageName($this->globalMessageName);
        /**
         * @var \Gs2\Inbox\Result\GetGlobalMessageResult
         */
        $r = $this->client->getGlobalMessage(
            $request
        );
        $this->globalMessageCache->update($r->getItem());
        return $r;
    }

}