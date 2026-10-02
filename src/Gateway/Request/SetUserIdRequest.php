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

namespace Gs2\Gateway\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for setUserId: Set user ID for WebSocket session
 *
 * @see https://docs.gs2.io/api_reference/gateway/sdk/#setuserid
 */
class SetUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var bool Whether to allow connections from different clients at the same time */
    private $allowConcurrentAccess;
    /** @var string Specifies a session ID that allows reconnection when allowConcurrentAccess is false and the existing connection has the same session ID. */
    private $sessionId;
    /** @var bool An existing WebSocket session will be disconnected before creating a new WebSocket session. */
    private $force;
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
     * @return SetUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): SetUserIdRequest {
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
     * @return SetUserIdRequest
     */
	public function withAccessToken(?string $accessToken): SetUserIdRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return bool|null Whether to allow connections from different clients at the same time */
	public function getAllowConcurrentAccess(): ?bool {
		return $this->allowConcurrentAccess;
	}
    /** @param bool|null $allowConcurrentAccess Whether to allow connections from different clients at the same time */
	public function setAllowConcurrentAccess(?bool $allowConcurrentAccess) {
		$this->allowConcurrentAccess = $allowConcurrentAccess;
	}
    /**
     * @param bool|null $allowConcurrentAccess Whether to allow connections from different clients at the same time
     * @return SetUserIdRequest
     */
	public function withAllowConcurrentAccess(?bool $allowConcurrentAccess): SetUserIdRequest {
		$this->allowConcurrentAccess = $allowConcurrentAccess;
		return $this;
	}
    /** @return string|null Specifies a session ID that allows reconnection when allowConcurrentAccess is false and the existing connection has the same session ID. */
	public function getSessionId(): ?string {
		return $this->sessionId;
	}
    /** @param string|null $sessionId Specifies a session ID that allows reconnection when allowConcurrentAccess is false and the existing connection has the same session ID. */
	public function setSessionId(?string $sessionId) {
		$this->sessionId = $sessionId;
	}
    /**
     * @param string|null $sessionId Specifies a session ID that allows reconnection when allowConcurrentAccess is false and the existing connection has the same session ID.
     * @return SetUserIdRequest
     */
	public function withSessionId(?string $sessionId): SetUserIdRequest {
		$this->sessionId = $sessionId;
		return $this;
	}
    /** @return bool|null An existing WebSocket session will be disconnected before creating a new WebSocket session. */
	public function getForce(): ?bool {
		return $this->force;
	}
    /** @param bool|null $force An existing WebSocket session will be disconnected before creating a new WebSocket session. */
	public function setForce(?bool $force) {
		$this->force = $force;
	}
    /**
     * @param bool|null $force An existing WebSocket session will be disconnected before creating a new WebSocket session.
     * @return SetUserIdRequest
     */
	public function withForce(?bool $force): SetUserIdRequest {
		$this->force = $force;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SetUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SetUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new SetUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withAllowConcurrentAccess(array_key_exists('allowConcurrentAccess', $data) ? $data['allowConcurrentAccess'] : null)
            ->withSessionId(array_key_exists('sessionId', $data) && $data['sessionId'] !== null ? $data['sessionId'] : null)
            ->withForce(array_key_exists('force', $data) ? $data['force'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "allowConcurrentAccess" => $this->getAllowConcurrentAccess(),
            "sessionId" => $this->getSessionId(),
            "force" => $this->getForce(),
        );
    }
}