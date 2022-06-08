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

class SubscribeRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $roomName;
    /** @var string */
    private $accessToken;
    /** @var array */
    private $notificationTypes;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): SubscribeRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getRoomName(): ?string {
		return $this->roomName;
	}
	public function setRoomName(?string $roomName) {
		$this->roomName = $roomName;
	}
	public function withRoomName(?string $roomName): SubscribeRequest {
		$this->roomName = $roomName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): SubscribeRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getNotificationTypes(): ?array {
		return $this->notificationTypes;
	}
	public function setNotificationTypes(?array $notificationTypes) {
		$this->notificationTypes = $notificationTypes;
	}
	public function withNotificationTypes(?array $notificationTypes): SubscribeRequest {
		$this->notificationTypes = $notificationTypes;
		return $this;
	}

    public static function fromJson(?array $data): ?SubscribeRequest {
        if ($data === null) {
            return null;
        }
        return (new SubscribeRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRoomName(array_key_exists('roomName', $data) && $data['roomName'] !== null ? $data['roomName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
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
            "accessToken" => $this->getAccessToken(),
            "notificationTypes" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getNotificationTypes() !== null && $this->getNotificationTypes() !== null ? $this->getNotificationTypes() : []
            ),
        );
    }
}