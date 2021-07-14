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

namespace Gs2\Friend\Model;

use Gs2\Core\Model\IModel;


class FriendUser implements IModel {
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $publicProfile;
	/**
     * @var string
	 */
	private $friendProfile;

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): FriendUser {
		$this->userId = $userId;
		return $this;
	}

	public function getPublicProfile(): ?string {
		return $this->publicProfile;
	}

	public function setPublicProfile(?string $publicProfile) {
		$this->publicProfile = $publicProfile;
	}

	public function withPublicProfile(?string $publicProfile): FriendUser {
		$this->publicProfile = $publicProfile;
		return $this;
	}

	public function getFriendProfile(): ?string {
		return $this->friendProfile;
	}

	public function setFriendProfile(?string $friendProfile) {
		$this->friendProfile = $friendProfile;
	}

	public function withFriendProfile(?string $friendProfile): FriendUser {
		$this->friendProfile = $friendProfile;
		return $this;
	}

    public static function fromJson(?array $data): ?FriendUser {
        if ($data === null) {
            return null;
        }
        return (new FriendUser())
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withPublicProfile(empty($data['publicProfile']) ? null : $data['publicProfile'])
            ->withFriendProfile(empty($data['friendProfile']) ? null : $data['friendProfile']);
    }

    public function toJson(): array {
        return array(
            "userId" => $this->getUserId(),
            "publicProfile" => $this->getPublicProfile(),
            "friendProfile" => $this->getFriendProfile(),
        );
    }
}