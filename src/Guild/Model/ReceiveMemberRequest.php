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


/**
 * Received Join Request
 *
 * @see https://docs.gs2.io/api_reference/guild/sdk/#receivememberrequest
 */
class ReceiveMemberRequest implements IModel {
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Target Guild Name
	 */
	private $targetGuildName;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return ReceiveMemberRequest
     */
	public function withUserId(?string $userId): ReceiveMemberRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Target Guild Name */
	public function getTargetGuildName(): ?string {
		return $this->targetGuildName;
	}
    /** @param string|null $targetGuildName Target Guild Name */
	public function setTargetGuildName(?string $targetGuildName) {
		$this->targetGuildName = $targetGuildName;
	}
    /**
     * @param string|null $targetGuildName Target Guild Name
     * @return ReceiveMemberRequest
     */
	public function withTargetGuildName(?string $targetGuildName): ReceiveMemberRequest {
		$this->targetGuildName = $targetGuildName;
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
     * @return ReceiveMemberRequest
     */
	public function withMetadata(?string $metadata): ReceiveMemberRequest {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return ReceiveMemberRequest
     */
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