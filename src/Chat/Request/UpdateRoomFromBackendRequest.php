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

/**
 * Request for updateRoomFromBackend: Update Room from Backend
 *
 * @see https://docs.gs2.io/api_reference/chat/sdk/#updateroomfrombackend
 */
class UpdateRoomFromBackendRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Room name */
    private $roomName;
    /** @var string Metadata */
    private $metadata;
    /** @var string Password required to access the room */
    private $password;
    /** @var array List of user IDs with access to the room */
    private $whiteListUserIds;
    /** @var string Owner User ID */
    private $userId;
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
     * @return UpdateRoomFromBackendRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateRoomFromBackendRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Room name */
	public function getRoomName(): ?string {
		return $this->roomName;
	}
    /** @param string|null $roomName Room name */
	public function setRoomName(?string $roomName) {
		$this->roomName = $roomName;
	}
    /**
     * @param string|null $roomName Room name
     * @return UpdateRoomFromBackendRequest
     */
	public function withRoomName(?string $roomName): UpdateRoomFromBackendRequest {
		$this->roomName = $roomName;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return UpdateRoomFromBackendRequest
     */
	public function withMetadata(?string $metadata): UpdateRoomFromBackendRequest {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return string|null Password required to access the room */
	public function getPassword(): ?string {
		return $this->password;
	}
    /** @param string|null $password Password required to access the room */
	public function setPassword(?string $password) {
		$this->password = $password;
	}
    /**
     * @param string|null $password Password required to access the room
     * @return UpdateRoomFromBackendRequest
     */
	public function withPassword(?string $password): UpdateRoomFromBackendRequest {
		$this->password = $password;
		return $this;
	}
    /** @return array|null List of user IDs with access to the room */
	public function getWhiteListUserIds(): ?array {
		return $this->whiteListUserIds;
	}
    /** @param array|null $whiteListUserIds List of user IDs with access to the room */
	public function setWhiteListUserIds(?array $whiteListUserIds) {
		$this->whiteListUserIds = $whiteListUserIds;
	}
    /**
     * @param array|null $whiteListUserIds List of user IDs with access to the room
     * @return UpdateRoomFromBackendRequest
     */
	public function withWhiteListUserIds(?array $whiteListUserIds): UpdateRoomFromBackendRequest {
		$this->whiteListUserIds = $whiteListUserIds;
		return $this;
	}
    /** @return string|null Owner User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId Owner User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId Owner User ID
     * @return UpdateRoomFromBackendRequest
     */
	public function withUserId(?string $userId): UpdateRoomFromBackendRequest {
		$this->userId = $userId;
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
     * @return UpdateRoomFromBackendRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): UpdateRoomFromBackendRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): UpdateRoomFromBackendRequest {
		$this->duplicationAvoider = $duplicationAvoider;
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
            ->withWhiteListUserIds(!array_key_exists('whiteListUserIds', $data) || $data['whiteListUserIds'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['whiteListUserIds']
            ))
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "roomName" => $this->getRoomName(),
            "metadata" => $this->getMetadata(),
            "password" => $this->getPassword(),
            "whiteListUserIds" => $this->getWhiteListUserIds() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getWhiteListUserIds()
            ),
            "userId" => $this->getUserId(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}