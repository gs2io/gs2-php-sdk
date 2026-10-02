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
 * Profile
 *
 * @see https://docs.gs2.io/api_reference/friend/sdk/#profile
 */
class Profile implements IModel {
	/**
     * @var string Profile GRN
	 */
	private $profileId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Public profile
	 */
	private $publicProfile;
	/**
     * @var string Profile for followers
	 */
	private $followerProfile;
	/**
     * @var string Profile for friends
	 */
	private $friendProfile;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Profile GRN */
	public function getProfileId(): ?string {
		return $this->profileId;
	}
    /** @param string|null $profileId Profile GRN */
	public function setProfileId(?string $profileId) {
		$this->profileId = $profileId;
	}
    /**
     * @param string|null $profileId Profile GRN
     * @return Profile
     */
	public function withProfileId(?string $profileId): Profile {
		$this->profileId = $profileId;
		return $this;
	}
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
     * @return Profile
     */
	public function withUserId(?string $userId): Profile {
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
     * @return Profile
     */
	public function withPublicProfile(?string $publicProfile): Profile {
		$this->publicProfile = $publicProfile;
		return $this;
	}
    /** @return string|null Profile for followers */
	public function getFollowerProfile(): ?string {
		return $this->followerProfile;
	}
    /** @param string|null $followerProfile Profile for followers */
	public function setFollowerProfile(?string $followerProfile) {
		$this->followerProfile = $followerProfile;
	}
    /**
     * @param string|null $followerProfile Profile for followers
     * @return Profile
     */
	public function withFollowerProfile(?string $followerProfile): Profile {
		$this->followerProfile = $followerProfile;
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
     * @return Profile
     */
	public function withFriendProfile(?string $friendProfile): Profile {
		$this->friendProfile = $friendProfile;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return Profile
     */
	public function withCreatedAt(?int $createdAt): Profile {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return Profile
     */
	public function withUpdatedAt(?int $updatedAt): Profile {
		$this->updatedAt = $updatedAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return Profile
     */
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