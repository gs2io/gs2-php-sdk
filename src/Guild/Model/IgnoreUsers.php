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

namespace Gs2\Guild\Model;

use Gs2\Core\Model\IModel;


class IgnoreUsers implements IModel {
	/**
     * @var string
	 */
	private $ignoreUsersId;
	/**
     * @var string
	 */
	private $guildModelName;
	/**
     * @var array
	 */
	private $users;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	/**
     * @var int
	 */
	private $revision;
	public function getIgnoreUsersId(): ?string {
		return $this->ignoreUsersId;
	}
	public function setIgnoreUsersId(?string $ignoreUsersId) {
		$this->ignoreUsersId = $ignoreUsersId;
	}
	public function withIgnoreUsersId(?string $ignoreUsersId): IgnoreUsers {
		$this->ignoreUsersId = $ignoreUsersId;
		return $this;
	}
	public function getGuildModelName(): ?string {
		return $this->guildModelName;
	}
	public function setGuildModelName(?string $guildModelName) {
		$this->guildModelName = $guildModelName;
	}
	public function withGuildModelName(?string $guildModelName): IgnoreUsers {
		$this->guildModelName = $guildModelName;
		return $this;
	}
	public function getUsers(): ?array {
		return $this->users;
	}
	public function setUsers(?array $users) {
		$this->users = $users;
	}
	public function withUsers(?array $users): IgnoreUsers {
		$this->users = $users;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): IgnoreUsers {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): IgnoreUsers {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): IgnoreUsers {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?IgnoreUsers {
        if ($data === null) {
            return null;
        }
        return (new IgnoreUsers())
            ->withIgnoreUsersId(array_key_exists('ignoreUsersId', $data) && $data['ignoreUsersId'] !== null ? $data['ignoreUsersId'] : null)
            ->withGuildModelName(array_key_exists('guildModelName', $data) && $data['guildModelName'] !== null ? $data['guildModelName'] : null)
            ->withUsers(array_map(
                function ($item) {
                    return IgnoreUser::fromJson($item);
                },
                array_key_exists('users', $data) && $data['users'] !== null ? $data['users'] : []
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "ignoreUsersId" => $this->getIgnoreUsersId(),
            "guildModelName" => $this->getGuildModelName(),
            "users" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getUsers() !== null && $this->getUsers() !== null ? $this->getUsers() : []
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}