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

namespace Gs2\Account\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Account\Gs2AccountRestClient;


class AccountDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2AccountRestClient
     */
    private $client;

    /**
     * @var \Gs2\Account\Domain\Cache\AccountDomainCache
     */
    private $accountCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $userId;

    /**
     * @var \Gs2\Account\Domain\Cache\TakeOverDomainCache
     */
    private $takeOverCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Account\Domain\Cache\AccountDomainCache $accountCache,
        string $namespaceName,
        string $userId
    ) {
        $this->session = $session;
        $this->client = new Gs2AccountRestClient(
            $session
        );
        $this->accountCache = $accountCache;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->takeOverCache = new \Gs2\Account\Domain\Cache\TakeOverDomainCache();
    }

    public function updateTimeOffset(
        \Gs2\Account\Request\UpdateTimeOffsetRequest $request
    ): \Gs2\Account\Result\UpdateTimeOffsetResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Account\Result\UpdateTimeOffsetResult
         */
        $r = $this->client->updateTimeOffset(
            $request
        );
        $this->accountCache->update($r->getItem());
        return $r;
    }

    public function load(
        \Gs2\Account\Request\GetAccountRequest $request
    ): \Gs2\Account\Result\GetAccountResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Account\Result\GetAccountResult
         */
        $r = $this->client->getAccount(
            $request
        );
        $this->accountCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Account\Request\DeleteAccountRequest $request
    ): \Gs2\Account\Result\DeleteAccountResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Account\Result\DeleteAccountResult
         */
        $r = $this->client->deleteAccount(
            $request
        );
        $this->accountCache->delete($r->getItem());
        return $r;
    }

    public function authentication(
        \Gs2\Account\Request\AuthenticationRequest $request
    ): \Gs2\Account\Result\AuthenticationResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Account\Result\AuthenticationResult
         */
        $r = $this->client->authentication(
            $request
        );
        $this->accountCache->update($r->getItem());
        return $r;
    }

    public function createTakeOver(
        \Gs2\Account\Request\CreateTakeOverByUserIdRequest $request
    ): \Gs2\Account\Result\CreateTakeOverByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Account\Result\CreateTakeOverByUserIdResult
         */
        $r = $this->client->createTakeOverByUserId(
            $request
        );
        return $r;
    }

    public function takeOvers(
    ): \Gs2\Account\Domain\Iterator\DescribeTakeOversByUserIdIterator {
        return new \Gs2\Account\Domain\Iterator\DescribeTakeOversByUserIdIterator(
            $this->takeOverCache,
            $this->client,
            $this->namespaceName,
            $this->userId
        );
    }

    public function takeOver(
        int $type
    ): TakeOverDomain {
        return new TakeOverDomain(
            $this->session,
            $this->takeOverCache,
            $this->namespaceName,
            $this->userId,
            $type
        );
    }

}
