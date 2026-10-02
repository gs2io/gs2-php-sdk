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
 * Request for updateRoom: Update Room
 *
 * @see https://docs.gs2.io/api_reference/chat/sdk/#updateroom
 */
class UpdateRoomRequest extends Gs2BasicRequest {
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
    private $accessToken;
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
     * @return UpdateRoomRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateRoomRequest {
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
     * @return UpdateRoomRequest
     */
	public function withRoomName(?string $roomName): UpdateRoomRequest {
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
     * @return UpdateRoomRequest
     */
	public function withMetadata(?string $metadata): UpdateRoomRequest {
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
     * @return UpdateRoomRequest
     */
	public function withPassword(?string $password): UpdateRoomRequest {
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
     * @return UpdateRoomRequest
     */
	public function withWhiteListUserIds(?array $whiteListUserIds): UpdateRoomRequest {
		$this->whiteListUserIds = $whiteListUserIds;
		return $this;
	}
    /** @return string|null Owner User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken Owner User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken Owner User ID
     * @return UpdateRoomRequest
     */
	public function withAccessToken(?string $accessToken): UpdateRoomRequest {
		$this->accessToken = $accessToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): UpdateRoomRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateRoomRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateRoomRequest())
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
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null);
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
            "accessToken" => $this->getAccessToken(),
        );
    }
}