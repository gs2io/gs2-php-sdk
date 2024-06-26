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

class FederationResult implements IResult {
    /** @var string */
    private $token;
    /** @var string */
    private $userId;
    /** @var int */
    private $expire;

	public function getToken(): ?string {
		return $this->token;
	}

	public function setToken(?string $token) {
		$this->token = $token;
	}

	public function withToken(?string $token): FederationResult {
		$this->token = $token;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): FederationResult {
		$this->userId = $userId;
		return $this;
	}

	public function getExpire(): ?int {
		return $this->expire;
	}

	public function setExpire(?int $expire) {
		$this->expire = $expire;
	}

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