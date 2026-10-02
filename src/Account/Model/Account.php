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


/**
 * Game Player Account
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#account
 */
class Account implements IModel {
	/**
     * @var string Game Player Account GRN
	 */
	private $accountId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Password
	 */
	private $password;
	/**
     * @var int Time offset from the current time (number of seconds relative to the current time)
	 */
	private $timeOffset;
	/**
     * @var array List of Account Ban Statuses
	 */
	private $banStatuses;
	/**
     * @var bool Whether the Account is currently banned
	 */
	private $banned;
	/**
     * @var int Last authenticated time
	 */
	private $lastAuthenticatedAt;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Game Player Account GRN */
	public function getAccountId(): ?string {
		return $this->accountId;
	}
    /** @param string|null $accountId Game Player Account GRN */
	public function setAccountId(?string $accountId) {
		$this->accountId = $accountId;
	}
    /**
     * @param string|null $accountId Game Player Account GRN
     * @return Account
     */
	public function withAccountId(?string $accountId): Account {
		$this->accountId = $accountId;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return Account
     */
	public function withUserId(?string $userId): Account {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Password */
	public function getPassword(): ?string {
		return $this->password;
	}
    /** @param string|null $password Password */
	public function setPassword(?string $password) {
		$this->password = $password;
	}
    /**
     * @param string|null $password Password
     * @return Account
     */
	public function withPassword(?string $password): Account {
		$this->password = $password;
		return $this;
	}
    /** @return int|null Time offset from the current time (number of seconds relative to the current time) */
	public function getTimeOffset(): ?int {
		return $this->timeOffset;
	}
    /** @param int|null $timeOffset Time offset from the current time (number of seconds relative to the current time) */
	public function setTimeOffset(?int $timeOffset) {
		$this->timeOffset = $timeOffset;
	}
    /**
     * @param int|null $timeOffset Time offset from the current time (number of seconds relative to the current time)
     * @return Account
     */
	public function withTimeOffset(?int $timeOffset): Account {
		$this->timeOffset = $timeOffset;
		return $this;
	}
    /** @return array|null List of Account Ban Statuses */
	public function getBanStatuses(): ?array {
		return $this->banStatuses;
	}
    /** @param array|null $banStatuses List of Account Ban Statuses */
	public function setBanStatuses(?array $banStatuses) {
		$this->banStatuses = $banStatuses;
	}
    /**
     * @param array|null $banStatuses List of Account Ban Statuses
     * @return Account
     */
	public function withBanStatuses(?array $banStatuses): Account {
		$this->banStatuses = $banStatuses;
		return $this;
	}
    /** @return bool|null Whether the Account is currently banned */
	public function getBanned(): ?bool {
		return $this->banned;
	}
    /** @param bool|null $banned Whether the Account is currently banned */
	public function setBanned(?bool $banned) {
		$this->banned = $banned;
	}
    /**
     * @param bool|null $banned Whether the Account is currently banned
     * @return Account
     */
	public function withBanned(?bool $banned): Account {
		$this->banned = $banned;
		return $this;
	}
    /** @return int|null Last authenticated time */
	public function getLastAuthenticatedAt(): ?int {
		return $this->lastAuthenticatedAt;
	}
    /** @param int|null $lastAuthenticatedAt Last authenticated time */
	public function setLastAuthenticatedAt(?int $lastAuthenticatedAt) {
		$this->lastAuthenticatedAt = $lastAuthenticatedAt;
	}
    /**
     * @param int|null $lastAuthenticatedAt Last authenticated time
     * @return Account
     */
	public function withLastAuthenticatedAt(?int $lastAuthenticatedAt): Account {
		$this->lastAuthenticatedAt = $lastAuthenticatedAt;
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
     * @return Account
     */
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
            ->withBanStatuses(!array_key_exists('banStatuses', $data) || $data['banStatuses'] === null ? null : array_map(
                function ($item) {
                    return BanStatus::fromJson($item);
                },
                $data['banStatuses']
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
            "banStatuses" => $this->getBanStatuses() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getBanStatuses()
            ),
            "banned" => $this->getBanned(),
            "lastAuthenticatedAt" => $this->getLastAuthenticatedAt(),
            "createdAt" => $this->getCreatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}