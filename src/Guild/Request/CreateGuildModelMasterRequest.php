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

class CreateGuildModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var int */
    private $defaultMaximumMemberCount;
    /** @var int */
    private $maximumMemberCount;
    /** @var int */
    private $inactivityPeriodDays;
    /** @var array */
    private $roles;
    /** @var string */
    private $guildMasterRole;
    /** @var string */
    private $guildMemberDefaultRole;
    /** @var int */
    private $rejoinCoolTimeMinutes;
    /** @var int */
    private $maxConcurrentJoinGuilds;
    /** @var int */
    private $maxConcurrentGuildMasterCount;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): CreateGuildModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): CreateGuildModelMasterRequest {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): CreateGuildModelMasterRequest {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): CreateGuildModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
	public function getDefaultMaximumMemberCount(): ?int {
		return $this->defaultMaximumMemberCount;
	}
	public function setDefaultMaximumMemberCount(?int $defaultMaximumMemberCount) {
		$this->defaultMaximumMemberCount = $defaultMaximumMemberCount;
	}
	public function withDefaultMaximumMemberCount(?int $defaultMaximumMemberCount): CreateGuildModelMasterRequest {
		$this->defaultMaximumMemberCount = $defaultMaximumMemberCount;
		return $this;
	}
	public function getMaximumMemberCount(): ?int {
		return $this->maximumMemberCount;
	}
	public function setMaximumMemberCount(?int $maximumMemberCount) {
		$this->maximumMemberCount = $maximumMemberCount;
	}
	public function withMaximumMemberCount(?int $maximumMemberCount): CreateGuildModelMasterRequest {
		$this->maximumMemberCount = $maximumMemberCount;
		return $this;
	}
	public function getInactivityPeriodDays(): ?int {
		return $this->inactivityPeriodDays;
	}
	public function setInactivityPeriodDays(?int $inactivityPeriodDays) {
		$this->inactivityPeriodDays = $inactivityPeriodDays;
	}
	public function withInactivityPeriodDays(?int $inactivityPeriodDays): CreateGuildModelMasterRequest {
		$this->inactivityPeriodDays = $inactivityPeriodDays;
		return $this;
	}
	public function getRoles(): ?array {
		return $this->roles;
	}
	public function setRoles(?array $roles) {
		$this->roles = $roles;
	}
	public function withRoles(?array $roles): CreateGuildModelMasterRequest {
		$this->roles = $roles;
		return $this;
	}
	public function getGuildMasterRole(): ?string {
		return $this->guildMasterRole;
	}
	public function setGuildMasterRole(?string $guildMasterRole) {
		$this->guildMasterRole = $guildMasterRole;
	}
	public function withGuildMasterRole(?string $guildMasterRole): CreateGuildModelMasterRequest {
		$this->guildMasterRole = $guildMasterRole;
		return $this;
	}
	public function getGuildMemberDefaultRole(): ?string {
		return $this->guildMemberDefaultRole;
	}
	public function setGuildMemberDefaultRole(?string $guildMemberDefaultRole) {
		$this->guildMemberDefaultRole = $guildMemberDefaultRole;
	}
	public function withGuildMemberDefaultRole(?string $guildMemberDefaultRole): CreateGuildModelMasterRequest {
		$this->guildMemberDefaultRole = $guildMemberDefaultRole;
		return $this;
	}
	public function getRejoinCoolTimeMinutes(): ?int {
		return $this->rejoinCoolTimeMinutes;
	}
	public function setRejoinCoolTimeMinutes(?int $rejoinCoolTimeMinutes) {
		$this->rejoinCoolTimeMinutes = $rejoinCoolTimeMinutes;
	}
	public function withRejoinCoolTimeMinutes(?int $rejoinCoolTimeMinutes): CreateGuildModelMasterRequest {
		$this->rejoinCoolTimeMinutes = $rejoinCoolTimeMinutes;
		return $this;
	}
	public function getMaxConcurrentJoinGuilds(): ?int {
		return $this->maxConcurrentJoinGuilds;
	}
	public function setMaxConcurrentJoinGuilds(?int $maxConcurrentJoinGuilds) {
		$this->maxConcurrentJoinGuilds = $maxConcurrentJoinGuilds;
	}
	public function withMaxConcurrentJoinGuilds(?int $maxConcurrentJoinGuilds): CreateGuildModelMasterRequest {
		$this->maxConcurrentJoinGuilds = $maxConcurrentJoinGuilds;
		return $this;
	}
	public function getMaxConcurrentGuildMasterCount(): ?int {
		return $this->maxConcurrentGuildMasterCount;
	}
	public function setMaxConcurrentGuildMasterCount(?int $maxConcurrentGuildMasterCount) {
		$this->maxConcurrentGuildMasterCount = $maxConcurrentGuildMasterCount;
	}
	public function withMaxConcurrentGuildMasterCount(?int $maxConcurrentGuildMasterCount): CreateGuildModelMasterRequest {
		$this->maxConcurrentGuildMasterCount = $maxConcurrentGuildMasterCount;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateGuildModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateGuildModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withDefaultMaximumMemberCount(array_key_exists('defaultMaximumMemberCount', $data) && $data['defaultMaximumMemberCount'] !== null ? $data['defaultMaximumMemberCount'] : null)
            ->withMaximumMemberCount(array_key_exists('maximumMemberCount', $data) && $data['maximumMemberCount'] !== null ? $data['maximumMemberCount'] : null)
            ->withInactivityPeriodDays(array_key_exists('inactivityPeriodDays', $data) && $data['inactivityPeriodDays'] !== null ? $data['inactivityPeriodDays'] : null)
            ->withRoles(array_map(
                function ($item) {
                    return RoleModel::fromJson($item);
                },
                array_key_exists('roles', $data) && $data['roles'] !== null ? $data['roles'] : []
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
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "defaultMaximumMemberCount" => $this->getDefaultMaximumMemberCount(),
            "maximumMemberCount" => $this->getMaximumMemberCount(),
            "inactivityPeriodDays" => $this->getInactivityPeriodDays(),
            "roles" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getRoles() !== null && $this->getRoles() !== null ? $this->getRoles() : []
            ),
            "guildMasterRole" => $this->getGuildMasterRole(),
            "guildMemberDefaultRole" => $this->getGuildMemberDefaultRole(),
            "rejoinCoolTimeMinutes" => $this->getRejoinCoolTimeMinutes(),
            "maxConcurrentJoinGuilds" => $this->getMaxConcurrentJoinGuilds(),
            "maxConcurrentGuildMasterCount" => $this->getMaxConcurrentGuildMasterCount(),
        );
    }
}