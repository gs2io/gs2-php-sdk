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

namespace Gs2\Chat\Model;

use Gs2\Core\Model\IModel;


/**
 * Room Subscription
 *
 * @see https://docs.gs2.io/api_reference/chat/sdk/#subscribe
 */
class Subscribe implements IModel {
	/**
     * @var string Subscription GRN
	 */
	private $subscribeId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Room name to subscribe to
	 */
	private $roomName;
	/**
     * @var array List of categories to receive notifications of new messages
	 */
	private $notificationTypes;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Subscription GRN */
	public function getSubscribeId(): ?string {
		return $this->subscribeId;
	}
    /** @param string|null $subscribeId Subscription GRN */
	public function setSubscribeId(?string $subscribeId) {
		$this->subscribeId = $subscribeId;
	}
    /**
     * @param string|null $subscribeId Subscription GRN
     * @return Subscribe
     */
	public function withSubscribeId(?string $subscribeId): Subscribe {
		$this->subscribeId = $subscribeId;
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
     * @return Subscribe
     */
	public function withUserId(?string $userId): Subscribe {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Room name to subscribe to */
	public function getRoomName(): ?string {
		return $this->roomName;
	}
    /** @param string|null $roomName Room name to subscribe to */
	public function setRoomName(?string $roomName) {
		$this->roomName = $roomName;
	}
    /**
     * @param string|null $roomName Room name to subscribe to
     * @return Subscribe
     */
	public function withRoomName(?string $roomName): Subscribe {
		$this->roomName = $roomName;
		return $this;
	}
    /** @return array|null List of categories to receive notifications of new messages */
	public function getNotificationTypes(): ?array {
		return $this->notificationTypes;
	}
    /** @param array|null $notificationTypes List of categories to receive notifications of new messages */
	public function setNotificationTypes(?array $notificationTypes) {
		$this->notificationTypes = $notificationTypes;
	}
    /**
     * @param array|null $notificationTypes List of categories to receive notifications of new messages
     * @return Subscribe
     */
	public function withNotificationTypes(?array $notificationTypes): Subscribe {
		$this->notificationTypes = $notificationTypes;
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
     * @return Subscribe
     */
	public function withCreatedAt(?int $createdAt): Subscribe {
		$this->createdAt = $createdAt;
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
     * @return Subscribe
     */
	public function withRevision(?int $revision): Subscribe {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Subscribe {
        if ($data === null) {
            return null;
        }
        return (new Subscribe())
            ->withSubscribeId(array_key_exists('subscribeId', $data) && $data['subscribeId'] !== null ? $data['subscribeId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withRoomName(array_key_exists('roomName', $data) && $data['roomName'] !== null ? $data['roomName'] : null)
            ->withNotificationTypes(!array_key_exists('notificationTypes', $data) || $data['notificationTypes'] === null ? null : array_map(
                function ($item) {
                    return NotificationType::fromJson($item);
                },
                $data['notificationTypes']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "subscribeId" => $this->getSubscribeId(),
            "userId" => $this->getUserId(),
            "roomName" => $this->getRoomName(),
            "notificationTypes" => $this->getNotificationTypes() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getNotificationTypes()
            ),
            "createdAt" => $this->getCreatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}