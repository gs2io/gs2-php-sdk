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
 * Public Profile
 *
 * @see https://docs.gs2.io/api_reference/friend/sdk/#publicprofile
 */
class PublicProfile implements IModel {
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Public profile
	 */
	private $publicProfile;
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
     * @return PublicProfile
     */
	public function withUserId(?string $userId): PublicProfile {
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
     * @return PublicProfile
     */
	public function withPublicProfile(?string $publicProfile): PublicProfile {
		$this->publicProfile = $publicProfile;
		return $this;
	}

    public static function fromJson(?array $data): ?PublicProfile {
        if ($data === null) {
            return null;
        }
        return (new PublicProfile())
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withPublicProfile(array_key_exists('publicProfile', $data) && $data['publicProfile'] !== null ? $data['publicProfile'] : null);
    }

    public function toJson(): array {
        return array(
            "userId" => $this->getUserId(),
            "publicProfile" => $this->getPublicProfile(),
        );
    }
}