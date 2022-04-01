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

class UpdateRoomFromBackendRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $roomName;
    /** @var string */
    private $metadata;
    /** @var string */
    private $password;
    /** @var array */
    private $whiteListUserIds;
    /** @var string */
    private $userId;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): UpdateRoomFromBackendRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getRoomName(): ?string {
		return $this->roomName;
	}

	public function setRoomName(?string $roomName) {
		$this->roomName = $roomName;
	}

	public function withRoomName(?string $roomName): UpdateRoomFromBackendRequest {
		$this->roomName = $roomName;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): UpdateRoomFromBackendRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getPassword(): ?string {
		return $this->password;
	}

	public function setPassword(?string $password) {
		$this->password = $password;
	}

	public function withPassword(?string $password): UpdateRoomFromBackendRequest {
		$this->password = $password;
		return $this;
	}

	public function getWhiteListUserIds(): ?array {
		return $this->whiteListUserIds;
	}

	public function setWhiteListUserIds(?array $whiteListUserIds) {
		$this->whiteListUserIds = $whiteListUserIds;
	}

	public function withWhiteListUserIds(?array $whiteListUserIds): UpdateRoomFromBackendRequest {
		$this->whiteListUserIds = $whiteListUserIds;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): UpdateRoomFromBackendRequest {
		$this->userId = $userId;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateRoomFromBackendRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateRoomFromBackendRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRoomName(array_key_exists('roomName', $data) && $data['roomName'] !== null ? $data['roomName'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withPassword(array_key_exists('password', $data) && $data['password'] !== null ? $data['password'] : null)
            ->withWhiteListUserIds(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('whiteListUserIds', $data) && $data['whiteListUserIds'] !== null ? $data['whiteListUserIds'] : []
            ))
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "roomName" => $this->getRoomName(),
            "metadata" => $this->getMetadata(),
            "password" => $this->getPassword(),
            "whiteListUserIds" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getWhiteListUserIds() !== null && $this->getWhiteListUserIds() !== null ? $this->getWhiteListUserIds() : []
            ),
            "userId" => $this->getUserId(),
        );
    }
}