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

namespace Gs2\Dictionary\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Dictionary\Gs2DictionaryRestClient;


class UserDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2DictionaryRestClient
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
     * @var \Gs2\Dictionary\Domain\Cache\EntryDomainCache
     */
    private $entryCache;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        string $userId
    ) {
        $this->session = $session;
        $this->client = new Gs2DictionaryRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->entryCache = new \Gs2\Dictionary\Domain\Cache\EntryDomainCache();
    }

    public function addEntries(
        \Gs2\Dictionary\Request\AddEntriesByUserIdRequest $request
    ): \Gs2\Dictionary\Result\AddEntriesByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Dictionary\Result\AddEntriesByUserIdResult
         */
        $r = $this->client->addEntriesByUserId(
            $request
        );
        return $r;
    }

    public function reset(
        \Gs2\Dictionary\Request\ResetByUserIdRequest $request
    ): \Gs2\Dictionary\Result\ResetByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Dictionary\Result\ResetByUserIdResult
         */
        $r = $this->client->resetByUserId(
            $request
        );
        return $r;
    }

    public function entries(
    ): \Gs2\Dictionary\Domain\Iterator\DescribeEntriesByUserIdIterator {
        return new \Gs2\Dictionary\Domain\Iterator\DescribeEntriesByUserIdIterator(
            $this->entryCache,
            $this->client,
            $this->namespaceName,
            $this->userId
        );
    }

    public function entry(
        string $entryModelName
    ): EntryDomain {
        return new EntryDomain(
            $this->session,
            $this->entryCache,
            $this->namespaceName,
            $this->userId,
            $entryModelName
        );
    }

}
