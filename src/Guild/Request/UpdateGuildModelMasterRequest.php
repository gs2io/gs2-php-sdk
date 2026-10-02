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

namespace Gs2\Guild\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Guild\Model\RoleModel;

/**
 * Request for updateGuildModelMaster: Update Guild Model Master
 *
 * @see https://docs.gs2.io/api_reference/guild/sdk/#updateguildmodelmaster
 */
class UpdateGuildModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Guild Model name */
    private $guildModelName;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var int Default Maximum Member Count */
    private $defaultMaximumMemberCount;
    /** @var int Maximum Member Count */
    private $maximumMemberCount;
    /** @var int Inactivity Period Days */
    private $inactivityPeriodDays;
    /** @var array List of Role Models */
    private $roles;
    /** @var string Guild Master Role Name */
    private $guildMasterRole;
    /** @var string Default Member Role Name */
    private $guildMemberDefaultRole;
    /** @var int Rejoin Cool Time (Minutes) */
    private $rejoinCoolTimeMinutes;
    /** @var int Maximum Concurrent Guild Memberships */
    private $maxConcurrentJoinGuilds;
    /** @var int Maximum Concurrent Guild Master Count */
    private $maxConcurrentGuildMasterCount;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return UpdateGuildModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateGuildModelMasterRequest {
		$this->namespaceName = $namespaceName;
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
     * @return UpdateGuildModelMasterRequest
     */
	public function withGuildModelName(?string $guildModelName): UpdateGuildModelMasterRequest {
		$this->guildModelName = $guildModelName;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return UpdateGuildModelMasterRequest
     */
	public function withDescription(?string $description): UpdateGuildModelMasterRequest {
		$this->description = $description;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return UpdateGuildModelMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateGuildModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return int|null Default Maximum Member Count */
	public function getDefaultMaximumMemberCount(): ?int {
		return $this->defaultMaximumMemberCount;
	}
    /** @param int|null $defaultMaximumMemberCount Default Maximum Member Count */
	public function setDefaultMaximumMemberCount(?int $defaultMaximumMemberCount) {
		$this->defaultMaximumMemberCount = $defaultMaximumMemberCount;
	}
    /**
     * @param int|null $defaultMaximumMemberCount Default Maximum Member Count
     * @return UpdateGuildModelMasterRequest
     */
	public function withDefaultMaximumMemberCount(?int $defaultMaximumMemberCount): UpdateGuildModelMasterRequest {
		$this->defaultMaximumMemberCount = $defaultMaximumMemberCount;
		return $this;
	}
    /** @return int|null Maximum Member Count */
	public function getMaximumMemberCount(): ?int {
		return $this->maximumMemberCount;
	}
    /** @param int|null $maximumMemberCount Maximum Member Count */
	public function setMaximumMemberCount(?int $maximumMemberCount) {
		$this->maximumMemberCount = $maximumMemberCount;
	}
    /**
     * @param int|null $maximumMemberCount Maximum Member Count
     * @return UpdateGuildModelMasterRequest
     */
	public function withMaximumMemberCount(?int $maximumMemberCount): UpdateGuildModelMasterRequest {
		$this->maximumMemberCount = $maximumMemberCount;
		return $this;
	}
    /** @return int|null Inactivity Period Days */
	public function getInactivityPeriodDays(): ?int {
		return $this->inactivityPeriodDays;
	}
    /** @param int|null $inactivityPeriodDays Inactivity Period Days */
	public function setInactivityPeriodDays(?int $inactivityPeriodDays) {
		$this->inactivityPeriodDays = $inactivityPeriodDays;
	}
    /**
     * @param int|null $inactivityPeriodDays Inactivity Period Days
     * @return UpdateGuildModelMasterRequest
     */
	public function withInactivityPeriodDays(?int $inactivityPeriodDays): UpdateGuildModelMasterRequest {
		$this->inactivityPeriodDays = $inactivityPeriodDays;
		return $this;
	}
    /** @return array|null List of Role Models */
	public function getRoles(): ?array {
		return $this->roles;
	}
    /** @param array|null $roles List of Role Models */
	public function setRoles(?array $roles) {
		$this->roles = $roles;
	}
    /**
     * @param array|null $roles List of Role Models
     * @return UpdateGuildModelMasterRequest
     */
	public function withRoles(?array $roles): UpdateGuildModelMasterRequest {
		$this->roles = $roles;
		return $this;
	}
    /** @return string|null Guild Master Role Name */
	public function getGuildMasterRole(): ?string {
		return $this->guildMasterRole;
	}
    /** @param string|null $guildMasterRole Guild Master Role Name */
	public function setGuildMasterRole(?string $guildMasterRole) {
		$this->guildMasterRole = $guildMasterRole;
	}
    /**
     * @param string|null $guildMasterRole Guild Master Role Name
     * @return UpdateGuildModelMasterRequest
     */
	public function withGuildMasterRole(?string $guildMasterRole): UpdateGuildModelMasterRequest {
		$this->guildMasterRole = $guildMasterRole;
		return $this;
	}
    /** @return string|null Default Member Role Name */
	public function getGuildMemberDefaultRole(): ?string {
		return $this->guildMemberDefaultRole;
	}
    /** @param string|null $guildMemberDefaultRole Default Member Role Name */
	public function setGuildMemberDefaultRole(?string $guildMemberDefaultRole) {
		$this->guildMemberDefaultRole = $guildMemberDefaultRole;
	}
    /**
     * @param string|null $guildMemberDefaultRole Default Member Role Name
     * @return UpdateGuildModelMasterRequest
     */
	public function withGuildMemberDefaultRole(?string $guildMemberDefaultRole): UpdateGuildModelMasterRequest {
		$this->guildMemberDefaultRole = $guildMemberDefaultRole;
		return $this;
	}
    /** @return int|null Rejoin Cool Time (Minutes) */
	public function getRejoinCoolTimeMinutes(): ?int {
		return $this->rejoinCoolTimeMinutes;
	}
    /** @param int|null $rejoinCoolTimeMinutes Rejoin Cool Time (Minutes) */
	public function setRejoinCoolTimeMinutes(?int $rejoinCoolTimeMinutes) {
		$this->rejoinCoolTimeMinutes = $rejoinCoolTimeMinutes;
	}
    /**
     * @param int|null $rejoinCoolTimeMinutes Rejoin Cool Time (Minutes)
     * @return UpdateGuildModelMasterRequest
     */
	public function withRejoinCoolTimeMinutes(?int $rejoinCoolTimeMinutes): UpdateGuildModelMasterRequest {
		$this->rejoinCoolTimeMinutes = $rejoinCoolTimeMinutes;
		return $this;
	}
    /** @return int|null Maximum Concurrent Guild Memberships */
	public function getMaxConcurrentJoinGuilds(): ?int {
		return $this->maxConcurrentJoinGuilds;
	}
    /** @param int|null $maxConcurrentJoinGuilds Maximum Concurrent Guild Memberships */
	public function setMaxConcurrentJoinGuilds(?int $maxConcurrentJoinGuilds) {
		$this->maxConcurrentJoinGuilds = $maxConcurrentJoinGuilds;
	}
    /**
     * @param int|null $maxConcurrentJoinGuilds Maximum Concurrent Guild Memberships
     * @return UpdateGuildModelMasterRequest
     */
	public function withMaxConcurrentJoinGuilds(?int $maxConcurrentJoinGuilds): UpdateGuildModelMasterRequest {
		$this->maxConcurrentJoinGuilds = $maxConcurrentJoinGuilds;
		return $this;
	}
    /** @return int|null Maximum Concurrent Guild Master Count */
	public function getMaxConcurrentGuildMasterCount(): ?int {
		return $this->maxConcurrentGuildMasterCount;
	}
    /** @param int|null $maxConcurrentGuildMasterCount Maximum Concurrent Guild Master Count */
	public function setMaxConcurrentGuildMasterCount(?int $maxConcurrentGuildMasterCount) {
		$this->maxConcurrentGuildMasterCount = $maxConcurrentGuildMasterCount;
	}
    /**
     * @param int|null $maxConcurrentGuildMasterCount Maximum Concurrent Guild Master Count
     * @return UpdateGuildModelMasterRequest
     */
	public function withMaxConcurrentGuildMasterCount(?int $maxConcurrentGuildMasterCount): UpdateGuildModelMasterRequest {
		$this->maxConcurrentGuildMasterCount = $maxConcurrentGuildMasterCount;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateGuildModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateGuildModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withGuildModelName(array_key_exists('guildModelName', $data) && $data['guildModelName'] !== null ? $data['guildModelName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withDefaultMaximumMemberCount(array_key_exists('defaultMaximumMemberCount', $data) && $data['defaultMaximumMemberCount'] !== null ? $data['defaultMaximumMemberCount'] : null)
            ->withMaximumMemberCount(array_key_exists('maximumMemberCount', $data) && $data['maximumMemberCount'] !== null ? $data['maximumMemberCount'] : null)
            ->withInactivityPeriodDays(array_key_exists('inactivityPeriodDays', $data) && $data['inactivityPeriodDays'] !== null ? $data['inactivityPeriodDays'] : null)
            ->withRoles(!array_key_exists('roles', $data) || $data['roles'] === null ? null : array_map(
                function ($item) {
                    return RoleModel::fromJson($item);
                },
                $data['roles']
            ))
            ->withGuildMasterRole(array_key_exists('guildMasterRole', $data) && $data['guildMasterRole'] !== null ? $data['guildMasterRole'] : null)
            ->withGuildMemberDefaultRole(array_key_exists('guildMemberDefaultRole', $data) && $data['guildMemberDefaultRole'] !== null ? $data['guildMemberDefaultRole'] : null)
            ->withRejoinCoolTimeMinutes(array_key_exists('rejoinCoolTimeMinutes', $data) && $data['rejoinCoolTimeMinutes'] !== null ? $data['rejoinCoolTimeMinutes'] : null)
            ->withMaxConcurrentJoinGuilds(array_key_exists('maxConcurrentJoinGuilds', $data) && $data['maxConcurrentJoinGuilds'] !== null ? $data['maxConcurrentJoinGuilds'] : null)
            ->withMaxConcurrentGuildMasterCount(array_key_exists('maxConcurrentGuildMasterCount', $data) && $data['maxConcurrentGuildMasterCount'] !== null ? $data['maxConcurrentGuildMasterCount'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "guildModelName" => $this->getGuildModelName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "defaultMaximumMemberCount" => $this->getDefaultMaximumMemberCount(),
            "maximumMemberCount" => $this->getMaximumMemberCount(),
            "inactivityPeriodDays" => $this->getInactivityPeriodDays(),
            "roles" => $this->getRoles() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getRoles()
            ),
            "guildMasterRole" => $this->getGuildMasterRole(),
            "guildMemberDefaultRole" => $this->getGuildMemberDefaultRole(),
            "rejoinCoolTimeMinutes" => $this->getRejoinCoolTimeMinutes(),
            "maxConcurrentJoinGuilds" => $this->getMaxConcurrentJoinGuilds(),
            "maxConcurrentGuildMasterCount" => $this->getMaxConcurrentGuildMasterCount(),
        );
    }
}