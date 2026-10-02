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
 * Request for updateNotificationType: Update notification methods
 *
 * @see https://docs.gs2.io/api_reference/chat/sdk/#updatenotificationtype
 */
class UpdateNotificationTypeRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Subscribed room name */
    private $roomName;
    /** @var string User ID */
    private $accessToken;
    /** @var array List of categories to receive notifications of new messages */
    private $notificationTypes;
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
     * @return UpdateNotificationTypeRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateNotificationTypeRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Subscribed room name */
	public function getRoomName(): ?string {
		return $this->roomName;
	}
    /** @param string|null $roomName Subscribed room name */
	public function setRoomName(?string $roomName) {
		$this->roomName = $roomName;
	}
    /**
     * @param string|null $roomName Subscribed room name
     * @return UpdateNotificationTypeRequest
     */
	public function withRoomName(?string $roomName): UpdateNotificationTypeRequest {
		$this->roomName = $roomName;
		return $this;
	}
    /** @return string|null User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID
     * @return UpdateNotificationTypeRequest
     */
	public function withAccessToken(?string $accessToken): UpdateNotificationTypeRequest {
		$this->accessToken = $accessToken;
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
     * @return UpdateNotificationTypeRequest
     */
	public function withNotificationTypes(?array $notificationTypes): UpdateNotificationTypeRequest {
		$this->notificationTypes = $notificationTypes;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): UpdateNotificationTypeRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateNotificationTypeRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateNotificationTypeRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRoomName(array_key_exists('roomName', $data) && $data['roomName'] !== null ? $data['roomName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withNotificationTypes(!array_key_exists('notificationTypes', $data) || $data['notificationTypes'] === null ? null : array_map(
                function ($item) {
                    return NotificationType::fromJson($item);
                },
                $data['notificationTypes']
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "roomName" => $this->getRoomName(),
            "accessToken" => $this->getAccessToken(),
            "notificationTypes" => $this->getNotificationTypes() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getNotificationTypes()
            ),
        );
    }
}