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

namespace Gs2\Project\Model;

use Gs2\Core\Model\IModel;


/** GS2 Account */
class Account implements IModel {
	/**
     * @var string GS2 Account GRN
	 */
	private $accountId;
	/**
     * @var string GS2 Account Name
	 */
	private $name;
	/**
     * @var string E-Mail
	 */
	private $email;
	/**
     * @var string Full Name
	 */
	private $fullName;
	/**
     * @var string Company Name
	 */
	private $companyName;
	/**
     * @var string Two-factor authentication
	 */
	private $enableTwoFactorAuthentication;
	/**
     * @var TwoFactorAuthenticationSetting Two-factor authentication setting
	 */
	private $twoFactorAuthenticationSetting;
	/**
     * @var string Status
	 */
	private $status;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
    /** @return string|null GS2 Account GRN */
	public function getAccountId(): ?string {
		return $this->accountId;
	}
    /** @param string|null $accountId GS2 Account GRN */
	public function setAccountId(?string $accountId) {
		$this->accountId = $accountId;
	}
    /**
     * @param string|null $accountId GS2 Account GRN
     * @return Account
     */
	public function withAccountId(?string $accountId): Account {
		$this->accountId = $accountId;
		return $this;
	}
    /** @return string|null GS2 Account Name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name GS2 Account Name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name GS2 Account Name
     * @return Account
     */
	public function withName(?string $name): Account {
		$this->name = $name;
		return $this;
	}
    /** @return string|null E-Mail */
	public function getEmail(): ?string {
		return $this->email;
	}
    /** @param string|null $email E-Mail */
	public function setEmail(?string $email) {
		$this->email = $email;
	}
    /**
     * @param string|null $email E-Mail
     * @return Account
     */
	public function withEmail(?string $email): Account {
		$this->email = $email;
		return $this;
	}
    /** @return string|null Full Name */
	public function getFullName(): ?string {
		return $this->fullName;
	}
    /** @param string|null $fullName Full Name */
	public function setFullName(?string $fullName) {
		$this->fullName = $fullName;
	}
    /**
     * @param string|null $fullName Full Name
     * @return Account
     */
	public function withFullName(?string $fullName): Account {
		$this->fullName = $fullName;
		return $this;
	}
    /** @return string|null Company Name */
	public function getCompanyName(): ?string {
		return $this->companyName;
	}
    /** @param string|null $companyName Company Name */
	public function setCompanyName(?string $companyName) {
		$this->companyName = $companyName;
	}
    /**
     * @param string|null $companyName Company Name
     * @return Account
     */
	public function withCompanyName(?string $companyName): Account {
		$this->companyName = $companyName;
		return $this;
	}
    /** @return string|null Two-factor authentication */
	public function getEnableTwoFactorAuthentication(): ?string {
		return $this->enableTwoFactorAuthentication;
	}
    /** @param string|null $enableTwoFactorAuthentication Two-factor authentication */
	public function setEnableTwoFactorAuthentication(?string $enableTwoFactorAuthentication) {
		$this->enableTwoFactorAuthentication = $enableTwoFactorAuthentication;
	}
    /**
     * @param string|null $enableTwoFactorAuthentication Two-factor authentication
     * @return Account
     */
	public function withEnableTwoFactorAuthentication(?string $enableTwoFactorAuthentication): Account {
		$this->enableTwoFactorAuthentication = $enableTwoFactorAuthentication;
		return $this;
	}
    /** @return TwoFactorAuthenticationSetting|null Two-factor authentication setting */
	public function getTwoFactorAuthenticationSetting(): ?TwoFactorAuthenticationSetting {
		return $this->twoFactorAuthenticationSetting;
	}
    /** @param TwoFactorAuthenticationSetting|null $twoFactorAuthenticationSetting Two-factor authentication setting */
	public function setTwoFactorAuthenticationSetting(?TwoFactorAuthenticationSetting $twoFactorAuthenticationSetting) {
		$this->twoFactorAuthenticationSetting = $twoFactorAuthenticationSetting;
	}
    /**
     * @param TwoFactorAuthenticationSetting|null $twoFactorAuthenticationSetting Two-factor authentication setting
     * @return Account
     */
	public function withTwoFactorAuthenticationSetting(?TwoFactorAuthenticationSetting $twoFactorAuthenticationSetting): Account {
		$this->twoFactorAuthenticationSetting = $twoFactorAuthenticationSetting;
		return $this;
	}
    /** @return string|null Status */
	public function getStatus(): ?string {
		return $this->status;
	}
    /** @param string|null $status Status */
	public function setStatus(?string $status) {
		$this->status = $status;
	}
    /**
     * @param string|null $status Status
     * @return Account
     */
	public function withStatus(?string $status): Account {
		$this->status = $status;
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
     * @return Account
     */
	public function withCreatedAt(?int $createdAt): Account {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return Account
     */
	public function withUpdatedAt(?int $updatedAt): Account {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Account {
        if ($data === null) {
            return null;
        }
        return (new Account())
            ->withAccountId(array_key_exists('accountId', $data) && $data['accountId'] !== null ? $data['accountId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withEmail(array_key_exists('email', $data) && $data['email'] !== null ? $data['email'] : null)
            ->withFullName(array_key_exists('fullName', $data) && $data['fullName'] !== null ? $data['fullName'] : null)
            ->withCompanyName(array_key_exists('companyName', $data) && $data['companyName'] !== null ? $data['companyName'] : null)
            ->withEnableTwoFactorAuthentication(array_key_exists('enableTwoFactorAuthentication', $data) && $data['enableTwoFactorAuthentication'] !== null ? $data['enableTwoFactorAuthentication'] : null)
            ->withTwoFactorAuthenticationSetting(array_key_exists('twoFactorAuthenticationSetting', $data) && $data['twoFactorAuthenticationSetting'] !== null ? TwoFactorAuthenticationSetting::fromJson($data['twoFactorAuthenticationSetting']) : null)
            ->withStatus(array_key_exists('status', $data) && $data['status'] !== null ? $data['status'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "accountId" => $this->getAccountId(),
            "name" => $this->getName(),
            "email" => $this->getEmail(),
            "fullName" => $this->getFullName(),
            "companyName" => $this->getCompanyName(),
            "enableTwoFactorAuthentication" => $this->getEnableTwoFactorAuthentication(),
            "twoFactorAuthenticationSetting" => $this->getTwoFactorAuthenticationSetting() !== null ? $this->getTwoFactorAuthenticationSetting()->toJson() : null,
            "status" => $this->getStatus(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}