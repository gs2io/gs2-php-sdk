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
 *
 * deny overwrite
 */

namespace Gs2\Identifier\Result;

use Gs2\Core\Model\IResult;

class LoginResult implements IResult {
    /** @var string */
    private $accessToken;
    /** @var string */
    private $tokenType;
    /** @var int */
    private $expiresIn;

	public function getAccessToken(): ?string {
		return $this->accessToken;
	}

	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}

	public function withAccessToken(?string $accessToken): LoginResult {
		$this->accessToken = $accessToken;
		return $this;
	}

	public function getTokenType(): ?string {
		return $this->tokenType;
	}

	public function setTokenType(?string $tokenType) {
		$this->tokenType = $tokenType;
	}

	public function withTokenType(?string $tokenType): LoginResult {
		$this->tokenType = $tokenType;
		return $this;
	}

	public function getExpiresIn(): ?int {
		return $this->expiresIn;
	}

	public function setExpiresIn(?int $expiresIn) {
		$this->expiresIn = $expiresIn;
	}

	public function withExpiresIn(?int $expiresIn): LoginResult {
		$this->expiresIn = $expiresIn;
		return $this;
	}

    public static function fromJson(?array $data): ?LoginResult {
        if ($data === null) {
            return null;
        }
        return (new LoginResult())
            ->withAccessToken(empty($data['access_token']) ? null : $data['access_token'])
            ->withTokenType(empty($data['token_type']) ? null : $data['token_type'])
            ->withExpiresIn(empty($data['expires_in']) && $data['expires_in'] !== 0 ? null : $data['expires_in']);
    }

    public function toJson(): array {
        return array(
            "access_token" => $this->getAccessToken(),
            "token_type" => $this->getTokenType(),
            "expires_in" => $this->getExpiresIn(),
        );
    }
}