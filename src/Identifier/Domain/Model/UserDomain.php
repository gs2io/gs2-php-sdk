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


class UserDomain {

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
     * @var string
     */
    private $userName;

    /**
     * @var \Gs2\Identifier\Domain\Cache\IdentifierDomainCache
     */
    private $identifierCache;

    /**
     * @var \Gs2\Identifier\Domain\Cache\PasswordDomainCache
     */
    private $passwordCache;

    public function __construct(
        Gs2RestSession $session,
        \Gs2\Identifier\Domain\Cache\UserDomainCache $userCache,
        string $userName
    ) {
        $this->session = $session;
        $this->client = new Gs2IdentifierRestClient(
            $session
        );
        $this->userCache = $userCache;
        $this->userName = $userName;
        $this->identifierCache = new \Gs2\Identifier\Domain\Cache\IdentifierDomainCache();
        $this->passwordCache = new \Gs2\Identifier\Domain\Cache\PasswordDomainCache();
    }

    public function load(
        \Gs2\Identifier\Request\GetUserRequest $request
    ): \Gs2\Identifier\Result\GetUserResult {
        $request->setUserName($this->userName);
        /**
         * @var \Gs2\Identifier\Result\GetUserResult
         */
        $r = $this->client->getUser(
            $request
        );
        $this->userCache->update($r->getItem());
        return $r;
    }

    public function createPassword(
        \Gs2\Identifier\Request\CreatePasswordRequest $request
    ): \Gs2\Identifier\Result\CreatePasswordResult {
        $request->setUserName($this->userName);
        /**
         * @var \Gs2\Identifier\Result\CreatePasswordResult
         */
        $r = $this->client->createPassword(
            $request
        );
        return $r;
    }

    public function deletePassword(
        \Gs2\Identifier\Request\DeletePasswordRequest $request
    ): \Gs2\Identifier\Result\DeletePasswordResult {
        $request->setUserName($this->userName);
        /**
         * @var \Gs2\Identifier\Result\DeletePasswordResult
         */
        $r = $this->client->deletePassword(
            $request
        );
        return $r;
    }

    public function getHasSecurityPolicy(
        \Gs2\Identifier\Request\GetHasSecurityPolicyRequest $request
    ): \Gs2\Identifier\Result\GetHasSecurityPolicyResult {
        $request->setUserName($this->userName);
        /**
         * @var \Gs2\Identifier\Result\GetHasSecurityPolicyResult
         */
        $r = $this->client->getHasSecurityPolicy(
            $request
        );
        return $r;
    }

    public function attachSecurityPolicy(
        \Gs2\Identifier\Request\AttachSecurityPolicyRequest $request
    ): \Gs2\Identifier\Result\AttachSecurityPolicyResult {
        $request->setUserName($this->userName);
        /**
         * @var \Gs2\Identifier\Result\AttachSecurityPolicyResult
         */
        $r = $this->client->attachSecurityPolicy(
            $request
        );
        return $r;
    }

    public function detachSecurityPolicy(
        \Gs2\Identifier\Request\DetachSecurityPolicyRequest $request
    ): \Gs2\Identifier\Result\DetachSecurityPolicyResult {
        $request->setUserName($this->userName);
        /**
         * @var \Gs2\Identifier\Result\DetachSecurityPolicyResult
         */
        $r = $this->client->detachSecurityPolicy(
            $request
        );
        return $r;
    }

    public function passwords(
    ): \Gs2\Identifier\Domain\Iterator\DescribePasswordsIterator {
        return new \Gs2\Identifier\Domain\Iterator\DescribePasswordsIterator(
            $this->passwordCache,
            $this->client,
            $this->userName
        );
    }

    public function identifier(
    ): IdentifierDomain {
        return new IdentifierDomain(
            $this->session,
            $this->identifierCache,
            $this->userName
        );
    }

    public function password(
    ): PasswordDomain {
        return new PasswordDomain(
            $this->session,
            $this->passwordCache,
            $this->userName
        );
    }

}
