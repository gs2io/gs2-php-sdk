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

namespace Gs2\Chat\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Chat\Model\NotificationType;

/**
 * Request for subscribeByUserId: Subscribe to a room by User ID
 *
 * @see https://docs.gs2.io/api_reference/chat/sdk/#subscribebyuserid
 */
class SubscribeByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Room name to subscribe to */
    private $roomName;
    /** @var string User ID */
    private $userId;
    /** @var array List of categories to receive notifications of new messages */
    private $notificationTypes;
    /** @var string Time offset token */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return SubscribeByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): SubscribeByUserIdRequest {
		$this->namespaceName = $namespaceName;
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
     * @return SubscribeByUserIdRequest
     */
	public function withRoomName(?string $roomName): SubscribeByUserIdRequest {
		$this->roomName = $roomName;
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
     * @return SubscribeByUserIdRequest
     */
	public function withUserId(?string $userId): SubscribeByUserIdRequest {
		$this->userId = $userId;
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
     * @return SubscribeByUserIdRequest
     */
	public function withNotificationTypes(?array $notificationTypes): SubscribeByUserIdRequest {
		$this->notificationTypes = $notificationTypes;
		return $this;
	}
    /** @return string|null Time offset token */
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
    /** @param string|null $timeOffsetToken Time offset token */
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
    /**
     * @param string|null $timeOffsetToken Time offset token
     * @return SubscribeByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): SubscribeByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SubscribeByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SubscribeByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new SubscribeByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRoomName(array_key_exists('roomName', $data) && $data['roomName'] !== null ? $data['roomName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withNotificationTypes(!array_key_exists('notificationTypes', $data) || $data['notificationTypes'] === null ? null : array_map(
                function ($item) {
                    return NotificationType::fromJson($item);
                },
                $data['notificationTypes']
            ))
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "roomName" => $this->getRoomName(),
            "userId" => $this->getUserId(),
            "notificationTypes" => $this->getNotificationTypes() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getNotificationTypes()
            ),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}