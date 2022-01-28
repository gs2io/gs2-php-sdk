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

namespace Gs2\Ranking\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Ranking\Gs2RankingRestClient;


class SubscribeDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2RankingRestClient
     */
    private $client;

    /**
     * @var \Gs2\Ranking\Domain\Cache\SubscribeUserDomainCache
     */
    private $subscribeUserCache;

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
    private $categoryName;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        string $userId,
        string $categoryName
    ) {
        $this->session = $session;
        $this->client = new Gs2RankingRestClient(
            $session
        );
        $this->subscribeUserCache = new \Gs2\Ranking\Domain\Cache\SubscribeUserDomainCache();
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->categoryName = $categoryName;
    }

    public function subscribe(
        \Gs2\Ranking\Request\SubscribeByUserIdRequest $request
    ): \Gs2\Ranking\Result\SubscribeByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setCategoryName($this->categoryName);
        /**
         * @var \Gs2\Ranking\Result\SubscribeByUserIdResult
         */
        $r = $this->client->subscribeByUserId(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Ranking\Request\GetSubscribeByUserIdRequest $request
    ): \Gs2\Ranking\Result\GetSubscribeByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setCategoryName($this->categoryName);
        /**
         * @var \Gs2\Ranking\Result\GetSubscribeByUserIdResult
         */
        $r = $this->client->getSubscribeByUserId(
            $request
        );
        return $r;
    }

    public function unsubscribe(
        \Gs2\Ranking\Request\UnsubscribeByUserIdRequest $request
    ): \Gs2\Ranking\Result\UnsubscribeByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setCategoryName($this->categoryName);
        /**
         * @var \Gs2\Ranking\Result\UnsubscribeByUserIdResult
         */
        $r = $this->client->unsubscribeByUserId(
            $request
        );
        return $r;
    }

}
