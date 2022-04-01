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


class Account implements IModel {
	/**
     * @var string
	 */
	private $accountId;
	/**
     * @var string
	 */
	private $ownerId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $email;
	/**
     * @var string
	 */
	private $fullName;
	/**
     * @var string
	 */
	private $companyName;
	/**
     * @var string
	 */
	private $status;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getAccountId(): ?string {
		return $this->accountId;
	}

	public function setAccountId(?string $accountId) {
		$this->accountId = $accountId;
	}

	public function withAccountId(?string $accountId): Account {
		$this->accountId = $accountId;
		return $this;
	}

	public function getOwnerId(): ?string {
		return $this->ownerId;
	}

	public function setOwnerId(?string $ownerId) {
		$this->ownerId = $ownerId;
	}

	public function withOwnerId(?string $ownerId): Account {
		$this->ownerId = $ownerId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): Account {
		$this->name = $name;
		return $this;
	}

	public function getEmail(): ?string {
		return $this->email;
	}

	public function setEmail(?string $email) {
		$this->email = $email;
	}

	public function withEmail(?string $email): Account {
		$this->email = $email;
		return $this;
	}

	public function getFullName(): ?string {
		return $this->fullName;
	}

	public function setFullName(?string $fullName) {
		$this->fullName = $fullName;
	}

	public function withFullName(?string $fullName): Account {
		$this->fullName = $fullName;
		return $this;
	}

	public function getCompanyName(): ?string {
		return $this->companyName;
	}

	public function setCompanyName(?string $companyName) {
		$this->companyName = $companyName;
	}

	public function withCompanyName(?string $companyName): Account {
		$this->companyName = $companyName;
		return $this;
	}

	public function getStatus(): ?string {
		return $this->status;
	}

	public function setStatus(?string $status) {
		$this->status = $status;
	}

	public function withStatus(?string $status): Account {
		$this->status = $status;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): Account {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

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
            ->withOwnerId(array_key_exists('ownerId', $data) && $data['ownerId'] !== null ? $data['ownerId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withEmail(array_key_exists('email', $data) && $data['email'] !== null ? $data['email'] : null)
            ->withFullName(array_key_exists('fullName', $data) && $data['fullName'] !== null ? $data['fullName'] : null)
            ->withCompanyName(array_key_exists('companyName', $data) && $data['companyName'] !== null ? $data['companyName'] : null)
            ->withStatus(array_key_exists('status', $data) && $data['status'] !== null ? $data['status'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "accountId" => $this->getAccountId(),
            "ownerId" => $this->getOwnerId(),
            "name" => $this->getName(),
            "email" => $this->getEmail(),
            "fullName" => $this->getFullName(),
            "companyName" => $this->getCompanyName(),
            "status" => $this->getStatus(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}