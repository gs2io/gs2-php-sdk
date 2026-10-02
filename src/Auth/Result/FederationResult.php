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

namespace Gs2\Auth\Result;

use Gs2\Core\Model\IResult;

/**
 * Result of federation: User ID Federation
 *
 * @see https://docs.gs2.io/api_reference/auth/sdk/#federation
 */
class FederationResult implements IResult {
    /** @var string Access token */
    private $token;
    /** @var string User ID */
    private $userId;
    /** @var int Expiration time */
    private $expire;

    /** @return string|null Access token */
	public function getToken(): ?string {
		return $this->token;
	}

    /** @param string|null $token Access token */
	public function setToken(?string $token) {
		$this->token = $token;
	}

    /**
     * @param string|null $token Access token
     * @return FederationResult
     */
	public function withToken(?string $token): FederationResult {
		$this->token = $token;
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
     * @return FederationResult
     */
	public function withUserId(?string $userId): FederationResult {
		$this->userId = $userId;
		return $this;
	}

    /** @return int|null Expiration time */
	public function getExpire(): ?int {
		return $this->expire;
	}

    /** @param int|null $expire Expiration time */
	public function setExpire(?int $expire) {
		$this->expire = $expire;
	}

    /**
     * @param int|null $expire Expiration time
     * @return FederationResult
     */
	public function withExpire(?int $expire): FederationResult {
		$this->expire = $expire;
		return $this;
	}

    public static function fromJson(?array $data): ?FederationResult {
        if ($data === null) {
            return null;
        }
        return (new FederationResult())
            ->withToken(array_key_exists('token', $data) && $data['token'] !== null ? $data['token'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withExpire(array_key_exists('expire', $data) && $data['expire'] !== null ? $data['expire'] : null);
    }

    public function toJson(): array {
        return array(
            "token" => $this->getToken(),
            "userId" => $this->getUserId(),
            "expire" => $this->getExpire(),
        );
    }
}