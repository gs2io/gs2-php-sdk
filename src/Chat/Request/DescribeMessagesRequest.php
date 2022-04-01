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

class DescribeMessagesRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $roomName;
    /** @var string */
    private $password;
    /** @var string */
    private $accessToken;
    /** @var int */
    private $startAt;
    /** @var int */
    private $limit;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): DescribeMessagesRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getRoomName(): ?string {
		return $this->roomName;
	}

	public function setRoomName(?string $roomName) {
		$this->roomName = $roomName;
	}

	public function withRoomName(?string $roomName): DescribeMessagesRequest {
		$this->roomName = $roomName;
		return $this;
	}

	public function getPassword(): ?string {
		return $this->password;
	}

	public function setPassword(?string $password) {
		$this->password = $password;
	}

	public function withPassword(?string $password): DescribeMessagesRequest {
		$this->password = $password;
		return $this;
	}

	public function getAccessToken(): ?string {
		return $this->accessToken;
	}

	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}

	public function withAccessToken(?string $accessToken): DescribeMessagesRequest {
		$this->accessToken = $accessToken;
		return $this;
	}

	public function getStartAt(): ?int {
		return $this->startAt;
	}

	public function setStartAt(?int $startAt) {
		$this->startAt = $startAt;
	}

	public function withStartAt(?int $startAt): DescribeMessagesRequest {
		$this->startAt = $startAt;
		return $this;
	}

	public function getLimit(): ?int {
		return $this->limit;
	}

	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}

	public function withLimit(?int $limit): DescribeMessagesRequest {
		$this->limit = $limit;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeMessagesRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeMessagesRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRoomName(array_key_exists('roomName', $data) && $data['roomName'] !== null ? $data['roomName'] : null)
            ->withPassword(array_key_exists('password', $data) && $data['password'] !== null ? $data['password'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withStartAt(array_key_exists('startAt', $data) && $data['startAt'] !== null ? $data['startAt'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "roomName" => $this->getRoomName(),
            "password" => $this->getPassword(),
            "accessToken" => $this->getAccessToken(),
            "startAt" => $this->getStartAt(),
            "limit" => $this->getLimit(),
        );
    }
}