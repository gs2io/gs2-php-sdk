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


class VersionModelDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2VersionRestClient
     */
    private $client;

    /**
     * @var \Gs2\Version\Domain\Cache\VersionModelDomainCache
     */
    private $versionModelCache;

    /**
     * @var string
     */
    private $namespaceName;

    /**
     * @var string
     */
    private $versionName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Version\Domain\Cache\VersionModelDomainCache $versionModelCache,
        string $namespaceName,
        string $versionName
    ) {
        $this->session = $session;
        $this->client = new Gs2VersionRestClient(
            $session
        );
        $this->versionModelCache = $versionModelCache;
        $this->namespaceName = $namespaceName;
        $this->versionName = $versionName;
    }

    public function load(
        \Gs2\Version\Request\GetVersionModelRequest $request
    ): \Gs2\Version\Result\GetVersionModelResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setVersionName($this->versionName);
        /**
         * @var \Gs2\Version\Result\GetVersionModelResult
         */
        $r = $this->client->getVersionModel(
            $request
        );
        $this->versionModelCache->update($r->getItem());
        return $r;
    }

}
