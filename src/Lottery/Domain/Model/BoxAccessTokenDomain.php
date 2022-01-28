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

namespace Gs2\Lottery\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Lottery\Gs2LotteryRestClient;


class BoxAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2LotteryRestClient
     */
    private $client;

    /**
     * @var \Gs2\Lottery\Domain\Cache\BoxDomainCache
     */
    private $boxCache;

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
    private $prizeTableName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Lottery\Domain\Cache\BoxDomainCache $boxCache,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken,
        string $prizeTableName
    ) {
        $this->session = $session;
        $this->client = new Gs2LotteryRestClient(
            $session
        );
        $this->boxCache = $boxCache;
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->prizeTableName = $prizeTableName;
    }

    public function load(
        \Gs2\Lottery\Request\GetBoxRequest $request
    ): \Gs2\Lottery\Result\GetBoxResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setPrizeTableName($this->prizeTableName);
        /**
         * @var \Gs2\Lottery\Result\GetBoxResult
         */
        $r = $this->client->getBox(
            $request
        );
        return $r;
    }

    public function reset(
        \Gs2\Lottery\Request\ResetBoxRequest $request
    ): \Gs2\Lottery\Result\ResetBoxResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setPrizeTableName($this->prizeTableName);
        /**
         * @var \Gs2\Lottery\Result\ResetBoxResult
         */
        $r = $this->client->resetBox(
            $request
        );
        return $r;
    }

}
