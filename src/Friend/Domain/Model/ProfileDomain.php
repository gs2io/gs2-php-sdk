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

namespace Gs2\Friend\Domain\Model;

use Gs2\Core\Net\Gs2RestSession;
use Gs2\Friend\Gs2FriendRestClient;


class ProfileDomain {

    /**
     * @var Gs2RestSession
     */
    private $session;

    /**
     * @var Gs2FriendRestClient
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

    public function __construct(
        Gs2RestSession $session,
        string $namespaceName,
        string $userId
    ) {
        $this->session = $session;
        $this->client = new Gs2FriendRestClient(
            $session
        );
        $this->namespaceName = $namespaceName;
        $this->userId = $userId;
    }

    public function load(
        \Gs2\Friend\Request\GetProfileByUserIdRequest $request
    ): \Gs2\Friend\Result\GetProfileByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Friend\Result\GetProfileByUserIdResult
         */
        $r = $this->client->getProfileByUserId(
            $request
        );
        return $r;
    }

    public function update(
        \Gs2\Friend\Request\UpdateProfileByUserIdRequest $request
    ): \Gs2\Friend\Result\UpdateProfileByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Friend\Result\UpdateProfileByUserIdResult
         */
        $r = $this->client->updateProfileByUserId(
            $request
        );
        return $r;
    }

    public function delete(
        \Gs2\Friend\Request\DeleteProfileByUserIdRequest $request
    ): \Gs2\Friend\Result\DeleteProfileByUserIdResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Friend\Result\DeleteProfileByUserIdResult
         */
        $r = $this->client->deleteProfileByUserId(
            $request
        );
        return $r;
    }

    public function getPublic(
        \Gs2\Friend\Request\GetPublicProfileRequest $request
    ): \Gs2\Friend\Result\GetPublicProfileResult {
        $request->setNamespaceName($this->namespaceName);
        $request->setUserId($this->userId);
        /**
         * @var \Gs2\Friend\Result\GetPublicProfileResult
         */
        $r = $this->client->getPublicProfile(
            $request
        );
        return $r;
    }

}
