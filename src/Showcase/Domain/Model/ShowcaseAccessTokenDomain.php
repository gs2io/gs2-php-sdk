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

namespace Gs2\Showcase\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Showcase\Gs2ShowcaseRestClient;


class ShowcaseAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2ShowcaseRestClient
     */
    private $client;

    /**
     * @var \Gs2\Showcase\Domain\Cache\ShowcaseDomainCache
     */
    private $showcaseCache;

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
    private $showcaseName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Showcase\Domain\Cache\ShowcaseDomainCache $showcaseCache,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken,
        string $showcaseName
    ) {
        $this->session = $session;
        $this->client = new Gs2ShowcaseRestClient(
            $session
        );
        $this->showcaseCache = $showcaseCache;
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->showcaseName = $showcaseName;
    }

    public function load(
        \Gs2\Showcase\Request\GetShowcaseRequest $request
    ): \Gs2\Showcase\Result\GetShowcaseResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setShowcaseName($this->showcaseName);
        /**
         * @var \Gs2\Showcase\Result\GetShowcaseResult
         */
        $r = $this->client->getShowcase(
            $request
        );
        $this->showcaseCache->update($r->getItem());
        return $r;
    }

    public function buy(
        \Gs2\Showcase\Request\BuyRequest $request
    ): \Gs2\Showcase\Result\BuyResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setShowcaseName($this->showcaseName);
        /**
         * @var \Gs2\Showcase\Result\BuyResult
         */
        $r = $this->client->buy(
            $request
        );
        return $r;
    }

}
