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


class ReceiptDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2MoneyRestClient
     */
    private $client;

    /**
     * @var \Gs2\Money\Domain\Cache\ReceiptDomainCache
     */
    private $receiptCache;

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
    private $transactionId;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Money\Domain\Cache\ReceiptDomainCache $receiptCache,
        string $namespaceName,
        string $userId,
        string $transactionId
    ) {
        $this->session = $session;
        $this->client = new Gs2MoneyRestClient(
            $session
        );
        $this->receiptCache = $receiptCache;
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->transactionId = $transactionId;
    }

    public function getByUserIdAndTransactionId(
        \Gs2\Money\Request\GetByUserIdAndTransactionIdRequest $request
    ): \Gs2\Money\Result\GetByUserIdAndTransactionIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        $request->setTransactionId($this->transactionId);
        /**
         * @var \Gs2\Money\Result\GetByUserIdAndTransactionIdResult
         */
        $r = $this->client->getByUserIdAndTransactionId(
            $request
        );
        $this->receiptCache->update($r->getItem());
        return $r;
    }

}
