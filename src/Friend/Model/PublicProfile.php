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


class PublicProfile implements IModel {
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $publicProfile;

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): PublicProfile {
		$this->userId = $userId;
		return $this;
	}

	public function getPublicProfile(): ?string {
		return $this->publicProfile;
	}

	public function setPublicProfile(?string $publicProfile) {
		$this->publicProfile = $publicProfile;
	}

	public function withPublicProfile(?string $publicProfile): PublicProfile {
		$this->publicProfile = $publicProfile;
		return $this;
	}

    public static function fromJson(?array $data): ?PublicProfile {
        if ($data === null) {
            return null;
        }
        return (new PublicProfile())
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withPublicProfile(empty($data['publicProfile']) ? null : $data['publicProfile']);
    }

    public function toJson(): array {
        return array(
            "userId" => $this->getUserId(),
            "publicProfile" => $this->getPublicProfile(),
        );
    }
}