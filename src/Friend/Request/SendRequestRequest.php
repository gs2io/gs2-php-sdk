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
 * Request for sendRequest: Send a friend request
 *
 * @see https://docs.gs2.io/api_reference/friend/sdk/#sendrequest
 */
class SendRequestRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string User ID of the person want to be friend */
    private $targetUserId;
    /** @var bool Whether to include profile information in the result */
    private $withProfile;
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
     * @return SendRequestRequest
     */
	public function withNamespaceName(?string $namespaceName): SendRequestRequest {
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
     * @return SendRequestRequest
     */
	public function withAccessToken(?string $accessToken): SendRequestRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null User ID of the person want to be friend */
	public function getTargetUserId(): ?string {
		return $this->targetUserId;
	}
    /** @param string|null $targetUserId User ID of the person want to be friend */
	public function setTargetUserId(?string $targetUserId) {
		$this->targetUserId = $targetUserId;
	}
    /**
     * @param string|null $targetUserId User ID of the person want to be friend
     * @return SendRequestRequest
     */
	public function withTargetUserId(?string $targetUserId): SendRequestRequest {
		$this->targetUserId = $targetUserId;
		return $this;
	}
    /** @return bool|null Whether to include profile information in the result */
	public function getWithProfile(): ?bool {
		return $this->withProfile;
	}
    /** @param bool|null $withProfile Whether to include profile information in the result */
	public function setWithProfile(?bool $withProfile) {
		$this->withProfile = $withProfile;
	}
    /**
     * @param bool|null $withProfile Whether to include profile information in the result
     * @return SendRequestRequest
     */
	public function withWithProfile(?bool $withProfile): SendRequestRequest {
		$this->withProfile = $withProfile;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SendRequestRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SendRequestRequest {
        if ($data === null) {
            return null;
        }
        return (new SendRequestRequest())
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