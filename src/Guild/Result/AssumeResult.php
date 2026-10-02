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

namespace Gs2\Guild\Result;

use Gs2\Core\Model\IResult;

/**
 * Result of assume: Get an access token to act as a guild user
 *
 * @see https://docs.gs2.io/api_reference/guild/sdk/#assume
 */
class AssumeResult implements IResult {
    /** @var string Guild Access Token */
    private $token;
    /** @var string User ID */
    private $userId;
    /** @var int Expiration time */
    private $expire;

    /** @return string|null Guild Access Token */
	public function getToken(): ?string {
		return $this->token;
	}

    /** @param string|null $token Guild Access Token */
	public function setToken(?string $token) {
		$this->token = $token;
	}

    /**
     * @param string|null $token Guild Access Token
     * @return AssumeResult
     */
	public function withToken(?string $token): AssumeResult {
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
     * @return AssumeResult
     */
	public function withUserId(?string $userId): AssumeResult {
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
     * @return AssumeResult
     */
	public function withExpire(?int $expire): AssumeResult {
		$this->expire = $expire;
		return $this;
	}

    public static function fromJson(?array $data): ?AssumeResult {
        if ($data === null) {
            return null;
        }
        return (new AssumeResult())
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