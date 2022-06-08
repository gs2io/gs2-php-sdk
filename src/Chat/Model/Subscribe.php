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


class Subscribe implements IModel {
	/**
     * @var string
	 */
	private $subscribeId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $roomName;
	/**
     * @var array
	 */
	private $notificationTypes;
	/**
     * @var int
	 */
	private $createdAt;
	public function getSubscribeId(): ?string {
		return $this->subscribeId;
	}
	public function setSubscribeId(?string $subscribeId) {
		$this->subscribeId = $subscribeId;
	}
	public function withSubscribeId(?string $subscribeId): Subscribe {
		$this->subscribeId = $subscribeId;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): Subscribe {
		$this->userId = $userId;
		return $this;
	}
	public function getRoomName(): ?string {
		return $this->roomName;
	}
	public function setRoomName(?string $roomName) {
		$this->roomName = $roomName;
	}
	public function withRoomName(?string $roomName): Subscribe {
		$this->roomName = $roomName;
		return $this;
	}
	public function getNotificationTypes(): ?array {
		return $this->notificationTypes;
	}
	public function setNotificationTypes(?array $notificationTypes) {
		$this->notificationTypes = $notificationTypes;
	}
	public function withNotificationTypes(?array $notificationTypes): Subscribe {
		$this->notificationTypes = $notificationTypes;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Subscribe {
		$this->createdAt = $createdAt;
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
            ->withNotificationTypes(array_map(
                function ($item) {
                    return NotificationType::fromJson($item);
                },
                array_key_exists('notificationTypes', $data) && $data['notificationTypes'] !== null ? $data['notificationTypes'] : []
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null);
    }

    public function toJson(): array {
        return array(
            "subscribeId" => $this->getSubscribeId(),
            "userId" => $this->getUserId(),
            "roomName" => $this->getRoomName(),
            "notificationTypes" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getNotificationTypes() !== null && $this->getNotificationTypes() !== null ? $this->getNotificationTypes() : []
            ),
            "createdAt" => $this->getCreatedAt(),
        );
    }
}