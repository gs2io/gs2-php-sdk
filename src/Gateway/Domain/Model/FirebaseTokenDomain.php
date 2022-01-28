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

namespace Gs2\Gateway\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Gateway\Gs2GatewayRestClient;


class FirebaseTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2GatewayRestClient
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

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        string $userId
    ) {
        $this->session = $session;
        $this->client = new Gs2GatewayRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
    }

    public function set(
        \Gs2\Gateway\Request\SetFirebaseTokenByUserIdRequest $request
    ): \Gs2\Gateway\Result\SetFirebaseTokenByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Gateway\Result\SetFirebaseTokenByUserIdResult
         */
        $r = $this->client->setFirebaseTokenByUserId(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Gateway\Request\GetFirebaseTokenByUserIdRequest $request
    ): \Gs2\Gateway\Result\GetFirebaseTokenByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Gateway\Result\GetFirebaseTokenByUserIdResult
         */
        $r = $this->client->getFirebaseTokenByUserId(
            $request
        );
        return $r;
    }

    public function delete(
        \Gs2\Gateway\Request\DeleteFirebaseTokenByUserIdRequest $request
    ): \Gs2\Gateway\Result\DeleteFirebaseTokenByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Gateway\Result\DeleteFirebaseTokenByUserIdResult
         */
        $r = $this->client->deleteFirebaseTokenByUserId(
            $request
        );
        return $r;
    }

    public function sendMobileNotification(
        \Gs2\Gateway\Request\SendMobileNotificationByUserIdRequest $request
    ): \Gs2\Gateway\Result\SendMobileNotificationByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Gateway\Result\SendMobileNotificationByUserIdResult
         */
        $r = $this->client->sendMobileNotificationByUserId(
            $request
        );
        return $r;
    }

}
