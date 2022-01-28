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

namespace Gs2\Version\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Version\Gs2VersionRestClient;


class AcceptVersionAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2VersionRestClient
     */
    private $client;

    /**
     * @var \Gs2\Version\Domain\Cache\AcceptVersionDomainCache
     */
    private $acceptVersionCache;

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
    private $versionName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Version\Domain\Cache\AcceptVersionDomainCache $acceptVersionCache,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken,
        string $versionName
    ) {
        $this->session = $session;
        $this->client = new Gs2VersionRestClient(
            $session
        );
        $this->acceptVersionCache = $acceptVersionCache;
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->versionName = $versionName;
    }

    public function accept(
        \Gs2\Version\Request\AcceptRequest $request
    ): \Gs2\Version\Result\AcceptResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setVersionName($this->versionName);
        /**
         * @var \Gs2\Version\Result\AcceptResult
         */
        $r = $this->client->accept(
            $request
        );
        $this->acceptVersionCache->update($r->getItem());
        return $r;
    }

    public function load(
        \Gs2\Version\Request\GetAcceptVersionRequest $request
    ): \Gs2\Version\Result\GetAcceptVersionResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setVersionName($this->versionName);
        /**
         * @var \Gs2\Version\Result\GetAcceptVersionResult
         */
        $r = $this->client->getAcceptVersion(
            $request
        );
        $this->acceptVersionCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Version\Request\DeleteAcceptVersionRequest $request
    ): \Gs2\Version\Result\DeleteAcceptVersionResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setVersionName($this->versionName);
        /**
         * @var \Gs2\Version\Result\DeleteAcceptVersionResult
         */
        $r = $this->client->deleteAcceptVersion(
            $request
        );
        return $r;
    }

}
