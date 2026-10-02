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

namespace Gs2\Realtime\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for wantRoom: Request to create a room
 *
 * @see https://docs.gs2.io/api_reference/realtime/sdk/#wantroom
 */
class WantRoomRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Room name */
    private $name;
    /** @var array Notification User IDs */
    private $notificationUserIds;
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
     * @return WantRoomRequest
     */
	public function withNamespaceName(?string $namespaceName): WantRoomRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Room name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Room name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Room name
     * @return WantRoomRequest
     */
	public function withName(?string $name): WantRoomRequest {
		$this->name = $name;
		return $this;
	}
    /** @return array|null Notification User IDs */
	public function getNotificationUserIds(): ?array {
		return $this->notificationUserIds;
	}
    /** @param array|null $notificationUserIds Notification User IDs */
	public function setNotificationUserIds(?array $notificationUserIds) {
		$this->notificationUserIds = $notificationUserIds;
	}
    /**
     * @param array|null $notificationUserIds Notification User IDs
     * @return WantRoomRequest
     */
	public function withNotificationUserIds(?array $notificationUserIds): WantRoomRequest {
		$this->notificationUserIds = $notificationUserIds;
		return $this;
	}

    public static function fromJson(?array $data): ?WantRoomRequest {
        if ($data === null) {
            return null;
        }
        return (new WantRoomRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withNotificationUserIds(!array_key_exists('notificationUserIds', $data) || $data['notificationUserIds'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['notificationUserIds']
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "name" => $this->getName(),
            "notificationUserIds" => $this->getNotificationUserIds() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getNotificationUserIds()
            ),
        );
    }
}