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

namespace Gs2\Friend\Model;

use Gs2\Core\Model\IModel;


/**
 * Blacklist
 *
 * @see https://docs.gs2.io/api_reference/friend/sdk/#blacklist
 */
class BlackList implements IModel {
	/**
     * @var string Blacklist GRN
	 */
	private $blackListId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var array Blacklist user ID list
	 */
	private $targetUserIds;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Blacklist GRN */
	public function getBlackListId(): ?string {
		return $this->blackListId;
	}
    /** @param string|null $blackListId Blacklist GRN */
	public function setBlackListId(?string $blackListId) {
		$this->blackListId = $blackListId;
	}
    /**
     * @param string|null $blackListId Blacklist GRN
     * @return BlackList
     */
	public function withBlackListId(?string $blackListId): BlackList {
		$this->blackListId = $blackListId;
		return $this;
	}
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
     * @return BlackList
     */
	public function withUserId(?string $userId): BlackList {
		$this->userId = $userId;
		return $this;
	}
    /** @return array|null Blacklist user ID list */
	public function getTargetUserIds(): ?array {
		return $this->targetUserIds;
	}
    /** @param array|null $targetUserIds Blacklist user ID list */
	public function setTargetUserIds(?array $targetUserIds) {
		$this->targetUserIds = $targetUserIds;
	}
    /**
     * @param array|null $targetUserIds Blacklist user ID list
     * @return BlackList
     */
	public function withTargetUserIds(?array $targetUserIds): BlackList {
		$this->targetUserIds = $targetUserIds;
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
     * @return BlackList
     */
	public function withCreatedAt(?int $createdAt): BlackList {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return BlackList
     */
	public function withUpdatedAt(?int $updatedAt): BlackList {
		$this->updatedAt = $updatedAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return BlackList
     */
	public function withRevision(?int $revision): BlackList {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?BlackList {
        if ($data === null) {
            return null;
        }
        return (new BlackList())
            ->withBlackListId(array_key_exists('blackListId', $data) && $data['blackListId'] !== null ? $data['blackListId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTargetUserIds(!array_key_exists('targetUserIds', $data) || $data['targetUserIds'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['targetUserIds']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "blackListId" => $this->getBlackListId(),
            "userId" => $this->getUserId(),
            "targetUserIds" => $this->getTargetUserIds() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getTargetUserIds()
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}