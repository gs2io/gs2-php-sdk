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
 * Request for deleteRoomFromBackend: Delete Room from Backend
 *
 * @see https://docs.gs2.io/api_reference/chat/sdk/#deleteroomfrombackend
 */
class DeleteRoomFromBackendRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Room name */
    private $roomName;
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
     * @return DeleteRoomFromBackendRequest
     */
	public function withNamespaceName(?string $namespaceName): DeleteRoomFromBackendRequest {
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
     * @return DeleteRoomFromBackendRequest
     */
	public function withRoomName(?string $roomName): DeleteRoomFromBackendRequest {
		$this->roomName = $roomName;
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
     * @return DeleteRoomFromBackendRequest
     */
	public function withUserId(?string $userId): DeleteRoomFromBackendRequest {
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
     * @return DeleteRoomFromBackendRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): DeleteRoomFromBackendRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): DeleteRoomFromBackendRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteRoomFromBackendRequest {
        if ($data === null) {
            return null;
        }
        return (new DeleteRoomFromBackendRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRoomName(array_key_exists('roomName', $data) && $data['roomName'] !== null ? $data['roomName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "roomName" => $this->getRoomName(),
            "userId" => $this->getUserId(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}