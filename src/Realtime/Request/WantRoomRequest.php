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

class WantRoomRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $name;
    /** @var array */
    private $notificationUserIds;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): WantRoomRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): WantRoomRequest {
		$this->name = $name;
		return $this;
	}

	public function getNotificationUserIds(): ?array {
		return $this->notificationUserIds;
	}

	public function setNotificationUserIds(?array $notificationUserIds) {
		$this->notificationUserIds = $notificationUserIds;
	}

	public function withNotificationUserIds(?array $notificationUserIds): WantRoomRequest {
		$this->notificationUserIds = $notificationUserIds;
		return $this;
	}

    public static function fromJson(?array $data): ?WantRoomRequest {
        if ($data === null) {
            return null;
        }
        return (new WantRoomRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withNotificationUserIds(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('notificationUserIds', $data) && $data['notificationUserIds'] !== null ? $data['notificationUserIds'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "name" => $this->getName(),
            "notificationUserIds" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getNotificationUserIds() !== null && $this->getNotificationUserIds() !== null ? $this->getNotificationUserIds() : []
            ),
        );
    }
}