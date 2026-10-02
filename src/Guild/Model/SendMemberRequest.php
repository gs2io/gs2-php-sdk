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
 * Sent Join Request
 *
 * @see https://docs.gs2.io/api_reference/guild/sdk/#sendmemberrequest
 */
class SendMemberRequest implements IModel {
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Guild model name of the target guild
	 */
	private $targetGuildModelName;
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
     * @return SendMemberRequest
     */
	public function withUserId(?string $userId): SendMemberRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Guild model name of the target guild */
	public function getTargetGuildModelName(): ?string {
		return $this->targetGuildModelName;
	}
    /** @param string|null $targetGuildModelName Guild model name of the target guild */
	public function setTargetGuildModelName(?string $targetGuildModelName) {
		$this->targetGuildModelName = $targetGuildModelName;
	}
    /**
     * @param string|null $targetGuildModelName Guild model name of the target guild
     * @return SendMemberRequest
     */
	public function withTargetGuildModelName(?string $targetGuildModelName): SendMemberRequest {
		$this->targetGuildModelName = $targetGuildModelName;
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
     * @return SendMemberRequest
     */
	public function withTargetGuildName(?string $targetGuildName): SendMemberRequest {
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
     * @return SendMemberRequest
     */
	public function withMetadata(?string $metadata): SendMemberRequest {
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
     * @return SendMemberRequest
     */
	public function withCreatedAt(?int $createdAt): SendMemberRequest {
		$this->createdAt = $createdAt;
		return $this;
	}

    public static function fromJson(?array $data): ?SendMemberRequest {
        if ($data === null) {
            return null;
        }
        return (new SendMemberRequest())
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTargetGuildModelName(array_key_exists('targetGuildModelName', $data) && $data['targetGuildModelName'] !== null ? $data['targetGuildModelName'] : null)
            ->withTargetGuildName(array_key_exists('targetGuildName', $data) && $data['targetGuildName'] !== null ? $data['targetGuildName'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null);
    }

    public function toJson(): array {
        return array(
            "userId" => $this->getUserId(),
            "targetGuildModelName" => $this->getTargetGuildModelName(),
            "targetGuildName" => $this->getTargetGuildName(),
            "metadata" => $this->getMetadata(),
            "createdAt" => $this->getCreatedAt(),
        );
    }
}