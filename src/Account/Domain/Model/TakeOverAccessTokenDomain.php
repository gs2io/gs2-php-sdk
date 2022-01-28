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


class TakeOverAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2AccountRestClient
     */
    private $client;

    /**
     * @var \Gs2\Account\Domain\Cache\TakeOverDomainCache
     */
    private $takeOverCache;

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
    private $type;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Account\Domain\Cache\TakeOverDomainCache $takeOverCache,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken,
        int $type
    ) {
        $this->session = $session;
        $this->client = new Gs2AccountRestClient(
            $session
        );
        $this->takeOverCache = $takeOverCache;
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->type = $type;
    }

    public function load(
        \Gs2\Account\Request\GetTakeOverRequest $request
    ): \Gs2\Account\Result\GetTakeOverResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setType($this->type);
        /**
         * @var \Gs2\Account\Result\GetTakeOverResult
         */
        $r = $this->client->getTakeOver(
            $request
        );
        $this->takeOverCache->update($r->getItem());
        return $r;
    }

    public function update(
        \Gs2\Account\Request\UpdateTakeOverRequest $request
    ): \Gs2\Account\Result\UpdateTakeOverResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setType($this->type);
        /**
         * @var \Gs2\Account\Result\UpdateTakeOverResult
         */
        $r = $this->client->updateTakeOver(
            $request
        );
        $this->takeOverCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Account\Request\DeleteTakeOverRequest $request
    ): \Gs2\Account\Result\DeleteTakeOverResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setType($this->type);
        /**
         * @var \Gs2\Account\Result\DeleteTakeOverResult
         */
        $r = $this->client->deleteTakeOver(
            $request
        );
        $this->takeOverCache->delete($r->getItem());
        return $r;
    }

}
