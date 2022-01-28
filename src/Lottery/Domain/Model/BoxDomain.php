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


class BoxDomain {

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
     * @var string
     */
    private $userId;

    /**
     * @var string
     */
    private $prizeTableName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Lottery\Domain\Cache\BoxDomainCache $boxCache,
        string $namespaceName,
        string $userId,
        string $prizeTableName
    ) {
        $this->session = $session;
        $this->client = new Gs2LotteryRestClient(
            $session
        );
        $this->boxCache = $boxCache;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->prizeTableName = $prizeTableName;
    }

    public function load(
        \Gs2\Lottery\Request\GetBoxByUserIdRequest $request
    ): \Gs2\Lottery\Result\GetBoxByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setPrizeTableName($this->prizeTableName);
        /**
         * @var \Gs2\Lottery\Result\GetBoxByUserIdResult
         */
        $r = $this->client->getBoxByUserId(
            $request
        );
        return $r;
    }

    public function getRaw(
        \Gs2\Lottery\Request\GetRawBoxByUserIdRequest $request
    ): \Gs2\Lottery\Result\GetRawBoxByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setPrizeTableName($this->prizeTableName);
        /**
         * @var \Gs2\Lottery\Result\GetRawBoxByUserIdResult
         */
        $r = $this->client->getRawBoxByUserId(
            $request
        );
        $this->boxCache->update($r->getItem());
        return $r;
    }

    public function reset(
        \Gs2\Lottery\Request\ResetBoxByUserIdRequest $request
    ): \Gs2\Lottery\Result\ResetBoxByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setPrizeTableName($this->prizeTableName);
        /**
         * @var \Gs2\Lottery\Result\ResetBoxByUserIdResult
         */
        $r = $this->client->resetBoxByUserId(
            $request
        );
        return $r;
    }

}
