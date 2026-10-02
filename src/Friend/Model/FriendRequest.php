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
 * Friend Request
 *
 * @see https://docs.gs2.io/api_reference/friend/sdk/#friendrequest
 */
class FriendRequest implements IModel {
	/**
     * @var string User ID of the sender of the friend request
	 */
	private $userId;
	/**
     * @var string User ID to whom a friend request was sent
	 */
	private $targetUserId;
	/**
     * @var string Public profile
	 */
	private $publicProfile;
    /** @return string|null User ID of the sender of the friend request */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID of the sender of the friend request */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID of the sender of the friend request
     * @return FriendRequest
     */
	public function withUserId(?string $userId): FriendRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null User ID to whom a friend request was sent */
	public function getTargetUserId(): ?string {
		return $this->targetUserId;
	}
    /** @param string|null $targetUserId User ID to whom a friend request was sent */
	public function setTargetUserId(?string $targetUserId) {
		$this->targetUserId = $targetUserId;
	}
    /**
     * @param string|null $targetUserId User ID to whom a friend request was sent
     * @return FriendRequest
     */
	public function withTargetUserId(?string $targetUserId): FriendRequest {
		$this->targetUserId = $targetUserId;
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
     * @return FriendRequest
     */
	public function withPublicProfile(?string $publicProfile): FriendRequest {
		$this->publicProfile = $publicProfile;
		return $this;
	}

    public static function fromJson(?array $data): ?FriendRequest {
        if ($data === null) {
            return null;
        }
        return (new FriendRequest())
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTargetUserId(array_key_exists('targetUserId', $data) && $data['targetUserId'] !== null ? $data['targetUserId'] : null)
            ->withPublicProfile(array_key_exists('publicProfile', $data) && $data['publicProfile'] !== null ? $data['publicProfile'] : null);
    }

    public function toJson(): array {
        return array(
            "userId" => $this->getUserId(),
            "targetUserId" => $this->getTargetUserId(),
            "publicProfile" => $this->getPublicProfile(),
        );
    }
}