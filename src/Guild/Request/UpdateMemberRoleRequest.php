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

/**
 * Request for updateMemberRole: Update member role
 *
 * @see https://docs.gs2.io/api_reference/guild/sdk/#updatememberrole
 */
class UpdateMemberRoleRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Guild Model name */
    private $guildModelName;
    /** @var string Guild name */
    private $accessToken;
    /** @var string User ID to be updated */
    private $targetUserId;
    /** @var string Role Model name */
    private $roleName;
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
     * @return UpdateMemberRoleRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateMemberRoleRequest {
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
     * @return UpdateMemberRoleRequest
     */
	public function withGuildModelName(?string $guildModelName): UpdateMemberRoleRequest {
		$this->guildModelName = $guildModelName;
		return $this;
	}
    /** @return string|null Guild name */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken Guild name */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken Guild name
     * @return UpdateMemberRoleRequest
     */
	public function withAccessToken(?string $accessToken): UpdateMemberRoleRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null User ID to be updated */
	public function getTargetUserId(): ?string {
		return $this->targetUserId;
	}
    /** @param string|null $targetUserId User ID to be updated */
	public function setTargetUserId(?string $targetUserId) {
		$this->targetUserId = $targetUserId;
	}
    /**
     * @param string|null $targetUserId User ID to be updated
     * @return UpdateMemberRoleRequest
     */
	public function withTargetUserId(?string $targetUserId): UpdateMemberRoleRequest {
		$this->targetUserId = $targetUserId;
		return $this;
	}
    /** @return string|null Role Model name */
	public function getRoleName(): ?string {
		return $this->roleName;
	}
    /** @param string|null $roleName Role Model name */
	public function setRoleName(?string $roleName) {
		$this->roleName = $roleName;
	}
    /**
     * @param string|null $roleName Role Model name
     * @return UpdateMemberRoleRequest
     */
	public function withRoleName(?string $roleName): UpdateMemberRoleRequest {
		$this->roleName = $roleName;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): UpdateMemberRoleRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateMemberRoleRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateMemberRoleRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withGuildModelName(array_key_exists('guildModelName', $data) && $data['guildModelName'] !== null ? $data['guildModelName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withTargetUserId(array_key_exists('targetUserId', $data) && $data['targetUserId'] !== null ? $data['targetUserId'] : null)
            ->withRoleName(array_key_exists('roleName', $data) && $data['roleName'] !== null ? $data['roleName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "guildModelName" => $this->getGuildModelName(),
            "accessToken" => $this->getAccessToken(),
            "targetUserId" => $this->getTargetUserId(),
            "roleName" => $this->getRoleName(),
        );
    }
}