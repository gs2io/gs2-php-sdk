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

namespace Gs2\Account\Model;

use Gs2\Core\Model\IModel;


class Account implements IModel {
	/**
     * @var string
	 */
	private $accountId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $password;
	/**
     * @var int
	 */
	private $timeOffset;
	/**
     * @var int
	 */
	private $createdAt;

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

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): Account {
		$this->userId = $userId;
		return $this;
	}

	public function getPassword(): ?string {
		return $this->password;
	}

	public function setPassword(?string $password) {
		$this->password = $password;
	}

	public function withPassword(?string $password): Account {
		$this->password = $password;
		return $this;
	}

	public function getTimeOffset(): ?int {
		return $this->timeOffset;
	}

	public function setTimeOffset(?int $timeOffset) {
		$this->timeOffset = $timeOffset;
	}

	public function withTimeOffset(?int $timeOffset): Account {
		$this->timeOffset = $timeOffset;
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

    public static function fromJson(?array $data): ?Account {
        if ($data === null) {
            return null;
        }
        return (new Account())
            ->withAccountId(empty($data['accountId']) ? null : $data['accountId'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withPassword(empty($data['password']) ? null : $data['password'])
            ->withTimeOffset(empty($data['timeOffset']) ? null : $data['timeOffset'])
            ->withCreatedAt(empty($data['createdAt']) ? null : $data['createdAt']);
    }

    public function toJson(): array {
        return array(
            "accountId" => $this->getAccountId(),
            "userId" => $this->getUserId(),
            "password" => $this->getPassword(),
            "timeOffset" => $this->getTimeOffset(),
            "createdAt" => $this->getCreatedAt(),
        );
    }
}