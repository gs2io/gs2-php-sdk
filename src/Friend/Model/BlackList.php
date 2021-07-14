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


class BlackList implements IModel {
	/**
     * @var string
	 */
	private $blackListId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var array
	 */
	private $targetUserIds;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getBlackListId(): ?string {
		return $this->blackListId;
	}

	public function setBlackListId(?string $blackListId) {
		$this->blackListId = $blackListId;
	}

	public function withBlackListId(?string $blackListId): BlackList {
		$this->blackListId = $blackListId;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): BlackList {
		$this->userId = $userId;
		return $this;
	}

	public function getTargetUserIds(): ?array {
		return $this->targetUserIds;
	}

	public function setTargetUserIds(?array $targetUserIds) {
		$this->targetUserIds = $targetUserIds;
	}

	public function withTargetUserIds(?array $targetUserIds): BlackList {
		$this->targetUserIds = $targetUserIds;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): BlackList {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): BlackList {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?BlackList {
        if ($data === null) {
            return null;
        }
        return (new BlackList())
            ->withBlackListId(empty($data['blackListId']) ? null : $data['blackListId'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withTargetUserIds(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('targetUserIds', $data) && $data['targetUserIds'] !== null ? $data['targetUserIds'] : []
            ))
            ->withCreatedAt(empty($data['createdAt']) ? null : $data['createdAt'])
            ->withUpdatedAt(empty($data['updatedAt']) ? null : $data['updatedAt']);
    }

    public function toJson(): array {
        return array(
            "blackListId" => $this->getBlackListId(),
            "userId" => $this->getUserId(),
            "targetUserIds" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getTargetUserIds() !== null && $this->getTargetUserIds() !== null ? $this->getTargetUserIds() : []
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}