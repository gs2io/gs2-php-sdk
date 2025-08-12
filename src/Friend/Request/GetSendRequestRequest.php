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

class GetSendRequestRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $targetUserId;
    /** @var bool */
    private $withProfile;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): GetSendRequestRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): GetSendRequestRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getTargetUserId(): ?string {
		return $this->targetUserId;
	}
	public function setTargetUserId(?string $targetUserId) {
		$this->targetUserId = $targetUserId;
	}
	public function withTargetUserId(?string $targetUserId): GetSendRequestRequest {
		$this->targetUserId = $targetUserId;
		return $this;
	}
	public function getWithProfile(): ?bool {
		return $this->withProfile;
	}
	public function setWithProfile(?bool $withProfile) {
		$this->withProfile = $withProfile;
	}
	public function withWithProfile(?bool $withProfile): GetSendRequestRequest {
		$this->withProfile = $withProfile;
		return $this;
	}

    public static function fromJson(?array $data): ?GetSendRequestRequest {
        if ($data === null) {
            return null;
        }
        return (new GetSendRequestRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withTargetUserId(array_key_exists('targetUserId', $data) && $data['targetUserId'] !== null ? $data['targetUserId'] : null)
            ->withWithProfile(array_key_exists('withProfile', $data) ? $data['withProfile'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "targetUserId" => $this->getTargetUserId(),
            "withProfile" => $this->getWithProfile(),
        );
    }
}