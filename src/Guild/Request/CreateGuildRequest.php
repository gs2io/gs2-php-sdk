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
 * Request for createGuild: Create Guild
 *
 * @see https://docs.gs2.io/api_reference/guild/sdk/#createguild
 */
class CreateGuildRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Guild Model name */
    private $guildModelName;
    /** @var string Display Name */
    private $displayName;
    /** @var int Attribute 1 */
    private $attribute1;
    /** @var int Attribute 2 */
    private $attribute2;
    /** @var int Attribute 3 */
    private $attribute3;
    /** @var int Attribute 4 */
    private $attribute4;
    /** @var int Attribute 5 */
    private $attribute5;
    /** @var string Guild Metadata */
    private $metadata;
    /** @var string Guild Member Metadata */
    private $memberMetadata;
    /** @var string Join Policy */
    private $joinPolicy;
    /** @var array Custom Roles List */
    private $customRoles;
    /** @var string Default Custom Role */
    private $guildMemberDefaultRole;
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
     * @return CreateGuildRequest
     */
	public function withNamespaceName(?string $namespaceName): CreateGuildRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID
     * @return CreateGuildRequest
     */
	public function withAccessToken(?string $accessToken): CreateGuildRequest {
		$this->accessToken = $accessToken;
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
     * @return CreateGuildRequest
     */
	public function withGuildModelName(?string $guildModelName): CreateGuildRequest {
		$this->guildModelName = $guildModelName;
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
     * @return CreateGuildRequest
     */
	public function withDisplayName(?string $displayName): CreateGuildRequest {
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
     * @return CreateGuildRequest
     */
	public function withAttribute1(?int $attribute1): CreateGuildRequest {
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
     * @return CreateGuildRequest
     */
	public function withAttribute2(?int $attribute2): CreateGuildRequest {
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
     * @return CreateGuildRequest
     */
	public function withAttribute3(?int $attribute3): CreateGuildRequest {
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
     * @return CreateGuildRequest
     */
	public function withAttribute4(?int $attribute4): CreateGuildRequest {
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
     * @return CreateGuildRequest
     */
	public function withAttribute5(?int $attribute5): CreateGuildRequest {
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
     * @return CreateGuildRequest
     */
	public function withMetadata(?string $metadata): CreateGuildRequest {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return string|null Guild Member Metadata */
	public function getMemberMetadata(): ?string {
		return $this->memberMetadata;
	}
    /** @param string|null $memberMetadata Guild Member Metadata */
	public function setMemberMetadata(?string $memberMetadata) {
		$this->memberMetadata = $memberMetadata;
	}
    /**
     * @param string|null $memberMetadata Guild Member Metadata
     * @return CreateGuildRequest
     */
	public function withMemberMetadata(?string $memberMetadata): CreateGuildRequest {
		$this->memberMetadata = $memberMetadata;
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
     * @return CreateGuildRequest
     */
	public function withJoinPolicy(?string $joinPolicy): CreateGuildRequest {
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
     * @return CreateGuildRequest
     */
	public function withCustomRoles(?array $customRoles): CreateGuildRequest {
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
     * @return CreateGuildRequest
     */
	public function withGuildMemberDefaultRole(?string $guildMemberDefaultRole): CreateGuildRequest {
		$this->guildMemberDefaultRole = $guildMemberDefaultRole;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): CreateGuildRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateGuildRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateGuildRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withGuildModelName(array_key_exists('guildModelName', $data) && $data['guildModelName'] !== null ? $data['guildModelName'] : null)
            ->withDisplayName(array_key_exists('displayName', $data) && $data['displayName'] !== null ? $data['displayName'] : null)
            ->withAttribute1(array_key_exists('attribute1', $data) && $data['attribute1'] !== null ? $data['attribute1'] : null)
            ->withAttribute2(array_key_exists('attribute2', $data) && $data['attribute2'] !== null ? $data['attribute2'] : null)
            ->withAttribute3(array_key_exists('attribute3', $data) && $data['attribute3'] !== null ? $data['attribute3'] : null)
            ->withAttribute4(array_key_exists('attribute4', $data) && $data['attribute4'] !== null ? $data['attribute4'] : null)
            ->withAttribute5(array_key_exists('attribute5', $data) && $data['attribute5'] !== null ? $data['attribute5'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withMemberMetadata(array_key_exists('memberMetadata', $data) && $data['memberMetadata'] !== null ? $data['memberMetadata'] : null)
            ->withJoinPolicy(array_key_exists('joinPolicy', $data) && $data['joinPolicy'] !== null ? $data['joinPolicy'] : null)
            ->withCustomRoles(!array_key_exists('customRoles', $data) || $data['customRoles'] === null ? null : array_map(
                function ($item) {
                    return RoleModel::fromJson($item);
                },
                $data['customRoles']
            ))
            ->withGuildMemberDefaultRole(array_key_exists('guildMemberDefaultRole', $data) && $data['guildMemberDefaultRole'] !== null ? $data['guildMemberDefaultRole'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "guildModelName" => $this->getGuildModelName(),
            "displayName" => $this->getDisplayName(),
            "attribute1" => $this->getAttribute1(),
            "attribute2" => $this->getAttribute2(),
            "attribute3" => $this->getAttribute3(),
            "attribute4" => $this->getAttribute4(),
            "attribute5" => $this->getAttribute5(),
            "metadata" => $this->getMetadata(),
            "memberMetadata" => $this->getMemberMetadata(),
            "joinPolicy" => $this->getJoinPolicy(),
            "customRoles" => $this->getCustomRoles() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getCustomRoles()
            ),
            "guildMemberDefaultRole" => $this->getGuildMemberDefaultRole(),
        );
    }
}