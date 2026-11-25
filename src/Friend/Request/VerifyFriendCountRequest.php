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
 * Request for verifyFriendCount: Verify the number of friends
 *
 * @see https://docs.gs2.io/api_reference/friend/sdk/#verifyfriendcount
 */
class VerifyFriendCountRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Type of verification */
    private $verifyType;
    /** @var int Value to compare with the number of friends */
    private $count;
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
     * @return VerifyFriendCountRequest
     */
	public function withNamespaceName(?string $namespaceName): VerifyFriendCountRequest {
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
     * @return VerifyFriendCountRequest
     */
	public function withAccessToken(?string $accessToken): VerifyFriendCountRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Type of verification */
	public function getVerifyType(): ?string {
		return $this->verifyType;
	}
    /** @param string|null $verifyType Type of verification */
	public function setVerifyType(?string $verifyType) {
		$this->verifyType = $verifyType;
	}
    /**
     * @param string|null $verifyType Type of verification
     * @return VerifyFriendCountRequest
     */
	public function withVerifyType(?string $verifyType): VerifyFriendCountRequest {
		$this->verifyType = $verifyType;
		return $this;
	}
    /** @return int|null Value to compare with the number of friends */
	public function getCount(): ?int {
		return $this->count;
	}
    /** @param int|null $count Value to compare with the number of friends */
	public function setCount(?int $count) {
		$this->count = $count;
	}
    /**
     * @param int|null $count Value to compare with the number of friends
     * @return VerifyFriendCountRequest
     */
	public function withCount(?int $count): VerifyFriendCountRequest {
		$this->count = $count;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyFriendCountRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyFriendCountRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyFriendCountRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null)
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "verifyType" => $this->getVerifyType(),
            "count" => $this->getCount(),
        );
    }
}