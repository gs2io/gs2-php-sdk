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


/**
 * Joined Guild
 *
 * @see https://docs.gs2.io/api_reference/guild/sdk/#joinedguild
 */
class JoinedGuild implements IModel {
	/**
     * @var string Joined Guild GRN
	 */
	private $joinedGuildId;
	/**
     * @var string Guild Model Name
	 */
	private $guildModelName;
	/**
     * @var string Guild Name
	 */
	private $guildName;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Joined Guild GRN */
	public function getJoinedGuildId(): ?string {
		return $this->joinedGuildId;
	}
    /** @param string|null $joinedGuildId Joined Guild GRN */
	public function setJoinedGuildId(?string $joinedGuildId) {
		$this->joinedGuildId = $joinedGuildId;
	}
    /**
     * @param string|null $joinedGuildId Joined Guild GRN
     * @return JoinedGuild
     */
	public function withJoinedGuildId(?string $joinedGuildId): JoinedGuild {
		$this->joinedGuildId = $joinedGuildId;
		return $this;
	}
    /** @return string|null Guild Model Name */
	public function getGuildModelName(): ?string {
		return $this->guildModelName;
	}
    /** @param string|null $guildModelName Guild Model Name */
	public function setGuildModelName(?string $guildModelName) {
		$this->guildModelName = $guildModelName;
	}
    /**
     * @param string|null $guildModelName Guild Model Name
     * @return JoinedGuild
     */
	public function withGuildModelName(?string $guildModelName): JoinedGuild {
		$this->guildModelName = $guildModelName;
		return $this;
	}
    /** @return string|null Guild Name */
	public function getGuildName(): ?string {
		return $this->guildName;
	}
    /** @param string|null $guildName Guild Name */
	public function setGuildName(?string $guildName) {
		$this->guildName = $guildName;
	}
    /**
     * @param string|null $guildName Guild Name
     * @return JoinedGuild
     */
	public function withGuildName(?string $guildName): JoinedGuild {
		$this->guildName = $guildName;
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
     * @return JoinedGuild
     */
	public function withUserId(?string $userId): JoinedGuild {
		$this->userId = $userId;
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
     * @return JoinedGuild
     */
	public function withCreatedAt(?int $createdAt): JoinedGuild {
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
     * @return JoinedGuild
     */
	public function withRevision(?int $revision): JoinedGuild {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?JoinedGuild {
        if ($data === null) {
            return null;
        }
        return (new JoinedGuild())
            ->withJoinedGuildId(array_key_exists('joinedGuildId', $data) && $data['joinedGuildId'] !== null ? $data['joinedGuildId'] : null)
            ->withGuildModelName(array_key_exists('guildModelName', $data) && $data['guildModelName'] !== null ? $data['guildModelName'] : null)
            ->withGuildName(array_key_exists('guildName', $data) && $data['guildName'] !== null ? $data['guildName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "joinedGuildId" => $this->getJoinedGuildId(),
            "guildModelName" => $this->getGuildModelName(),
            "guildName" => $this->getGuildName(),
            "userId" => $this->getUserId(),
            "createdAt" => $this->getCreatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}