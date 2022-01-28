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

namespace Gs2\Identifier\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Identifier\Gs2IdentifierRestClient;


class IdentifierDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2IdentifierRestClient
     */
    private $client;

    /**
     * @var \Gs2\Identifier\Domain\Cache\IdentifierDomainCache
     */
    private $identifierCache;

    /**
     * @var string
     */
    private $userName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Identifier\Domain\Cache\IdentifierDomainCache $identifierCache,
        string $userName
    ) {
        $this->session = $session;
        $this->client = new Gs2IdentifierRestClient(
            $session
        );
        $this->identifierCache = $identifierCache;
        $this->userName = $userName;
    }

    public function load(
        \Gs2\Identifier\Request\GetIdentifierRequest $request
    ): \Gs2\Identifier\Result\GetIdentifierResult {
        $request->setUserName($this->userName);
        /**
         * @var \Gs2\Identifier\Result\GetIdentifierResult
         */
        $r = $this->client->getIdentifier(
            $request
        );
        $this->identifierCache->update($r->getItem());
        return $r;
    }

    public function list(
    ): \Gs2\Identifier\Domain\Iterator\DescribeIdentifiersIterator {
        return new \Gs2\Identifier\Domain\Iterator\DescribeIdentifiersIterator(
            $this->identifierCache,
            $this->client,
            $this->userName
        );
    }

}
