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


class FormAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2FormationRestClient
     */
    private $client;

    /**
     * @var \Gs2\Formation\Domain\Cache\FormDomainCache
     */
    private $formCache;

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
     * @var int
     */
    private $index;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Formation\Domain\Cache\FormDomainCache $formCache,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken,
        string $moldName,
        int $index
    ) {
        $this->session = $session;
        $this->client = new Gs2FormationRestClient(
            $session
        );
        $this->formCache = $formCache;
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->moldName = $moldName;
        $this->index = $index;
    }

    public function load(
        \Gs2\Formation\Request\GetFormRequest $request
    ): \Gs2\Formation\Result\GetFormResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setMoldName($this->moldName);
        $request->setIndex($this->index);
        /**
         * @var \Gs2\Formation\Result\GetFormResult
         */
        $r = $this->client->getForm(
            $request
        );
        $this->formCache->update($r->getItem());
        return $r;
    }

    public function getWithSignature(
        \Gs2\Formation\Request\GetFormWithSignatureRequest $request
    ): \Gs2\Formation\Result\GetFormWithSignatureResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setMoldName($this->moldName);
        $request->setIndex($this->index);
        /**
         * @var \Gs2\Formation\Result\GetFormWithSignatureResult
         */
        $r = $this->client->getFormWithSignature(
            $request
        );
        $this->formCache->update($r->getItem());
        return $r;
    }

    public function setWithSignature(
        \Gs2\Formation\Request\SetFormWithSignatureRequest $request
    ): \Gs2\Formation\Result\SetFormWithSignatureResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setMoldName($this->moldName);
        $request->setIndex($this->index);
        /**
         * @var \Gs2\Formation\Result\SetFormWithSignatureResult
         */
        $r = $this->client->setFormWithSignature(
            $request
        );
        $this->formCache->update($r->getItem());
        return $r;
    }

    public function delete(
        \Gs2\Formation\Request\DeleteFormRequest $request
    ): \Gs2\Formation\Result\DeleteFormResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setAccessToken($this->accessToken !== null ? $this->accessToken->getToken() : null);
        $request->setMoldName($this->moldName);
        $request->setIndex($this->index);
        /**
         * @var \Gs2\Formation\Result\DeleteFormResult
         */
        $r = $this->client->deleteForm(
            $request
        );
        $this->formCache->delete($r->getItem());
        return $r;
    }

}
