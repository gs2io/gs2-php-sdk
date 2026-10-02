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


/**
 * Friend User
 *
 * @see https://docs.gs2.io/api_reference/friend/sdk/#frienduser
 */
class FriendUser implements IModel {
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Public profile
	 */
	private $publicProfile;
	/**
     * @var string Profile for friends
	 */
	private $friendProfile;
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return FriendUser
     */
	public function withUserId(?string $userId): FriendUser {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Public profile */
	public function getPublicProfile(): ?string {
		return $this->publicProfile;
	}
    /** @param string|null $publicProfile Public profile */
	public function setPublicProfile(?string $publicProfile) {
		$this->publicProfile = $publicProfile;
	}
    /**
     * @param string|null $publicProfile Public profile
     * @return FriendUser
     */
	public function withPublicProfile(?string $publicProfile): FriendUser {
		$this->publicProfile = $publicProfile;
		return $this;
	}
    /** @return string|null Profile for friends */
	public function getFriendProfile(): ?string {
		return $this->friendProfile;
	}
    /** @param string|null $friendProfile Profile for friends */
	public function setFriendProfile(?string $friendProfile) {
		$this->friendProfile = $friendProfile;
	}
    /**
     * @param string|null $friendProfile Profile for friends
     * @return FriendUser
     */
	public function withFriendProfile(?string $friendProfile): FriendUser {
		$this->friendProfile = $friendProfile;
		return $this;
	}

    public static function fromJson(?array $data): ?FriendUser {
        if ($data === null) {
            return null;
        }
        return (new FriendUser())
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withPublicProfile(array_key_exists('publicProfile', $data) && $data['publicProfile'] !== null ? $data['publicProfile'] : null)
            ->withFriendProfile(array_key_exists('friendProfile', $data) && $data['friendProfile'] !== null ? $data['friendProfile'] : null);
    }

    public function toJson(): array {
        return array(
            "userId" => $this->getUserId(),
            "publicProfile" => $this->getPublicProfile(),
            "friendProfile" => $this->getFriendProfile(),
        );
    }
}