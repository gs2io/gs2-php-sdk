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
 *
 * deny overwrite
 */

namespace Gs2\Auth\Domain;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Auth\Gs2AuthRestClient;

class Gs2Auth {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2AuthRestClient
     */
    private $client;

    public function __construct(
        Gs2RestSession $session
    ) {
        $this->session = $session;
        $this->client = new Gs2AuthRestClient (
            $session
        );
    }

    public function login(
        \Gs2\Auth\Request\LoginRequest $request
    ): \Gs2\Auth\Result\LoginResult {
        /**
         * @var \Gs2\Auth\Result\LoginResult
         */
        $r = $this->client->login(
            $request
        );
        return $r;
    }

    public function loginBySignature(
        \Gs2\Auth\Request\LoginBySignatureRequest $request
    ): \Gs2\Auth\Result\LoginBySignatureResult {
        /**
         * @var \Gs2\Auth\Result\LoginBySignatureResult
         */
        $r = $this->client->loginBySignature(
            $request
        );
        return $r;
    }
}
