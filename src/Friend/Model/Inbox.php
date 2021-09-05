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


class Inbox implements IModel {
	/**
     * @var string
	 */
	private $inboxId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var array
	 */
	private $fromUserIds;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getInboxId(): ?string {
		return $this->inboxId;
	}

	public function setInboxId(?string $inboxId) {
		$this->inboxId = $inboxId;
	}

	public function withInboxId(?string $inboxId): Inbox {
		$this->inboxId = $inboxId;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): Inbox {
		$this->userId = $userId;
		return $this;
	}

	public function getFromUserIds(): ?array {
		return $this->fromUserIds;
	}

	public function setFromUserIds(?array $fromUserIds) {
		$this->fromUserIds = $fromUserIds;
	}

	public function withFromUserIds(?array $fromUserIds): Inbox {
		$this->fromUserIds = $fromUserIds;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): Inbox {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): Inbox {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Inbox {
        if ($data === null) {
            return null;
        }
        return (new Inbox())
            ->withInboxId(empty($data['inboxId']) ? null : $data['inboxId'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withFromUserIds(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('fromUserIds', $data) && $data['fromUserIds'] !== null ? $data['fromUserIds'] : []
            ))
            ->withCreatedAt(empty($data['createdAt']) && $data['createdAt'] !== 0 ? null : $data['createdAt'])
            ->withUpdatedAt(empty($data['updatedAt']) && $data['updatedAt'] !== 0 ? null : $data['updatedAt']);
    }

    public function toJson(): array {
        return array(
            "inboxId" => $this->getInboxId(),
            "userId" => $this->getUserId(),
            "fromUserIds" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getFromUserIds() !== null && $this->getFromUserIds() !== null ? $this->getFromUserIds() : []
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}