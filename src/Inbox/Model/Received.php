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


/**
 * Received Global Message
 *
 * @see https://docs.gs2.io/api_reference/inbox/sdk/#received
 */
class Received implements IModel {
	/**
     * @var string Received Global Message name GRN
	 */
	private $receivedId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var array List of Received Global Message names
	 */
	private $receivedGlobalMessageNames;
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
    /** @return string|null Received Global Message name GRN */
	public function getReceivedId(): ?string {
		return $this->receivedId;
	}
    /** @param string|null $receivedId Received Global Message name GRN */
	public function setReceivedId(?string $receivedId) {
		$this->receivedId = $receivedId;
	}
    /**
     * @param string|null $receivedId Received Global Message name GRN
     * @return Received
     */
	public function withReceivedId(?string $receivedId): Received {
		$this->receivedId = $receivedId;
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
     * @return Received
     */
	public function withUserId(?string $userId): Received {
		$this->userId = $userId;
		return $this;
	}
    /** @return array|null List of Received Global Message names */
	public function getReceivedGlobalMessageNames(): ?array {
		return $this->receivedGlobalMessageNames;
	}
    /** @param array|null $receivedGlobalMessageNames List of Received Global Message names */
	public function setReceivedGlobalMessageNames(?array $receivedGlobalMessageNames) {
		$this->receivedGlobalMessageNames = $receivedGlobalMessageNames;
	}
    /**
     * @param array|null $receivedGlobalMessageNames List of Received Global Message names
     * @return Received
     */
	public function withReceivedGlobalMessageNames(?array $receivedGlobalMessageNames): Received {
		$this->receivedGlobalMessageNames = $receivedGlobalMessageNames;
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
     * @return Received
     */
	public function withCreatedAt(?int $createdAt): Received {
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
     * @return Received
     */
	public function withUpdatedAt(?int $updatedAt): Received {
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
     * @return Received
     */
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