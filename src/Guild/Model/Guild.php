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


class Guild implements IModel {
	/**
     * @var string
	 */
	private $guildId;
	/**
     * @var string
	 */
	private $guildModelName;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $displayName;
	/**
     * @var int
	 */
	private $attribute1;
	/**
     * @var int
	 */
	private $attribute2;
	/**
     * @var int
	 */
	private $attribute3;
	/**
     * @var int
	 */
	private $attribute4;
	/**
     * @var int
	 */
	private $attribute5;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var string
	 */
	private $joinPolicy;
	/**
     * @var array
	 */
	private $customRoles;
	/**
     * @var string
	 */
	private $guildMemberDefaultRole;
	/**
     * @var int
	 */
	private $currentMaximumMemberCount;
	/**
     * @var array
	 */
	private $members;
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
	public function getGuildId(): ?string {
		return $this->guildId;
	}
	public function setGuildId(?string $guildId) {
		$this->guildId = $guildId;
	}
	public function withGuildId(?string $guildId): Guild {
		$this->guildId = $guildId;
		return $this;
	}
	public function getGuildModelName(): ?string {
		return $this->guildModelName;
	}
	public function setGuildModelName(?string $guildModelName) {
		$this->guildModelName = $guildModelName;
	}
	public function withGuildModelName(?string $guildModelName): Guild {
		$this->guildModelName = $guildModelName;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): Guild {
		$this->name = $name;
		return $this;
	}
	public function getDisplayName(): ?string {
		return $this->displayName;
	}
	public function setDisplayName(?string $displayName) {
		$this->displayName = $displayName;
	}
	public function withDisplayName(?string $displayName): Guild {
		$this->displayName = $displayName;
		return $this;
	}
	public function getAttribute1(): ?int {
		return $this->attribute1;
	}
	public function setAttribute1(?int $attribute1) {
		$this->attribute1 = $attribute1;
	}
	public function withAttribute1(?int $attribute1): Guild {
		$this->attribute1 = $attribute1;
		return $this;
	}
	public function getAttribute2(): ?int {
		return $this->attribute2;
	}
	public function setAttribute2(?int $attribute2) {
		$this->attribute2 = $attribute2;
	}
	public function withAttribute2(?int $attribute2): Guild {
		$this->attribute2 = $attribute2;
		return $this;
	}
	public function getAttribute3(): ?int {
		return $this->attribute3;
	}
	public function setAttribute3(?int $attribute3) {
		$this->attribute3 = $attribute3;
	}
	public function withAttribute3(?int $attribute3): Guild {
		$this->attribute3 = $attribute3;
		return $this;
	}
	public function getAttribute4(): ?int {
		return $this->attribute4;
	}
	public function setAttribute4(?int $attribute4) {
		$this->attribute4 = $attribute4;
	}
	public function withAttribute4(?int $attribute4): Guild {
		$this->attribute4 = $attribute4;
		return $this;
	}
	public function getAttribute5(): ?int {
		return $this->attribute5;
	}
	public function setAttribute5(?int $attribute5) {
		$this->attribute5 = $attribute5;
	}
	public function withAttribute5(?int $attribute5): Guild {
		$this->attribute5 = $attribute5;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): Guild {
		$this->metadata = $metadata;
		return $this;
	}
	public function getJoinPolicy(): ?string {
		return $this->joinPolicy;
	}
	public function setJoinPolicy(?string $joinPolicy) {
		$this->joinPolicy = $joinPolicy;
	}
	public function withJoinPolicy(?string $joinPolicy): Guild {
		$this->joinPolicy = $joinPolicy;
		return $this;
	}
	public function getCustomRoles(): ?array {
		return $this->customRoles;
	}
	public function setCustomRoles(?array $customRoles) {
		$this->customRoles = $customRoles;
	}
	public function withCustomRoles(?array $customRoles): Guild {
		$this->customRoles = $customRoles;
		return $this;
	}
	public function getGuildMemberDefaultRole(): ?string {
		return $this->guildMemberDefaultRole;
	}
	public function setGuildMemberDefaultRole(?string $guildMemberDefaultRole) {
		$this->guildMemberDefaultRole = $guildMemberDefaultRole;
	}
	public function withGuildMemberDefaultRole(?string $guildMemberDefaultRole): Guild {
		$this->guildMemberDefaultRole = $guildMemberDefaultRole;
		return $this;
	}
	public function getCurrentMaximumMemberCount(): ?int {
		return $this->currentMaximumMemberCount;
	}
	public function setCurrentMaximumMemberCount(?int $currentMaximumMemberCount) {
		$this->currentMaximumMemberCount = $currentMaximumMemberCount;
	}
	public function withCurrentMaximumMemberCount(?int $currentMaximumMemberCount): Guild {
		$this->currentMaximumMemberCount = $currentMaximumMemberCount;
		return $this;
	}
	public function getMembers(): ?array {
		return $this->members;
	}
	public function setMembers(?array $members) {
		$this->members = $members;
	}
	public function withMembers(?array $members): Guild {
		$this->members = $members;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Guild {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): Guild {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
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