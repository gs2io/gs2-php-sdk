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

namespace Gs2\Identifier\Model;

use Gs2\Core\Model\IModel;


class Password implements IModel {
	/**
     * @var string
	 */
	private $passwordId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $userName;
	/**
     * @var string
	 */
	private $enableTwoFactorAuthentication;
	/**
     * @var TwoFactorAuthenticationSetting
	 */
	private $twoFactorAuthenticationSetting;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $revision;
	public function getPasswordId(): ?string {
		return $this->passwordId;
	}
	public function setPasswordId(?string $passwordId) {
		$this->passwordId = $passwordId;
	}
	public function withPasswordId(?string $passwordId): Password {
		$this->passwordId = $passwordId;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): Password {
		$this->userId = $userId;
		return $this;
	}
	public function getUserName(): ?string {
		return $this->userName;
	}
	public function setUserName(?string $userName) {
		$this->userName = $userName;
	}
	public function withUserName(?string $userName): Password {
		$this->userName = $userName;
		return $this;
	}
	public function getEnableTwoFactorAuthentication(): ?string {
		return $this->enableTwoFactorAuthentication;
	}
	public function setEnableTwoFactorAuthentication(?string $enableTwoFactorAuthentication) {
		$this->enableTwoFactorAuthentication = $enableTwoFactorAuthentication;
	}
	public function withEnableTwoFactorAuthentication(?string $enableTwoFactorAuthentication): Password {
		$this->enableTwoFactorAuthentication = $enableTwoFactorAuthentication;
		return $this;
	}
	public function getTwoFactorAuthenticationSetting(): ?TwoFactorAuthenticationSetting {
		return $this->twoFactorAuthenticationSetting;
	}
	public function setTwoFactorAuthenticationSetting(?TwoFactorAuthenticationSetting $twoFactorAuthenticationSetting) {
		$this->twoFactorAuthenticationSetting = $twoFactorAuthenticationSetting;
	}
	public function withTwoFactorAuthenticationSetting(?TwoFactorAuthenticationSetting $twoFactorAuthenticationSetting): Password {
		$this->twoFactorAuthenticationSetting = $twoFactorAuthenticationSetting;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Password {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): Password {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Password {
        if ($data === null) {
            return null;
        }
        return (new Password())
            ->withPasswordId(array_key_exists('passwordId', $data) && $data['passwordId'] !== null ? $data['passwordId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withUserName(array_key_exists('userName', $data) && $data['userName'] !== null ? $data['userName'] : null)
            ->withEnableTwoFactorAuthentication(array_key_exists('enableTwoFactorAuthentication', $data) && $data['enableTwoFactorAuthentication'] !== null ? $data['enableTwoFactorAuthentication'] : null)
            ->withTwoFactorAuthenticationSetting(array_key_exists('twoFactorAuthenticationSetting', $data) && $data['twoFactorAuthenticationSetting'] !== null ? TwoFactorAuthenticationSetting::fromJson($data['twoFactorAuthenticationSetting']) : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "passwordId" => $this->getPasswordId(),
            "userId" => $this->getUserId(),
            "userName" => $this->getUserName(),
            "enableTwoFactorAuthentication" => $this->getEnableTwoFactorAuthentication(),
            "twoFactorAuthenticationSetting" => $this->getTwoFactorAuthenticationSetting() !== null ? $this->getTwoFactorAuthenticationSetting()->toJson() : null,
            "createdAt" => $this->getCreatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}