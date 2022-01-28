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

namespace Gs2\Formation\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Formation\Gs2FormationRestClient;


class MoldAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2FormationRestClient
     */
    private $client;

    /**
     * @var \Gs2\Formation\Domain\Cache\MoldDomainCache
     */
    private $moldCache;

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
    private $moldName;

    /**
     * @var \Gs2\Formation\Domain\Cache\FormDomainCache
     */
    private $formCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Formation\Domain\Cache\MoldDomainCache $moldCache,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken,
        string $moldName
    ) {
        $this->session = $session;
        $this->client = new Gs2FormationRestClient(
            $session
        );
        $this->moldCache = $moldCache;
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->moldName = $moldName;
        $this->formCache = new \Gs2\Formation\Domain\Cache\FormDomainCache();
    }

    public function load(
        \Gs2\Formation\Request\GetMoldRequest $request
    ): \Gs2\Formation\Result\GetMoldResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setMoldName($this->moldName);
        /**
         * @var \Gs2\Formation\Result\GetMoldResult
         */
        $r = $this->client->getMold(
            $request
        );
        $this->moldCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Formation\Request\DeleteMoldRequest $request
    ): \Gs2\Formation\Result\DeleteMoldResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setMoldName($this->moldName);
        /**
         * @var \Gs2\Formation\Result\DeleteMoldResult
         */
        $r = $this->client->deleteMold(
            $request
        );
        $this->moldCache->delete($r->getItem());
        return $r;
    }

    public function forms(
    ): \Gs2\Formation\Domain\Iterator\DescribeFormsIterator {
        return new \Gs2\Formation\Domain\Iterator\DescribeFormsIterator(
            $this->formCache,
            $this->client,
            $this->namespaceName,
            $this->moldName,
            $this->accessToken
        );
    }

    public function form(
        int $index
    ): FormAccessTokenDomain {
        return new FormAccessTokenDomain(
            $this->session,
            $this->formCache,
            $this->namespaceName,
            $this->accessToken,
            $this->moldName,
            $index
        );
    }

}
