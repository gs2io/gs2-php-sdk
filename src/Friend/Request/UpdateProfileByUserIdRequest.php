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

namespace Gs2\Friend\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for updateProfileByUserId: Update profile by User ID
 *
 * @see https://docs.gs2.io/api_reference/friend/sdk/#updateprofilebyuserid
 */
class UpdateProfileByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Public profile */
    private $publicProfile;
    /** @var string Profile for followers */
    private $followerProfile;
    /** @var string Profile for friends */
    private $friendProfile;
    /** @var string Time offset token */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return UpdateProfileByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateProfileByUserIdRequest {
		$this->namespaceName = $namespaceName;
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
     * @return UpdateProfileByUserIdRequest
     */
	public function withUserId(?string $userId): UpdateProfileByUserIdRequest {
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
     * @return UpdateProfileByUserIdRequest
     */
	public function withPublicProfile(?string $publicProfile): UpdateProfileByUserIdRequest {
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
     * @return UpdateProfileByUserIdRequest
     */
	public function withFollowerProfile(?string $followerProfile): UpdateProfileByUserIdRequest {
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
     * @return UpdateProfileByUserIdRequest
     */
	public function withFriendProfile(?string $friendProfile): UpdateProfileByUserIdRequest {
		$this->friendProfile = $friendProfile;
		return $this;
	}
    /** @return string|null Time offset token */
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
    /** @param string|null $timeOffsetToken Time offset token */
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
    /**
     * @param string|null $timeOffsetToken Time offset token
     * @return UpdateProfileByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): UpdateProfileByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): UpdateProfileByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateProfileByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateProfileByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withPublicProfile(array_key_exists('publicProfile', $data) && $data['publicProfile'] !== null ? $data['publicProfile'] : null)
            ->withFollowerProfile(array_key_exists('followerProfile', $data) && $data['followerProfile'] !== null ? $data['followerProfile'] : null)
            ->withFriendProfile(array_key_exists('friendProfile', $data) && $data['friendProfile'] !== null ? $data['friendProfile'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "publicProfile" => $this->getPublicProfile(),
            "followerProfile" => $this->getFollowerProfile(),
            "friendProfile" => $this->getFriendProfile(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}