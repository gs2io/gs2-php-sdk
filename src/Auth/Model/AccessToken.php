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

namespace Gs2\Auth\Model;

use Gs2\Core\Model\IModel;


class AccessToken implements IModel {
	/**
     * @var string
	 */
	private $token;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $federationFromUserId;
	/**
     * @var int
	 */
	private $expire;
	/**
     * @var int
	 */
	private $timeOffset;
	public function getToken(): ?string {
		return $this->token;
	}
	public function setToken(?string $token) {
		$this->token = $token;
	}
	public function withToken(?string $token): AccessToken {
		$this->token = $token;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): AccessToken {
		$this->userId = $userId;
		return $this;
	}
	public function getFederationFromUserId(): ?string {
		return $this->federationFromUserId;
	}
	public function setFederationFromUserId(?string $federationFromUserId) {
		$this->federationFromUserId = $federationFromUserId;
	}
	public function withFederationFromUserId(?string $federationFromUserId): AccessToken {
		$this->federationFromUserId = $federationFromUserId;
		return $this;
	}
	public function getExpire(): ?int {
		return $this->expire;
	}
	public function setExpire(?int $expire) {
		$this->expire = $expire;
	}
	public function withExpire(?int $expire): AccessToken {
		$this->expire = $expire;
		return $this;
	}
	public function getTimeOffset(): ?int {
		return $this->timeOffset;
	}
	public function setTimeOffset(?int $timeOffset) {
		$this->timeOffset = $timeOffset;
	}
	public function withTimeOffset(?int $timeOffset): AccessToken {
		$this->timeOffset = $timeOffset;
		return $this;
	}

    public static function fromJson(?array $data): ?AccessToken {
        if ($data === null) {
            return null;
        }
        return (new AccessToken())
            ->withToken(array_key_exists('token', $data) && $data['token'] !== null ? $data['token'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withFederationFromUserId(array_key_exists('federationFromUserId', $data) && $data['federationFromUserId'] !== null ? $data['federationFromUserId'] : null)
            ->withExpire(array_key_exists('expire', $data) && $data['expire'] !== null ? $data['expire'] : null)
            ->withTimeOffset(array_key_exists('timeOffset', $data) && $data['timeOffset'] !== null ? $data['timeOffset'] : null);
    }

    public function toJson(): array {
        return array(
            "token" => $this->getToken(),
            "userId" => $this->getUserId(),
            "federationFromUserId" => $this->getFederationFromUserId(),
            "expire" => $this->getExpire(),
            "timeOffset" => $this->getTimeOffset(),
        );
    }
}