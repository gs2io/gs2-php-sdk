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

namespace Gs2\Money\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Money\Gs2MoneyRestClient;


class WalletAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2MoneyRestClient
     */
    private $client;

    /**
     * @var \Gs2\Money\Domain\Cache\WalletDomainCache
     */
    private $walletCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var \Gs2\Auth\Model\AccessToken
     */
    private $accessToken;

    /**
     * @var int
     */
    private $slot;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Money\Domain\Cache\WalletDomainCache $walletCache,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken,
        int $slot
    ) {
        $this->session = $session;
        $this->client = new Gs2MoneyRestClient(
            $session
        );
        $this->walletCache = $walletCache;
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->slot = $slot;
    }

    public function load(
        \Gs2\Money\Request\GetWalletRequest $request
    ): \Gs2\Money\Result\GetWalletResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setSlot($this->slot);
        /**
         * @var \Gs2\Money\Result\GetWalletResult
         */
        $r = $this->client->getWallet(
            $request
        );
        $this->walletCache->update($r->getItem());
        return $r;
    }

    public function withdraw(
        \Gs2\Money\Request\WithdrawRequest $request
    ): \Gs2\Money\Result\WithdrawResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setSlot($this->slot);
        /**
         * @var \Gs2\Money\Result\WithdrawResult
         */
        $r = $this->client->withdraw(
            $request
        );
        $this->walletCache->update($r->getItem());
        return $r;
    }

}
