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

namespace Gs2\Quest\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Quest\Gs2QuestRestClient;


class ProgressDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2QuestRestClient
     */
    private $client;

    /**
     * @var \Gs2\Quest\Domain\Cache\ProgressDomainCache
     */
    private $progressCache;

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
        \Gs2\Quest\Domain\Cache\ProgressDomainCache $progressCache,
        string $namespaceName,
        string $userId
    ) {
        $this->session = $session;
        $this->client = new Gs2QuestRestClient(
            $session
        );
        $this->progressCache = $progressCache;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
    }

    public function load(
        \Gs2\Quest\Request\GetProgressByUserIdRequest $request
    ): \Gs2\Quest\Result\GetProgressByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Quest\Result\GetProgressByUserIdResult
         */
        $r = $this->client->getProgressByUserId(
            $request
        );
        $this->progressCache->update($r->getItem());
        return $r;
    }

    public function start(
        \Gs2\Quest\Request\StartByUserIdRequest $request
    ): \Gs2\Quest\Result\StartByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Quest\Result\StartByUserIdResult
         */
        $r = $this->client->startByUserId(
            $request
        );
        return $r;
    }

    public function end(
        \Gs2\Quest\Request\EndByUserIdRequest $request
    ): \Gs2\Quest\Result\EndByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Quest\Result\EndByUserIdResult
         */
        $r = $this->client->endByUserId(
            $request
        );
        $this->progressCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Quest\Request\DeleteProgressByUserIdRequest $request
    ): \Gs2\Quest\Result\DeleteProgressByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Quest\Result\DeleteProgressByUserIdResult
         */
        $r = $this->client->deleteProgressByUserId(
            $request
        );
        $this->progressCache->delete($r->getItem());
        return $r;
    }

    public function list(
    ): \Gs2\Quest\Domain\Iterator\DescribeProgressesByUserIdIterator {
        return new \Gs2\Quest\Domain\Iterator\DescribeProgressesByUserIdIterator(
            $this->progressCache,
            $this->client,
            $this->namespaceName,
            $this->userId
        );
    }

}
