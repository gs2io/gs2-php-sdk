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

namespace Gs2\Identifier\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Identifier\Gs2IdentifierRestClient;


class SecurityPolicyDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2IdentifierRestClient
     */
    private $client;

    /**
     * @var \Gs2\Identifier\Domain\Cache\SecurityPolicyDomainCache
     */
    private $securityPolicyCache;

    /**
     * @var string
     */
    private $securityPolicyName;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Identifier\Domain\Cache\SecurityPolicyDomainCache $securityPolicyCache,
        string $securityPolicyName
    ) {
        $this->session = $session;
        $this->client = new Gs2IdentifierRestClient(
            $session
        );
        $this->securityPolicyCache = $securityPolicyCache;
        $this->securityPolicyName = $securityPolicyName;
    }

    public function load(
        \Gs2\Identifier\Request\GetSecurityPolicyRequest $request
    ): \Gs2\Identifier\Result\GetSecurityPolicyResult {
        $request->setSecurityPolicyName($this->securityPolicyName);
        /**
         * @var \Gs2\Identifier\Result\GetSecurityPolicyResult
         */
        $r = $this->client->getSecurityPolicy(
            $request
        );
        $this->securityPolicyCache->update($r->getItem());
        return $r;
    }

}
