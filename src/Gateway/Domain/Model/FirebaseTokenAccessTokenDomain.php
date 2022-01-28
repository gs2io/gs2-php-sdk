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


class FirebaseTokenAccessTokenDomain {

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
     * @var \Gs2\Auth\Model\AccessToken
     */
    private $accessToken;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken
    ) {
        $this->session = $session;
        $this->client = new Gs2GatewayRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
    }

    public function set(
        \Gs2\Gateway\Request\SetFirebaseTokenRequest $request
    ): \Gs2\Gateway\Result\SetFirebaseTokenResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Gateway\Result\SetFirebaseTokenResult
         */
        $r = $this->client->setFirebaseToken(
            $request
        );
        return $r;
    }

    public function load(
        \Gs2\Gateway\Request\GetFirebaseTokenRequest $request
    ): \Gs2\Gateway\Result\GetFirebaseTokenResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Gateway\Result\GetFirebaseTokenResult
         */
        $r = $this->client->getFirebaseToken(
            $request
        );
        return $r;
    }

    public function delete(
        \Gs2\Gateway\Request\DeleteFirebaseTokenRequest $request
    ): \Gs2\Gateway\Result\DeleteFirebaseTokenResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        /**
         * @var \Gs2\Gateway\Result\DeleteFirebaseTokenResult
         */
        $r = $this->client->deleteFirebaseToken(
            $request
        );
        return $r;
    }

}
