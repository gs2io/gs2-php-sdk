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


/**
 * Password
 *
 * @see https://docs.gs2.io/api_reference/identifier/sdk/#password
 */
class Password implements IModel {
	/**
     * @var string Password GRN
	 */
	private $passwordId;
	/**
     * @var string GS2-Identifier User GRN
	 */
	private $userId;
	/**
     * @var string User Name
	 */
	private $userName;
	/**
     * @var string Two-Factor Authentication
	 */
	private $enableTwoFactorAuthentication;
	/**
     * @var TwoFactorAuthenticationSetting Two-Factor Authentication Setting
	 */
	private $twoFactorAuthenticationSetting;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Password GRN */
	public function getPasswordId(): ?string {
		return $this->passwordId;
	}
    /** @param string|null $passwordId Password GRN */
	public function setPasswordId(?string $passwordId) {
		$this->passwordId = $passwordId;
	}
    /**
     * @param string|null $passwordId Password GRN
     * @return Password
     */
	public function withPasswordId(?string $passwordId): Password {
		$this->passwordId = $passwordId;
		return $this;
	}
    /** @return string|null GS2-Identifier User GRN */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId GS2-Identifier User GRN */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId GS2-Identifier User GRN
     * @return Password
     */
	public function withUserId(?string $userId): Password {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null User Name */
	public function getUserName(): ?string {
		return $this->userName;
	}
    /** @param string|null $userName User Name */
	public function setUserName(?string $userName) {
		$this->userName = $userName;
	}
    /**
     * @param string|null $userName User Name
     * @return Password
     */
	public function withUserName(?string $userName): Password {
		$this->userName = $userName;
		return $this;
	}
    /** @return string|null Two-Factor Authentication */
	public function getEnableTwoFactorAuthentication(): ?string {
		return $this->enableTwoFactorAuthentication;
	}
    /** @param string|null $enableTwoFactorAuthentication Two-Factor Authentication */
	public function setEnableTwoFactorAuthentication(?string $enableTwoFactorAuthentication) {
		$this->enableTwoFactorAuthentication = $enableTwoFactorAuthentication;
	}
    /**
     * @param string|null $enableTwoFactorAuthentication Two-Factor Authentication
     * @return Password
     */
	public function withEnableTwoFactorAuthentication(?string $enableTwoFactorAuthentication): Password {
		$this->enableTwoFactorAuthentication = $enableTwoFactorAuthentication;
		return $this;
	}
    /** @return TwoFactorAuthenticationSetting|null Two-Factor Authentication Setting */
	public function getTwoFactorAuthenticationSetting(): ?TwoFactorAuthenticationSetting {
		return $this->twoFactorAuthenticationSetting;
	}
    /** @param TwoFactorAuthenticationSetting|null $twoFactorAuthenticationSetting Two-Factor Authentication Setting */
	public function setTwoFactorAuthenticationSetting(?TwoFactorAuthenticationSetting $twoFactorAuthenticationSetting) {
		$this->twoFactorAuthenticationSetting = $twoFactorAuthenticationSetting;
	}
    /**
     * @param TwoFactorAuthenticationSetting|null $twoFactorAuthenticationSetting Two-Factor Authentication Setting
     * @return Password
     */
	public function withTwoFactorAuthenticationSetting(?TwoFactorAuthenticationSetting $twoFactorAuthenticationSetting): Password {
		$this->twoFactorAuthenticationSetting = $twoFactorAuthenticationSetting;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return Password
     */
	public function withCreatedAt(?int $createdAt): Password {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return Password
     */
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