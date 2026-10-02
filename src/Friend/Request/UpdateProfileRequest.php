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
 * Request for updateProfile: Update profile
 *
 * @see https://docs.gs2.io/api_reference/friend/sdk/#updateprofile
 */
class UpdateProfileRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Public profile */
    private $publicProfile;
    /** @var string Profile for followers */
    private $followerProfile;
    /** @var string Profile for friends */
    private $friendProfile;
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
     * @return UpdateProfileRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateProfileRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID
     * @return UpdateProfileRequest
     */
	public function withAccessToken(?string $accessToken): UpdateProfileRequest {
		$this->accessToken = $accessToken;
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
     * @return UpdateProfileRequest
     */
	public function withPublicProfile(?string $publicProfile): UpdateProfileRequest {
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
     * @return UpdateProfileRequest
     */
	public function withFollowerProfile(?string $followerProfile): UpdateProfileRequest {
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
     * @return UpdateProfileRequest
     */
	public function withFriendProfile(?string $friendProfile): UpdateProfileRequest {
		$this->friendProfile = $friendProfile;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): UpdateProfileRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateProfileRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateProfileRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withPublicProfile(array_key_exists('publicProfile', $data) && $data['publicProfile'] !== null ? $data['publicProfile'] : null)
            ->withFollowerProfile(array_key_exists('followerProfile', $data) && $data['followerProfile'] !== null ? $data['followerProfile'] : null)
            ->withFriendProfile(array_key_exists('friendProfile', $data) && $data['friendProfile'] !== null ? $data['friendProfile'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "publicProfile" => $this->getPublicProfile(),
            "followerProfile" => $this->getFollowerProfile(),
            "friendProfile" => $this->getFriendProfile(),
        );
    }
}