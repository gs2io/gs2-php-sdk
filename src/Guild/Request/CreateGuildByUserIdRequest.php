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

class CreateGuildByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
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
    private $metadata;
    /** @var string */
    private $memberMetadata;
    /** @var string */
    private $joinPolicy;
    /** @var array */
    private $customRoles;
    /** @var string */
    private $guildMemberDefaultRole;
    /** @var string */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): CreateGuildByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): CreateGuildByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getGuildModelName(): ?string {
		return $this->guildModelName;
	}
	public function setGuildModelName(?string $guildModelName) {
		$this->guildModelName = $guildModelName;
	}
	public function withGuildModelName(?string $guildModelName): CreateGuildByUserIdRequest {
		$this->guildModelName = $guildModelName;
		return $this;
	}
	public function getDisplayName(): ?string {
		return $this->displayName;
	}
	public function setDisplayName(?string $displayName) {
		$this->displayName = $displayName;
	}
	public function withDisplayName(?string $displayName): CreateGuildByUserIdRequest {
		$this->displayName = $displayName;
		return $this;
	}
	public function getAttribute1(): ?int {
		return $this->attribute1;
	}
	public function setAttribute1(?int $attribute1) {
		$this->attribute1 = $attribute1;
	}
	public function withAttribute1(?int $attribute1): CreateGuildByUserIdRequest {
		$this->attribute1 = $attribute1;
		return $this;
	}
	public function getAttribute2(): ?int {
		return $this->attribute2;
	}
	public function setAttribute2(?int $attribute2) {
		$this->attribute2 = $attribute2;
	}
	public function withAttribute2(?int $attribute2): CreateGuildByUserIdRequest {
		$this->attribute2 = $attribute2;
		return $this;
	}
	public function getAttribute3(): ?int {
		return $this->attribute3;
	}
	public function setAttribute3(?int $attribute3) {
		$this->attribute3 = $attribute3;
	}
	public function withAttribute3(?int $attribute3): CreateGuildByUserIdRequest {
		$this->attribute3 = $attribute3;
		return $this;
	}
	public function getAttribute4(): ?int {
		return $this->attribute4;
	}
	public function setAttribute4(?int $attribute4) {
		$this->attribute4 = $attribute4;
	}
	public function withAttribute4(?int $attribute4): CreateGuildByUserIdRequest {
		$this->attribute4 = $attribute4;
		return $this;
	}
	public function getAttribute5(): ?int {
		return $this->attribute5;
	}
	public function setAttribute5(?int $attribute5) {
		$this->attribute5 = $attribute5;
	}
	public function withAttribute5(?int $attribute5): CreateGuildByUserIdRequest {
		$this->attribute5 = $attribute5;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): CreateGuildByUserIdRequest {
		$this->metadata = $metadata;
		return $this;
	}
	public function getMemberMetadata(): ?string {
		return $this->memberMetadata;
	}
	public function setMemberMetadata(?string $memberMetadata) {
		$this->memberMetadata = $memberMetadata;
	}
	public function withMemberMetadata(?string $memberMetadata): CreateGuildByUserIdRequest {
		$this->memberMetadata = $memberMetadata;
		return $this;
	}
	public function getJoinPolicy(): ?string {
		return $this->joinPolicy;
	}
	public function setJoinPolicy(?string $joinPolicy) {
		$this->joinPolicy = $joinPolicy;
	}
	public function withJoinPolicy(?string $joinPolicy): CreateGuildByUserIdRequest {
		$this->joinPolicy = $joinPolicy;
		return $this;
	}
	public function getCustomRoles(): ?array {
		return $this->customRoles;
	}
	public function setCustomRoles(?array $customRoles) {
		$this->customRoles = $customRoles;
	}
	public function withCustomRoles(?array $customRoles): CreateGuildByUserIdRequest {
		$this->customRoles = $customRoles;
		return $this;
	}
	public function getGuildMemberDefaultRole(): ?string {
		return $this->guildMemberDefaultRole;
	}
	public function setGuildMemberDefaultRole(?string $guildMemberDefaultRole) {
		$this->guildMemberDefaultRole = $guildMemberDefaultRole;
	}
	public function withGuildMemberDefaultRole(?string $guildMemberDefaultRole): CreateGuildByUserIdRequest {
		$this->guildMemberDefaultRole = $guildMemberDefaultRole;
		return $this;
	}
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
	public function withTimeOffsetToken(?string $timeOffsetToken): CreateGuildByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): CreateGuildByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateGuildByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateGuildByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
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
            ->withGuildMemberDefaultRole(array_key_exists('guildMemberDefaultRole', $data) && $data['guildMemberDefaultRole'] !== null ? $data['guildMemberDefaultRole'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
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
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}