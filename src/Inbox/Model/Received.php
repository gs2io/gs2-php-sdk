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

namespace Gs2\Inbox\Model;

use Gs2\Core\Model\IModel;


class Received implements IModel {
	/**
     * @var string
	 */
	private $receivedId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var array
	 */
	private $receivedGlobalMessageNames;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	/**
     * @var int
	 */
	private $revision;
	public function getReceivedId(): ?string {
		return $this->receivedId;
	}
	public function setReceivedId(?string $receivedId) {
		$this->receivedId = $receivedId;
	}
	public function withReceivedId(?string $receivedId): Received {
		$this->receivedId = $receivedId;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): Received {
		$this->userId = $userId;
		return $this;
	}
	public function getReceivedGlobalMessageNames(): ?array {
		return $this->receivedGlobalMessageNames;
	}
	public function setReceivedGlobalMessageNames(?array $receivedGlobalMessageNames) {
		$this->receivedGlobalMessageNames = $receivedGlobalMessageNames;
	}
	public function withReceivedGlobalMessageNames(?array $receivedGlobalMessageNames): Received {
		$this->receivedGlobalMessageNames = $receivedGlobalMessageNames;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Received {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): Received {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): Received {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Received {
        if ($data === null) {
            return null;
        }
        return (new Received())
            ->withReceivedId(array_key_exists('receivedId', $data) && $data['receivedId'] !== null ? $data['receivedId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withReceivedGlobalMessageNames(!array_key_exists('receivedGlobalMessageNames', $data) || $data['receivedGlobalMessageNames'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['receivedGlobalMessageNames']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "receivedId" => $this->getReceivedId(),
            "userId" => $this->getUserId(),
            "receivedGlobalMessageNames" => $this->getReceivedGlobalMessageNames() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getReceivedGlobalMessageNames()
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}