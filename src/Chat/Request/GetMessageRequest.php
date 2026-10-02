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
 * Request for getMessage: Get Message
 *
 * @see https://docs.gs2.io/api_reference/chat/sdk/#getmessage
 */
class GetMessageRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Room name */
    private $roomName;
    /** @var string Message name */
    private $messageName;
    /** @var string Password */
    private $password;
    /** @var string User ID */
    private $accessToken;
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
     * @return GetMessageRequest
     */
	public function withNamespaceName(?string $namespaceName): GetMessageRequest {
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
     * @return GetMessageRequest
     */
	public function withRoomName(?string $roomName): GetMessageRequest {
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
     * @return GetMessageRequest
     */
	public function withMessageName(?string $messageName): GetMessageRequest {
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
     * @return GetMessageRequest
     */
	public function withPassword(?string $password): GetMessageRequest {
		$this->password = $password;
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
     * @return GetMessageRequest
     */
	public function withAccessToken(?string $accessToken): GetMessageRequest {
		$this->accessToken = $accessToken;
		return $this;
	}

    public static function fromJson(?array $data): ?GetMessageRequest {
        if ($data === null) {
            return null;
        }
        return (new GetMessageRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRoomName(array_key_exists('roomName', $data) && $data['roomName'] !== null ? $data['roomName'] : null)
            ->withMessageName(array_key_exists('messageName', $data) && $data['messageName'] !== null ? $data['messageName'] : null)
            ->withPassword(array_key_exists('password', $data) && $data['password'] !== null ? $data['password'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "roomName" => $this->getRoomName(),
            "messageName" => $this->getMessageName(),
            "password" => $this->getPassword(),
            "accessToken" => $this->getAccessToken(),
        );
    }
}