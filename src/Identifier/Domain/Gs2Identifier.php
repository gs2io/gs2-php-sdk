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

namespace Gs2\Identifier\Domain;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Identifier\Gs2IdentifierRestClient;

class Gs2Identifier {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2IdentifierRestClient
     */
    private $client;

    /**
     * @var \Gs2\Identifier\Domain\Cache\UserDomainCache
     */
    private $userCache;

    /**
     * @var \Gs2\Identifier\Domain\Cache\SecurityPolicyDomainCache
     */
    private $securityPolicyCache;

    public function __construct(
        Gs2RestSession $session
    ) {
        $this->session = $session;
        $this->client = new Gs2IdentifierRestClient (
            $session
        );
        $this->userCache = new \Gs2\Identifier\Domain\Cache\UserDomainCache();
        $this->securityPolicyCache = new \Gs2\Identifier\Domain\Cache\SecurityPolicyDomainCache();
    }

    public function createUser(
        \Gs2\Identifier\Request\CreateUserRequest $request
    ): \Gs2\Identifier\Result\CreateUserResult {
        /**
         * @var \Gs2\Identifier\Result\CreateUserResult
         */
        $r = $this->client->createUser(
            $request
        );
        $this->userCache->update($r->getItem());
        return $r;
    }

    public function updateUser(
        \Gs2\Identifier\Request\UpdateUserRequest $request
    ): \Gs2\Identifier\Result\UpdateUserResult {
        /**
         * @var \Gs2\Identifier\Result\UpdateUserResult
         */
        $r = $this->client->updateUser(
            $request
        );
        $this->userCache->update($r->getItem());
        return $r;
    }

    public function deleteUser(
        \Gs2\Identifier\Request\DeleteUserRequest $request
    ): \Gs2\Identifier\Result\DeleteUserResult {
        /**
         * @var \Gs2\Identifier\Result\DeleteUserResult
         */
        $r = $this->client->deleteUser(
            $request
        );
        return $r;
    }

    public function createSecurityPolicy(
        \Gs2\Identifier\Request\CreateSecurityPolicyRequest $request
    ): \Gs2\Identifier\Result\CreateSecurityPolicyResult {
        /**
         * @var \Gs2\Identifier\Result\CreateSecurityPolicyResult
         */
        $r = $this->client->createSecurityPolicy(
            $request
        );
        $this->securityPolicyCache->update($r->getItem());
        return $r;
    }

    public function updateSecurityPolicy(
        \Gs2\Identifier\Request\UpdateSecurityPolicyRequest $request
    ): \Gs2\Identifier\Result\UpdateSecurityPolicyResult {
        /**
         * @var \Gs2\Identifier\Result\UpdateSecurityPolicyResult
         */
        $r = $this->client->updateSecurityPolicy(
            $request
        );
        $this->securityPolicyCache->update($r->getItem());
        return $r;
    }

    public function deleteSecurityPolicy(
        \Gs2\Identifier\Request\DeleteSecurityPolicyRequest $request
    ): \Gs2\Identifier\Result\DeleteSecurityPolicyResult {
        /**
         * @var \Gs2\Identifier\Result\DeleteSecurityPolicyResult
         */
        $r = $this->client->deleteSecurityPolicy(
            $request
        );
        return $r;
    }

    public function createIdentifier(
        \Gs2\Identifier\Request\CreateIdentifierRequest $request
    ): \Gs2\Identifier\Result\CreateIdentifierResult {
        /**
         * @var \Gs2\Identifier\Result\CreateIdentifierResult
         */
        $r = $this->client->createIdentifier(
            $request
        );
        return $r;
    }

    public function deleteIdentifier(
        \Gs2\Identifier\Request\DeleteIdentifierRequest $request
    ): \Gs2\Identifier\Result\DeleteIdentifierResult {
        /**
         * @var \Gs2\Identifier\Result\DeleteIdentifierResult
         */
        $r = $this->client->deleteIdentifier(
            $request
        );
        return $r;
    }

    public function login(
        \Gs2\Identifier\Request\LoginRequest $request
    ): \Gs2\Identifier\Result\LoginResult {
        /**
         * @var \Gs2\Identifier\Result\LoginResult
         */
        $r = $this->client->login(
            $request
        );
        return $r;
    }

    public function loginByUser(
        \Gs2\Identifier\Request\LoginByUserRequest $request
    ): \Gs2\Identifier\Result\LoginByUserResult {
        /**
         * @var \Gs2\Identifier\Result\LoginByUserResult
         */
        $r = $this->client->loginByUser(
            $request
        );
        return $r;
    }

    public function users(
    ): \Gs2\Identifier\Domain\Iterator\DescribeUsersIterator {
        return new \Gs2\Identifier\Domain\Iterator\DescribeUsersIterator(
            $this->userCache,
            $this->client
        );
    }

    public function securityPolicies(
    ): \Gs2\Identifier\Domain\Iterator\DescribeSecurityPoliciesIterator {
        return new \Gs2\Identifier\Domain\Iterator\DescribeSecurityPoliciesIterator(
            $this->securityPolicyCache,
            $this->client
        );
    }

    public function commonSecurityPolicies(
    ): \Gs2\Identifier\Domain\Iterator\DescribeCommonSecurityPoliciesIterator {
        return new \Gs2\Identifier\Domain\Iterator\DescribeCommonSecurityPoliciesIterator(
            $this->securityPolicyCache,
            $this->client
        );
    }

    public function user(
        string $userName
    ): \Gs2\Identifier\Domain\Model\UserDomain {
        return new \Gs2\Identifier\Domain\Model\UserDomain(
            $this->session,
            $this->userCache,
            $userName
        );
    }

    public function securityPolicy(
        string $securityPolicyName
    ): \Gs2\Identifier\Domain\Model\SecurityPolicyDomain {
        return new \Gs2\Identifier\Domain\Model\SecurityPolicyDomain(
            $this->session,
            $this->securityPolicyCache,
            $securityPolicyName
        );
    }

    public function projectToken(
    ): \Gs2\Identifier\Domain\Model\ProjectTokenDomain {
        return new \Gs2\Identifier\Domain\Model\ProjectTokenDomain(
            $this->session
        );
    }
}
