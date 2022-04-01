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

class UpdateProfileRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $publicProfile;
    /** @var string */
    private $followerProfile;
    /** @var string */
    private $friendProfile;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): UpdateProfileRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getAccessToken(): ?string {
		return $this->accessToken;
	}

	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}

	public function withAccessToken(?string $accessToken): UpdateProfileRequest {
		$this->accessToken = $accessToken;
		return $this;
	}

	public function getPublicProfile(): ?string {
		return $this->publicProfile;
	}

	public function setPublicProfile(?string $publicProfile) {
		$this->publicProfile = $publicProfile;
	}

	public function withPublicProfile(?string $publicProfile): UpdateProfileRequest {
		$this->publicProfile = $publicProfile;
		return $this;
	}

	public function getFollowerProfile(): ?string {
		return $this->followerProfile;
	}

	public function setFollowerProfile(?string $followerProfile) {
		$this->followerProfile = $followerProfile;
	}

	public function withFollowerProfile(?string $followerProfile): UpdateProfileRequest {
		$this->followerProfile = $followerProfile;
		return $this;
	}

	public function getFriendProfile(): ?string {
		return $this->friendProfile;
	}

	public function setFriendProfile(?string $friendProfile) {
		$this->friendProfile = $friendProfile;
	}

	public function withFriendProfile(?string $friendProfile): UpdateProfileRequest {
		$this->friendProfile = $friendProfile;
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