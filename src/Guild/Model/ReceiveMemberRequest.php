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


class ReceiveMemberRequest implements IModel {
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $targetGuildName;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var int
	 */
	private $createdAt;
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): ReceiveMemberRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getTargetGuildName(): ?string {
		return $this->targetGuildName;
	}
	public function setTargetGuildName(?string $targetGuildName) {
		$this->targetGuildName = $targetGuildName;
	}
	public function withTargetGuildName(?string $targetGuildName): ReceiveMemberRequest {
		$this->targetGuildName = $targetGuildName;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): ReceiveMemberRequest {
		$this->metadata = $metadata;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): ReceiveMemberRequest {
		$this->createdAt = $createdAt;
		return $this;
	}

    public static function fromJson(?array $data): ?ReceiveMemberRequest {
        if ($data === null) {
            return null;
        }
        return (new ReceiveMemberRequest())
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTargetGuildName(array_key_exists('targetGuildName', $data) && $data['targetGuildName'] !== null ? $data['targetGuildName'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null);
    }

    public function toJson(): array {
        return array(
            "userId" => $this->getUserId(),
            "targetGuildName" => $this->getTargetGuildName(),
            "metadata" => $this->getMetadata(),
            "createdAt" => $this->getCreatedAt(),
        );
    }
}