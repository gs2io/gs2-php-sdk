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

namespace Gs2\Experience\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Experience\Gs2ExperienceRestClient;


class StatusAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ExperienceRestClient
     */
    private $client;

    /**
     * @var \Gs2\Experience\Domain\Cache\StatusDomainCache
     */
    private $statusCache;

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
    private $experienceName;

    /**
     * @var string
     */
    private $propertyId;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Experience\Domain\Cache\StatusDomainCache $statusCache,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken,
        string $experienceName,
        string $propertyId
    ) {
        $this->session = $session;
        $this->client = new Gs2ExperienceRestClient(
            $session
        );
        $this->statusCache = $statusCache;
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->experienceName = $experienceName;
        $this->propertyId = $propertyId;
    }

    public function load(
        \Gs2\Experience\Request\GetStatusRequest $request
    ): \Gs2\Experience\Result\GetStatusResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setExperienceName($this->experienceName);
        $request->setPropertyId($this->propertyId);
        /**
         * @var \Gs2\Experience\Result\GetStatusResult
         */
        $r = $this->client->getStatus(
            $request
        );
        $this->statusCache->update($r->getItem());
        return $r;
    }

    public function getWithSignature(
        \Gs2\Experience\Request\GetStatusWithSignatureRequest $request
    ): \Gs2\Experience\Result\GetStatusWithSignatureResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setExperienceName($this->experienceName);
        $request->setPropertyId($this->propertyId);
        /**
         * @var \Gs2\Experience\Result\GetStatusWithSignatureResult
         */
        $r = $this->client->getStatusWithSignature(
            $request
        );
        $this->statusCache->update($r->getItem());
        return $r;
    }

}
