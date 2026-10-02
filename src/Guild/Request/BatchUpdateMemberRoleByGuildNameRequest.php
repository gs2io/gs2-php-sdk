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
use Gs2\Guild\Model\Member;

/**
 * Request for batchUpdateMemberRoleByGuildName: Update member role in bulk by specifying a Guild name
 *
 * @see https://docs.gs2.io/api_reference/guild/sdk/#batchupdatememberrolebyguildname
 */
class BatchUpdateMemberRoleByGuildNameRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Guild Model name */
    private $guildModelName;
    /** @var string Guild name */
    private $guildName;
    /** @var array List of members to update */
    private $members;
    /** @var string */
    private $duplicationAvoider;
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
     * @return BatchUpdateMemberRoleByGuildNameRequest
     */
	public function withNamespaceName(?string $namespaceName): BatchUpdateMemberRoleByGuildNameRequest {
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
     * @return BatchUpdateMemberRoleByGuildNameRequest
     */
	public function withGuildModelName(?string $guildModelName): BatchUpdateMemberRoleByGuildNameRequest {
		$this->guildModelName = $guildModelName;
		return $this;
	}
    /** @return string|null Guild name */
	public function getGuildName(): ?string {
		return $this->guildName;
	}
    /** @param string|null $guildName Guild name */
	public function setGuildName(?string $guildName) {
		$this->guildName = $guildName;
	}
    /**
     * @param string|null $guildName Guild name
     * @return BatchUpdateMemberRoleByGuildNameRequest
     */
	public function withGuildName(?string $guildName): BatchUpdateMemberRoleByGuildNameRequest {
		$this->guildName = $guildName;
		return $this;
	}
    /** @return array|null List of members to update */
	public function getMembers(): ?array {
		return $this->members;
	}
    /** @param array|null $members List of members to update */
	public function setMembers(?array $members) {
		$this->members = $members;
	}
    /**
     * @param array|null $members List of members to update
     * @return BatchUpdateMemberRoleByGuildNameRequest
     */
	public function withMembers(?array $members): BatchUpdateMemberRoleByGuildNameRequest {
		$this->members = $members;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): BatchUpdateMemberRoleByGuildNameRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?BatchUpdateMemberRoleByGuildNameRequest {
        if ($data === null) {
            return null;
        }
        return (new BatchUpdateMemberRoleByGuildNameRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withGuildModelName(array_key_exists('guildModelName', $data) && $data['guildModelName'] !== null ? $data['guildModelName'] : null)
            ->withGuildName(array_key_exists('guildName', $data) && $data['guildName'] !== null ? $data['guildName'] : null)
            ->withMembers(!array_key_exists('members', $data) || $data['members'] === null ? null : array_map(
                function ($item) {
                    return Member::fromJson($item);
                },
                $data['members']
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "guildModelName" => $this->getGuildModelName(),
            "guildName" => $this->getGuildName(),
            "members" => $this->getMembers() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getMembers()
            ),
        );
    }
}