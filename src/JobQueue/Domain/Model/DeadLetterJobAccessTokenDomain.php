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

namespace Gs2\JobQueue\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\JobQueue\Gs2JobQueueRestClient;


class DeadLetterJobAccessTokenDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2JobQueueRestClient
     */
    private $client;

    /**
     * @var \Gs2\JobQueue\Domain\Cache\DeadLetterJobDomainCache
     */
    private $deadLetterJobCache;

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
    private $deadLetterJobName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\JobQueue\Domain\Cache\DeadLetterJobDomainCache $deadLetterJobCache,
        string $namespaceName,
        \Gs2\Auth\Model\AccessToken $accessToken,
        string $deadLetterJobName
    ) {
        $this->session = $session;
        $this->client = new Gs2JobQueueRestClient(
            $session
        );
        $this->deadLetterJobCache = $deadLetterJobCache;
        $this->namespaceName = $namespaceName;
        $this->accessToken = $accessToken;
        $this->deadLetterJobName = $deadLetterJobName;
    }

}
