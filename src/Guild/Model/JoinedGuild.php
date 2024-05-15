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


class JoinedGuild implements IModel {
	/**
     * @var string
	 */
	private $joinedGuildId;
	/**
     * @var string
	 */
	private $guildModelName;
	/**
     * @var string
	 */
	private $guildName;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var int
	 */
	private $createdAt;
	public function getJoinedGuildId(): ?string {
		return $this->joinedGuildId;
	}
	public function setJoinedGuildId(?string $joinedGuildId) {
		$this->joinedGuildId = $joinedGuildId;
	}
	public function withJoinedGuildId(?string $joinedGuildId): JoinedGuild {
		$this->joinedGuildId = $joinedGuildId;
		return $this;
	}
	public function getGuildModelName(): ?string {
		return $this->guildModelName;
	}
	public function setGuildModelName(?string $guildModelName) {
		$this->guildModelName = $guildModelName;
	}
	public function withGuildModelName(?string $guildModelName): JoinedGuild {
		$this->guildModelName = $guildModelName;
		return $this;
	}
	public function getGuildName(): ?string {
		return $this->guildName;
	}
	public function setGuildName(?string $guildName) {
		$this->guildName = $guildName;
	}
	public function withGuildName(?string $guildName): JoinedGuild {
		$this->guildName = $guildName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): JoinedGuild {
		$this->userId = $userId;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): JoinedGuild {
		$this->createdAt = $createdAt;
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
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null);
    }

    public function toJson(): array {
        return array(
            "joinedGuildId" => $this->getJoinedGuildId(),
            "guildModelName" => $this->getGuildModelName(),
            "guildName" => $this->getGuildName(),
            "userId" => $this->getUserId(),
            "createdAt" => $this->getCreatedAt(),
        );
    }
}