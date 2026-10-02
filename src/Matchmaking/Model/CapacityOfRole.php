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

namespace Gs2\Matchmaking\Model;

use Gs2\Core\Model\IModel;


/**
 * Capacity of Role
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#capacityofrole
 */
class CapacityOfRole implements IModel {
	/**
     * @var string Role Name
	 */
	private $roleName;
	/**
     * @var array List of Role Name Aliases
	 */
	private $roleAliases;
	/**
     * @var int Role Capacity
	 */
	private $capacity;
	/**
     * @var array List of Participant Players
	 */
	private $participants;
    /** @return string|null Role Name */
	public function getRoleName(): ?string {
		return $this->roleName;
	}
    /** @param string|null $roleName Role Name */
	public function setRoleName(?string $roleName) {
		$this->roleName = $roleName;
	}
    /**
     * @param string|null $roleName Role Name
     * @return CapacityOfRole
     */
	public function withRoleName(?string $roleName): CapacityOfRole {
		$this->roleName = $roleName;
		return $this;
	}
    /** @return array|null List of Role Name Aliases */
	public function getRoleAliases(): ?array {
		return $this->roleAliases;
	}
    /** @param array|null $roleAliases List of Role Name Aliases */
	public function setRoleAliases(?array $roleAliases) {
		$this->roleAliases = $roleAliases;
	}
    /**
     * @param array|null $roleAliases List of Role Name Aliases
     * @return CapacityOfRole
     */
	public function withRoleAliases(?array $roleAliases): CapacityOfRole {
		$this->roleAliases = $roleAliases;
		return $this;
	}
    /** @return int|null Role Capacity */
	public function getCapacity(): ?int {
		return $this->capacity;
	}
    /** @param int|null $capacity Role Capacity */
	public function setCapacity(?int $capacity) {
		$this->capacity = $capacity;
	}
    /**
     * @param int|null $capacity Role Capacity
     * @return CapacityOfRole
     */
	public function withCapacity(?int $capacity): CapacityOfRole {
		$this->capacity = $capacity;
		return $this;
	}
    /** @return array|null List of Participant Players */
	public function getParticipants(): ?array {
		return $this->participants;
	}
    /** @param array|null $participants List of Participant Players */
	public function setParticipants(?array $participants) {
		$this->participants = $participants;
	}
    /**
     * @param array|null $participants List of Participant Players
     * @return CapacityOfRole
     */
	public function withParticipants(?array $participants): CapacityOfRole {
		$this->participants = $participants;
		return $this;
	}

    public static function fromJson(?array $data): ?CapacityOfRole {
        if ($data === null) {
            return null;
        }
        return (new CapacityOfRole())
            ->withRoleName(array_key_exists('roleName', $data) && $data['roleName'] !== null ? $data['roleName'] : null)
            ->withRoleAliases(!array_key_exists('roleAliases', $data) || $data['roleAliases'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['roleAliases']
            ))
            ->withCapacity(array_key_exists('capacity', $data) && $data['capacity'] !== null ? $data['capacity'] : null)
            ->withParticipants(!array_key_exists('participants', $data) || $data['participants'] === null ? null : array_map(
                function ($item) {
                    return Player::fromJson($item);
                },
                $data['participants']
            ));
    }

    public function toJson(): array {
        return array(
            "roleName" => $this->getRoleName(),
            "roleAliases" => $this->getRoleAliases() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getRoleAliases()
            ),
            "capacity" => $this->getCapacity(),
            "participants" => $this->getParticipants() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getParticipants()
            ),
        );
    }
}