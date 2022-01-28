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


class UserDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2VersionRestClient
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

    /**
     * @var \Gs2\Version\Domain\Cache\AcceptVersionDomainCache
     */
    private $acceptVersionCache;

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        string $userId
    ) {
        $this->session = $session;
        $this->client = new Gs2VersionRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
        $this->acceptVersionCache = new \Gs2\Version\Domain\Cache\AcceptVersionDomainCache();
    }

    public function checkVersion(
        \Gs2\Version\Request\CheckVersionByUserIdRequest $request
    ): \Gs2\Version\Result\CheckVersionByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Version\Result\CheckVersionByUserIdResult
         */
        $r = $this->client->checkVersionByUserId(
            $request
        );
        return $r;
    }

    public function acceptVersions(
    ): \Gs2\Version\Domain\Iterator\DescribeAcceptVersionsByUserIdIterator {
        return new \Gs2\Version\Domain\Iterator\DescribeAcceptVersionsByUserIdIterator(
            $this->acceptVersionCache,
            $this->client,
            $this->namespaceName,
            $this->userId
        );
    }

    public function acceptVersion(
        string $versionName
    ): AcceptVersionDomain {
        return new AcceptVersionDomain(
            $this->session,
            $this->acceptVersionCache,
            $this->namespaceName,
            $this->userId,
            $versionName
        );
    }

}
