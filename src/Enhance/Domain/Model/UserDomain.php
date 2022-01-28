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

namespace Gs2\Enhance\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Enhance\Gs2EnhanceRestClient;


class UserDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2EnhanceRestClient
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
     * @var \Gs2\Enhance\Domain\Cache\ProgressDomainCache
     */
    private $progressCache;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        string $userId
    ) {
        $this->session = $session;
        $this->client = new Gs2EnhanceRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->progressCache = new \Gs2\Enhance\Domain\Cache\ProgressDomainCache();
    }

    public function directEnhance(
        \Gs2\Enhance\Request\DirectEnhanceByUserIdRequest $request
    ): \Gs2\Enhance\Result\DirectEnhanceByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Enhance\Result\DirectEnhanceByUserIdResult
         */
        $r = $this->client->directEnhanceByUserId(
            $request
        );
        return $r;
    }

    public function createProgress(
        \Gs2\Enhance\Request\CreateProgressByUserIdRequest $request
    ): \Gs2\Enhance\Result\CreateProgressByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Enhance\Result\CreateProgressByUserIdResult
         */
        $r = $this->client->createProgressByUserId(
            $request
        );
        return $r;
    }

    public function start(
        \Gs2\Enhance\Request\StartByUserIdRequest $request
    ): \Gs2\Enhance\Result\StartByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Enhance\Result\StartByUserIdResult
         */
        $r = $this->client->startByUserId(
            $request
        );
        return $r;
    }

    public function end(
        \Gs2\Enhance\Request\EndByUserIdRequest $request
    ): \Gs2\Enhance\Result\EndByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Enhance\Result\EndByUserIdResult
         */
        $r = $this->client->endByUserId(
            $request
        );
        return $r;
    }

    public function deleteProgress(
        \Gs2\Enhance\Request\DeleteProgressByUserIdRequest $request
    ): \Gs2\Enhance\Result\DeleteProgressByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Enhance\Result\DeleteProgressByUserIdResult
         */
        $r = $this->client->deleteProgressByUserId(
            $request
        );
        return $r;
    }

    public function progress(
    ): ProgressDomain {
        return new ProgressDomain(
            $this->session,
            $this->progressCache,
            $this->namespaceName,
            $this->userId
        );
    }

}
