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


class Member implements IModel {
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $roleName;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var int
	 */
	private $joinedAt;
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): Member {
		$this->userId = $userId;
		return $this;
	}
	public function getRoleName(): ?string {
		return $this->roleName;
	}
	public function setRoleName(?string $roleName) {
		$this->roleName = $roleName;
	}
	public function withRoleName(?string $roleName): Member {
		$this->roleName = $roleName;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): Member {
		$this->metadata = $metadata;
		return $this;
	}
	public function getJoinedAt(): ?int {
		return $this->joinedAt;
	}
	public function setJoinedAt(?int $joinedAt) {
		$this->joinedAt = $joinedAt;
	}
	public function withJoinedAt(?int $joinedAt): Member {
		$this->joinedAt = $joinedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Member {
        if ($data === null) {
            return null;
        }
        return (new Member())
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withRoleName(array_key_exists('roleName', $data) && $data['roleName'] !== null ? $data['roleName'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withJoinedAt(array_key_exists('joinedAt', $data) && $data['joinedAt'] !== null ? $data['joinedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "userId" => $this->getUserId(),
            "roleName" => $this->getRoleName(),
            "metadata" => $this->getMetadata(),
            "joinedAt" => $this->getJoinedAt(),
        );
    }
}