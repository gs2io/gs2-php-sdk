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

class UpdateGuildByGuildNameRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $guildName;
    /** @var string */
    private $guildModelName;
    /** @var string */
    private $displayName;
    /** @var int */
    private $attribute1;
    /** @var int */
    private $attribute2;
    /** @var int */
    private $attribute3;
    /** @var int */
    private $attribute4;
    /** @var int */
    private $attribute5;
    /** @var string */
    private $joinPolicy;
    /** @var array */
    private $customRoles;
    /** @var string */
    private $guildMemberDefaultRole;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): UpdateGuildByGuildNameRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getGuildName(): ?string {
		return $this->guildName;
	}
	public function setGuildName(?string $guildName) {
		$this->guildName = $guildName;
	}
	public function withGuildName(?string $guildName): UpdateGuildByGuildNameRequest {
		$this->guildName = $guildName;
		return $this;
	}
	public function getGuildModelName(): ?string {
		return $this->guildModelName;
	}
	public function setGuildModelName(?string $guildModelName) {
		$this->guildModelName = $guildModelName;
	}
	public function withGuildModelName(?string $guildModelName): UpdateGuildByGuildNameRequest {
		$this->guildModelName = $guildModelName;
		return $this;
	}
	public function getDisplayName(): ?string {
		return $this->displayName;
	}
	public function setDisplayName(?string $displayName) {
		$this->displayName = $displayName;
	}
	public function withDisplayName(?string $displayName): UpdateGuildByGuildNameRequest {
		$this->displayName = $displayName;
		return $this;
	}
	public function getAttribute1(): ?int {
		return $this->attribute1;
	}
	public function setAttribute1(?int $attribute1) {
		$this->attribute1 = $attribute1;
	}
	public function withAttribute1(?int $attribute1): UpdateGuildByGuildNameRequest {
		$this->attribute1 = $attribute1;
		return $this;
	}
	public function getAttribute2(): ?int {
		return $this->attribute2;
	}
	public function setAttribute2(?int $attribute2) {
		$this->attribute2 = $attribute2;
	}
	public function withAttribute2(?int $attribute2): UpdateGuildByGuildNameRequest {
		$this->attribute2 = $attribute2;
		return $this;
	}
	public function getAttribute3(): ?int {
		return $this->attribute3;
	}
	public function setAttribute3(?int $attribute3) {
		$this->attribute3 = $attribute3;
	}
	public function withAttribute3(?int $attribute3): UpdateGuildByGuildNameRequest {
		$this->attribute3 = $attribute3;
		return $this;
	}
	public function getAttribute4(): ?int {
		return $this->attribute4;
	}
	public function setAttribute4(?int $attribute4) {
		$this->attribute4 = $attribute4;
	}
	public function withAttribute4(?int $attribute4): UpdateGuildByGuildNameRequest {
		$this->attribute4 = $attribute4;
		return $this;
	}
	public function getAttribute5(): ?int {
		return $this->attribute5;
	}
	public function setAttribute5(?int $attribute5) {
		$this->attribute5 = $attribute5;
	}
	public function withAttribute5(?int $attribute5): UpdateGuildByGuildNameRequest {
		$this->attribute5 = $attribute5;
		return $this;
	}
	public function getJoinPolicy(): ?string {
		return $this->joinPolicy;
	}
	public function setJoinPolicy(?string $joinPolicy) {
		$this->joinPolicy = $joinPolicy;
	}
	public function withJoinPolicy(?string $joinPolicy): UpdateGuildByGuildNameRequest {
		$this->joinPolicy = $joinPolicy;
		return $this;
	}
	public function getCustomRoles(): ?array {
		return $this->customRoles;
	}
	public function setCustomRoles(?array $customRoles) {
		$this->customRoles = $customRoles;
	}
	public function withCustomRoles(?array $customRoles): UpdateGuildByGuildNameRequest {
		$this->customRoles = $customRoles;
		return $this;
	}
	public function getGuildMemberDefaultRole(): ?string {
		return $this->guildMemberDefaultRole;
	}
	public function setGuildMemberDefaultRole(?string $guildMemberDefaultRole) {
		$this->guildMemberDefaultRole = $guildMemberDefaultRole;
	}
	public function withGuildMemberDefaultRole(?string $guildMemberDefaultRole): UpdateGuildByGuildNameRequest {
		$this->guildMemberDefaultRole = $guildMemberDefaultRole;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): UpdateGuildByGuildNameRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateGuildByGuildNameRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateGuildByGuildNameRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withGuildName(array_key_exists('guildName', $data) && $data['guildName'] !== null ? $data['guildName'] : null)
            ->withGuildModelName(array_key_exists('guildModelName', $data) && $data['guildModelName'] !== null ? $data['guildModelName'] : null)
            ->withDisplayName(array_key_exists('displayName', $data) && $data['displayName'] !== null ? $data['displayName'] : null)
            ->withAttribute1(array_key_exists('attribute1', $data) && $data['attribute1'] !== null ? $data['attribute1'] : null)
            ->withAttribute2(array_key_exists('attribute2', $data) && $data['attribute2'] !== null ? $data['attribute2'] : null)
            ->withAttribute3(array_key_exists('attribute3', $data) && $data['attribute3'] !== null ? $data['attribute3'] : null)
            ->withAttribute4(array_key_exists('attribute4', $data) && $data['attribute4'] !== null ? $data['attribute4'] : null)
            ->withAttribute5(array_key_exists('attribute5', $data) && $data['attribute5'] !== null ? $data['attribute5'] : null)
            ->withJoinPolicy(array_key_exists('joinPolicy', $data) && $data['joinPolicy'] !== null ? $data['joinPolicy'] : null)
            ->withCustomRoles(array_map(
                function ($item) {
                    return RoleModel::fromJson($item);
                },
                array_key_exists('customRoles', $data) && $data['customRoles'] !== null ? $data['customRoles'] : []
            ))
            ->withGuildMemberDefaultRole(array_key_exists('guildMemberDefaultRole', $data) && $data['guildMemberDefaultRole'] !== null ? $data['guildMemberDefaultRole'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "guildName" => $this->getGuildName(),
            "guildModelName" => $this->getGuildModelName(),
            "displayName" => $this->getDisplayName(),
            "attribute1" => $this->getAttribute1(),
            "attribute2" => $this->getAttribute2(),
            "attribute3" => $this->getAttribute3(),
            "attribute4" => $this->getAttribute4(),
            "attribute5" => $this->getAttribute5(),
            "joinPolicy" => $this->getJoinPolicy(),
            "customRoles" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getCustomRoles() !== null && $this->getCustomRoles() !== null ? $this->getCustomRoles() : []
            ),
            "guildMemberDefaultRole" => $this->getGuildMemberDefaultRole(),
        );
    }
}