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


class Profile implements IModel {
	/**
     * @var string
	 */
	private $profileId;
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
	private $followerProfile;
	/**
     * @var string
	 */
	private $friendProfile;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	/**
     * @var int
	 */
	private $revision;
	public function getProfileId(): ?string {
		return $this->profileId;
	}
	public function setProfileId(?string $profileId) {
		$this->profileId = $profileId;
	}
	public function withProfileId(?string $profileId): Profile {
		$this->profileId = $profileId;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): Profile {
		$this->userId = $userId;
		return $this;
	}
	public function getPublicProfile(): ?string {
		return $this->publicProfile;
	}
	public function setPublicProfile(?string $publicProfile) {
		$this->publicProfile = $publicProfile;
	}
	public function withPublicProfile(?string $publicProfile): Profile {
		$this->publicProfile = $publicProfile;
		return $this;
	}
	public function getFollowerProfile(): ?string {
		return $this->followerProfile;
	}
	public function setFollowerProfile(?string $followerProfile) {
		$this->followerProfile = $followerProfile;
	}
	public function withFollowerProfile(?string $followerProfile): Profile {
		$this->followerProfile = $followerProfile;
		return $this;
	}
	public function getFriendProfile(): ?string {
		return $this->friendProfile;
	}
	public function setFriendProfile(?string $friendProfile) {
		$this->friendProfile = $friendProfile;
	}
	public function withFriendProfile(?string $friendProfile): Profile {
		$this->friendProfile = $friendProfile;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Profile {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): Profile {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): Profile {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Profile {
        if ($data === null) {
            return null;
        }
        return (new Profile())
            ->withProfileId(array_key_exists('profileId', $data) && $data['profileId'] !== null ? $data['profileId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withPublicProfile(array_key_exists('publicProfile', $data) && $data['publicProfile'] !== null ? $data['publicProfile'] : null)
            ->withFollowerProfile(array_key_exists('followerProfile', $data) && $data['followerProfile'] !== null ? $data['followerProfile'] : null)
            ->withFriendProfile(array_key_exists('friendProfile', $data) && $data['friendProfile'] !== null ? $data['friendProfile'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "profileId" => $this->getProfileId(),
            "userId" => $this->getUserId(),
            "publicProfile" => $this->getPublicProfile(),
            "followerProfile" => $this->getFollowerProfile(),
            "friendProfile" => $this->getFriendProfile(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}