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

class UpdateNotificationTypeByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $roomName;
    /** @var string */
    private $userId;
    /** @var array */
    private $notificationTypes;
    /** @var string */
    private $duplicationAvoider;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): UpdateNotificationTypeByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getRoomName(): ?string {
		return $this->roomName;
	}

	public function setRoomName(?string $roomName) {
		$this->roomName = $roomName;
	}

	public function withRoomName(?string $roomName): UpdateNotificationTypeByUserIdRequest {
		$this->roomName = $roomName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): UpdateNotificationTypeByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getNotificationTypes(): ?array {
		return $this->notificationTypes;
	}

	public function setNotificationTypes(?array $notificationTypes) {
		$this->notificationTypes = $notificationTypes;
	}

	public function withNotificationTypes(?array $notificationTypes): UpdateNotificationTypeByUserIdRequest {
		$this->notificationTypes = $notificationTypes;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): UpdateNotificationTypeByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateNotificationTypeByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateNotificationTypeByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRoomName(array_key_exists('roomName', $data) && $data['roomName'] !== null ? $data['roomName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withNotificationTypes(array_map(
                function ($item) {
                    return NotificationType::fromJson($item);
                },
                array_key_exists('notificationTypes', $data) && $data['notificationTypes'] !== null ? $data['notificationTypes'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "roomName" => $this->getRoomName(),
            "userId" => $this->getUserId(),
            "notificationTypes" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getNotificationTypes() !== null && $this->getNotificationTypes() !== null ? $this->getNotificationTypes() : []
            ),
        );
    }
}