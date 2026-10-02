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
 * Guild
 *
 * @see https://docs.gs2.io/api_reference/guild/sdk/#guild
 */
class Guild implements IModel {
	/**
     * @var string Guild GRN
	 */
	private $guildId;
	/**
     * @var string Guild Model name
	 */
	private $guildModelName;
	/**
     * @var string Guild Name
	 */
	private $name;
	/**
     * @var string Display Name
	 */
	private $displayName;
	/**
     * @var int Attribute 1
	 */
	private $attribute1;
	/**
     * @var int Attribute 2
	 */
	private $attribute2;
	/**
     * @var int Attribute 3
	 */
	private $attribute3;
	/**
     * @var int Attribute 4
	 */
	private $attribute4;
	/**
     * @var int Attribute 5
	 */
	private $attribute5;
	/**
     * @var string Guild Metadata
	 */
	private $metadata;
	/**
     * @var string Join Policy
	 */
	private $joinPolicy;
	/**
     * @var array Custom Roles List
	 */
	private $customRoles;
	/**
     * @var string Default Custom Role
	 */
	private $guildMemberDefaultRole;
	/**
     * @var int Current Maximum Member Count
	 */
	private $currentMaximumMemberCount;
	/**
     * @var array Guild Member List
	 */
	private $members;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Guild GRN */
	public function getGuildId(): ?string {
		return $this->guildId;
	}
    /** @param string|null $guildId Guild GRN */
	public function setGuildId(?string $guildId) {
		$this->guildId = $guildId;
	}
    /**
     * @param string|null $guildId Guild GRN
     * @return Guild
     */
	public function withGuildId(?string $guildId): Guild {
		$this->guildId = $guildId;
		return $this;
	}
    /** @return string|null Guild Model name */
	public function getGuildModelName(): ?string {
		return $this->guildModelName;
	}
    /** @param string|null $guildModelName Guild Model name */
	public function setGuildModelName(?string $guildModelName) {
		$this->guildModelName = $guildModelName;
	}
    /**
     * @param string|null $guildModelName Guild Model name
     * @return Guild
     */
	public function withGuildModelName(?string $guildModelName): Guild {
		$this->guildModelName = $guildModelName;
		return $this;
	}
    /** @return string|null Guild Name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Guild Name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Guild Name
     * @return Guild
     */
	public function withName(?string $name): Guild {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Display Name */
	public function getDisplayName(): ?string {
		return $this->displayName;
	}
    /** @param string|null $displayName Display Name */
	public function setDisplayName(?string $displayName) {
		$this->displayName = $displayName;
	}
    /**
     * @param string|null $displayName Display Name
     * @return Guild
     */
	public function withDisplayName(?string $displayName): Guild {
		$this->displayName = $displayName;
		return $this;
	}
    /** @return int|null Attribute 1 */
	public function getAttribute1(): ?int {
		return $this->attribute1;
	}
    /** @param int|null $attribute1 Attribute 1 */
	public function setAttribute1(?int $attribute1) {
		$this->attribute1 = $attribute1;
	}
    /**
     * @param int|null $attribute1 Attribute 1
     * @return Guild
     */
	public function withAttribute1(?int $attribute1): Guild {
		$this->attribute1 = $attribute1;
		return $this;
	}
    /** @return int|null Attribute 2 */
	public function getAttribute2(): ?int {
		return $this->attribute2;
	}
    /** @param int|null $attribute2 Attribute 2 */
	public function setAttribute2(?int $attribute2) {
		$this->attribute2 = $attribute2;
	}
    /**
     * @param int|null $attribute2 Attribute 2
     * @return Guild
     */
	public function withAttribute2(?int $attribute2): Guild {
		$this->attribute2 = $attribute2;
		return $this;
	}
    /** @return int|null Attribute 3 */
	public function getAttribute3(): ?int {
		return $this->attribute3;
	}
    /** @param int|null $attribute3 Attribute 3 */
	public function setAttribute3(?int $attribute3) {
		$this->attribute3 = $attribute3;
	}
    /**
     * @param int|null $attribute3 Attribute 3
     * @return Guild
     */
	public function withAttribute3(?int $attribute3): Guild {
		$this->attribute3 = $attribute3;
		return $this;
	}
    /** @return int|null Attribute 4 */
	public function getAttribute4(): ?int {
		return $this->attribute4;
	}
    /** @param int|null $attribute4 Attribute 4 */
	public function setAttribute4(?int $attribute4) {
		$this->attribute4 = $attribute4;
	}
    /**
     * @param int|null $attribute4 Attribute 4
     * @return Guild
     */
	public function withAttribute4(?int $attribute4): Guild {
		$this->attribute4 = $attribute4;
		return $this;
	}
    /** @return int|null Attribute 5 */
	public function getAttribute5(): ?int {
		return $this->attribute5;
	}
    /** @param int|null $attribute5 Attribute 5 */
	public function setAttribute5(?int $attribute5) {
		$this->attribute5 = $attribute5;
	}
    /**
     * @param int|null $attribute5 Attribute 5
     * @return Guild
     */
	public function withAttribute5(?int $attribute5): Guild {
		$this->attribute5 = $attribute5;
		return $this;
	}
    /** @return string|null Guild Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Guild Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Guild Metadata
     * @return Guild
     */
	public function withMetadata(?string $metadata): Guild {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return string|null Join Policy */
	public function getJoinPolicy(): ?string {
		return $this->joinPolicy;
	}
    /** @param string|null $joinPolicy Join Policy */
	public function setJoinPolicy(?string $joinPolicy) {
		$this->joinPolicy = $joinPolicy;
	}
    /**
     * @param string|null $joinPolicy Join Policy
     * @return Guild
     */
	public function withJoinPolicy(?string $joinPolicy): Guild {
		$this->joinPolicy = $joinPolicy;
		return $this;
	}
    /** @return array|null Custom Roles List */
	public function getCustomRoles(): ?array {
		return $this->customRoles;
	}
    /** @param array|null $customRoles Custom Roles List */
	public function setCustomRoles(?array $customRoles) {
		$this->customRoles = $customRoles;
	}
    /**
     * @param array|null $customRoles Custom Roles List
     * @return Guild
     */
	public function withCustomRoles(?array $customRoles): Guild {
		$this->customRoles = $customRoles;
		return $this;
	}
    /** @return string|null Default Custom Role */
	public function getGuildMemberDefaultRole(): ?string {
		return $this->guildMemberDefaultRole;
	}
    /** @param string|null $guildMemberDefaultRole Default Custom Role */
	public function setGuildMemberDefaultRole(?string $guildMemberDefaultRole) {
		$this->guildMemberDefaultRole = $guildMemberDefaultRole;
	}
    /**
     * @param string|null $guildMemberDefaultRole Default Custom Role
     * @return Guild
     */
	public function withGuildMemberDefaultRole(?string $guildMemberDefaultRole): Guild {
		$this->guildMemberDefaultRole = $guildMemberDefaultRole;
		return $this;
	}
    /** @return int|null Current Maximum Member Count */
	public function getCurrentMaximumMemberCount(): ?int {
		return $this->currentMaximumMemberCount;
	}
    /** @param int|null $currentMaximumMemberCount Current Maximum Member Count */
	public function setCurrentMaximumMemberCount(?int $currentMaximumMemberCount) {
		$this->currentMaximumMemberCount = $currentMaximumMemberCount;
	}
    /**
     * @param int|null $currentMaximumMemberCount Current Maximum Member Count
     * @return Guild
     */
	public function withCurrentMaximumMemberCount(?int $currentMaximumMemberCount): Guild {
		$this->currentMaximumMemberCount = $currentMaximumMemberCount;
		return $this;
	}
    /** @return array|null Guild Member List */
	public function getMembers(): ?array {
		return $this->members;
	}
    /** @param array|null $members Guild Member List */
	public function setMembers(?array $members) {
		$this->members = $members;
	}
    /**
     * @param array|null $members Guild Member List
     * @return Guild
     */
	public function withMembers(?array $members): Guild {
		$this->members = $members;
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
     * @return Guild
     */
	public function withCreatedAt(?int $createdAt): Guild {
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
     * @return Guild
     */
	public function withUpdatedAt(?int $updatedAt): Guild {
		$this->updatedAt = $updatedAt;
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
     * @return Guild
     */
	public function withRevision(?int $revision): Guild {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Guild {
        if ($data === null) {
            return null;
        }
        return (new Guild())
            ->withGuildId(array_key_exists('guildId', $data) && $data['guildId'] !== null ? $data['guildId'] : null)
            ->withGuildModelName(array_key_exists('guildModelName', $data) && $data['guildModelName'] !== null ? $data['guildModelName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDisplayName(array_key_exists('displayName', $data) && $data['displayName'] !== null ? $data['displayName'] : null)
            ->withAttribute1(array_key_exists('attribute1', $data) && $data['attribute1'] !== null ? $data['attribute1'] : null)
            ->withAttribute2(array_key_exists('attribute2', $data) && $data['attribute2'] !== null ? $data['attribute2'] : null)
            ->withAttribute3(array_key_exists('attribute3', $data) && $data['attribute3'] !== null ? $data['attribute3'] : null)
            ->withAttribute4(array_key_exists('attribute4', $data) && $data['attribute4'] !== null ? $data['attribute4'] : null)
            ->withAttribute5(array_key_exists('attribute5', $data) && $data['attribute5'] !== null ? $data['attribute5'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withJoinPolicy(array_key_exists('joinPolicy', $data) && $data['joinPolicy'] !== null ? $data['joinPolicy'] : null)
            ->withCustomRoles(!array_key_exists('customRoles', $data) || $data['customRoles'] === null ? null : array_map(
                function ($item) {
                    return RoleModel::fromJson($item);
                },
                $data['customRoles']
            ))
            ->withGuildMemberDefaultRole(array_key_exists('guildMemberDefaultRole', $data) && $data['guildMemberDefaultRole'] !== null ? $data['guildMemberDefaultRole'] : null)
            ->withCurrentMaximumMemberCount(array_key_exists('currentMaximumMemberCount', $data) && $data['currentMaximumMemberCount'] !== null ? $data['currentMaximumMemberCount'] : null)
            ->withMembers(!array_key_exists('members', $data) || $data['members'] === null ? null : array_map(
                function ($item) {
                    return Member::fromJson($item);
                },
                $data['members']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "guildId" => $this->getGuildId(),
            "guildModelName" => $this->getGuildModelName(),
            "name" => $this->getName(),
            "displayName" => $this->getDisplayName(),
            "attribute1" => $this->getAttribute1(),
            "attribute2" => $this->getAttribute2(),
            "attribute3" => $this->getAttribute3(),
            "attribute4" => $this->getAttribute4(),
            "attribute5" => $this->getAttribute5(),
            "metadata" => $this->getMetadata(),
            "joinPolicy" => $this->getJoinPolicy(),
            "customRoles" => $this->getCustomRoles() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getCustomRoles()
            ),
            "guildMemberDefaultRole" => $this->getGuildMemberDefaultRole(),
            "currentMaximumMemberCount" => $this->getCurrentMaximumMemberCount(),
            "members" => $this->getMembers() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getMembers()
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}