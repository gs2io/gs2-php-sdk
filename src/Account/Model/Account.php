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
     * @var array
	 */
	private $banStatuses;
	/**
     * @var bool
	 */
	private $banned;
	/**
     * @var int
	 */
	private $lastAuthenticatedAt;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $revision;
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
	public function getBanStatuses(): ?array {
		return $this->banStatuses;
	}
	public function setBanStatuses(?array $banStatuses) {
		$this->banStatuses = $banStatuses;
	}
	public function withBanStatuses(?array $banStatuses): Account {
		$this->banStatuses = $banStatuses;
		return $this;
	}
	public function getBanned(): ?bool {
		return $this->banned;
	}
	public function setBanned(?bool $banned) {
		$this->banned = $banned;
	}
	public function withBanned(?bool $banned): Account {
		$this->banned = $banned;
		return $this;
	}
	public function getLastAuthenticatedAt(): ?int {
		return $this->lastAuthenticatedAt;
	}
	public function setLastAuthenticatedAt(?int $lastAuthenticatedAt) {
		$this->lastAuthenticatedAt = $lastAuthenticatedAt;
	}
	public function withLastAuthenticatedAt(?int $lastAuthenticatedAt): Account {
		$this->lastAuthenticatedAt = $lastAuthenticatedAt;
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
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): Account {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Account {
        if ($data === null) {
            return null;
        }
        return (new Account())
            ->withAccountId(array_key_exists('accountId', $data) && $data['accountId'] !== null ? $data['accountId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withPassword(array_key_exists('password', $data) && $data['password'] !== null ? $data['password'] : null)
            ->withTimeOffset(array_key_exists('timeOffset', $data) && $data['timeOffset'] !== null ? $data['timeOffset'] : null)
            ->withBanStatuses(array_map(
                function ($item) {
                    return BanStatus::fromJson($item);
                },
                array_key_exists('banStatuses', $data) && $data['banStatuses'] !== null ? $data['banStatuses'] : []
            ))
            ->withBanned(array_key_exists('banned', $data) ? $data['banned'] : null)
            ->withLastAuthenticatedAt(array_key_exists('lastAuthenticatedAt', $data) && $data['lastAuthenticatedAt'] !== null ? $data['lastAuthenticatedAt'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "accountId" => $this->getAccountId(),
            "userId" => $this->getUserId(),
            "password" => $this->getPassword(),
            "timeOffset" => $this->getTimeOffset(),
            "banStatuses" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getBanStatuses() !== null && $this->getBanStatuses() !== null ? $this->getBanStatuses() : []
            ),
            "banned" => $this->getBanned(),
            "lastAuthenticatedAt" => $this->getLastAuthenticatedAt(),
            "createdAt" => $this->getCreatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}