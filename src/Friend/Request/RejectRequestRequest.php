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
 * Request for rejectRequest: Reject friend request
 *
 * @see https://docs.gs2.io/api_reference/friend/sdk/#rejectrequest
 */
class RejectRequestRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string User ID */
    private $fromUserId;
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
     * @return RejectRequestRequest
     */
	public function withNamespaceName(?string $namespaceName): RejectRequestRequest {
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
     * @return RejectRequestRequest
     */
	public function withAccessToken(?string $accessToken): RejectRequestRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null User ID */
	public function getFromUserId(): ?string {
		return $this->fromUserId;
	}
    /** @param string|null $fromUserId User ID */
	public function setFromUserId(?string $fromUserId) {
		$this->fromUserId = $fromUserId;
	}
    /**
     * @param string|null $fromUserId User ID
     * @return RejectRequestRequest
     */
	public function withFromUserId(?string $fromUserId): RejectRequestRequest {
		$this->fromUserId = $fromUserId;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): RejectRequestRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?RejectRequestRequest {
        if ($data === null) {
            return null;
        }
        return (new RejectRequestRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withFromUserId(array_key_exists('fromUserId', $data) && $data['fromUserId'] !== null ? $data['fromUserId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "fromUserId" => $this->getFromUserId(),
        );
    }
}