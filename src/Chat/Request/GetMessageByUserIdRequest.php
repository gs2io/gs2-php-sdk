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
 * Request for getMessageByUserId: Get Message by User ID
 *
 * @see https://docs.gs2.io/api_reference/chat/sdk/#getmessagebyuserid
 */
class GetMessageByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Room name */
    private $roomName;
    /** @var string Message name */
    private $messageName;
    /** @var string Password */
    private $password;
    /** @var string User ID */
    private $userId;
    /** @var string Time offset token */
    private $timeOffsetToken;
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
     * @return GetMessageByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): GetMessageByUserIdRequest {
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
     * @return GetMessageByUserIdRequest
     */
	public function withRoomName(?string $roomName): GetMessageByUserIdRequest {
		$this->roomName = $roomName;
		return $this;
	}
    /** @return string|null Message name */
	public function getMessageName(): ?string {
		return $this->messageName;
	}
    /** @param string|null $messageName Message name */
	public function setMessageName(?string $messageName) {
		$this->messageName = $messageName;
	}
    /**
     * @param string|null $messageName Message name
     * @return GetMessageByUserIdRequest
     */
	public function withMessageName(?string $messageName): GetMessageByUserIdRequest {
		$this->messageName = $messageName;
		return $this;
	}
    /** @return string|null Password */
	public function getPassword(): ?string {
		return $this->password;
	}
    /** @param string|null $password Password */
	public function setPassword(?string $password) {
		$this->password = $password;
	}
    /**
     * @param string|null $password Password
     * @return GetMessageByUserIdRequest
     */
	public function withPassword(?string $password): GetMessageByUserIdRequest {
		$this->password = $password;
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
     * @return GetMessageByUserIdRequest
     */
	public function withUserId(?string $userId): GetMessageByUserIdRequest {
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
     * @return GetMessageByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): GetMessageByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

    public static function fromJson(?array $data): ?GetMessageByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new GetMessageByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRoomName(array_key_exists('roomName', $data) && $data['roomName'] !== null ? $data['roomName'] : null)
            ->withMessageName(array_key_exists('messageName', $data) && $data['messageName'] !== null ? $data['messageName'] : null)
            ->withPassword(array_key_exists('password', $data) && $data['password'] !== null ? $data['password'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "roomName" => $this->getRoomName(),
            "messageName" => $this->getMessageName(),
            "password" => $this->getPassword(),
            "userId" => $this->getUserId(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}