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


class UserDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2MoneyRestClient
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
     * @var \Gs2\Money\Domain\Cache\WalletDomainCache
     */
    private $walletCache;

    /**
     * @var \Gs2\Money\Domain\Cache\ReceiptDomainCache
     */
    private $receiptCache;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        string $userId
    ) {
        $this->session = $session;
        $this->client = new Gs2MoneyRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->walletCache = new \Gs2\Money\Domain\Cache\WalletDomainCache();
        $this->receiptCache = new \Gs2\Money\Domain\Cache\ReceiptDomainCache();
    }

    public function wallets(
    ): \Gs2\Money\Domain\Iterator\DescribeWalletsByUserIdIterator {
        return new \Gs2\Money\Domain\Iterator\DescribeWalletsByUserIdIterator(
            $this->walletCache,
            $this->client,
            $this->namespaceName,
            $this->userId
        );
    }

    public function receipts(
        ?int $slot,
        ?int $begin,
        ?int $end
    ): \Gs2\Money\Domain\Iterator\DescribeReceiptsIterator {
        return new \Gs2\Money\Domain\Iterator\DescribeReceiptsIterator(
            $this->receiptCache,
            $this->client,
            $this->namespaceName,
            $this->userId,
            $slot,
            $begin,
            $end
        );
    }

    public function wallet(
        int $slot
    ): WalletDomain {
        return new WalletDomain(
            $this->session,
            $this->walletCache,
            $this->namespaceName,
            $this->userId,
            $slot
        );
    }

    public function receipt(
        string $transactionId
    ): ReceiptDomain {
        return new ReceiptDomain(
            $this->session,
            $this->receiptCache,
            $this->namespaceName,
            $this->userId,
            $transactionId
        );
    }

}
