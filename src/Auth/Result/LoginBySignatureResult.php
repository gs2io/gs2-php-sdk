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

class LoginBySignatureResult implements IResult {
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

	public function withToken(?string $token): LoginBySignatureResult {
		$this->token = $token;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): LoginBySignatureResult {
		$this->userId = $userId;
		return $this;
	}

	public function getExpire(): ?int {
		return $this->expire;
	}

	public function setExpire(?int $expire) {
		$this->expire = $expire;
	}

	public function withExpire(?int $expire): LoginBySignatureResult {
		$this->expire = $expire;
		return $this;
	}

    public static function fromJson(?array $data): ?LoginBySignatureResult {
        if ($data === null) {
            return null;
        }
        return (new LoginBySignatureResult())
            ->withToken(empty($data['token']) ? null : $data['token'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withExpire(empty($data['expire']) ? null : $data['expire']);
    }

    public function toJson(): array {
        return array(
            "token" => $this->getToken(),
            "userId" => $this->getUserId(),
            "expire" => $this->getExpire(),
        );
    }
}